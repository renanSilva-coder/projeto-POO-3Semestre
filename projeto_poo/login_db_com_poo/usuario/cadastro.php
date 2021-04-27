<?php
require 'model/dados.php';

if(isset($_POST['cadastrar'])){

	require 'controller/consistencia_cadastro.php';

	$id = gravar_usuario( $_POST['nome'], $_POST['email'], $_POST['senha'] );

	if( $id ) {
		header('Location: ./index.php'); 
	}else{
		$erros = ['Não foi possível criar o usuário!'];
	}
}else{
	$erros = [];
}

include 'view/cadastro_tpl.php';
