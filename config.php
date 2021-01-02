<?php 
$dsn = "mysql:dbname=cafetria;dbhost=127.0.0.1;dbport=3306";

define("dbuser","root");
define("dbpassword","");
try
{$db=new PDO($dsn,dbuser,dbpassword);
$db -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e){
    die ("error couldnt connect". $e -> getMessage());
}


?>