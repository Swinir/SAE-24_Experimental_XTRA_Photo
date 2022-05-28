import logs_handler
import save_data
import photo_taker
import sql_bridge

import atexit

import time
import sys


sql_bridge.Db_Connection_Start()

#------------------------------------------------------------------------------------------

#Handles the exit of the program:
#     - Saves the PHOTOS objects to a json file

def exit_handler_photo():
    print ('App is exiting')
    save_data.save_class(photo_taker.PHOTOS_container,"PHOTOS.json","PHOTOS")

atexit.register(exit_handler_photo)

#------------------------------------------------------------------------------------------

#Test section




ask = input(str("Take a pic ?"))
if ask == "yes":
    photo_taker.take_picture()



#------------------------------------------------------------------------------------------

