<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="../../public/jf.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

    <title>Auteur</title>
</head>

<body>

    <header>

    <?php include("menu.php"); ?>

    </header>

    <section class="marge">
Membre connecté(e) :  
<?php  if (isset($_SESSION['pseudo'])){echo $_SESSION['pseudo'];}?> <br>
<?php if (isset($_SESSION['pseudo'])){echo '<a href="../../controller/logout.php">Déconnexion</a>';}?><br>

<div class="container">
  <div class="row">
        <div class="col-md-11 offset-md-1">
     
<img src="../../public/images/portrait.png" alt="dessin d'un homme" />
<h2>Biographie</h2>   
<p>

Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc at lacinia lacus. Sed sed tristique sem. Etiam ultricies faucibus ex, eget tempor sem molestie non. Vivamus arcu metus, eleifend at elementum in, elementum at massa. Aenean et magna nunc. In hac habitasse platea dictumst. Duis consequat libero sit amet nisi fringilla, eget tristique lacus ultrices. Curabitur bibendum efficitur sem sed ultricies. Aenean ac fermentum arcu, sed iaculis dui. Duis accumsan sapien risus, et commodo est dictum a.

Donec dapibus nisi velit, viverra venenatis sem suscipit bibendum. Aliquam vitae diam aliquet, dapibus enim venenatis, maximus ex. Cras sit amet felis sit amet nibh pulvinar porttitor. Ut nec vulputate nisi. Nullam iaculis orci at justo pulvinar, rutrum dictum arcu aliquam. Nam vel pretium lacus. Proin et sapien magna. Mauris ornare elit sed nibh aliquam porta. Etiam pharetra quis tortor eget dictum.

Fusce non ornare ex, sed congue odio. Ut egestas nulla eget tortor volutpat congue. Ut congue, nunc non interdum posuere, tellus nisi porta metus, feugiat porttitor diam libero vitae risus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas vestibulum est ante, quis efficitur lorem rhoncus sed. Nulla velit urna, tincidunt mollis enim et, condimentum consectetur arcu. Pellentesque luctus sem eu justo hendrerit facilisis. Proin rutrum metus ac elit efficitur pharetra.

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