'''
 Nom du programme: Exercie 3
 De: Mael Mane
 Date de création: 
 Description:
'''

############### Importations et fonctions ##############

############### Déclaration des variables ##############
Etudiant = ""                   #string
NomEtudiantPlusHauteNote = ""   #string
NombreClasses = 0               # int
NombreEtudiantLire = 0          # int
NombreEtudiantLu = 0            # int
NoteFinale = 0                  # float
PlusHauteNote = 0               # float
NomEtudiant = " "                # String
######################### Code #########################
while NombreClasses < 12:
   NombreEtudiantLire = int(input("Nombre d'étudiant à lire : "))
   while NombreEtudiantLu < NombreEtudiantLire:
      NomEtudiant = input("Quel est le nom de l'étudiant: ")
      NoteFinale = int(input("Quelle est la note finale: "))
      if NoteFinale > PlusHauteNote:
         PlusHauteNote = NoteFinale
         NomEtudiantPlusHauteNote = NomEtudiant
      NombreEtudiantLu = NombreEtudiantLu + 1
       
   print(PlusHauteNote, NomEtudiantPlusHauteNote)
   NombreEtudiantLu = 0
   PlusHauteNote = 0
   NombreClasses = NombreClasses + 1
   
