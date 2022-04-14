import sys
import os

def user_check():
    if not 'SUDO_UID' in os.environ.keys():
        sys.exit("This program should be executed with a sudoer account !")
    else:
        print("User is root")
