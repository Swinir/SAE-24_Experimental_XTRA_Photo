from PIL import Image
import logs_handler

def most_used_color(img):
    # hauteur et largeur de l'image

    width, height = img.size

    # initialisation des couleur
    r_total = 0
    g_total = 0
    b_total = 0

    #compteur total
    count = 0

    for x in range(0,width):
        for y in range(0,height):
            r, g, b = img.getpixel((x,y))

            r_total += r
            g_total += g
            b_total += b
            count += 1

    return (r_total/count, g_total/count, b_total/count)

def detect_lumi(path):
    img = Image.open(path , 'r')
    img = img.convert('RGB')

    common_color = most_used_color(img)
    # common_color =(R, G, B)

    if common_color < (96, 96, 96):
        logs_handler.entry_create("notice",
                                "Photo taken in dark environment, taking photo with a flash",
                                "yes")
        return True
