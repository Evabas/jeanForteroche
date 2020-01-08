<?php
$bdd = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '');
if (isset($_POST['form_inscription']))
{
        $pseudo = htmlspecialchars($_POST['pseudo']);
		$pwd = htmlspecialchars($_POST['pwd']);
		$pwd2 = htmlspecialchars($_POST['pwd2']);
        $mail = htmlspecialchars($_POST['mail']);
        
    if (!empty($_POST['pseudo']) AND !empty($_POST['pwd']) AND !empty($_POST['pwd2']) AND !empty($_POST['mail'])) 
    { 
        $reqpseudo = $bdd->prepare('SELECT * FROM membres WHERE pseudo = ?');
        $reqpseudo->execute(array($pseudo));
        $pseudoexist = $reqpseudo-> rowCount();
        if($pseudoexist == 0)
        {
    
            if ($pwd == $pwd2)
            {
                $pass_hache = password_hash($pwd, PASSWORD_DEFAULT); 
                $req = $bdd->prepare('INSERT INTO membres(pseudo, pass, email) VALUES(:pseudo, :pass, :email)');
                $req->execute(array(
                'pseudo' => $pseudo,
                'pass' => $pass_hache,
                'email' => $mail));      
                $message = "Votre compte a été crée. <a href=\"espaceMembres.php\">Me connecter</a>";
                $req = $bdd->prepare('INSERT INTO groupes(pseudo) VALUES(:pseudo)');
                $req->execute(array(
                'pseudo' => $pseudo));
            }
            else
            {
                $erreur = "Les mots de passe sont différents. Retapez votre mot de passe.";
            }
        }
        else
        {
            $erreur = "Ce pseudonyme est déjà utilisé.";
        }   
    }    
    else
    {
		$erreur = "Tous les champs doivent être complétés!";
    } 
    
} 
   // dans ce cas, tout est ok, on peut démarrer notre session
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

    <title>Formulaire d'inscription</title>
</head>

<body>

    <header>

        <?php include("menu.php"); ?>

    </header>

    <section class="marge">
    Membre connecté(e) :  
    <?php if(isset($_SESSION['pseudo'])){echo $_SESSION['pseudo'];}?> <br>
    <?php echo '<a href="./logout.php">Déconnection</a>';?><br>

      <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">    
    <h2>Inscription</h2>
    <form id="memberForm" action="" method="post">

      <label for="pseudo">Pseudonyme</label><br>
      <input type="text" name="pseudo" id="pseudo"><br>
      <label for="mdp">Mot de passe</label><br> 
      <input type="password" name="pwd" id="mdp"><br>
      <label for="mdp2">Confirmez votre mot de passe</label><br> 
      <input type="password" name="pwd2" id="mdp2"><br>
      <label for="mail">E-mail</label><br> 
      <input type="email" name="mail" id="mail"><br><br>
      <button type="submit" name="form_inscription" class="btn btn-primary mb-2">Inscription</button>
    
    </form> <br>
      
<?php
    if(isset($erreur))
    {
        echo '<p id="mistake">' . $erreur . '</p>';
    }
    if(isset($message))
    {
        echo '<p>' . $message . '</p>';
    }
?>
       </div>
        </div>
        </div>
    </section>

    <footer id="pied_de_page">

    </footer>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>