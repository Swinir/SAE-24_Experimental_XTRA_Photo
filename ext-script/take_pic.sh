#!/bin/bash


FILE=./installed
if [ -f "$FILE" ]
then
  echo "Starting program ...."
  python3 ./ext_connect.py
else
  echo "It seems this is the first time this program is launched, do you want to install all the dependencies ? (yes or no)"
  read choice
  if [ $choice != 'yes' ]
  then
    exit 45
  fi
  if [ `id -u` != 0 ] ; then
        echo "Please execute this script as Super User"
        exit 45
  fi
  echo "First Start ! This will take a little bit longer"
  sudo chmod u+x ./first_install.py
  sudo chmod u+x ./ext_connect.py
  python3 ./first_install.py
  touch ./installed
fi