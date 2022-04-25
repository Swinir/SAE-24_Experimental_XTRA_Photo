import mysql.connector
import subprocess

def Db_Connection_Start():
  global Database
  Database = mysql.connector.connect(
    host="localhost",
    user="root",
    password="Iutphoto123@"
  )

  #print(Database)
  global Db_Cursor
  Db_Cursor = Database.cursor()

def Db_Change_SQL_File(db_name,path,user,passwd):
  sql = str("mysql -u "+user+" --password="+passwd+" "+db_name+" < "+path+".sql")
  subprocess.call(sql, shell=True)

def Db_Insert(str_to_insert,table,fields,types):
  sql = str("INSERT INTO "+table+" ("+fields+") VALUES ("+types+")")
  val = str_to_insert
  Db_Cursor.executemany(sql, val)
  Database.commit()
