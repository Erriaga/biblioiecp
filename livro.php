<?php
	$pageTitle = "Consulta de Livro | BIBLIOIECP";
	include 'temp/header.php';
	if($con){
		$sql = "SELECT * FROM livro
				WHERE id_livro = " . $_GET['id'];
		$rs = mysqli_query($con, $sql);
		if($rs){
			while($valor = mysqli_fetch_array($rs)){
				$protocolo = substr($valor['foto_livro'], 0, -30);
				$partesNome = explode(" ", $valor['autor_livro']);
				$ultimoNome = end($partesNome);
				$ref1 = strtoupper($ultimoNome);
				$acento1 = mb_strtoupper($ref1, 'UTF-8');
				$livro = strtoupper($valor['nome_livro']);
				$acento2 = mb_strtoupper($livro, 'UTF-8');
				$ref2 = implode(" ", array_slice($partesNome, 0, -1));
?>
			<div id = 'img'>
				<img class = 'fade' style = 'float: left; margin-left: 11em; position: relative;' src = "<?php echo 'img_books/' . $valor['foto_livro'];?>" height = 400em width = 256em>
				<p style = 'float: left; margin: 25.5em 0em 0em -16em;'>Informações adicionais:</p>
				<p style = 'float: left; text-align: justify; text-indent: 1.75em; text-justify: inter-word; margin: 26.75em 0em 0em -16em; height: 6.25em; width: 15.75em;'><?php echo "<b>Autor:</b> " . $valor['autor_livro'];?></p>
				<p style = 'float: left; text-align: justify; text-indent: 1.75em; text-justify: inter-word; margin: 28em 0em 0em -16em; height: 6.25em; width: 15.75em;'><?php echo "<b>Editora:</b> " . $valor['editora_livro'];?></p>
				<p style = 'float: left; text-align: justify; text-indent: 1.75em; text-justify: inter-word; margin: 29.25em 0em 0em -16em; height: 6.25em; width: 15.75em;'><?php echo "<b>Gênero:</b> " . $valor['genero_livro'];?></p>
				<p style = 'float: left; text-align: justify; text-indent: 1.75em; text-justify: inter-word; margin: 30.5em 0em 0em -16em; height: 6.25em; width: 15.75em;'><?php echo "<b>Prateleira:</b> " . $valor['prateleira_livro'];?></p>
				<p style = 'float: left; text-align: justify; text-indent: 1.75em; text-justify: inter-word; margin: 31.75em 0em 0em -16em; height: 6.25em; width: 15.75em;'><?php echo "<b>Edição:</b> " . $valor['edicao_livro'] . "ª";?></p>
				<p style = 'float: left; text-align: justify; text-indent: 1.75em; text-justify: inter-word; margin: 33em 0em 0em -16em; height: 6.25em; width: 15.75em;'><?php echo "<b>Ano:</b> " . $valor['ano_livro'];?></p>
				<p style = 'float: left; text-align: justify; text-indent: 1.75em; text-justify: inter-word; margin: 34.25em 0em 0em -16em; height: 6.25em; width: 15.75em;'><?php echo "<b>Volume:</b> " . $valor['vol_livro'];?></p>
				<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
			</div>
			<div id = 'text'>
				<h1 style = 'font-size: 2.8125em; font-weight: initial; margin: -11.25em 0em 0em 11em; text-align: left; '><b><?php echo $acento2;?></b></h1><br><br>
				<h2 style = 'float: left; font-size: 1.25em; font-weight: normal; margin: -2.75em 0em 0em 24.75em; text-align: left;'><?php echo "[" . $protocolo . "] " . $acento1;?></h2>
				
<?php
				$sql_pedido = "SELECT COUNT(*) AS quantidade_livros FROM pedido
					INNER JOIN livro ON pedido.id_livro = livro.id_livro
					WHERE pedido.id_livro = " . $_GET['id'];
				$result = mysqli_query($con, $sql_pedido);
				$data = mysqli_fetch_assoc($result);
				$count = $data['quantidade_livros'];
				if ($count == 0){
					$classe = "btn";
					$lista = "";
					$mensagem = "CADASTRAR PEDIDO";
					$aviso = "";
				} else {
					$classe = "ind";
					$lista = "wl";
					$mensagem = "LIVRO INDISPONÍVEL";
					$aviso = "+ ADICIONAR NA LISTA DE ESPERA";
				}
?>
				<a class = <?php echo $classe;?> href = <?php echo "cadastrar_pedido?id=" . $_GET['id'];?> style = 'float: left; margin: -1em 0em 0em 30.9375em;'><?php echo $mensagem;?></a>
				<a class = <?php echo $lista;?> href = <?php echo "cadastrar_fila?id=" . $_GET['id'];?> style = 'float: left; margin: -3.5em 0em 0em 45em;'><?php echo $aviso;?></a><br>
				<p style = 'text-align: justify; text-indent: 1.75em; text-justify: inter-word; margin: 3em 6.25em 0em 30.9375em; height: 6.25em;'><?php echo $valor['desc_livro'];?></p>
			</div><br>
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