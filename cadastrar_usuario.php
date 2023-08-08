<?php
	$pageTitle = "Cadastro de Usuário | BIBLIOIECP";
	include 'temp/header.php';
?>
	<form action = 'inserir_usuario' autocomplete = 'off' enctype = 'multipart/form-data' method = POST name = 'incInserirUsuario'>
		<h2>CADASTRO DE USUÁRIOS</h2><br>
		<p>Nome de exibição</p><br><input maxlength = 50 name = 'nick_usuario' size = 50em type = 'text' required><br><br>
		<p>Nome completo</p><br><input maxlength = 1000 name = 'full_usuario' size = 50em type = 'text' required><br><br>
		<p style = 'float: left; margin-left: 36em;'>Data de nascimento</p> 
		<p style = 'float: right; margin-right: 31.75em;'>Ano de batismo</p><br><br>
			<input maxlength = 10 name = 'idade_usuario' placeholder = 'DD/MM/AAAA' style = 'float: left; margin-left: 38.8em;' size = 35em type = 'text' required>
			<input maxlength = 4 name = 'desde_usuario' placeholder = 'AAAA' style = 'float: right; margin-right: 38.8em;' size = 4em type = 'text' required><br><br><br>
		<p>CPF</p><br><input maxlength = 14 name = 'cpf_usuario' placeholder = 'Ex: 123.456.789-09' size = 50em type = 'text' required><br><br>
		<p>Telefone</p><br><input maxlength = 13 name = 'telefone_usuario' placeholder = 'Ex: 5512912345678' size = 50em type = 'text' required><br><br>
		<p style = 'float: left; margin-left: 38em;'>Endereço</p> 
		<p style = 'float: right; margin-right: 34em;'>Nº</p><br><br>
			<input maxlength = 75 name = 'end_usuario' style = 'float: left; margin-left: 38.8em;' size = 35em type = 'text' required>
			<input maxlength = 5 name = 'num_usuario' style = 'float: right; margin-right: 38.8em;' size = 4em type = 'text' required><br><br><br>
		<p style = 'float: left; margin-left: 36em;'>Bairro</p> 
		<p style = 'float: right; margin-right: 36em;'>Cidade</p><br><br>
			<input maxlength = 75 name = 'bairro_usuario' style = 'float: left; margin-left: 38.7em;' size = 20em type = 'text' required>
			<input maxlength = 75 name = 'cidade_usuario' style = 'float: right; margin-right: 38.7em;' size = 20em type = 'text' required><br><br><br>
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
		</select><br>
		<br><input type = 'file' name = 'foto_usuario' id = 'foto_usuario' class = 'btn2'><br><br>
		<input style = 'margin-right: 1.375em;' type = 'submit' value = 'CADASTRAR'>
		<a href = 'index' style = 'background-color: red; border: 0.0625em solid red; color: white; font-family: "Oswald", sans-serif; font-size: 0.8333125em; padding: 0.95em 3.45em 0.95em 3.45em; text-align: center; text-decoration: none; transition: .3s;'>CANCELAR</a>
	</form><br><br>
<?php
	include 'temp/footer.php';
?>