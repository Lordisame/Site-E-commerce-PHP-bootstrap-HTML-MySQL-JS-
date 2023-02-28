<?php
// Connection Database
$url = 'mysql:host=localhost;port=3306;dbname=commerce' ;
$user = 'root';
$pass = '';
$name_server="localhost";
$db_name="commerce";

$conn=mysqli_connect($name_server,$user,$pass,$db_name);

try{
    $pdo = new PDO($url, $user, $pass);     
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    
}
catch (PDOEXCEPTION$e) {
    echo " Connection failed: " .$e -> getMessage();
    }
    

?>