'''
 Nom du programme: 
 De: Mael Mane
 Date de création: 
 Description:
'''

############### Importations et fonctions ##############
def lire_tableau():
    ftableau = [0] * 2
    ftableau[0] = 10
    ftableau[1] = 20
    return ftableau

def ecrire_tableau(ftableau):
    print(ftableau)
############### Déclaration des variables ##############
tableau = [0] * 2
######################### Code #########################
tableau = lire_tableau()
ecrire_tableau(tableau)