import json

def save_class(class_name,file_name):
    with open(file_name, "w") as out_file:
        out_file.writelines(["{", "\n", f'"{"USERS"}"', ":", "["])
        for user in class_name:
            json.dump(user.__dict__, out_file, indent=6)
            if user != class_name[-1]:
                out_file.write(",")
        out_file.writelines(["]\n", "}\n"])