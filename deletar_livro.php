<?php
	$pageTitle = "Livro Deletado | BIBLIOIECP";
	include 'temp/header.php';
	$id_livro = $_GET['id'];
	$sql_foto = "SELECT foto_livro AS foto_livro FROM livro
			WHERE id_livro = $id_livro;";
	$rs_foto = mysqli_query($con, $sql_foto);
	if(mysqli_num_rows($rs_foto) > 0){
		$linha = mysqli_fetch_assoc($rs_foto);
		$nome = $linha['foto_livro'];
		$caminho = "C:/xampp/htdocs/biblioiecp/img_books/";
		if(unlink($caminho . $nome)){
			echo "<br><br><br><br><img src = 'https://trello-attachments.s3.amazonaws.com/5bd4add901b2c48729f82775/5bffefae0267697242dc1c65/f9d1203a0214da51051ee55bb1f23ab9/GreenCheck.gif'>";
		}
	}
	if($con){
		$sql = "DELETE FROM livro
				WHERE id_livro = $id_livro;";
		$rs = mysqli_query($con, $sql);
		if($rs){
			echo '<br><h2>LIVRO DELETADO COM SUCESSO!</h2><br><br>';
			echo "<a class = 'btn' href = 'busca_livro' style = 'margin-right: 0.625em;'>BUSCAR LIVRO</a>";
			echo "<a class = 'btn' href = 'index' style = 'margin-left: 0.625em;'>PÁGINA INICIAL</a><br><br><br><br><br>";
		} else {
			echo '<h2>ERRO DE EXCLUSÃO.</h2><br><br>';
			echo "<a class = 'btn' href = 'busca_livro'>TENTAR NOVAMENTE</a>";
		}
	} else {
		echo '<h2>ERRO DE CONEXÃO.</h2>';
	}
	include 'temp/footer.php';
?>