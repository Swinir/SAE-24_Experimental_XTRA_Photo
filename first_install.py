import check_root
import pip_setup
import apt_setup


#------------------------------------------------------------------------------------------
#Cette section effectue toutes les verifications nécessaires au bon fonctionnement du programme

check_root.user_check()
pip_setup.check_installed()
pip_setup.install("mysql-connector-python")
pip_setup.install("configparser")
apt_setup.check_installed("fswebcam")
apt_setup.check_installed("python-crontab")

