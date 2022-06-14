#!/usr/bin/python3

import save_data
import photo_taker
import sql_bridge

import atexit



sql_bridge.Db_Connection_Start()

#------------------------------------------------------------------------------------------

#Handles the exit of the program:
#     - Saves the PHOTOS objects to a json file

def exit_handler_photo():
    save_data.save_class(photo_taker.PHOTOS_container,"PHOTOS.json","PHOTOS")


atexit.register(exit_handler_photo)

#------------------------------------------------------------------------------------------




photo_taker.take_picture()



#------------------------------------------------------------------------------------------

