<?php
	$pageTitle = "Fila Inserida | BIBLIOIECP";
	include 'temp/header.php';
	$id_usuario = $_POST['id_usuario'];
	$id_livro = $_POST['id_livro'];
	$dia_emprestimo = $_POST['dia_emprestimo'];
	$mes_emprestimo = $_POST['mes_emprestimo'];
	$ano_emprestimo = $_POST['ano_emprestimo'];
	$dia_devolucao = $_POST['dia_devolucao'];
	$mes_devolucao = $_POST['mes_devolucao'];
	$ano_devolucao = $_POST['ano_devolucao'];
	$emprestimo_fila = $ano_emprestimo . "-" . $mes_emprestimo . "-" . $dia_emprestimo;
	$devolucao_fila = $ano_devolucao . "-" . $mes_devolucao . "-" . $dia_devolucao;
	if($con){
		$sql = "INSERT INTO fila(id_fila, id_usuario, id_livro, emprestimo_fila, devolucao_fila)".
				"VALUES (null, '$id_usuario', '$id_livro', '$emprestimo_fila', '$devolucao_fila')";
		$rs = mysqli_query($con, $sql);
		if($rs){
			echo "<br><br><br><br><img src = 'https://trello-attachments.s3.amazonaws.com/5bd4add901b2c48729f82775/5bffefae0267697242dc1c65/f9d1203a0214da51051ee55bb1f23ab9/GreenCheck.gif'>";
			echo '<br><h2>FILA CADASTRADA COM SUCESSO!</h2><br><br><br><br><br>';
			echo "<a class = 'btn' href = 'fila?id=" . $id_livro . "'>VER FILA</a>";
		} else {
			echo '<h2>ERRO DE CADASTRO.</h2><br><br><br><br><br>';
			echo "<a class = 'btn' href = 'cadastrar_fila'>TENTAR NOVAMENTE</a>";
		}
	} else {
		echo '<h2>ERRO DE CONEXÃO.</h2>';
	}
	include 'temp/footer.php';
?>