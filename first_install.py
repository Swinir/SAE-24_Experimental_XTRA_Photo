import check_root
import pip_setup
import apt_setup


#------------------------------------------------------------------------------------------
#Cette section effectue toutes les verifications nécessaires au bon fonctionnement du programme

check_root.user_check()
pip_setup.check_installed()
pip_setup.install("json")
pip_setup.install("time")
apt_setup.check_installed("fswebcam")

