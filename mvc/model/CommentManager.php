<?php

require_once("model/Manager.php");

class CommentManager extends Manager
{
    public function getComments($chapterId)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('SELECT pseudo, commentaire FROM commentaires WHERE id_chapitre = ? ORDER BY id DESC');
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

    public function getComment($commentId)
    {
        $db = $this->dbConnect();
        $comment = $db->prepare('SELECT id, pseudo, commentaire FROM commentaires WHERE id = ? ORDER BY id DESC');
        $comment->execute(array($commentId));

        return $comment;
    }
}