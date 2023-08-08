<?php
	$pageTitle = "Livro Inserido | BIBLIOIECP";
	include 'temp/header.php';
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
	if ($_FILES["foto_livro"]["error"] == 0){
		$ext = substr($_FILES["foto_livro"]["name"],
		strpos(strrev($_FILES["foto_livro"]["name"]),".")*-1);			   
		$foto_livro = md5(time().$_FILES["foto_livro"]["name"]).".".$ext;			
		move_uploaded_file($_FILES["foto_livro"]["tmp_name"], "img_books/" . $foto_livro);
	}
	else {
		$foto_livro = "semfoto.png";
	}
	if($con){
		$sql = "INSERT INTO livro(nome_livro, autor_livro, var_livro, editora_livro, genero_livro, prateleira_livro, edicao_livro, ano_livro, vol_livro, desc_livro, foto_livro)".
				"VALUES ('$nome_livro', '$autor_livro', '$var_livro', '$editora_livro', '$genero_livro', '$prateleira_livro', '$edicao_livro', '$ano_livro', '$vol_livro', '$desc_livro', '$foto_livro')";
		$rs = mysqli_query($con, $sql);
		if($rs){
			echo "<br><br><br><br><img src = 'https://trello-attachments.s3.amazonaws.com/5bd4add901b2c48729f82775/5bffefae0267697242dc1c65/f9d1203a0214da51051ee55bb1f23ab9/GreenCheck.gif'>";
			echo '<br><h2>LIVRO CADASTRADO COM SUCESSO!</h2><br><br><br><br><br>';
			echo "<a class = 'btn' href = 'busca_livro'>PESQUISAR LIVROS</a>";
		} else {
			echo '<h2>ERRO DE CADASTRO.</h2><br><br>';
			echo "<a class = 'btn' href = 'cadastrar_livro'>TENTAR NOVAMENTE</a>";
		}
	} else {
		echo '<h2>ERRO DE CONEXÃO.</h2>';
	}
	include 'temp/footer.php';
?>