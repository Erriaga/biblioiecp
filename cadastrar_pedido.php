<?php
	$pageTitle = "Cadastro de Pedido | BIBLIOIECP";
	include 'temp/header.php';
	if (isset($_GET['id'])){ 
		$id = $_GET['id'];
	} else {
		$id = null;
	}
?>
	<form action = 'inserir_pedido' autocomplete = 'off' enctype = 'multipart/form-data' method = POST name = 'incInserirPedido'>
		<h2>CADASTRO DE PEDIDO</h2><br>
		<p style = 'float: left; margin-left: 34.75em;'>ID do Livro</p> 
		<p style = 'float: right; margin-right: 34.25em;'>ID do Usuário</p><br><br>
			<input maxlength = 4 name = 'id_livro' style = 'float: left; margin-left: 41.5em;' size = 3 type = 'text' value = '<?php echo $id;?>' required>
			<input maxlength = 4 name = 'id_usuario' style = 'float: right; margin-right: 41.5em;' size = 3 type = 'text' required><br><br><br>
		<p style = 'float: left; margin-left: 30.375em;'>Data de empréstimo</p>
		<p style = 'float: right; margin-right: 30.675em;'>Data de devolução</p><br><br>
			<input maxlength = 2 name = 'dia_emprestimo' placeholder = 'DD' style = 'float: left; margin-left: 32.375em;' size = 2em type = 'text' required>
			<input maxlength = 2 name = 'mes_emprestimo' placeholder = 'MM' style = 'float: left; margin-left: 1em;' size = 2em type = 'text' required>
			<input maxlength = 4 name = 'ano_emprestimo' placeholder = 'AAAA' style = 'float: left; margin-left: 1em;' size = 4em type = 'text' required>
			<input maxlength = 2 name = 'dia_devolucao' placeholder = 'DD' style = 'float: left; margin-left: 2.375em;' size = 2em type = 'text' required>
			<input maxlength = 2 name = 'mes_devolucao' placeholder = 'MM' style = 'float: left; margin: 0em 1em 0em 1em;' size = 2em type = 'text' required>
			<input maxlength = 4 name = 'ano_devolucao' placeholder = 'AAAA' style = 'float: left; margin-right: 30em;' size = 4em type = 'text' required><br><br><br><br>
		<input style = 'margin-right: 1em;' type = 'submit' value = 'CADASTRAR'>
		<a href = 'index' style = 'background-color: red; border: 0.0625em solid red; color: white; font-family: "Oswald", sans-serif; font-size: 0.8333125em; margin-left: 1em; padding: 0.95em 3.45em 0.95em 3.45em; text-align: center; text-decoration: none;'>CANCELAR</a>
	</form><br><br>
<?php
	include 'temp/footer.php';
?>