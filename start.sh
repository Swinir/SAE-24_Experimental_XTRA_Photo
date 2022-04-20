FILE=./installed
if [ -f "$FILE" ]
then
  echo "Starting program ...."
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

  touch ./PHOTOS.json
  touch ./installed
  python3 ./first_install.py
  python3 ./main.py
fi

