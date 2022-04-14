which python3
if [ $? -eq 0 ]
then
        echo "Python3 is installed"
else
        apt update
        apt install python3
fi
python3 ./main.py