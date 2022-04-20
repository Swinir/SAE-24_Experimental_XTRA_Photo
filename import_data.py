import json

def load_class(class_name,file_name):
    with open(file_name, "r") as out_file:
        data = json.load(out_file)
    return data