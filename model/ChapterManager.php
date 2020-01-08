<?php
require_once("model/Manager.php");

class ChapterManager extends Manager
{
    public function getChapters()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, titre, contenu FROM chapitres ORDER BY id DESC');

	    return $req;
    }

    public function getChapter($chapterId)
    {
        $db = $this->dbConnect();
        $req= $db->prepare('SELECT id, titre, contenu FROM chapitres WHERE id = ?');
        $req->execute(array($chapterId));   
        $chapter = $req->fetch();
        
        return $chapter;    
    }
}