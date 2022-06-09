import mysql.connector
import import_data


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


def Db_Connection_Start():
    global Database
    try:
        Database = mysql.connector.connect(
            host="localhost",
            user="root",
            password="Iutphoto123@",
            database="BDD"
        )
    except:
        import logs_handler
        print("Impossible de se connecter à la base de donnée")
        logs_handler.entry_create("critical",
                                "Impossible to connect to the MariaDB database",
                                "no")


    global Db_Cursor
    Db_Cursor = Database.cursor()

Db_Connection_Start()

#Adding the data

for Log_obj in LOGS_container:
    description = Log_obj.description
    severity = Log_obj.severity
    time = Log_obj.time

    if severity == 'info':
            log_level = 0

    if severity == 'notice':
            log_level = 1

    if severity == 'warning':
            log_level = 2

    if severity == 'critical':
            log_level = 3

    values = str("'" + str(description) + "'" + " , " + "'" + str(log_level) + "'" + " , " + "'" + str(time) + "'")
    sql = str("INSERT INTO logs (contenue_log,niv_log,date_log) VALUES ("+ str(values) + ");")
    try:
        Db_Cursor.execute(sql)
        Database.commit()
    except:
        import logs_handler
        logs_handler.entry_create("critical",
                                "Impossible to insert log data into database",
                                "no")



#Remove duplicates
Db_Cursor.execute("CREATE TABLE COPY_OF_logs SELECT DISTINCT contenue_log,niv_log,date_log FROM logs")
Db_Cursor.execute("DROP TABLE logs")
Db_Cursor.execute("ALTER TABLE COPY_OF_logs RENAME TO logs")
Database.commit