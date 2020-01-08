<?php

// Chargement des classes
require_once('model/ChapterManager.php');
require_once('model/CommentManager.php');

function listChapters()
{
    $chapterManager = new ChapterManager(); // Création d'un objet
    $chapters = $chapterManager->getChapters(); // Appel d'une fonction de cet objet

    require('view/frontend/listChaptersView.php');
}

function chapter()
{
    $chapterManager = new ChapterManager();
    $commentManager = new CommentManager();

    $chapter = $chapterManager->getChapter($_GET['id']);
    $comments = $commentManager->getComments($_GET['id']);


    require('view/frontend/chapterView.php');
}

function addComment($chapterId, $author, $comment)
{
    $commentManager = new CommentManager();

    $affectedLines = $commentManager->chapterComment($chapterId, $author, $comment);

    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter le commentaire !');
    }
    else {
        header('Location: index.php?action=chapter&id=' . $chapterId);
    }
}