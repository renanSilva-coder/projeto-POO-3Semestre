<?php
include 'header_tpl.php';
include 'index_menu_tpl.php';
include 'footer_tpl.php';
	
$nota = $_GET['nota'];

if ( $nota >= 9 ){
	echo "ESTAMOS MUITO FELIZES!!!<hr>";
	echo 'Obrigado pela sua ajuda !';
}else{
	echo "<p>O que podemos fazer para você nos dar uma nota 10 ???</p>
	<textarea placeholder='Campo desabilitado...' name='feedback' rows='2' cols='70' disabled=''></textarea> <hr>";
}


