<?php
	$pageTitle = "Fila Atualizada | BIBLIOIECP";
	include 'temp/header.php';
	$id_fila = $_POST['id_fila'];
	$dia_emprestimo = $_POST['dia_emprestimo'];
	$mes_emprestimo = $_POST['mes_emprestimo'];
	$ano_emprestimo = $_POST['ano_emprestimo'];
	$dia_devolucao = $_POST['dia_devolucao'];
	$mes_devolucao = $_POST['mes_devolucao'];
	$ano_devolucao = $_POST['ano_devolucao'];
	$emprestimo_fila = $ano_emprestimo . "-" . $mes_emprestimo . "-" . $dia_emprestimo;
	$devolucao_fila = $ano_devolucao . "-" . $mes_devolucao . "-" . $dia_devolucao;
	if($con){
		$sql = "UPDATE fila SET
					emprestimo_fila = '$emprestimo_fila',
					devolucao_fila = '$devolucao_fila'
				WHERE id_fila = $id_fila;";
		$rs = mysqli_query($con, $sql);
		if($rs){
			echo "<br><br><br><br><img src = 'https://trello-attachments.s3.amazonaws.com/5bd4add901b2c48729f82775/5bffefae0267697242dc1c65/f9d1203a0214da51051ee55bb1f23ab9/GreenCheck.gif'>";
			echo '<br><h2>USUÁRIO ATUALIZADO COM SUCESSO!</h2><br><br><br><br><br>';
			echo "<a class = 'btn' href = 'fila?id=$id_fila' style = 'margin-right: 0.625em;'>VER FILA</a>";
			echo "<a class = 'btn' href = 'index' style = 'margin-left: 0.625em;'>PÁGINA INICIAL</a>";
		} else {
			echo '<h2>ERRO DE ALTERAÇÃO.</h2><br><br>';
			echo "<a class = 'btn' href = 'editar_fila?id=$id_usuario' style = 'margin-right: 0.625em;'>TENTAR NOVAMENTE</a>";
			echo "<a class = 'btn' href = 'index' style = 'margin-left: 0.625em;'>PÁGINA INICIAL</a>";
		}
	} else {
		echo '<h2>ERRO DE CONEXÃO.</h2>';
		echo "<a class = 'btn' href = 'index'>PÁGINA INICIAL</a>";
	}
	include 'temp/footer.php';
?>