'''
 Nom du programme: 
 De: Mael Mane
 Date de création: 
 Description:
'''

############### Importations et fonctions ##############
def ecrire_lignes1() : 
    ligne = "****************"
    print(ligne)
def ecrire_lignes2(f_compteur_ligne:int):
    ligne = "*              *"
    nb = 0
    while nb != compteur_ligne:
        print(ligne)
        nb = nb+1
          
############### Déclaration des variables ##############
compteur_ligne = 0
######################### Code #########################
compteur_ligne = int(input("Nombre de lignes: "))
ecrire_lignes1()
ecrire_lignes2(compteur_ligne)
ecrire_lignes1()
ecrire_lignes2(compteur_ligne)
ecrire_lignes1()
