import save_data

import photo_taker
import sql_bridge

import atexit




sql_bridge.Db_Connection_Start()

#------------------------------------------------------------------------------------------

#Test section

ask = input(str("Take a pic ?"))
if ask == "yes":
    photo_taker.take_picture()

print(sql_bridge.Db_Select("logs","id_log,contenue_log",""))

#------------------------------------------------------------------------------------------

#Handles the exit of the program:
#     - Saves the PHOTOS objects to a json file

def exit_handler():
    print ('App is exiting')
    save_data.save_class(photo_taker.PHOTOS_container,"PHOTOS.json")
    file = open("PHOTOS.json", "w")
    file.close()


atexit.register(exit_handler)
