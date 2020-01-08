
<?php
function is_admin(){
      if(!empty($_SESSION['role'] && $_SESSION['role'] =2) {
         return true // Il est admin
      } else {
         return false // Il n'est pas admin
      }
   }
?>
<?php 
   if(!is_admin()){
      header('403 Forbidden', true, 403) // Renvoi une erreur 403 au nivigateur
      exit();
   }
?>

?role=" . $_SESSION['role']