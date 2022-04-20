import save_data

import settings
import photo_taker


import atexit


#------------------------------------------------------------------------------------------

#Test section

ask = input(str("Take a pic ?"))
if ask == "yes":
    photo_taker.take_picture()
    photo_taker.take_picture()



#------------------------------------------------------------------------------------------

#Handles the exit of the program:
#     - Saves the PHOTOS objects to a json file

def exit_handler():
    print ('App is exiting')
    save_data.save_class(photo_taker.PHOTOS_container,"PHOTOS.json")


atexit.register(exit_handler)
