<!--
    Auteur: Lesly Gourdet
    Date de créaton: 8/11/2022
    Dernière modifcation: 8/11/2022
    Modifié par: Lesly Gourdet
-->
<?php

class Document {
	// Attributs
	private $nom_doc = "";
	private $nom_user = "";
	private $url_doc = "uploads/";

	// Constructeur
	public function __construct($doc,$user,$url){
		$this->nom_doc=$doc;
		$this->nom_user=$user;
		$this->url_doc=$url;
	}
	
	// Accesseurs et mutateurs
	public function getNomDoc() {return $this->nom_doc;}
	public function getNomUser() {return $this->nom_user;}
	public function getUrlDoc() {return $this->url_doc;}
	public function setNomDoc($valeur) {$this->nom_doc=$valeur;}
	public function setUrlDoc($valeur) {$this->url_doc=$valeur;}


	// Affichage
	public function __toString(){
		$message="Fichier ".$this->nom_doc." de ".$this->nom_user." @".$this->url_doc;
		return $message;
	}
}
?>