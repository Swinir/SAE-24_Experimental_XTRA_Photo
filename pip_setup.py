import subprocess
import sys

def check_installed():
    try:
        import pip
    except ImportError:
        print("Pip not present. Trying to install...")
        try:
            subprocess.check_call(['python3', 'get-pip.py'])
            print("Pip is installed")
        except:
            sys.exit("Cannot install Pip... Exiting")

def install(name):
    try:
        subprocess.check_call(['pip3', 'install', name])
    except:
        print("Dependency couldn't be installed. Trying to continue execution...")