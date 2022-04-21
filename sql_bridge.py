import mysql.connector

def Db_Connection_Start():
  global Database
  Database = mysql.connector.connect(
    host="localhost",
    user="yourusername",
    password="yourpassword"
  )

  #print(Database)
  global Db_Cursor
  Db_Cursor = Database.cursor()

def Db_Insert(str_to_insert,table,fields,types):
  sql = str("INSERT INTO "+table+" ("+fields+") VALUES ("+types+")")
  val = str_to_insert
  Db_Cursor.executemany(sql, val)
  Database.commit()

