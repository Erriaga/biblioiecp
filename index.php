<?php
	$pageTitle = "Página Inicial | BIBLIOIECP";
	include 'temp/header.php';
?>
	<h1>BEM VINDO!</h1><br>
	<p>Aqui você pode:</p><br>
	<p>- Cadastrar livros e usuários</p>
	<p>- Consultar livros e usuários</p>
	<p>- Atualizar livros e usuários</p>
	<p>- Deletar livros e usuários</p><br>
	<p>A leitura é muito importante para construir um país melhor.</p><br><br>
<?php
	echo "<a class = 'btn' href = 'cadastrar_livro.php' style = 'margin-right: 0.625em;'>CADASTRAR LIVROS</a>";
	echo "<a class = 'btn' href = 'cadastrar_usuario.php' style = 'margin-left: 0.625em;'>CADASTRAR USUÁRIOS</a><br><br><br>";
	echo "<a class = 'btn' href = 'busca_livro.php' style = 'margin-right: 0.625em; padding: 0.9375em 3.75em 0.9375em 3.9em;'>BUSCAR LIVROS</a>";
	echo "<a class = 'btn' href = 'busca_usuario.php' style = 'margin-left: 0.625em; padding: 0.9375em 3.75em 0.9375em 3.9em;'>BUSCAR USUÁRIOS</a>";
	include 'temp/footer.php';
?>