<?php
session_start();
require('controller/frontend.php');
try {
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'listChapters') {
            listChapters();
        }
        elseif ($_GET['action'] == 'chapter') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                chapter();
            }
            else {
                throw new Exception('Erreur : aucun identifiant de chapitre envoyé');
            }
        }
        elseif ($_GET['action'] == 'editChapter') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                editChapter();
            }
        }
        elseif ($_GET['action'] == 'modifyChapter') {
            if (isset($_GET['id']) && $_GET['id'] > 0 && !empty($_POST['contenuBis']) ) {
                modifyChapter($_GET['id'], $_POST['contenuBis']);
                header('location: index.php');
                }
            }   
        elseif ($_GET['action'] == 'removeChapter') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                removeChapter($_GET['id']);
                header('location: index.php');
            }
        }
        elseif ($_GET['action'] == 'newChapter') {
            if (isset($_SESSION['role']) && $_SESSION['role'] == "admin"){
                $req = newChapter();
                header('location: index.php');
            }
            else {
                throw new Exception('Vous n\'êtes pas administrateur !');
            }
        }
        elseif ($_GET['action'] == 'addComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if (!empty($_POST['pseudo']) && !empty($_POST['commentaire'])) {
                    addComment($_GET['id'], $_POST['pseudo'], $_POST['commentaire']);
                }
                else {
                    throw new Exception('Tous les champs ne sont pas remplis !');
                }
            }
            else {
                throw new Exception('Aucun identifiant de chapitre envoyé');
            }
        }
  
        //signalement du commentaire
        elseif ($_GET['action'] == 'notice') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                notice($_GET['id']);
            }
        }
        //récupération des commentaires signalés
        elseif ($_GET['action'] == 'noticedComment') {
            noticedComment();
        }
        //commentaire approuvé
        elseif ($_GET['action'] == 'approve') {
            if (isset($_GET['id']) AND !empty($_GET['id'])) { 
                approve($_GET['id']);
                header('location:index.php');
            }
        }
        //commentaire supprimé
        elseif ($_GET['action'] == 'suppress') {
            if (isset($_GET['id']) AND !empty($_GET['id'])) {
                suppress($_GET['id']);
                header('location:index.php'); 
            }
        }
       
        elseif ($_GET['action'] == 'newMember') {
            if (isset($_POST['form_inscription'])){
                $pwd = htmlspecialchars($_POST['pwd']);
                $pwd2 = htmlspecialchars($_POST['pwd2']);
            
                if (!empty($_POST['pseudo']) AND !empty($_POST['pwd']) AND !empty($_POST['pwd2']) AND !empty($_POST['mail'])) {  
                    $pseudoexist = pseudoExist();

                    if (isset($pseudoexist) && ($pseudoexist == 0)) {
                        if ($pwd == $pwd2) {
                            $req = newMember();
                            header('location: view/frontend/espaceMembresView.php');
                        }
                        else
                        {
                            throw new Exception('Les mots de passe sont différents. Retapez votre mot de passe.');
                        }
                    }
                    else
                    {
                        throw new Exception('Ce pseudonyme est déjà utilisé.');
                    }   
                }    
                else
                {
                    throw new Exception('Tous les champs doivent être complétés!');
                } 
            }
        }
     
        elseif ($_GET['action'] == 'member') {
            if (isset($_POST['pseudoconnect']) && isset($_POST['pwdconnect'])) {
                $pseudoconnect = htmlspecialchars($_POST['pseudoconnect']);
                $pwdconnect = htmlspecialchars($_POST['pwdconnect']);
            
                if(!empty($pseudoconnect) && !empty($pwdconnect)){
                   $resultat = member();
                   $isPasswordCorrect = password_verify($pwdconnect, $resultat['pass']);
                    if (isset($resultat) && ($resultat && $isPasswordCorrect)) {
          
                            $_SESSION['pseudo'] = $resultat['pseudo'];
                            $_SESSION['role'] = $resultat['role'];
                            header("location: view/frontend/espaceMembresView.php");
                         
                    }
                    else
                    {
                    
                        throw new Exception('Identifiants incorrects!');
                    }   
                } 
                else
                {
                
                    throw new Exception('Tous les champs doivent être complétés!');
                }             
            }    
        }
    }
    else {
        listChapters();
    }
}
catch(Exception $e) { 
    echo 'Erreur : ' . $e->getMessage();
}
    