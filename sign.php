<!DOCTYPE html>
    <html lang="en">
    <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Inscription</title>
      <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
    <nav>
    <li><a href="login.php">login</a></li>
    </nav>
    <div class="signup-form"> 
      <form method="post">
        <h1>Sign Up</h1>
        <input type="email"  name="email" placeholder=" Entrer votre email" class="txtb" value ="<?php if(isset($email)){ echo $email;} ?>" />
        <input type="password" name="password" placeholder="Password" class="txtb" >
        <input type="password" name="confirm_password" placeholder="Confirm Password" class="txtb">
        <input type="submit" value="Create Account" name="submit" class="signup-btn">
      </form>
    </div>
    
     
  </body>
</html>
<?php
require_once 'conndb.php';
if (isset($_POST['submit']))
{
  if(!empty ($_POST['email']) && !empty ($_POST['password']) && !empty ($_POST['confirm_password']))
  {
          $email=htmlspecialchars($_POST['email']);
          $password= sha1($_POST['password']); 
          $confirm_password= sha1($_POST['confirm_password']);

 if(filter_var($email , FILTER_VALIDATE_EMAIL)){
          $check=$dbd->prepare('SELECT email, password ,confirm_password FROM users WHERE email= ?');
          $check ->execute(array($email));
          $date=$check->fetch();
          $row=$check->rowCount();
       if($row==0){ 
      } else {
        echo "Addres email deja utilise";
      }
     
       
                 if($password == $confirm_password)
                      {
                  
                       $check=$dbd->prepare('INSERT INTO users (email, password, confirm_password) VALUES (?, ?, ?)');
                        $check ->execute(array($email,$password,$confirm_password));
                        echo"votre compte a été créé...";
            
                      }else{
                        echo "votre password ne correspond pas";
                          }

       }else{
          echo " votre address email n'set pas valide";
          }
  }else{
    
      echo " tous les champ doit etre completer !";  
      }
}

?> 