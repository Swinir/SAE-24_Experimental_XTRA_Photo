import time
import import_data
import save_data
import atexit


class LOGS:
    def __init__(self, severity_class, description_class, time_str_class):
        self.severity = severity_class
        self.description = description_class
        self.time = time_str_class


LOGS_container = []
LOGS_container_dict = import_data.load_class("LOGS.json")
if LOGS_container_dict:
    for i in LOGS_container_dict["LOGS"]:
        LOGS_container.append(LOGS(i["severity"], i["description"], i["time"]))


def entry_create(severity,description,sql): #sql input checks if the exception accured after the sql auto install (then we can write in the sql database) or it accured before in which case we need to save it only in txt
    import sql_bridge
    with open('LOGS.txt', 'r') as txt:
        content = txt.read()
    time_obj = time.localtime()  # returns an object
    time_str = str(str(time_obj[0]).zfill(2) + "-" + str(time_obj[1]).zfill(2) + "-" + str(time_obj[2]).zfill(2) + " " + str(time_obj[3]).zfill(2) + ":" + str(time_obj[4]).zfill(2) + ":" + str(time_obj[5]).zfill(2))

    if severity == 'info':
            log_level = 0

    if severity == 'notice':
            log_level = 1

    if severity == 'warning':
            log_level = 2

    if severity == 'critical':
            log_level = 3

    result = str(content) + str(severity)+ " : " + str(description) + ". Time of log : " + str(time_str) + "\n"

    with open('LOGS.txt', 'w') as output:
        output.write(str(result))

    if sql == "yes":
        values = str("'" + description + "'" + " , " + "'" + str(log_level) + "'" + " , " + "'" + time_str + "'")
        LOGS_container.append(LOGS(severity, description, time_str))
        sql_bridge.Db_Connection_Start()
        sql_bridge.Db_Insert("logs", "contenue_log , niv_log , date_log", values)
    if sql == "no":
        LOGS_container.append(LOGS(severity, description, time_str))



def exit_handler_log():
    save_data.save_class(LOGS_container, "LOGS.json", "LOGS")

atexit.register(exit_handler_log)
