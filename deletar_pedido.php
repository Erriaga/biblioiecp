<?php
	$pageTitle = "Pedido Deletado | BIBLIOIECP";
	include 'temp/header.php';
	$id_pedido = $_GET['id'];
	if($con){
		$sql_count = "SELECT COUNT(*) AS quantidade_livros FROM pedido
				INNER JOIN usuario ON pedido.id_usuario = usuario.id_usuario
				WHERE usuario.id_usuario = (SELECT id_usuario FROM pedido
				WHERE id_pedido = $id_pedido);";
		$result = mysqli_query($con, $sql_count);
		$data = mysqli_fetch_assoc($result);
		$count = $data['quantidade_livros'];
		if($count > 1){
			$sql_update = "UPDATE usuario SET livro_alugado = 1
				WHERE id_usuario = (SELECT id_usuario FROM pedido
				WHERE id_pedido = $id_pedido);";
			} else {
			$sql_update = "UPDATE usuario SET livro_alugado = 0
				WHERE id_usuario = (SELECT id_usuario FROM pedido
				WHERE id_pedido = $id_pedido);";
			}
		$rs_update = mysqli_query($con, $sql_update);
		$sql_livro = "SELECT id_livro FROM pedido WHERE id_pedido = " . $_GET['id'];
		$rs_livro = mysqli_query($con, $sql_livro);
		$data_livro = mysqli_fetch_assoc($rs_livro);
		$count_livro = $data_livro['id_livro'];
		$sql_fila = "SELECT id_usuario AS id_usuario,
				emprestimo_fila AS emprestimo_fila,
				devolucao_fila AS devolucao_fila FROM fila
				WHERE id_livro = $count_livro
				ORDER BY emprestimo_fila LIMIT 1";
		$rs_fila = mysqli_query($con, $sql_fila);
		if(mysqli_num_rows($rs_fila) > 0){
			$data_fila = mysqli_fetch_assoc($rs_fila);
			$id_primeiro = $data_fila['id_usuario'];
			$emprestimo_primeiro = $data_fila['emprestimo_fila'];
			$devolucao_primeiro = $data_fila['devolucao_fila'];
			$sql_filaup = "UPDATE pedido SET
				id_usuario = $id_primeiro,
				emprestimo_pedido = '$emprestimo_primeiro',
				devolucao_pedido = '$devolucao_primeiro'
				WHERE id_livro = $count_livro";
			$sql_livroup = "UPDATE usuario SET livro_alugado = 1
					WHERE id_usuario = $id_primeiro;";
			$rs_filaup = mysqli_query($con, $sql_filaup);
			$rs_livroup = mysqli_query($con, $sql_livroup);
			$sql_deleteup = "DELETE FROM fila WHERE id_usuario = $id_primeiro";
			$rs_deleteup = mysqli_query($con, $sql_deleteup);
		} else {
			$sql_delete = "DELETE FROM pedido
				WHERE id_pedido = $id_pedido;";
			$rs_delete = mysqli_query($con, $sql_delete);
		}
		if(($rs_fila || $rs_delete) && $rs_update){
			echo "<br><br><br><br><img src = 'https://trello-attachments.s3.amazonaws.com/5bd4add901b2c48729f82775/5bffefae0267697242dc1c65/f9d1203a0214da51051ee55bb1f23ab9/GreenCheck.gif'>";
			echo '<br><h2>PEDIDO DELETADO COM SUCESSO!</h2>';
			echo '<h3>A FILA FOI ATUALIZADA</h3><br><br>';
			echo "<a class = 'btn' href = 'pedidos' style = 'margin-right: 0.625em;'>VER PEDIDOS</a>";
			echo "<a class = 'btn' href = 'index' style = 'margin-left: 0.625em;'>PÁGINA INICIAL</a><br><br><br><br><br>";
		} else {
			echo '<h2>ERRO DE EXCLUSÃO.</h2><br><br>';
			echo "<a class = 'btn' href = 'pedidos'>VER PEDIDOS</a>";
		}
	} else {
		echo '<h2>ERRO DE CONEXÃO.</h2>';
	}
	include 'temp/footer.php';
?>