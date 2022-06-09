import subprocess
import logs_handler

def check_installed(name):
    try:
        subprocess.check_call(str("which "+name), shell=True)
        logs_handler.entry_create("info",
                                  "Linux dependency " + str(name) + " is already installed",
                                  "no")
    except:
        print(name+" not present. Trying to install...")
        try:
            subprocess.check_call(['apt', 'update'])
            subprocess.check_call(['apt', 'install', name])
            logs_handler.entry_create("notice",
                                      "Linux dependency " + str(name) + " has been installed successfully",
                                      "no")
        except:
            print("Cannot install "+name+"... Trying to continue execution...")
            logs_handler.entry_create("critical",
                                      "Linux dependency " + str(name) + "could not be installed automatically, please "
                                                                        "refer to "
                                                                        "https://debian-handbook.info/browse/fr-FR/stable/sect.apt-get.html for more "
                                                                        "information on how to install it manually", "no")