<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="jf.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

    <title>Chapitres</title>
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
        <h2>Chapitre 1</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus a ullamcorper sem, et dapibus libero. Donec accumsan urna quis tempus varius. Duis molestie ante a aliquet tempus. Pellentesque et maximus turpis. Fusce ultricies lacus ut magna vestibulum maximus non a lectus. Nam tortor est, dapibus ut odio sit amet, fermentum sodales lectus. Etiam in augue tellus. Vestibulum consectetur imperdiet massa et aliquet. Etiam ultrices leo ipsum, eget placerat ante egestas a. Vivamus nec efficitur justo, nec accumsan sapien. Maecenas eu nulla ut nunc pharetra sodales. Suspendisse eleifend sapien tellus, a sodales justo finibus sit amet. Nam at dignissim nisi. Sed varius, tellus vel volutpat tincidunt, ex risus iaculis urna, vitae viverra eros felis ac lorem. </p>
        
        <h2>Chapitre 2</h2>
        <p>Nunc tortor diam, sagittis vitae mattis vitae, varius sit amet ex. Nulla ut sagittis diam, ac pretium neque. Donec felis odio, tincidunt ut elit eget, dapibus fringilla diam. Phasellus at neque libero. Sed at sem ac felis sollicitudin facilisis sed eu sapien. Vestibulum bibendum nec massa vel sagittis. Fusce sagittis vel metus at commodo. Cras sollicitudin eros leo, eu porta nulla euismod nec. Donec congue vehicula risus eget malesuada. Morbi id urna sed ex bibendum hendrerit at at felis. Aenean luctus a lacus vel ullamcorper. Nunc sed volutpat quam. Nam neque mi, molestie et ex sed, fringilla posuere libero. Nullam at vulputate ante, lobortis vestibulum nunc. </p>
      
        <h2>Chapitre 3</h2>
        <p>Nunc gravida lacus sit amet ante dapibus lobortis. Aenean ipsum dui, iaculis eu odio vitae, gravida congue tellus. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Quisque semper posuere lorem, vel commodo risus rutrum sed. Fusce vulputate cursus purus et ultricies. Quisque mi augue, imperdiet sed lacus tincidunt, feugiat sagittis libero. Aliquam convallis mattis feugiat. Vestibulum scelerisque, urna tincidunt accumsan consequat, urna mauris euismod purus, quis iaculis ipsum ipsum suscipit dolor. Curabitur eget luctus diam. Sed feugiat augue in rutrum aliquet. Etiam ut nibh interdum odio faucibus ultrices. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Morbi facilisis convallis ligula eget elementum. </p>
     
        <p>
        <?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

$req = $bdd->query('SELECT titre, contenu FROM chapitres ORDER BY ID DESC LIMIT 0,3');

while ($donnees = $req->fetch())
{
	echo '<p><strong>' . ($donnees['titre']) . '</strong> ' . '<br>' . ($donnees['contenu']) . '</p>';
}


$req->closeCursor();

?>
</p>
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