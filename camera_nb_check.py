import logs_handler
import subprocess

def check_camera():
    current_line = 0
    nb_cameras = []
    subprocess.call('v4l2-ctl --list-devices > testcamera_amount', shell=True)
    with open('testcamera_amount', 'r') as res_file:
        data = res_file.readlines()
    for lines in data:
        if 'Camera' not in lines: #checks if the line is a camera
            current_line += 1
        else:
            current_line += 1
            nb_cameras.append(data[current_line].strip()) #puts the paths in a list

    if current_line == 0:
        logs_handler.entry_create("warning",
                                  "Could not count the number of camera currently connected",
                                  "yes")

    return nb_cameras #returns a list of the paths of the cameras
