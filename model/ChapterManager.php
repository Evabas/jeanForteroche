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
    
    public function addChapter()
    {
        $db = $this->dbConnect();
        $req = $db->prepare('INSERT INTO chapitres (titre, contenu) VALUES(?, ?)');
        $req->execute(array($_POST['titre'], $_POST['contenu']));
        
        return $req;
    }
    public function suppressChapter($chapterId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('DELETE FROM chapitres WHERE id = ?');
        $req->execute(array($chapterId)); 
        $supprChapter = $req->fetch();

        return $supprChapter;
    }

    public function updateChapter($chapterId, $chapterContent)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE chapitres SET contenu = ? WHERE id = ?');
        $req->execute(array($chapterContent, $chapterId)); 

        return $req;
    }
}