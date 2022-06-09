import json
import logs_handler

def load_class(file_name):
    try:
        temp_str=str()
        out_file = open(file_name, "r")
        for i in out_file:
            temp_str = temp_str+i
        if temp_str != "":
            data = json.loads(temp_str)
            return data
    except:
        logs_handler.entry_create("warning",
                                "Impossible to read from existing JSON files, they may be corrupted",
                                "yes")