<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style2.css">
    <title>ModifierPassword</title>
</head>
<body>
     <div align="center" class="signup-form">
         <h2>Modification du mot passe</h2>
        <br>  <br>
<form action="" form method="post">
   <label for="example passwor"> Old password :</label>
   <input type="password" name="old_password" placeholder="Old password" class="textb">
      <br>
    <label for="example password"> new password :</label>
    <input type="password" name="new_password" placeholder="New password" class="textb">
      <br>
     <label for="example passwor"> confirm password :</label>
     <input type="password" name="confirm_password" placeholder="confirm password" class="textb">
      <br>
      <input type="submit" name="submit" class="signup-btn">
</form>
<?php
require_once 'conndb.php';
if (isset($_POST['submit']))
{
    if(!empty ($_POST['old_password']) AND !empty ($_POST['new_password']) AND !empty ($_POST['confirm_password'])){

    $old_password=$_POST['old_password'];
    $new_password=$_POST['new_password'];
    $confirm_password=$_POST['confirm_password'];
    $changpass=$dbd->prepare("SELECT * FROM users where id='1' ");
    $changpass1=mysql_fetch_array($changpass);
    $donne=$changpass1['password'];
    if($donne == $old_password){
        if($new_password == $confirm_password){
            $updatepaass=$dbd->prepare ("UPDATE users SET password='$new_password' WHERE id='1'");
            echo "update successfully";
            header("Location:login.php");

        } else {
            echo "paassword ne correspond pas";
        }
    }else{
        echo "update failed";
    }

  }else{
      echo "veuillez complete tous les champs";
  }

}

?>
</body>
</html>