<?php
	$pageTitle = "Pedido Inserido | BIBLIOIECP";
	include 'temp/header.php';
	$id_usuario = $_POST['id_usuario'];
	$id_livro = $_POST['id_livro'];
	$dia_emprestimo = $_POST['dia_emprestimo'];
	$mes_emprestimo = $_POST['mes_emprestimo'];
	$ano_emprestimo = $_POST['ano_emprestimo'];
	$dia_devolucao = $_POST['dia_devolucao'];
	$mes_devolucao = $_POST['mes_devolucao'];
	$ano_devolucao = $_POST['ano_devolucao'];
	$emprestimo_pedido = $ano_emprestimo . "-" . $mes_emprestimo . "-" . $dia_emprestimo;
	$devolucao_pedido = $ano_devolucao . "-" . $mes_devolucao . "-" . $dia_devolucao;
	if($con){
		$sql_insert = "INSERT INTO pedido(id_pedido, id_usuario, id_livro, emprestimo_pedido, devolucao_pedido)".
				"VALUES (null, '$id_usuario', '$id_livro', '$emprestimo_pedido', '$devolucao_pedido')";
		$rs_insert = mysqli_query($con, $sql_insert);
		$sql_update = "UPDATE usuario SET livro_alugado = 1 WHERE id_usuario = '$id_usuario'";
		$rs_update = mysqli_query($con, $sql_update);
		if($rs_insert && $rs_update){
			echo "<br><br><br><br><img src = 'https://trello-attachments.s3.amazonaws.com/5bd4add901b2c48729f82775/5bffefae0267697242dc1c65/f9d1203a0214da51051ee55bb1f23ab9/GreenCheck.gif'>";
			echo '<br><h2>PEDIDO CADASTRADO COM SUCESSO!</h2><br><br><br><br><br>';
			echo "<a class = 'btn' href = 'pedidos'>VER PEDIDOS</a>";
		} else {
			echo '<h2>ERRO DE CADASTRO.</h2><br><br><br><br><br>';
			echo "<a class = 'btn' href = 'cadastrar_pedido'>TENTAR NOVAMENTE</a>";
		}
	} else {
		echo '<h2>ERRO DE CONEXÃO.</h2>';
	}
	include 'temp/footer.php';
?>