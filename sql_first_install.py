import mysql.connector
import os
import sql_bridge
import subprocess
import logs_handler
import time


def Db_Initialise(new_password):
    global Database
    global Db_Cursor
    Database = mysql.connector.connect(
        host="localhost",
        user="root",
        password="Iutphoto123@"
    )
    Db_Cursor = Database.cursor()
    sql = "ALTER USER 'root'@'localhost' IDENTIFIED BY '" + new_password + "';"
    try:
        Db_Cursor.execute(sql)
        Database.commit()
    except:
        logs_handler.entry_create("critical",
                                "Impossible to setup database correctly",
                                "no")


def Db_add_user(user, passwd):
    table = "BDD.users"
    fields = "login, password, admin, block_user, duration"
    time_obj = time.localtime() #returns an object
    time_str = str(str(int(time_obj[0])+5).zfill(2) + "-" + str(time_obj[1]).zfill(2) + "-" + str(time_obj[2]).zfill(2) + " " + str(time_obj[3]).zfill(2) + ":" + str(time_obj[4]).zfill(2) + ":" + str(time_obj[5]).zfill(2))
    values = str("'" + user + "', '" + passwd + "', " + "1" + " , " + "0" + " , '" + time_str + "'")
    sql = str("INSERT INTO " + table + " (" + fields + ") VALUES (" + values + ");")
    try:
        Db_Cursor.execute(sql)
        Database.commit()
    except:
        logs_handler.entry_create("critical",
                                "Impossible to create default admin user",
                                "no")

def Db_Change_SQL_File(db_name, path, user, passwd):

    sql = str("mysql -u " + user + " --password=" + passwd + " " + db_name + " < " + path + ".sql")
    try:
        subprocess.call(sql, shell=True)
    except:
        logs_handler.entry_create("critical",
                                "Impossible to import databse into MariaDB",
                                "no")


Db_Initialise("Iutphoto123@") #Initialise la base de donnée

pwd = os.getcwd()
path = str(pwd + "/BDD")  # name needs to be changed depending on the database's name
Db_Change_SQL_File("BDD", path, "root","Iutphoto123@")  # the password needs to be changed depending the current password on the raspi
time.sleep(1)
Db_Initialise("Iutphoto123@")
Db_add_user("admin", "temppasswd")