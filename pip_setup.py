import subprocess

def install(name):
    subprocess.call(['pip3', 'install', name])