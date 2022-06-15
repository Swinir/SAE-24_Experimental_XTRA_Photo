import sys
from time import sleep
import paramiko
import os

try:
    with open('data.conf', 'r') as txt:
        content = txt.read()
    data = content.split("\n")
    ip_addr = data[0].split("=")[1]
    ip_addr = ip_addr.strip()
    user = data[1].split("=")[1]
    user = user.strip()
    password = data[2].split("=")[1]
    password = password.strip()
    install_path = data[3].split("=")[1]
    install_path = install_path.strip()

except:
    print("data.conf not present. It will be created with the IP address that you are going to supply.")
    ip_addr = input("Please enter the IP address of the raspberry-pi server: ")
    user = input("Please enter the user name of the raspberry-pi server (default is pi): ")
    password = input("Please enter the password of the raspberry-pi server (default is raspberry): ")
    install_path = input("Please enter the path where you installed the server on the raspberry-pi: ")
    with open('data.conf', 'w') as output:
        output.write(str("ip_addr = " + str(ip_addr) + "\n" + "user = " + str(user) + "\n" + "password = " + str(password) + "\n" + "install_path = " + str(install_path)))

port = 22
command = "cd " + str(install_path) + " && ./start.sh"

ssh = paramiko.SSHClient()
ssh.set_missing_host_key_policy(paramiko.AutoAddPolicy())
try:
    ssh.connect(ip_addr, port, user, password)
    print("Connected to " + str(ip_addr))
    stdin, stdout, stderr = ssh.exec_command(command)
    print("Command executed: " + str(command))
    sleep(8)
    stdin.close()
    ssh.close()
except:
    print("Connection failed please check the IP address, the user and the password")
    os.remove("data.conf")
    sys.exit(1)