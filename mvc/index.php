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
        elseif ($_GET['action'] == 'newChapter') {
            if (isset($_SESSION['role']) && $_SESSION['role'] == "admin"){
                $req = newChapter();
                header('location: index.php');
            }
            else {
                throw new Exception('Vous n\'êtes pas administrateur !');
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
        // elseif ($_GET['action'] == 'edit') {
        // }
        // elseif ($_GET['action'] == 'suppr') {
        // }

        elseif ($_GET['action'] == 'member') {
            if (isset($_POST['pseudoconnect']) && isset($_POST['pwdconnect'])) {
                $pseudoconnect = htmlspecialchars($_POST['pseudoconnect']);
                $pwdconnect = htmlspecialchars($_POST['pwdconnect']);
                $pass_hache = password_hash($pwdconnect, PASSWORD_DEFAULT);
            
                if(!empty($pseudoconnect) && !empty($pwdconnect)){
                   $resultat = member();
                   $isPasswordCorrect = password_verify($pwdconnect, $resultat['pass']);
                    if (isset($resultat) && ($resultat && $isPasswordCorrect)) {
          
                            $_SESSION['pseudo'] = $resultat['pseudo'];
                            $_SESSION['role'] = $resultat['role'];
            
                            if ($_SESSION['role'] == "admin")
                            {
                                header("location: view/frontend/adminView.php");
                            }
                            else 
                            {
                                header("location: index.php");
                            }
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
    