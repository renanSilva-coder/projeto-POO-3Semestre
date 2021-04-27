<?php
	
require_once 'connect.php';

include 'header_tpl.php';
include 'index_menu_tpl.php';

$nota = $_POST['nota'];
$explicacao = $_POST['explicacao'];

// Como evitar SQL injection 
//1) preparo a consulta e faço ela de forma segura
$objStmt = $objBanco->prepare(' INSERT INTO avaliacao
                                    (nota,explicacao) 
                                VALUES 
                                    ( :nt, :explic)');
//2) Substitui :nomezinho e :zap pelos valores enviados pelo usuário
$objStmt->bindParam(':nt', $nota);
$objStmt->bindParam(':explic', $explicacao);

//3) Executo a consulta
if( $objStmt->execute() ){
    $msg = 'Avaliação gravada com sucesso!';
}else{
    $msg = '  :-(  DEU ERRO TENTE NOVAMENTE!';
}

include 'footer_tpl.php';
include 'grava_nps_tpl.php';
