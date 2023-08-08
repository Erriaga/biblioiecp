<?php
	$pageTitle = "Livro Atualizado | BIBLIOIECP";
	include 'temp/header.php';
	$id_livro = $_POST['id_livro'];
	$nome_livro = $_POST['nome_livro'];
	$autor_livro = $_POST['autor_livro'];
	$editora_livro = $_POST['editora_livro'];
	$genero_livro = $_POST['genero_livro'];
	$prateleira_livro = $_POST['prateleira_livro'];
	$edicao_livro = $_POST['edicao_livro'];
	$ano_livro = $_POST['ano_livro'];
	$vol_livro = $_POST['vol_livro'];
	$desc_livro = $_POST['desc_livro'];
	$lower1 = strtolower($nome_livro);
	$lower2 = strtolower($autor_livro);
	$lower3 = strtolower($genero_livro);
	$noblank1 = str_replace(' ', '', $lower1);
	$noblank2 = str_replace(' ', '', $lower2);
	$noblank3 = str_replace(' ', '', $lower3);
	$lower4 = strtolower($prateleira_livro);
	$var_livro = ($ano_livro . $noblank1 . $noblank2 . $noblank3 . $lower4);
	if($con){
		$sql = "UPDATE livro SET
					nome_livro = '$nome_livro',
					autor_livro = '$autor_livro',
					var_livro = '$var_livro',
					editora_livro = '$editora_livro',
					genero_livro = '$genero_livro',
					prateleira_livro = '$prateleira_livro',
					edicao_livro = '$edicao_livro',
					ano_livro = '$ano_livro',
					vol_livro = '$vol_livro',
					desc_livro = '$desc_livro'
				WHERE id_livro = $id_livro;";
		$rs = mysqli_query($con, $sql);
		if($rs){
			echo "<br><br><br><br><img src = 'https://trello-attachments.s3.amazonaws.com/5bd4add901b2c48729f82775/5bffefae0267697242dc1c65/f9d1203a0214da51051ee55bb1f23ab9/GreenCheck.gif'>";
			echo '<br><h2>LIVRO ATUALIZADO COM SUCESSO!</h2><br><br><br><br><br>';
			echo "<a class = 'btn' href = 'livro?id=$id_livro' style = 'margin-right: 0.625em;'>VISUALIZAR LIVRO</a>";
			echo "<a class = 'btn' href = 'busca_livro' style = 'margin-left: 0.625em; margin-right: 0.625em;'>BUSCAR LIVRO</a>";
			echo "<a class = 'btn' href = 'index' style = 'margin-left: 0.625em;'>PÁGINA INICIAL</a>";
		} else {
			echo '<h2>ERRO DE ALTERAÇÃO.</h2><br><br>';
			echo "<a class = 'btn' href = 'editar_livro?id=$id_livro' style = 'margin-right: 0.625em;'>TENTAR NOVAMENTE</a>";
			echo "<a class = 'btn' href = 'index' style = 'margin-left: 0.625em;'>PÁGINA INICIAL</a>";
		}
	} else {
		echo '<h2>ERRO DE CONEXÃO.</h2>';
		echo "<a class = 'btn' href = 'index'>PÁGINA INICIAL</a>";
	}
	include 'temp/footer.php';
?>