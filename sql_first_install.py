import mysql.connector
import os
import sql_bridge
import subprocess
import logs_handler


def Db_Initialise(new_password):
    Database = mysql.connector.connect(
        host="localhost",
        user="root",
        password="Iutphoto123@"
    )
    Db_Cursor = Database.cursor()
    sql = "ALTER USER 'root'@'localhost' IDENTIFIED BY '" + new_password + "';"
    try:
        Db_Cursor.execute(sql)
        Database.commit()
    except:
        logs_handler.entry_create("critical",
                                "Impossible to setup database correctly",
                                "no")


def Db_Change_SQL_File(db_name, path, user, passwd):

    sql = str("mysql -u " + user + " --password=" + passwd + " " + db_name + " < " + path + ".sql")
    try:
        subprocess.call(sql, shell=True)
    except:
        logs_handler.entry_create("critical",
                                "Impossible to import databse into MariaDB",
                                "no")


Db_Initialise("Iutphoto123@")  # password needs to be changed via a static method or using a dynamic method

pwd = os.getcwd()
path = str(pwd + "/BDD")  # name needs to be changed depending on the database's name
Db_Change_SQL_File("BDD", path, "root","Iutphoto123@")  # the password needs to be changed depending the current password on the raspi
