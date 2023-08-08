<?php
	$pageTitle = "Cadastro de Livro | BIBLIOIECP";
	include 'temp/header.php';
?>
	<form action = 'inserir_livro' autocomplete = 'off' enctype = 'multipart/form-data' method = POST name = 'incInserirLivro'>
		<h2>CADASTRO DE LIVROS</h2><br>
		<p>Título da obra</p><br><input maxlength = 1000 name = 'nome_livro' size = 50em type = 'text' required><br><br>
		<p>Nome do autor</p><br><input maxlength = 1000 name = 'autor_livro' size = 50em type = 'text' required><br><br>
		<p>Editora responsável</p><br><input maxlength = 1000 name = 'editora_livro' size = 50em type = 'text' required><br><br>
		<p style = 'float: left; margin-left: 36.8em;'>Gênero do Livro</p> 
		<p style = 'float: right; margin-right: 32.875em;'>Prateleira</p><br><br>
			<input maxlength = 50 name = 'genero_livro' style = 'float: left; margin-left: 38.8em;' size = 35em type = 'text' required>
			<input maxlength = 2 name = 'prateleira_livro' style = 'float: right; margin-right: 38.8em;' size = 4em type = 'text' required><br><br><br>
		<p style = 'float: left; margin-left: 33.25em;'>Edição</p>
		<p style = 'margin: 0em 35.75em 0em 0em;'>Ano de publicação</p>
		<p style = 'float: right; margin: -1.5em 33em 0em 0em;'>Volume</p><br>
			<input maxlength = 4 name = 'edicao_livro' style = 'float: left; margin-left: 38.75em;' size = 3 type = 'text' required>
			<input maxlength = 4 name = 'ano_livro' size = 3 type = 'text' required>
			<input maxlength = 3 name = 'vol_livro' style = 'float: right; margin-right: 38.75em;' size = 3 type = 'text' required><br><br>
		<p>Descrição</p><br>
			<textarea maxlength = 2000 name = 'desc_livro' required></textarea><br><br>
		<p>Foto</p><br><input type = 'file' name = 'foto_livro' id = 'foto_livro' class = 'btn2'><br><br><br>
		<input style = 'margin-right: 1em;' type = 'submit' value = 'CADASTRAR'>
		<a href = 'index' style = 'background-color: red; border: 0.0625em solid red; color: white; font-family: "Oswald", sans-serif; font-size: 0.8333125em; margin-left: 1em; padding: 0.95em 3.45em 0.95em 3.45em; text-align: center; text-decoration: none;'>CANCELAR</a>
	</form><br><br>
<?php
	include 'temp/footer.php';
?>