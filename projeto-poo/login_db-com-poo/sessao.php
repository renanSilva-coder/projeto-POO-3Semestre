<?php

session_start();

if ( !isset($_SESSION['login'])) {
		
	header('Location: /projeto-POO-3Semestre/projeto-poo/login_db-com-poo/');
			
}