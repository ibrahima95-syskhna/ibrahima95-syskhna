<?php
$user="root";
$password="";
try {
    session_start();
    $dbd =new PDO ('mysql:host=localhost; dbname=projet',$user, $password);
    echo "";

} catch (\Throwable $th) {
    
    echo "erreur:".$th->getMesage()."<br>";
}

?> 
