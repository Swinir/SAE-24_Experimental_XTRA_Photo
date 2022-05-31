#!/bin/bash

FILE=./installed
if [ -f "$FILE" ]
then
  echo "Starting program ...."
  python3 ./main.py
else
  echo "It seems this is the first time this program is launched, do you want to install all the dependencies and setup the website automatically ? (yes or no)"
  read choice
  if [ $choice != 'yes' ]
  then
    exit 45
  fi
  echo "First Start ! This will take a little bit longer"

  #Intallation of python

  touch ./LOGS.json
  touch ./LOGS.txt
  sudo chmod 777 ./LOGS.json
  sudo chmod 777 ./LOGS.txt

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

 #getting an update for next installs

  sudo apt-get update

  #installation of crontab

  sudo apt-get install cron

  #Installation of mariadb

  sudo apt-get install mariadb-server -y
  sudo mysqldump --password=Iutphoto123@ --all-databases > BDD-Backup-first_install.sql
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

  #Installation of Apache

  sudo apt install apache2 -y
  sudo cp ./html /var/www/ -r
  sudo rm /var/www/html/index.html
  sudo chown www-data:www-data /var/www/html

  #Installation of php

  sudo apt install php -y
  sudo apt install php-mysql -y
  sudo service apache2 restart


  sudo ln -s pwd/images /var/www/html/

  ##############

  pwd > installed_path.txt

  pwd > /var/www/html/installed_path.txt #adds the path of the python script to the php folder

  touch ./PHOTOS.json
  touch ./installed
fi

