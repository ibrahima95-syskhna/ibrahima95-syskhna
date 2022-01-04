    <!DOCTYPE html>
    <html lang="en">
    <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>login</title>
       <link rel="stylesheet" href="css/style1.css">
   </head>
   <body>
    <nav>
    <li> <a href="sign.php"> S'inscrire</a></li>
    <li><a href="login.php">login</a></li>
    </nav>  
   <div class= "signup-form" >      
<form method="post" > 
  <h1>Login</h1>
  <input type="email" name="email" placeholder="Entrer votre email" class="textb"><br>
  <input type="password" name="password" placeholder="Password"  class="textb"><br>
  <input type="submit" name="submit" value="Login" class="signup-btn"><br>
  <a href="Modifierpass.php"> Mot de passe oublié</a>
</form>
</div>
  </body>
</html>
<?php
 require_once 'conndb.php';
 if(isset ($_POST['submit'])){
  $email=htmlspecialchars($_POST['email']);
  $password= sha1 ($_POST['password']);
 if(!empty ($_POST['email']) AND  !empty ($_POST['password'])){

  $check=$dbd->prepare("SELECT * FROM users WHERE email= ? AND password=?");
  $check ->execute(array($email ,$password));
  $date=$check->fetch();
  $row=$check->rowCount();
   if ($row==1) {
    $date=$check->fetch();
    $_SESSION['AUTH']= true;
    $_SESSION['id']=$UserInfos['id'];
    $_SESSION['email']=$UserInfos['email'];
    header('Location:profil.php');
    exit();

  }else{
    echo "Mauvaise email ou  password";
  }

   }else{
     echo  "veullez completez tous les champs";
   }

       
  
 } 
?>  