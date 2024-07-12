<?php
session_start(); 

if (!isset($_SESSION['iden'])) { 
		
    	header('Location:./formularioLogin.html');
    	
    	exit;    	
}
?>