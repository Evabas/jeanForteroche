<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="public/jf.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

    <title>Commentaires</title>
</head>

<body>
<header>

<?php include("menu.php");?> 
    
</header>

<section class="marge">
Membre connecté(e) :  
<?php  if (isset($_SESSION['pseudo'])){echo $_SESSION['pseudo'];}?> <br>
<?php echo '<a href="controller/logout.php">Déconnexion</a>';?><br>
        
        <p><a href="index.php">Retour aux chapitres</a></p>

<div class="container">
        <div class="row">
            <div class="col-md-9 offset-md-1">
            
            <h3>
            <?php  if (isset($chapter)){echo $chapter['titre'];} ?>
            </h3>
            
            <p>
                <?php if (isset($chapter)){echo $chapter['contenu'];} ?>
            </p>
      

        <h2>Commentaires</h2>

        <p>
                <form action="index.php?action=addComment&amp;id=<?= $chapter['id'] ?>" method="post">
                    <p>
                    <label for="pseudo">Pseudo</label> : <input type="text" name="pseudo" id="pseudo" /><br />
                    <label for="commentaire">Commentaire</label> :  <input type="text" name="commentaire" id="commentaire" /><br><br>

                    <button type="submit" class="btn btn-primary mb-2">Envoyer</button>
                </form>
        </p>
        <?php
        while ($comment = $comments->fetch())
        {
        ?>
        
            <p><strong><?php  if (isset($comment)){echo $comment['pseudo'];} ?></strong></p>
            <p><?= nl2br(htmlspecialchars($comment['commentaire'])) ?></p>
            <em><a href="index.php?action=notice&amp;id=<?=$comment['id']?>&amp;pseudo=<?=$comment['pseudo']?>&amp;commentaire=<?=$comment['commentaire']?>">Signaler</a></em>
        <?php
        }
        ?>
          
</div>
    </div>
        </div>
<footer id="pied_de_page">

</footer>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>


