import json

def load_class(file_name):
    temp_str=str()
    out_file = open(file_name, "r")
    for i in out_file:
        temp_str = temp_str+i

    if temp_str != "":
        data = json.loads(temp_str)
        return data