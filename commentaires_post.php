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

if(isset($_GET['chapitre']) && isset($_POST['pseudo']) && isset($_POST['commentaire'])) {
$chapitre = $_GET['chapitre'];    
$req = $bdd->prepare('INSERT INTO commentaires (id_chapitre, pseudo, commentaire) VALUES(:id_chapitre, :pseudo, :commentaire)');
$req->execute(array(
        'id_chapitre' => $chapitre, 
        'pseudo' => $_POST['pseudo'],
        'commentaire' => $_POST['commentaire']
));

header('Location: chapitres.php');
}
?>