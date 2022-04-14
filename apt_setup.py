import subprocess

def check_installed(name):
    try:
        subprocess.check_call([name])
    except:
        print(name+" not present. Trying to install...")
        try:
            subprocess.check_call(['apt', 'update'])
            subprocess.check_call(['apt', 'install', name])
        except:
            print("Cannot install "+name+"... Trying to continue execution...")