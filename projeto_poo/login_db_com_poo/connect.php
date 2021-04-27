<?php

$dsn = 'mysql:dbname=php;host=localhost';
$user = 'root';
$password = '';
        
try{
    $objBanco = new PDO($dsn, $user, $password);
    echo 'conectado';
}catch( PDOException $objErro ){
    echo 'SGBD Indisponível: '. $objErro->getMessage();
    exit();
}
