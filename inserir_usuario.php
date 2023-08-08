<?php
	$pageTitle = "Usuário Inserido | BIBLIOIECP";
	include 'temp/header.php';
	$nick_usuario = $_POST['nick_usuario'];
	$full_usuario = $_POST['full_usuario'];
	$idade_usuario = $_POST['idade_usuario'];
	$desde_usuario = $_POST['desde_usuario'];
	$cpf_usuario = $_POST['cpf_usuario'];
	$telefone_usuario = $_POST['telefone_usuario'];
	$end_usuario = $_POST['end_usuario'];
	$num_usuario = $_POST['num_usuario'];
	$bairro_usuario = $_POST['bairro_usuario'];
	$cidade_usuario = $_POST['cidade_usuario'];
	$cargo_usuario = $_POST['cargo_usuario'];
	$lower1 = strtolower($full_usuario);
	$lower2 = strtolower($cargo_usuario);
	$noblank = str_replace(' ', '', $lower1);
	$var_usuario = ($noblank . $lower2);
	if ($_FILES["foto_usuario"]["error"] == 0){
		$ext = substr($_FILES["foto_usuario"]["name"],
		strpos(strrev($_FILES["foto_usuario"]["name"]),".")*-1);			   
		$foto_usuario = md5(time().$_FILES["foto_usuario"]["name"]).".".$ext;			
		move_uploaded_file($_FILES["foto_usuario"]["tmp_name"], "img_users/" . $foto_usuario);
	}
	else {
		$foto_usuario = "semfoto.png";
	}
	if($con){
		$sql = "INSERT INTO usuario(nick_usuario, full_usuario, idade_usuario, desde_usuario, cpf_usuario, telefone_usuario, end_usuario, num_usuario, bairro_usuario, cidade_usuario, cargo_usuario, var_usuario, foto_usuario)".
				"VALUES ('$nick_usuario', '$full_usuario', '$idade_usuario', '$desde_usuario', '$cpf_usuario', '$telefone_usuario', '$end_usuario', '$num_usuario', '$bairro_usuario', '$cidade_usuario', '$cargo_usuario', '$var_usuario', '$foto_usuario')";
		$rs = mysqli_query($con, $sql);
		if($rs){
			echo "<br><br><br><br><img src = 'https://trello-attachments.s3.amazonaws.com/5bd4add901b2c48729f82775/5bffefae0267697242dc1c65/f9d1203a0214da51051ee55bb1f23ab9/GreenCheck.gif'>";
			echo '<br><h2>USUÁRIO CADASTRADO COM SUCESSO!</h2><br><br><br><br><br>';
			echo "<a class = 'btn' href = 'busca_usuario'>PESQUISAR USUÁRIOS</a>";
		} else {
			echo '<h2>ERRO DE CADASTRO.</h2><br><br>';
			echo "<a class = 'btn' href = 'cadastrar_usuario'>TENTAR NOVAMENTE</a>";
		}
	} else {
		echo '<h2>ERRO DE CONEXÃO.</h2>';
	}
	include 'temp/footer.php';
?>