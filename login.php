<!DOCTYPE html>
<!-------------------------------------------------- Head of HTML File --------------------------------------------------------------------->
<head>
  <title>Forum - Login Page</title>
  <meta charset="UFT-8">
  <link rel="stylesheet" type="text/css" href="stylesheet.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
  <link rel="stylesheet" href="fonts.css/"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"!important></script>
</head>

<!-------------------------------------------------- Body of HTML File -------------------------------------------------------------------->
<div class="container">
<body>
<!-------------------------------------------------- Body of HTML File -------------------------------------------------------------------->
<?php
   include("config.php");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
       
      $myuname = mysqli_real_escape_string($db,$_POST['UserName']);
      $mypword = mysqli_real_escape_string($db,$_POST['Password']);
	  
      $sql = "SELECT UserID FROM users WHERE Uname = '$myuname' and Pword = '$mypword'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
      $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
         //$session_register("myuname");
		 $_SESSION['UserName']= $myuname;
         $_SESSION['login_user'] = $myuname;
         header("location: Homepage.html");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
?>
<!------------------------- Jumbotron -  ------------------------------------------------------------------------>

    <section class="jumbotron">
    <div class="container">
    <div class="row text-center">
    	<h2>Sign in or Register to view the Forum!</h2>
    </div>
    </div>  
</section>
    
 <!-------------------------------------------------- Sections --------------------------------------------------------------------------->   
    <div class="container">
        
    <form action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method = "post">
    <label>UserName  :</label><input type = "text" name = "UserName" class = "box"/><br /><br />
    <label>Password  :</label><input type = "password" name = "Password" class = "box" /><br/><br />
    <input type = "submit" value = " Submit "/><br />
    </form>
        
    </div>

</body>
</div>
</html>
