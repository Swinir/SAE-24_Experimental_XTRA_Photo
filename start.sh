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
    apt update
    apt install python3
  fi

  python3 ./first_install.py

  sudo debconf-set-selections <<< "mysql-community-server mysql-community-server/root-pass password iutphoto"
  sudo debconf-set-selections <<< "mysql-community-server mysql-community-server/re-root-pass password iutphoto"
  sudo apt-get update
  sudo DEBIAN_FRONTEND=noninteractive apt-get -y install mariadb-server

  touch ./PHOTOS.json
  if [ $? -eq 1 ]
  then
    kill $$
  fi
  touch ./installed
  python3 ./main.py
fi

