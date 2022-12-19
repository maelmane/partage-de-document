<!--
    Auteur: Lesly Gourdet
    Date de créaton: 8/11/2022
    Dernière modifcation: 17/12/2022
    Modifié par: Lesly Gourdet
-->
<?php 
    class Files {
        // Attributs
        private $id = 0;
        private $titre = "";
        private $auteur = "";
        private $date;
        private $nbLike = 0;
        private $statut = "";
    
        public function getId() {
            return $this->id;
        }

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

        public function setId($value){
            $this->id = $value;
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