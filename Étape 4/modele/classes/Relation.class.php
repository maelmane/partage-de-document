<!--
    Auteur: Lesly Gourdet
    Date de créaton: 8/11/2022
    Dernière modifcation: 17/12/2022
    Modifié par: Lesly Gourdet
-->
<?php
    class Relation {
        // Attributs
        private $id_relation = 0;
        private $sender = "";
        private $receiver = "";
        private $statut = "";

        public function getId_relation() {
            return $this->id_relation;
        }
    
        public function getSender() {
            return $this->sender;
        }

        public function getReceiver() {
            return $this->receiver;
        }

        public function getStatut() {
            return $this->statut;
        }

        public function setId_relation() {
            return $this->id_relation;
        }

        public function setSender() {
            return $this->sender;
        }

        public function setReceiver() {
            return $this->receiver;
        }

        public function setStatut() {
            return $this->statut;
        }

    }
    
?>