import json
import logs_handler

def save_class(class_container,file_name,class_name):
    try:
        if class_container != "":
            with open(file_name, "w") as out_file:
                out_file.writelines(["{", "\n", f'"{"" + str(class_name) + ""}"', ":", "["])
                for temp in class_container:
                    json.dump(temp.__dict__, out_file, indent=6)
                    if temp != class_container[-1]:
                        out_file.write(",")
                out_file.writelines(["]\n", "}\n"])
    except:
        logs_handler.entry_create("warning",
                                "The programm couldn't save the JSON backup data into it's corresponding file",
                                "yes")