import subprocess
import sys
import logs_handler


def check_installed():
    try:
        import pip
        print("Pip is already installed")
        logs_handler.entry_create("info",
                                  "Pip is already installed",
                                  "no")
    except ImportError:
        print("Pip not present. Trying to install...")
        try:
            subprocess.check_call(['python3', 'get-pip.py'])
            logs_handler.entry_create("notice",
                                      "Installed Pip",
                                      "no")
        except:
            logs_handler.entry_create("critical", "Pip could not be installed automatically, please refer to "
                                                  "https://pip.pypa.io/en/stable/installation/ for more information on how to "
                                                  "install it manually","no")
            sys.exit("Cannot install Pip... Exiting")


def install(name):
    try:
        subprocess.check_call(['pip3', 'install', name])
        logs_handler.entry_create("info",
                                  "Python3 dependency " + str(name) + " is already installed",
                                  "no")
    except:
        try:
            subprocess.check_call(['python', '-m', 'pip', 'install', name])
            logs_handler.entry_create("notice",
                                      "Python3 dependency " + str(name) + " has been installed",
                                      "no")
        except:
            print("Dependency couldn't " + str(name) + " be installed. Trying to continue execution...")
            logs_handler.entry_create("critical", "Pip could not install the dependency " + str(name) + " automatically, please refer to "
                                                  "https://pip.pypa.io/en/stable/cli/pip_install/ for more information on how to "
                                                  "install it manually","no")
