import check_root
import pip_setup
import apt_setup
import subprocess


#------------------------------------------------------------------------------------------
#Cette section effectue toutes les verifications nécessaires au bon fonctionnement du programme


check_root.user_check()
pip_setup.check_installed()
pip_setup.install("RSA")
apt_setup.check_installed("fswebcam")


#------------------------------------------------------------------------------------------


#Test section


resolution = '1280x720'
save_location = '/images/test1.png'

#subprocess.check_call(['fswebcam', '-r', resolution, '--no-banner', save_location])