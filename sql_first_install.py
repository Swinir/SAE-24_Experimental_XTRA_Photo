import mysql.connector
import os
import sql_bridge

def Db_Initialise(new_password):
  Database = mysql.connector.connect(
    host="localhost",
    user="root",
    password="Iutphoto123@"
  )
  Db_Cursor = Database.cursor()
  sql = "ALTER USER 'root'@'localhost' IDENTIFIED BY '"+new_password+"';"
  Db_Cursor.execute(sql)
  Database.commit()


Db_Initialise("Iutphoto123@") #password needs to be changed via a static method or using a dynamic method

sql_bridge.Db_Connection_Start()

pwd = os.getcwd()
path = str(pwd+"/BDD.sql") #name needs to be changed depending on the database's name
sql_bridge.Db_Change_SQL_File("test",path,"root","Iutphoto123@") #the password needs to be changed depending the current password on the raspi