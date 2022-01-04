
<?php
require_once 'conndb.php';
if(isset($_['id']) AND $_GET['id'] > 0){
 $getid=intval($_GET['id']);
 $req=$dbd->prepare('SELECT * FROM users where id=?');
 $req->execute(array($getid));
 $user=$req->fetch();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
</head>
<body>
    <nav>
     <li><a href='deconnexion.php'> Se deconnecter </a></li>
     </nav>

 <div>
        <h2> Profil de l'utilisateur</h2>
        <br /> 
        <h2> Descripition: </h2>
        Nom d'utilisateur: 
        <br> </br>
        Email: <?php echo $user['email']; ?> 
        <br/>
    
</div>
<style>
 body { 
  background:#48b067;
     }
   nav li{
    list-style-type:none ;
    float: right;
  }
  nav a{
    display: inline-block; 
    text-decoration: none;
    padding: 40px 60px ;
    color: #fff;
    font-family: Verdana, Geneva, Tahoma, sans-serif;
    font-size: 1em;
  }
    </style>
</body>
</html>
