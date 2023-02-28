<?php
try{
 $access =new pdo("mysql:host=localhost;dbname=commerce;charset=utf8","root","");
 $access->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
 //echo "hamza";
}catch(Exception $e){
    $e->getMessage();
}
?>