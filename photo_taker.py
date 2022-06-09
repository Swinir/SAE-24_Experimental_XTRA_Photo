import time
import subprocess

import import_data
import sql_bridge
import logs_handler
import camera_nb_check
import luminosite

f = open('/home/installed_path.txt', 'r')
path = f.read()
f.close()
if path[-1:] == '\n':
    path = path[:-1]

class PHOTOS:
    def __init__(self,file_name,time,path):
        self.file_name = file_name
        self.time = time
        self.photo_path = path

PHOTOS_container = []
PHOTOS_container_dict = import_data.load_class("PHOTOS.json")
if PHOTOS_container_dict:
    for i in PHOTOS_container_dict["PHOTOS"]:
        PHOTOS_container.append(PHOTOS(i["file_name"],i["time"],i["photo_path"]))


def take_picture():
    time_obj = time.localtime() #returns an object
    time_str = str(str(time_obj[0]).zfill(2) + "-" + str(time_obj[1]).zfill(2) + "-" + str(time_obj[2]).zfill(2) + " " + str(time_obj[3]).zfill(2) + ":" + str(time_obj[4]).zfill(2) + ":" + str(time_obj[5]).zfill(2))
    time_str_no_space = str(str(time_obj[0]).zfill(2) + "-" + str(time_obj[1]).zfill(2) + "-" + str(time_obj[2]).zfill(2) + "_" + str(time_obj[3]).zfill(2) + ":" + str(time_obj[4]).zfill(2) + ":" + str(time_obj[5]).zfill(2))
    data_nb_data_number = camera_nb_check.check_camera()
    i = 0
    list_cam_number = []
    while i < len(data_nb_data_number):
        i += 1
        list_cam_number.append(i)
    counter = 0
    for current_cam in data_nb_data_number:
        photo_name = str("photo_"+time_str_no_space+"_cam_"+str(int(list_cam_number[counter])))
        counter += 1
        photo_path = str(path+'/'+'images/' + photo_name + '.png')

        resolution = '1920x1080'

        try:
            subprocess.check_call(['fswebcam', '-r', resolution, '-d' , current_cam , '--no-banner', photo_path])
            if luminosite.detect_lumi(photo_path):
                if luminosite.flash():
                            logs_handler.entry_create("info",
                                              "Taking picture with flash",
                                              "yes")
                else:
                            logs_handler.entry_create("warning",
                                                "Flash activation error",
                                                "yes")
            subprocess.check_call(['fswebcam', '-r', resolution, '-d', current_cam, '--no-banner', photo_path])
        except:
            logs_handler.entry_create("critical",
                                "The program couldn't take a picture using the camera",
                                "yes")

        try:
            PHOTOS_container.append(PHOTOS(photo_name,time_str,photo_path))
        except:
            logs_handler.entry_create("warning",
                                "A photo " + "(" + str(photo_name) + ")" + " could not have been saved to the JSON backup database",
                                "yes")

        values = str("'" + photo_path + "'" +  " , " + "'" + "0" + "'" + " , " + "'" + time_str + "'")

        try:
            sql_bridge.Db_Insert("photos","path_photo , favori , date_photo", values)
            logs_handler.entry_create("info",
                                "A photo " + "(" + str(photo_name) + ")" + " has just been saved",
                                "yes")
        except:
            logs_handler.entry_create("critical",
                                "A photo " + "(" + str(photo_name) + ")" + " could not have been saved to database",
                                "yes")

