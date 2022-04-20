import json

def save_class(class_container,file_name):
    if class_container != "":
        with open(file_name, "w") as out_file:
            out_file.writelines(["{", "\n", f'"{"PHOTOS"}"', ":", "["])
            for user in class_container:
                json.dump(user.__dict__, out_file, indent=6)
                if user != class_container[-1]:
                    out_file.write(",")
            out_file.writelines(["]\n", "}\n"])