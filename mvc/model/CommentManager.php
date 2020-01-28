<?php

require_once("model/Manager.php");

class CommentManager extends Manager
{
    public function getComments($chapterId)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('SELECT id, pseudo, commentaire FROM commentaires WHERE id_chapitre = ? AND flag = 0 ORDER BY id DESC');
        $comments->execute(array($chapterId));

        return $comments;
    }

    public function chapterComment($chapterId, $author, $comment)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('INSERT INTO commentaires (id_chapitre, pseudo, commentaire) VALUES(?,?,?)');
        $affectedLines = $comments->execute(array($chapterId, $author, $comment));

        return $affectedLines;
    }

    public function flagComment($commentId)  //commentaires signalés en base
    {
        
        $db = $this->dbConnect();
        $commentquery = $db->prepare('UPDATE commentaires SET flag = 1 WHERE id = ?');
        $commentquery->execute(array($commentId));
        
    }
    public function getNoticedComment()
    {
        $db = $this->dbConnect();
        $req= $db->query('SELECT id, pseudo, commentaire FROM commentaires WHERE flag = 1 ORDER BY id DESC');
        
        return  $req;
    }

    public function approbationCommentaire($commentId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE commentaires SET flag = 0 WHERE id = ?');
        $req->execute(array($commentId));
    }

    public function suppressionCommentaire($commentId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('DELETE FROM commentaires WHERE id = ?');
        $req->execute(array($commentId));
    }
}