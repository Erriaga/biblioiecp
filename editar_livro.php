<?php
	$pageTitle = "Editar Livro | BIBLIOIECP";
	include 'temp/header.php';
	if($con){
		$sql = "SELECT * FROM livro
				WHERE id_livro = " . $_GET['id'];
		$rs = mysqli_query($con, $sql);
		if($rs){
			if($valor = mysqli_fetch_array($rs)){
?>
				<form action = 'atualizar_livro' autocomplete = 'off' enctype = 'multipart/form-data' method = POST name = 'altLivro'>
					<h2>EDITAR LIVRO</h2><br>
					<p>ID</p><br><input maxlength = 4 name = 'id_livro' size = 3em type = 'text' value = "<?php echo $valor['id_livro'];?>" readonly><br><br>
					<p>Título da obra</p><br><input maxlength = 1000 name = 'nome_livro' size = 50em type = 'text' value = "<?php echo $valor['nome_livro'];?>" required><br><br>
					<p>Nome do autor</p><br><input maxlength = 1000 name = 'autor_livro' size = 50em type = 'text' value = "<?php echo $valor['autor_livro'];?>" required><br><br>
					<p>Editora responsável</p><br><input maxlength = 1000 name = 'editora_livro' size = 50em type = 'text' value = "<?php echo $valor['editora_livro'];?>" required><br><br>
					<p style = 'float: left; margin-left: 36.8em;'>Gênero do Livro</p> 
					<p style = 'float: right; margin-right: 32.875em;'>Prateleira</p><br><br>
						<input maxlength = 50 name = 'genero_livro' style = 'float: left; margin-left: 38.8em;' size = 35em type = 'text' value = "<?php echo $valor['genero_livro'];?>" required>
						<input maxlength = 2 name = 'prateleira_livro' style = 'float: right; margin-right: 38.8em;' size = 4em type = 'text' value = "<?php echo $valor['prateleira_livro'];?>" required><br><br><br>
					<p style = 'float: left; margin-left: 33.25em;'>Edição</p>
					<p style = 'margin: 0em 35.75em 0em 0em;'>Ano de publicação</p>
					<p style = 'float: right; margin: -1.5em 33em 0em 0em;'>Volume</p><br>
						<input maxlength = 4 name = 'edicao_livro' style = 'float: left; margin-left: 38.75em;' size = 3 type = 'text' value = "<?php echo $valor['edicao_livro'];?>" required>
						<input maxlength = 4 name = 'ano_livro' size = 3 type = 'text' value = "<?php echo $valor['ano_livro'];?>" required>
						<input maxlength = 3 name = 'vol_livro' style = 'float: right; margin-right: 38.75em;' size = 3 type = 'text' value = "<?php echo $valor['vol_livro'];?>" required><br><br>
					<p>Descrição</p><br>
						<textarea maxlength = 2500 name = 'desc_livro' required><?php echo htmlspecialchars($valor['desc_livro']); ?></textarea><br><br>
					<input style = 'margin-right: 2.125em;' type = 'submit' value = 'ATUALIZAR'>
					<a href = 'deletar_livro?id=<?php echo $valor['id_livro'];?>' style = 'background-color: red; border: 0.0625em solid red; color: white; font-family: "Oswald", sans-serif; font-size: 0.8333125em; margin-left: 1em; padding: 0.95em 3.45em 0.95em 3.45em; text-align: center; text-decoration: none;'>DELETAR</a>
				</form><br><br>
<?php
			} else {
				echo '<h2>LIVRO NÃO CADASTRADO.</h2><br><br>';
				echo "<a class = 'btn' href = 'cadastrar_livro'>CADASTRAR LIVRO</a>";
			}
		} else {
			echo '<h2>ERRO DE CONSULTA.</h2><br><br>';
			echo "<a class = 'btn' href = 'busca_livro'>BUSCAR LIVRO</a>";
		}
	} else {
		echo '<h2>ERRO DE CONEXÃO.</h2>';
	}
	include 'temp/footer.php';
?>