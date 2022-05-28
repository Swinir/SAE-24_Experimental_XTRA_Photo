from crontab import CronTab
import sys
import logs_handler

f = open('installed_path.txt', 'r')
path = f.read()
f.close()

cron = CronTab(tabfile='/etc/crontab', user=False)
command = 'python3 ' + str(path) + 'photo_taker.py'

def cron_en():
    job = cron.new(command=command)
    job.day.every(1)
    cron.write()


def cron_dis():
    cron.remove_all(command)
    cron.write()


if sys.argv[0] == "activate":
    try:
        cron_en()
    except:
        logs_handler.entry_create("warning",
                                "Impossible to activate the automatic picture taking script",
                                "yes")
elif sys.argv[0] == "disable":
    try:
        cron_dis()
    except:
        logs_handler.entry_create("warning",
                                "Impossible to deactivate the automatic picture taking script",
                                "yes")