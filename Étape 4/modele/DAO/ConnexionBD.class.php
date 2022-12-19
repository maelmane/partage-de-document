<!--
    Auteur: Mael Mane
    Date de créaton: 16/11/2022
    Dernière modifcation: 15/12/2022
	Modifié par : Lesly Gourdet
-->

<?php
	require_once('config/ConfigBD.interface.php');

	class ConnexionBD
	{	
		private static $connexion = null;
		
		private function __construct(){}
		
		public static function getConnexion(){
			if(self::$connexion == null){
				self::$connexion = new PDO(
					"mysql:host=".ConfigBD::DB_HOST.";dbname=".ConfigBD::DB_NAME, 
					ConfigBD::DB_USER, 
					ConfigBD::DB_PWD);
		
				self::$connexion->exec("SET character_set_results = 'utf8'"); // Execution de la connection
			}
			return self::$connexion;
		}
		public static function close(){
			self::$connexion = null;
		}	
	}
?>