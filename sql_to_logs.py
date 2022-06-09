import import_data
import sql_bridge
import save_data
import os


class LOGS:
    def __init__(self, severity_class, description_class, time_str_class):
        self.severity = severity_class
        self.description = description_class
        self.time = time_str_class

LOGS_container_sql = []
LOGS_container_dict = import_data.load_class("LOGS.json")
if LOGS_container_dict:
    for i in LOGS_container_dict["LOGS"]:
        LOGS_container_sql.append(LOGS(i["severity"], i["description"], i["time"]))

sql_bridge.Db_Connection_Start()
sql_logs = sql_bridge.Db_Select("logs","contenue_log, niv_log, date_log","")

with open('LOGS.txt', 'r') as txt:
    content = txt.read()

result = str(content)

for Log_obj in sql_logs:
    description = Log_obj[0]
    log_level = Log_obj[1]
    time = Log_obj[2]

    if log_level == 0:
        severity = 'info'

    if log_level == 1:
        severity = 'notice'

    if log_level == 2:
        severity = 'warning'

    if log_level == 3:
        severity = 'critical'

    result = str(result) + str(severity) + " : " + str(description) + ". Time of log : " + str(time) + "\n"
    LOGS_container_sql.append(LOGS(severity, description, str(time)))


list_result = result.split("\n")
list_result = list(dict.fromkeys(list_result))
result = ""
for i in list_result:
    if i != "":
        result = result + str(i) + "\n"

with open('LOGS.txt', 'w') as output:
    output.write(str(result))



new_LOGS_container=[]
for i in LOGS_container_sql:
    if new_LOGS_container == []:
        new_LOGS_container.append(i)
    lengh = len(new_LOGS_container)
    times_seen = 0
    y = 0
    while lengh > y:
        if i.severity == new_LOGS_container[y].severity and i.time == new_LOGS_container[y].time and i.description == new_LOGS_container[y].description:
            times_seen = times_seen + 1
        y=y+1
    if times_seen < 1:
        new_LOGS_container.append(i)

save_data.save_class(new_LOGS_container, "LOGS.json", "LOGS")
os._exit(1)
