#!/bin/bash

FILE=./installed
if [ -f "$FILE" ]
then
  echo "Starting program ...."
  python3 ./main.py
else
  echo "First Start ! This will take a little bit longer"

  which python3
  if [ $? -eq 0 ]
  then
    echo "Python3 is installed"
  else
    apt-get update -y
    apt-get install python3 -y
    apt-get install python3-distutils -y
  fi

  python3 ./first_install.py
  if [ $? -eq 1 ]
  then
    kill $$
  fi

  sudo apt-get update
  sudo apt-get install mariadb-server -y
  sudo mysql_install_db
  sudo systemctl enable mariadb
  sudo systemctl stop mysql
  rm -rf /var/lib/mysql/*
  sudo mysql_install_db
  sudo systemctl start mariadb

  #Automated first configuration of MariaDB

  sudo mysql -e "SET PASSWORD FOR 'root'@'localhost' = PASSWORD('Iutphoto123@');"
  sudo mysql -e "DROP USER ''@'localhost'"
  sudo mysql -e "DROP USER ''@'$(hostname)'"
  sudo mysql -e "DROP DATABASE test"
  sudo mysql -e "FLUSH PRIVILEGES"

  sudo mysql -e "DROP DATABASE IF EXISTS BDD;"
  sudo mysql -e "CREATE DATABASE BDD;"

  #########################################

  python3 sql_first_install.py

  touch ./PHOTOS.json
  touch ./installed
  python3 ./main.py
fi

