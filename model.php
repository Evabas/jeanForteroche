<?php
function getChapters()
{
	$db = dbConnect();

	$req = $db->query('SELECT id, titre, contenu FROM chapitres ORDER BY id DESC');

	return $req;
}

function getChapter($chapterId) // Récupération du chapitre en fonction de l'id
{
        $db = dbConnect();
        
        $req= $db->prepare('SELECT id, titre, contenu FROM chapitres WHERE id = ?');
        $req->execute(array($chapterId));   
        $chapter = $req->fetch();
        return $chapter;
        
}

function getComments($chapterId) // Recupération des commentaires
{
        $db = dbConnect();

  
                $comments = $db->prepare('SELECT pseudo, commentaire FROM commentaires WHERE id_chapitre = ?');
                $comments->execute(array($chapterId));
       
        return $comments;
  
}

// function insertComments() // Insertion des commentaires
// {
//         $db = dbConnect();

//         if(isset($_GET['chapitre']) && isset($_POST['pseudo']) && isset($_POST['commentaire'])) {
                
//                 $chapitre = $_GET['chapitre'];    
//                 $insComments = $db->prepare('INSERT INTO commentaires (id_chapitre, pseudo, commentaire) VALUES(:id_chapitre, :pseudo, :commentaire)');
//                 $insComments->execute(array(
//                         'id_chapitre' => $chapitre, 
//                         'pseudo' => $_POST['pseudo'],
//                         'commentaire' => $_POST['commentaire']
//                 ));
//         return $insComments;
//         header('Location: chapitres.php');
//         }
// }

function dbConnect() // factorisation de la connexion à la base de données
{
        try
        {
                $db = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '');
                return $db;
        }
        catch(Exception $e)
        {
                die('Erreur : '.$e->getMessage());
        }    
}

