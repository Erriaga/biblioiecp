<?php
	$pageTitle = "Consulta de Usuário | BIBLIOIECP";
	include 'temp/header.php';
	if($con){
		$sql = "SELECT * FROM usuario
				WHERE id_usuario = " . $_GET['id'];
		$rs = mysqli_query($con, $sql);
		if($rs){
			while($valor = mysqli_fetch_array($rs)){
				$user = strtoupper($valor['nick_usuario']);
				if ($valor['desde_usuario'] == 0) {
					$nsa = "Não se aplica";
				} else {
					$nsa = $valor['desde_usuario'];
				}
				$tz  = new DateTimeZone('America/Sao_Paulo');
				$age = DateTime::createFromFormat('d/m/Y', $valor['idade_usuario'], $tz)
					->diff(new DateTime('now', $tz))
					->y;
?>
			<div id = 'img'>
				<img class = 'fade' style = 'float: left; margin-left: 9.375em; position: relative;' src = "<?php echo 'img_users/' . $valor['foto_usuario']; ?>" height = 300em width = 300em>
			</div>
			<div id = 'text'>
				<h1 style = 'float: left; font-size: 2.8125em; font-weight: initial; margin: 0em 0em 0em -19.22em; text-align: left;'><b><?php echo $user; ?></b></h1><br><br>
				<h2 style = 'float: left; font-size: 1.25em; font-weight: normal; margin: 0.5em 0em 0em -43.25em; text-align: left;'><?php echo $valor['cargo_usuario'] . " / " . $age . " anos";?></h2>
				<p style = 'float: left; margin: 3.75em 0em 0em -54em;'><b>Rol Nº: </b></p>
				<p style = 'float: left; margin: 3.75em 0em 0em -51.25em;'><?php echo $valor['id_usuario']; ?></p>
				<p style = 'float: left; font-family: "Oswald"; margin: 5em 0em 0em -54em;'><b>Nome completo: </b></p>
				<p style = 'float: left; font-family: "Oswald"; margin: 5em 0em 0em -48em;'><?php echo $valor['full_usuario']; ?></p>
				<p style = 'float: left; margin: 6.25em 0em 0em -54em;'><b>Data de nascimento: </b></p>
				<p style = 'float: left; margin: 6.25em 0em 0em -46.5em;'><?php echo $valor['idade_usuario']; ?></p>
				<p style = 'float: left; margin: 7.5em 0em 0em -54em;'><b>Ano de batismo: </b></p>
				<p style = 'float: left; margin: 7.5em 0em 0em -48em;'><?php echo $nsa; ?></p>
				<p style = 'float: left; margin: 8.75em 0em 0em -54em;'><b>CPF: </b></p>
				<p style = 'float: left; margin: 8.75em 0em 0em -52.25em;'><?php echo $valor['cpf_usuario']; ?></p>
				<p style = 'float: left; margin: 10em 0em 0em -54em;'><b>Telefone: </b></p>
				<p style = 'float: left; margin: 10em 0em 0em -50.625em;'><?php echo $valor['telefone_usuario']; ?></p>
				<p style = 'float: left; margin: 11.25em 0em 0em -54em;'><b>Mora na </b></p>
				<p style = 'float: left; margin: 11.25em 0em 0em -50.875em;'><?php echo $valor['end_usuario']; ?>, nº <?php echo $valor['num_usuario']; ?> - <?php echo $valor['bairro_usuario']; ?>, <?php echo $valor['cidade_usuario']; ?></p>
				<p style = 'float: left; margin: 13.75em 0em 0em -54em;'><b>Livro(s) alugado(s): </b></p>
				<p style = 'float: left; margin: 13.75em 0em 0em -46.875em; text-align: justify;'>
<?php
			$livros = "SELECT * FROM pedido
						INNER JOIN livro ON livro.id_livro = pedido.id_livro
						WHERE id_usuario = " . $_GET['id'];
			$rslivros = mysqli_query($con, $livros);
			if($rslivros){
				while($zeridade = mysqli_fetch_array($rslivros)){
					$dia_devolucao = substr($zeridade['devolucao_pedido'], -2);
					$mes_devolucao = substr($zeridade['devolucao_pedido'], 5, -3);
					$ano_devolucao = substr($zeridade['devolucao_pedido'], 0, -6);
					$devolucao_pedido = $dia_devolucao . "/" . $mes_devolucao . "/" . $ano_devolucao;
					echo $zeridade['nome_livro'] . " - Entregar no dia " . $devolucao_pedido . "<br>";
				}
				mysqli_free_result($rslivros);
			}
			if ($valor['livro_alugado'] == 0) {
				echo "Não há";
			}		
?>
			</p>
			</div><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<?php
			}
				mysqli_free_result($rs);
		} else {
			echo 'Erro de consulta de livro: ' . mysqli_error();
		}
	} else {
		echo 'Erro de conexão: ' . mysqli_error();
	}
	include 'temp/footer.php';
?>