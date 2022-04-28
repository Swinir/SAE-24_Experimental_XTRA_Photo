import mysql.connector
import subprocess


def Db_Connection_Start():
    global Database
    try:
        Database = mysql.connector.connect(
            host="localhost",
            user="root",
            password="Iutphoto123@"
        )
    except:
        print("Impossible de se connecter à la base de donnée")
    # Rajouter la fonciton pour ajouter un message dans les logs


    global Db_Cursor
    Db_Cursor = Database.cursor()

def Db_Change_SQL_File(db_name, path, user, passwd):
    sql = str("mysql -u " + user + " --password=" + passwd + " " + db_name + " < " + path + ".sql")
    subprocess.call(sql, shell=True)


def Db_Insert(str_to_insert, table, fields, types):
    sql = str("INSERT INTO " + table + " (" + fields + ") VALUES (" + types + ")")
    val = str_to_insert
    Db_Cursor.executemany(sql, val)
    Database.commit()


def Db_Select(table, fields, conditions):
    if conditions:
        sql = str("SELECT " + fields + " FROM " + table + " WHERE " + conditions)
    else:
        sql = str("SELECT " + fields + " FROM " + table)
    Db_Cursor.execute(sql)
    result = Db_Cursor.fetchall()
    return result
