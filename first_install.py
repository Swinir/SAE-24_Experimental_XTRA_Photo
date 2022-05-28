import check_root
import pip_setup
import apt_setup
import save_data
import logs_handler
import atexit


def exit_handler():
    print ('App is exiting')
    save_data.save_class(logs_handler.LOGS_container, "LOGS.json", "LOGS")

atexit.register(exit_handler)

#------------------------------------------------------------------------------------------
#Cette section effectue toutes les verifications nécessaires au bon fonctionnement du programme

logs_handler.entry_create("critical",
                          "First Start ! If you were already using this app, the SQL database has been backed up to the file BDD-Backup-first_install.sql",
                          "no")

check_root.user_check()
pip_setup.check_installed()
pip_setup.install("mysql-connector-python")
pip_setup.install("python-crontab")
apt_setup.check_installed("fswebcam")

