<!--
    Auteur: Lesly Gourdet
    Date de créaton: 8/11/2022
    Dernière modifcation: 17/12/2022
    Modifié par: Lesly Gourdet
-->
<?php
    class File {
        // Attributs
        private $titre = "";
        private $auteur = "";
        private $date = "";
        private $nbLike = "";
        private $statut = "";
    
        public function getTitre() {
            return $this->titre;
        }

        public function getAuteur() {
            return $this->auteur;
        }

        public function getDate() {
            return $this->date;
        }

        public function getNbLike() {
            return $this->nbLike;
        }

        public function getStatut() {
            return $this->statut;
        }

        public function setTitre($value){
            $this->titre = $value;
        }

        public function setAuteur($value) {
            $this->auteur = $value;
        }

        public function setDate($value){
            $this->date = $value;
        }

        public function setNbLike($value) {
            $this->nbLike = $value;
        }

        public function setStatut($value) {
            $this->statut = $value;
        }

    }
    
?>