<?php
   ini_set('display_errors','1');
   session_start();   
   if(session_destroy()) {
      header("Location: Login.php");
   }
?>
