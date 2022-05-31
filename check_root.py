import sys
import os
import logs_handler
import atexit

def user_check():
    if not 'SUDO_UID' in os.environ.keys():
        print("This program should be executed with a sudoer account during the first start !")
        logs_handler.entry_create("critical", "This program should be executed with a sudoer account during the first start !", "no")
        sys.exit(1)
    else:
        logs_handler.entry_create("info",
                                  "User is root",
                                  "no")
        print("User is root")
