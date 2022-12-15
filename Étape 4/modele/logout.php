<!--
    Auteur: Mael Mane
    Date de créaton: 14/12/2022
    Dernière modifcation: 14/12/2022
    Modifié par: Mael Mane
-->
<?php
    session_start();
    session_destroy();
    header('Location: ../vue/vueDocpub.php');
    exit;
?>