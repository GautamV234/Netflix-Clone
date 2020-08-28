<?php
require_once("includes/config.php");
require_once("includes/classes/FormSanitizer.php");
require_once("includes/classes/Account.php");
require_once("includes/classes/Constants.php");


 $account = new Account($con);  


	if (isset($_POST["submitButton"])) {

		
        $username = FormSanitizer::sanitizeFormUsername($_POST["username"]);
        $password = FormSanitizer::sanitizeFormPassword($_POST["password"]);
        

        $success = $account->login($username , $password);

        if($success){
            $_SESSION["userLoggedIn"]= $username;
            header("Location:index.php");
        }
        
  }

  function getInputValue($name){

    if (isset($POST[$name])){
      echo $POST[$name];
    }
  }


?>



<!DOCTYPE html> 

<html>
 <head>
    <title> Welcome to GFlix </title>
    <link rel="stylesheet" type="text/css" href="assets/style/style.css">

 </head>
 <body>
      <div class="SignInContainer">

      	<div class="column">

          <div class="header">
                <img src="assets/images/GFLIX_LOGO.png" title="Gflix" alt="GFLIX LOGO">
                <h3> Sign In </h3>
                <span> To continue to GFlix</span>
                
          </div>

          <form method="POST">

            
            <?php echo $account->getError(Constants::$loginFailed); ?>
            <br/>
            <input type="text" placeholder="Username" name="username" value ='<?php getInputValue("username")?>' required>

            <input type="password" placeholder="Password" name="password" required>

            <input type="submit" name="submitButton" value="SUBMIT">
          
          </form>

          <a href="register.php" class = "signInMessage">Need an account? Sign up here!</a>

      		
      	</div>
      	
      </div>
 </body>


</html>      