<?php
// Connexion à la base de données
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

// Insertion des chapitres dans la bdd
$req = $bdd->prepare('INSERT INTO chapitres (titre, contenu) VALUES(?, ?)');
$req->execute(array($_POST['titre'], $_POST['contenu']));

header('Location:projet4serveur/chapitres.php');

?>