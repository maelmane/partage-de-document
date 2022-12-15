<!--
    Auteur: Lesly Gourdet
    Date de créaton: 8/11/2022
    Dernière modifcation: 14/12/2022
    Modifié par: Mael Mane
-->
<?php
    class Document {
        // Attributs
        private $titre = "";
        private $auteur = "";
    
        public function getTitre() {
            return $this->titre;
        }

        public function getAuteur() {
            return $this->auteur;
        }

        public function setTitre($value){
            $this->titre = $value;
        }
    }
    
?>