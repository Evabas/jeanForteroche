<?php

// Chargement des classes
require_once('model/ChapterManager.php');
require_once('model/CommentManager.php');
require_once('model/MemberManager.php');

function listChapters()
{
    $chapterManager = new ChapterManager(); 
    $chapters = $chapterManager->getChapters(); 

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

function editChapter()
{
    $chapterManager = new ChapterManager();

    $chapter = $chapterManager->getChapter($_GET['id']);

    require('view/frontend/editView.php');
}

function modifyChapter()
{
    $updateChapterManager = new ChapterManager();

    $updateChapter = $updateChapterManager->updateChapter();

    return $updateChapter;

}

function newChapter()
{
    $addChapterManager = new ChapterManager();

    $addChapter = $addChapterManager->addChapter();

    return $addChapter;
}

function removeChapter($chapterId)
{
    $removeChapterManager = new ChapterManager();

    $removeChapter = $removeChapterManager->suppressChapter($chapterId);

    return $removeChapter;

    header('location : index.php');
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
function notice($commentId)
{
    $commentManager = new CommentManager();
    $notice = $commentManager->noticeComment($commentId);
    
    return $notice;

}

function member()
{
    $memberManager = new MemberManager();

    $member = $memberManager->getMember();
    
    return $member;

}

function newMember()
{
    $newMemberManager = new MemberManager();

    $newMember= $newMemberManager->createMember();
    
    return $newMember;
}

function pseudoExist()
{
    $pseudoExistManager = new MemberManager();

    $pseudoExist = $pseudoExistManager->existantPseudo();

    return $pseudoExist;
}

