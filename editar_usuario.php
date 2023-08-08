<?php
	$pageTitle = "Editar Usuário | BIBLIOIECP";
	include 'temp/header.php';
	if($con){
		$sql = "SELECT * FROM usuario
				WHERE id_usuario = " . $_GET['id'];
		$rs = mysqli_query($con, $sql);
		if($rs){
			if($valor = mysqli_fetch_array($rs)){
?>
				<form action = 'atualizar_usuario' autocomplete = 'off' enctype = 'multipart/form-data' method = POST name = 'altUsuario'>
					<h2>EDITAR USUÁRIO</h2><br>
					<p>ID</p><br><input maxlength = 4 name = 'id_usuario' size = 3em type = 'text' value = "<?php echo $valor['id_usuario'];?>" readonly><br><br>
					<p>Nome de exibição</p><br><input maxlength = 50 name = 'nick_usuario' size = 50em type = 'text' value = "<?php echo $valor['nick_usuario'];?>" required><br><br>
					<p>Nome completo</p><br><input maxlength = 1000 name = 'full_usuario' size = 50em type = 'text' value = "<?php echo $valor['full_usuario'];?>" required><br><br>
					<p style = 'float: left; margin-left: 36em;'>Data de nascimento</p> 
					<p style = 'float: right; margin-right: 31.75em;'>Ano de batismo</p><br><br>
						<input maxlength = 10 name = 'idade_usuario' style = 'float: left; margin-left: 38.8em;' size = 35em type = 'text' value = "<?php echo $valor['idade_usuario'];?>" required>
						<input maxlength = 4 name = 'desde_usuario' style = 'float: right; margin-right: 38.8em;' size = 4em type = 'text' value = "<?php echo $valor['desde_usuario'];?>" required><br><br><br>
					<p>CPF</p><br><input maxlength = 14 name = 'cpf_usuario' size = 50em type = 'text' value = "<?php echo $valor['cpf_usuario'];?>" required><br><br>
					<p>Telefone</p><br><input maxlength = 13 name = 'telefone_usuario' size = 50em type = 'text' value = "<?php echo $valor['telefone_usuario'];?>" required><br><br>
					<p style = 'float: left; margin-left: 38em;'>Endereço</p> 
					<p style = 'float: right; margin-right: 34em;'>Nº</p><br><br>
						<input maxlength = 75 name = 'end_usuario' style = 'float: left; margin-left: 38.8em;' size = 35em type = 'text' value = "<?php echo $valor['end_usuario'];?>" required>
						<input maxlength = 5 name = 'num_usuario' style = 'float: right; margin-right: 38.8em;' size = 4em type = 'text' value = "<?php echo $valor['num_usuario'];?>" required><br><br><br>
					<p style = 'float: left; margin-left: 36em;'>Bairro</p> 
					<p style = 'float: right; margin-right: 36em;'>Cidade</p><br><br>
						<input maxlength = 75 name = 'bairro_usuario' style = 'float: left; margin-left: 38.7em;' size = 20em type = 'text' value = "<?php echo $valor['bairro_usuario'];?>" required>
						<input maxlength = 75 name = 'cidade_usuario' style = 'float: right; margin-right: 38.7em;' size = 20em type = 'text' value = "<?php echo $valor['cidade_usuario'];?>" required><br><br><br>
					<p>Cargo</p><br>
					<select name = 'cargo_usuario' required><br><br>
						<option value = 'Visitante'>Visitante</option>
						<option value = 'Membro'>Membro</option>
						<option value = 'Membra'>Membra</option>
						<option value = 'Ministro'>Ministro</option>
						<option value = 'Ministra'>Ministra</option>
						<option value = 'Líder'>Líder</option>
						<option value = 'Diácono'>Diácono</option>
						<option value = 'Diaconisa'>Diaconisa</option>
						<option value = 'Evangelista'>Evangelista</option>
						<option value = 'Missionário'>Missionário</option>
						<option value = 'Missionária'>Missionária</option>
						<option value = 'Presbítero'>Presbítero</option>
						<option value = 'Presbítera'>Presbítera</option>
						<option value = 'Pastor'>Pastor</option>
						<option value = 'Pastora'>Pastora</option>
					</select><br><br>
					<p>Carregar foto</p>
					<br><input type = 'file' name = 'foto_usuario' id = 'foto_usuario' class = 'btn2'><br><br><br>
					<input style = 'margin-right: 2.125em;' type = 'submit' value = 'ATUALIZAR'>
					<a href = 'deletar_usuario.php?id=<?php echo $valor['id_usuario'];?>' style = 'background-color: red; border: 0.0625em solid red; color: white; font-family: "Oswald", sans-serif; font-size: 0.8333125em; padding: 0.95em 3.45em 0.95em 3.45em; text-align: center; text-decoration: none; transition: .3s;'>DELETAR</a>
				</form><br><br>
<?php
			} else {
				echo '<h2>USUÁRIO NÃO CADASTRADO.</h2><br><br>';
				echo "<a class = 'btn' href = 'cadastrar_usuario'>CADASTRAR USUÁRIO</a>";
			}
		} else {
			echo '<h2>ERRO DE CONSULTA.</h2><br><br>';
			echo "<a class = 'btn' href = 'busca_usuario'>BUSCAR USUÁRIO</a>";
		}
	} else {
		echo '<h2>ERRO DE CONEXÃO.</h2>';
	}
	include 'temp/footer.php';
?>