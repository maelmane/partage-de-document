<!--
    Auteur: Lesly Gourdet
    Date de créaton: 15/12/2022
    Dernière modifcation: 15/12/2022
    Modifié par: Lesly Gourdet
-->
<?php
    class User {
        // Attributs
        private $username = "";
        private $password = "";
    
        public function getUsername() {
            return $this->username;
        }

        public function getPassword() {
            return $this->password;
        }

        public function setUsername($value){
            $this->username = $value;
        }

        public function setPassword($value) {
            $this->password = $value;
        }

    }
    
?>