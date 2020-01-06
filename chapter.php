<?php
require('model.php');

if (isset($_GET['id']) && $_GET['id'] > 0) {
    $chapter = getChapter($_GET['id']);
    $comments = getComments($_GET['id']);
    require('chapterView.php');
}
else {
    echo 'Erreur : aucun identifiant de chapitre envoyé';
}




