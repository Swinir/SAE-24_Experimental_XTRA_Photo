import check_root
import pip_setup
import apt_setup
import save_data
import photo_taker


import atexit

#------------------------------------------------------------------------------------------
#Cette section effectue toutes les verifications nécessaires au bon fonctionnement du programme


check_root.user_check()
pip_setup.check_installed()
pip_setup.install("json")
pip_setup.install("time")
apt_setup.check_installed("fswebcam")


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
