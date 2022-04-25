import mysql.connector
import sql_bridge

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

sql_bridge.Db_Connection_Start()
sql_bridge.Db_Change_SQL_File("test","/Users/jean-baptistebruneau/Downloads/mael_1","root","Iutphoto123@")