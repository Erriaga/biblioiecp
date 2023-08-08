<?php
	$pageTitle = "Editar Fila | BIBLIOIECP";
	include 'temp/header.php';
	if($con){
		$sql = "SELECT * FROM fila
				WHERE id_fila = " . $_GET['id'];
		$rs = mysqli_query($con, $sql);
		if($rs){
			if($valor = mysqli_fetch_array($rs)){
?>
				<form action = 'atualizar_fila' autocomplete = 'off' enctype = 'multipart/form-data' method = POST name = 'altFila'>
					<h2>EDITAR FILA</h2><br>
					<p>ID</p><br><input maxlength = 4 name = 'id_fila' size = 3em type = 'text' value = "<?php echo $valor['id_fila'];?>" readonly><br><br>
					<p style = 'float: left; margin-left: 30.375em;'>Data de empréstimo</p>
					<p style = 'float: right; margin-right: 30.675em;'>Data de devolução</p><br><br>
						<input maxlength = 2 name = 'dia_emprestimo' placeholder = 'DD' style = 'float: left; margin-left: 32.375em;' size = 2em type = 'text' required>
						<input maxlength = 2 name = 'mes_emprestimo' placeholder = 'MM' style = 'float: left; margin-left: 1em;' size = 2em type = 'text' required>
						<input maxlength = 4 name = 'ano_emprestimo' placeholder = 'AAAA' style = 'float: left; margin-left: 1em;' size = 4em type = 'text' required>
						<input maxlength = 2 name = 'dia_devolucao' placeholder = 'DD' style = 'float: left; margin-left: 2.375em;' size = 2em type = 'text' required>
						<input maxlength = 2 name = 'mes_devolucao' placeholder = 'MM' style = 'float: left; margin: 0em 1em 0em 1em;' size = 2em type = 'text' required>
						<input maxlength = 4 name = 'ano_devolucao' placeholder = 'AAAA' style = 'float: left; margin-right: 30em;' size = 4em type = 'text' required><br><br><br><br>
					<input style = 'margin-right: 2.125em;' type = 'submit' value = 'ATUALIZAR'>
					<a href = 'deletar_fila.php?id=<?php echo $valor['id_fila'];?>' style = 'background-color: red; border: 0.0625em solid red; color: white; font-family: "Oswald", sans-serif; font-size: 0.8333125em; padding: 0.95em 3.45em 0.95em 3.45em; text-align: center; text-decoration: none; transition: .3s;'>DELETAR</a>
				</form><br><br>
<?php
			} else {
				echo '<h2>FILA NÃO CADASTRADA.</h2><br><br>';
				echo "<a class = 'btn' href = 'cadastrar_fila'>CADASTRAR FILA</a>";
			}
		} else {
			echo '<h2>ERRO DE CONSULTA.</h2><br><br>';
			echo "<a class = 'btn' href = 'pedidos'>VER PEDIDOS</a>";
		}
	} else {
		echo '<h2>ERRO DE CONEXÃO.</h2>';
	}
	include 'temp/footer.php';
?>