try:
    import mysql.connector
except:
    print("Impossible to import mysql.connector (disregard this message if you are running this script for the first time)")
import logs_handler

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
        print("Impossible de se connecter à la base de donnée")
        logs_handler.entry_create("critical",
                                "Impossible to connect to the MariaDB database",
                                "no")


    global Db_Cursor
    Db_Cursor = Database.cursor()


def Db_Insert(table, fields, values):
    sql = str("INSERT INTO " + table + " (" + fields + ") VALUES (" + values + ");")
    try:
        Db_Cursor.execute(sql)
        Database.commit()
    except:
        logs_handler.entry_create("critical",
                                "Impossible to insert data into database",
                                "no")


def Db_Select(table, fields, conditions):
    if conditions != "":
        sql = str("SELECT " + fields + " FROM " + table + " WHERE " + conditions)
    else:
        sql = str("SELECT " + fields + " FROM " + table)
    try:
        Db_Cursor.execute(sql)
        result = Db_Cursor.fetchall()
        return result
    except:
        logs_handler.entry_create("warning",
                                "Impossible to select data from the database",
                                "no")
