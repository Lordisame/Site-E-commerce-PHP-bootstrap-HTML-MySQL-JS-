<?php
try{
 # $access =new pdo("mysql:host=mysql-cluster-2-mysql-master.database.svc.cluster.local:3306;dbname=737865_0550f0b5af927b757c0b85cb570648af;charset=utf8","easywp_868269","AB83BJI4QvM2Aqaf1mfGBPqRbu8FRHXzUGVjhEe9NVo=");

 $access =new pdo("mysql:host=localhost;dbname=commerce;charset=utf8","root","");
 $access->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
 $acc =new pdo("mysql:host=localhost;dbname=737865_0550f0b5af927b757c0b85cb570648af;charset=utf8","easywp_868269","AB83BJI4QvM2Aqaf1mfGBPqRbu8FRHXzUGVjhEe9NVo=");

}catch(Exception $e){
    $e->getMessage();
}
?>