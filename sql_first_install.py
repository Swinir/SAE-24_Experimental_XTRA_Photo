import mysql.connector

def Db_Initialise():
  Database = mysql.connector.connect(
    host="localhost",
    user="root",
    password="iutphoto"
  )
  Db_Cursor = Database.cursor()
  new_password = "test"
  sql = "ALTER USER 'root'@'localhost' IDENTIFIED BY '"+new_password+"';"
  Db_Cursor.execute(sql)
  Database.commit()

Db_Initialise()