<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="public/jf.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

    <title>Chapitres</title>
</head>
        
<body>
<header>
    
<?php include("menu.php");?> 
    
</header>

<section class="marge">
Membre connecté(e) :  
<?php  if (isset($_SESSION['pseudo'])){echo $_SESSION['pseudo'];}?> <br>
    <?php if (isset($_SESSION['pseudo'])){echo '<a href="controller/logout.php">Déconnexion</a>';}?><br>
<div class="container">
  <div class="row">
        <div class="col-md-9 offset-md-1">  
        <h1>Billet simple pour l'Alaska</h1>      
        <?php
        while ($donnees = $chapters->fetch())
        {
        ?> 
        <h2>
                <?php echo $donnees['titre']; ?>
               
        </h2>
              <p>
              <?php echo $donnees['contenu']; ?>
              
                <em><a href="index.php?action=chapter&amp;id=<?= $donnees['id'] ?>">Commentaires</a></em>
              </p>
              <?php if (isset($_SESSION['role']) && $_SESSION['role'] == "admin"){
              ?>
               <a href="index.php?action=editChapter&amp;id=<?= $donnees['id'] ?>">Edition</a>
               <a href="index.php?action=removeChapter&amp;id=<?= $donnees['id'] ?>"onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce chapitre ?');">Suppression</a>
              <?php
              }
              ?>     
        <?php
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