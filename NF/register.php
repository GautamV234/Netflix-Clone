<?php
require_once("includes/config.php");
require_once("includes/classes/FormSanitizer.php");
require_once("includes/classes/Account.php");
require_once("includes/classes/Constants.php");


   $account = new Account($con);  


    if(isset($_POST["submitButton"])) {
        
        $firstName = FormSanitizer::sanitizeFormString($_POST["firstName"]);
        $lastName = FormSanitizer::sanitizeFormString($_POST["lastName"]);
        $username = FormSanitizer::sanitizeFormUsername($_POST["username"]);
        $email = FormSanitizer::sanitizeFormEmail($_POST["email"]);
        $email2 = FormSanitizer::sanitizeFormEmail($_POST["email2"]);
        $password = FormSanitizer::sanitizeFormPassword($_POST["password"]);
        $password2 = FormSanitizer::sanitizeFormPassword($_POST["password2"]);

        $success = $account->register($firstName,$lastName,$username,$email,$email2,$password ,$password2);

        if($success){
            $_SESSION["userLoggedIn"]=$username;
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
                <h3> Sign Up </h3>
                <span> To continue to GFlix</span>
                
          </div>

          <form action="register.php"  method="POST">
 
            <?php echo $account->getError(Constants::$firstNameCharacters); ?>           
            <input type="text" placeholder="First Name" name="firstName" value ="<?php getInputValue("firstName")?>" required>
            <?php echo $account->getError(Constants::$lastNameCharacters);?>
            <input type="text" placeholder="Last Name" name="lastName" value ="<?php getInputValue("lastName")?>" required>
            <?php echo $account->getError(Constants::$usernameCharacters); ?>
            <?php echo $account->getError(Constants::$usernameTaken); ?>
            <input type="text" placeholder="Username" name="username" value ="<?php getInputValue("username")?>" required>
            <?php echo $account->getError(Constants::$emailsDontMatch);?>
            
            
            <?php echo $account->getError(Constants::$emailInvalid);?>
            <?php echo $account->getError(Constants::$emailTaken);?>
            <input type="email" placeholder="Email" name="email" value ="<?php getInputValue("email")?>" required>    
            <input type="email" placeholder="Confirm email" name="email2" value ="<?php getInputValue("email2")?>" required>

            <?php echo $account->getError(Constants::$passwordsDontMatch); ?>
            <?php echo $account->getError(Constants::$passwordCharacters);  ?>    
            <input type="password" placeholder="Password" name="password" required>

            <input type="password" placeholder="Confirm password" name="password2"  required> 

            <input type="submit" name="submitButton" value="SUBMIT">
          
          </form>

          <a href="login.php" class = "signInMessage">Already have an account? Sign in here</a>

      		
      	</div>
      	
      </div>
 </body>


</html>     