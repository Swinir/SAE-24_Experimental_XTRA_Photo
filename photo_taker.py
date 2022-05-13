import time
import subprocess

import import_data
import sql_bridge

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
    time_str = str(str(time_obj[0]) + "-" + str(time_obj[1]) + "-" + str(time_obj[2]) + " " + str(time_obj[3]) + ":" + str(time_obj[4]) + ":" + str(time_obj[5]))
    photo_name = "Test" #WILL CHANGE
    photo_path = str('images/' + photo_name + '.png')

    resolution = '1280x720'

    subprocess.check_call(['fswebcam', '-r', resolution, '--no-banner', photo_path])

    PHOTOS_container.append(PHOTOS(photo_name,time_obj))
    values = str("'" + photo_path + "'" +  " , " + "'" + "0" + "'" + " , " + "'" + time_str + "'")
    sql_bridge.Db_Insert("photos","path_photo , favori , date_photo", values)

