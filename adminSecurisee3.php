<?php
session_start ();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="jf.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

    <title>Administration</title>
 
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>tinymce.init({ selector:'#mytextarea' });</script>
</head>
<body>
    <header>

        <?php include("menu.php"); ?>

    </header>

    <section class="marge">
    Membre connecté(e) :  
    <?php  if (isset($_SESSION['pseudo'])){echo $_SESSION['pseudo'];}?> <br>
    <?php echo '<a href="./logout.php">Déconnection</a>';?><br>

    <h1>Espace administration</h1>
    <?php
if(isset($_POST['pseudo'])&&isset($_POST['pwd'])){
    try
    {
        $bdd = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '');
    }
    catch(Exception $e)
    {
            die('Erreur : '.$e->getMessage());
    }
    //  Récupération de l'utilisateur et de son pass hashé
    $pseudo = htmlspecialchars($_POST['pseudo']);
    $pwd = htmlspecialchars($_POST['pwd']);
    $pass_hache = password_hash($pwd, PASSWORD_DEFAULT); 

    $req = $bdd->prepare('SELECT pseudo, pass, id_groupe, groupes.type, groupes.id FROM membres, groupes WHERE (pseudo=:pseudo AND groupes.type=:groupesAdmin AND id_groupe=groupes.id)');
    $req->execute(array(
        'pseudo' => $pseudo,
        'groupesAdmin' => 'admin'
    ));
    $resultat = $req->fetch();
if (!$resultat)
{
    echo 'Vous n\'êtes pas administrateur ou vous n\'existez pas!';
    echo  'resultat=' . $resultat;
    //header('Location: espaceMembres.php');
}
else
{
    // Comparaison du pass envoyé via le formulaire avec la base
    $isPasswordCorrect = password_verify($_POST['pwd'], $resultat['pass']);

        if (!$resultat)
        {
            echo 'Mauvais identifiant ou mot de passe !';
            // header('Location: espaceMembres.php');
        }
        else
        {      
                $_SESSION['pseudo'] = $pseudo;
              
        }
    $req->closeCursor();
}
}
?>
            <form name="form_text" action="adminSecurisee_post" method="post">
                <label for="titre">Titre :</label>
                <input type="text" name="titre" id="titre" /><br><br>
                <textarea id="mytextarea" name="contenu"></textarea>
                <button type="submit" class="btn btn-primary mb-2">Soumettre</button>
            </form>     
	
    </section>

    <footer id="pied_de_page">
    </footer>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>
