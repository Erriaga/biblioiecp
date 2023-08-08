<?php
	include 'connect/connect.php';
?>
<!DOCTYPE html>
<html lang = 'pt-br'>
	<head>
		<link href = 'css/style.css' rel = 'stylesheet' type = 'text/css'>
		<link href = 'https://fonts.gstatic.com' rel = 'preconnect' crossorigin>
		<link href = 'https://fonts.googleapis.com/css2?family=Oswald&display=swap' rel = 'stylesheet'>
		<link href = 'library.ico' rel = 'icon' type = 'image/x-icon'>
		<meta charset = 'utf-8'>
		<title><?php echo $pageTitle; ?></title>
	</head>
	<body><center>
		<div id = 'header'>
			<a href = 'index' style = 'text-decoration: none;'>
				<h1 style = 'font-size: 76px; font-weight: bolder; margin: 25px 0px -10px 0px;'><b>BIBLIOIECP</a></b></h1><br>
			<ul>
				<li><a href = 'index' style = 'color: orange; text-decoration: none;'>HOME</a></li>
				<li><a href = 'cadastrar_livro' style = 'color: orange; margin: 0px 100px 0px 100px; text-decoration: none;'>CADASTRO DE LIVROS</a></li>
				<li><a href = 'busca_livro' style = 'color: orange; text-decoration: none;'>BUSCA DE LIVROS</a></li>
				<li><a href = 'cadastrar_usuario' style = 'color: orange; margin: 0px 100px 0px 100px; text-decoration: none;'>CADASTRO DE USUÁRIOS</a></li>
				<li><a href = 'busca_usuario' style = 'color: orange; text-decoration: none;'>BUSCA DE USUÁRIOS</a></li>
				<li><a href = 'pedidos' style = 'color: orange; margin: 0px 0px 0px 100px; text-decoration: none;'>LISTA DE DEVOLUÇÃO</a></li>
			</ul>
		</div><br><br>
		<div id = 'content'>		