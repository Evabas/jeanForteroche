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

function modifyChapter($chapterId, $chapterContent)
{
    $updateChapterManager = new ChapterManager();

    $updateChapter = $updateChapterManager->updateChapter($chapterId, $chapterContent);

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
    $notice = $commentManager->flagComment($commentId);
    
    header('location:index.php?action=listChapters');
}

function noticedComment()
{
    $commentManager = new CommentManager();
    $noticedComment = $commentManager->getNoticedComment(); 

    require('view/frontend/adminView.php');
}

function approve($commentId)
{
    $commentManager = new CommentManager();
    $approve = $commentManager->approbationCommentaire($commentId); 
}

function suppress($commentId)
{
    $commentManager = new CommentManager();
    $suppress = $commentManager->suppressionCommentaire($commentId); 
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

