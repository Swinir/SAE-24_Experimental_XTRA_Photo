import json
import time
import subprocess

import import_data

class PHOTOS:
    def __init__(self,file_name,time):
        self.file_name = file_name
        self.time = time

PHOTOS_container = []
PHOTOS_container_dict = import_data.load_class("PHOTOS.json")
if PHOTOS_container_dict:
    for i in PHOTOS_container_dict["PHOTOS"]:
        PHOTOS_container.append(PHOTOS(i["file_name"],i["time"]))



def take_picture():
    time_obj = time.localtime() #returns an object
    photo_name = "Test" #WILL CHANGE

    resolution = '1280x720'
    save_location = 'images/' + photo_name + '.png'

    #subprocess.check_call(['fswebcam', '-r', resolution, '--no-banner', save_location]) #commented for testing

    PHOTOS_container.append(PHOTOS(photo_name,time_obj))




