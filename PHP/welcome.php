<?php
   ini_set('display_errors','1');
   include('session.php');
?>
<html">   
   <head>
      <title>Welcome </title>
   </head>   
   <body>
      <h1>Welcome <?php echo $login_session; ?></h1> 
      <h1>You have successfully logged in</h1>
      <h2><a href = "Logout.php">Sign Out</a></h2>
   </body>
   
</html>
