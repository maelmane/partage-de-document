'''
 Nom du programme: 
 De: Mael Mane
 Date de création: 
 Description:
'''

############### Importations et fonctions ##############
def comparer(f_valeur, f_nombre10):
    if f_valeur == 10:
        f_nombre10 = f_nombre10 + 1
    return f_nombre10
############### Déclaration des variables ##############
valeur = 0
nombre10 = 0
######################### Code #########################
valeur = int(input("Nombre: "))
while valeur != 99:
    nombre10 = comparer(valeur, nombre10)
    valeur = int(input("Nombre: "))
print(nombre10)
