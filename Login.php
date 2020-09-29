<?php
   ini_set('display_errors','1');
   include("Config.php");
   session_start();
   $error = "";   
   if($_SERVER["REQUEST_METHOD"] == "POST") {      
      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']);       
      $sql = "SELECT id FROM admin WHERE username = '$myusername' and passcode = '$mypassword'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $count = mysqli_num_rows($result);
      if($count == 1) {
         $error = " ";
         $_SESSION["myusername"];
         $_SESSION['login_user'] = $myusername;         
         $error = "";
         header("location: welcome.php");
      }else {
         $error = "* Your Login Name or Password is invalid";
      }
   }
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>Login Page</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/sign-in/">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
  </head>

  <body class="text-center">
         
	    <form method="POST" action="" class="form-signin1">
       <h3>Bruteforce Attack Demonstration</h3><br><br>
	      <img class="img-fluid mb-4" src="https://www.w3schools.com/howto/img_avatar.png" alt="" width="72" height="72">
	      <h1 class="h3 mb-3 font-weight-normal">Sign in</h1>
	      <label for="inputText" class="sr-only">User Name</label>
	      <input type="text" id="inputText" name="username" class="form-control" placeholder="User name" required autofocus><br>
	      <label for="inputPassword" class="sr-only">Password</label>
	      <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required><br>
         <div style = "font-size:18px; color:#cc0000;"><?php if($error) echo $error; ?></div>	<br>
	      <div class="checkbox mb-3">
		<label>
		  <input type="checkbox" value="remember-me"> Remember me
		</label>
	      </div>
	      <button class="btn btn-lg btn-primary btn-block" name="btnLogin" type="submit">Sign in</button>
	      <p class="mt-5 mb-3 text-muted">&copy; 2020-2021 | CSE3501 - ISAA</p>
         <p class="mt-5 mb-3 text-muted"><b>Team Members : </b><br> Abhishek Kumkar (18BCE1081) <br> Gunjan Agarwal (18BCE1168) <br> Mridu Shukla (18BCE1179)</p>
       
	    </form>
       
	<style>
		html,
		body {
		  height: 100%;
		}

		body {
		  display: -ms-flexbox;
		  display: -webkit-box;
		  display: flex;
		  -ms-flex-align: center;
		  -ms-flex-pack: center;
		  -webkit-box-align: center;
		  align-items: center;
		  -webkit-box-pack: center;
		  justify-content: center;
		  padding-top: 40px;
		  padding-bottom: 40px;
		  background-color: #f5f5f5;
		}

		.form-signin {
		  width: 100%;
		  max-width: 330px;
		  padding: 15px;
		  margin: 0 auto;
		}
		.form-signin .checkbox {
		  font-weight: 400;
		}
		.form-signin .form-control {
		  position: relative;
		  box-sizing: border-box;
		  height: auto;
		  padding: 10px;
		  font-size: 16px;
		}
		.form-signin .form-control:focus {
		  z-index: 2;
		}
		.form-signin input[type="email"] {
		  margin-bottom: -1px;
		  border-bottom-right-radius: 0;
		  border-bottom-left-radius: 0;
		}
		.form-signin input[type="password"] {
		  margin-bottom: 10px;
		  border-top-left-radius: 0;
		  border-top-right-radius: 0;
		}
	</style>
  <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
