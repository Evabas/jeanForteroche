<?php

require('model.php');

function listChapters()
{
    $chapters = getChapters();

    require('listChaptersView.php');
}

function chapter()
{
    $chapter = getChapter($_GET['id']);
    $comments = getComments($_GET['id']);

    require('chapterView.php');
}