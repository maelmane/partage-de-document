<!--
    Auteur: Lesly Gourdet
    Date de créaton: 10/11/2022
    Dernière modifcation: 10/11/2022
    Modifié par: Lesly Gourdet
-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ajouter un Document</title>
</head>
<body>
    <form action="#file" method='post' enctype="multipart/form-data">
        Ajouter un document:
        <input type="file" name="file"/><br><br>
        <input type="submit" name="submit" value="Ajouter"/>
    </form>

    <?php
    $name= $_FILES['file']['name'];
    $tmp_name= $_FILES['file']['tmp_name'];
    $submitbutton= $_POST['submit'];
    $position= strpos($name, "."); 
    $fileextension= substr($name, $position + 1)
    $fileextension= strtolower($fileextension);

    if (isset($name)) {
        $path= 'uploads/';
        if (!empty($name)){
            if (move_uploaded_file($tmp_name, $path.$name)) {
                echo 'Uploaded!';
            }
        }
    }
    ?>

    <?php
    try {
        $cnx = new PDO('mysql:host=localhost;dbname:document',"root","root");
        $resultats = $cnx->query("SELECT * FROM document");
    
        foreach($resultats as $doc) {
            echo ("Nom Document : " .$doc["nom_doc"])
            echo ("Nom User : " .$doc["nom_user"])
        } catch (PDOException $e) {
            echo "Erreur : ".$e->getMessage(). "<br />";
        } finally {
        $cnx = null;
        }
    }
    ?>
    
    <?php
    /*
    mysql_connect($host,$user,$password); 
    @mysql_select_db($dbase) or die("Unable to select database");

    $result= mysql_query( "SELECT description, filename FROM $table ORDER BY ID desc" ) 
    or die("SELECT Error: ".mysql_error()); 

    print "<table border=1>\n"; 
    while ($row = mysql_fetch_array($result)) { 
        $files_field= $row['nom_doc'];
        $files_show= "uploads/$files_field";
        $descriptionvalue= $row['description'];
        print "<tr>\n"; 
        print "\t<td>\n"; 
        echo "<font face=arial size=4/>$descriptionvalue</font>";
        print "</td>\n";
        print "\t<td>\n"; 
        echo "<div align=center><a href='$files_show'>$files_field</a></div>";
        print "</td>\n";
        print "</tr>\n"; 
    } 
    print "</table>\n"; 
    */
    ?> 

</body>
</html>
