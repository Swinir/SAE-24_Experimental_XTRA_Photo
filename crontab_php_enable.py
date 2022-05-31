from crontab import CronTab
import sys
import logs_handler

f = open('installed_path.txt', 'r')
path = f.read()
f.close()
if path[-1:] == '\n':
    path = path[:-1]

mycron = CronTab(user='pi')

def cron_en():
    mycron.env['main'] = str(path)+'main.py'
    job = mycron.new(command='python3 main', comment='AUTOMATIC PIC TAKER')
    job.minute.on(0)
    job.hour.on(12)
    mycron.write()


def cron_dis():
    mycron.remove_all(comment='AUTOMATIC PIC TAKER')
    mycron.write()




if sys.argv[1] == 'activate':
    try:
        cron_en()
    except:
        logs_handler.entry_create("warning",
                                "Failure to activate the automatic picture taking script",
                                "yes")
elif sys.argv[1] == 'disable':
    try:
        cron_dis()
    except:
        logs_handler.entry_create("warning",
                                "Failure to deactivate the automatic picture taking script",
                                "yes")
