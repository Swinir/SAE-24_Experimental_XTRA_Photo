import sys
import os

def user_check():
    if not 'SUDO_UID' in os.environ.keys():
        print("This program should be executed with a sudoer account during the first start !")
        sys.exit(1)
    else:
        print("User is root")
