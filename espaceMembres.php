<?php
session_start (); 
    try
        {
            $bdd = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '');
        }
        catch(Exception $e)
        {
                die('Erreur : '.$e->getMessage());
        }
    if (isset($_POST['pseudoconnect']) && isset($_POST['pwdconnect']))
    {
        $pseudoconnect = htmlspecialchars($_POST['pseudoconnect']);
        $pwdconnect = htmlspecialchars($_POST['pwdconnect']);
        $pass_hache = password_hash($pwdconnect, PASSWORD_DEFAULT);
      
        if(!empty($pseudoconnect) && !empty($pwdconnect))
        {
            $requser = $bdd->prepare("SELECT * FROM membres, groupes WHERE pseudo = :pseudo AND id_groupe=groupes.id ");
            $requser->execute(array(
            'pseudo' => $pseudoconnect));
            $resultat = $requser->fetch();

            // $requser = $bdd->prepare("SELECT pseudo, pass, id_groupe, groupes.role, groupes.id FROM membres, groupes 
            // WHERE (pseudo=:pseudo AND groupes.role=:admin AND id_groupe=groupes.id)");
            // $requser->execute(array($pseudoconnect,$role,$id));
            // $resultat = $requser->fetch();
            // echo $resultat;

            // $requser = $bdd->prepare("SELECT membres.pseudo,groupes.role 
            // FROM membres M 
            // INNER jOIN groupes G 
            // ON M.id_groupe = G.id
            // WHERE groupes.role IS admin");
            // $requser->execute(array( $pseudoconnect ));
            // $resultat = $requser->fetch();
            // echo '<pre>';
            // print_r($resultat);
            // echo '</pre>';

            

            // Comparaison du pass envoyé via le formulaire avec la base
            $isPasswordCorrect = password_verify($pwdconnect, $resultat['pass']);
            
            if ($resultat && $isPasswordCorrect)
            { 
                $_SESSION['pseudo'] = $resultat['pseudo'];
                $_SESSION['role'] = $resultat['role'];

                if ($_SESSION['role'] == "admin")
                {
                     header("location: adminSecurisee3.php");
                }
                else 
                {
                    header("location: chapitres.php");
                }
                 
            }
            else
            {      
                $erreur = "Identifiants incorrects!";
                   
            }
        }
        else
        {
            $erreur = "Tous les champs doivent être complétés!";
        } 
    }
  
    ?>  

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="jf.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

    <title>Formulaire d'identification</title>
</head>

<body>

    <header>
    <?php include("menu.php"); ?>
    </header>

    <section class="marge">
    Membre connecté(e) :  
    <?php  if (isset($_SESSION['pseudo'])){echo $_SESSION['pseudo'];}?> <br>
    <?php echo '<a href="./logout.php">Déconnection</a>';?><br>
    
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3"> 
            <h2>Accès membre</h2>
    <form action="" method="post">        
      <label>Pseudonyme</label><br>
      <input type="text" name="pseudoconnect"><br>
      <label>Mot de passe</label><br /> 
      <input type="password" name="pwdconnect"><br><br>
      <button type="submit" name="formconnect" class="btn btn-primary mb-2">Connexion</button>
    </form><br>
    <p>Nouveau Membre <a href="first_connection.php">Inscrivez-vous</a></p>
    <?php
if(isset($erreur))
{
     echo '<p>' . $erreur . '</p>';
}    
if (isset($message))
{
    echo $message;
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