<?php
	$pageTitle = "Resultados da Busca | BIBLIOIECP";
	include 'temp/header.php';
	if($con){
		$conv = $_GET['var_livro'];
		$nospc = str_replace(' ', '', $conv);
		$search = strtolower($nospc);
		$sql = "SELECT * FROM livro
				WHERE var_livro LIKE '%$search%'";
		$rs = mysqli_query($con, $sql);
		if($rs){
			if(mysqli_num_rows($rs) > 0){
				if ($search == "") {
					echo '<h2>RESULTADOS DA BUSCA POR TODOS OS LIVROS</h2><br>
					<table align = "center" border = 0em width = 80%>
						<tr>
							<th>ID</th>
							<th>Foto</th>
							<th>Título</th>
							<th>Autor</th>
							<th>Prateleira</th>
							<th>Editar</th>
						</tr>
						<tr>';
				} else {
					echo '<h2>RESULTADOS DA BUSCA POR "' .  $conv . '"</h2><br>
					<table align = "center" border = 0em width = 80%>
						<tr>
							<th>ID</th>
							<th>Foto</th>
							<th>Título</th>
							<th>Autor</th>
							<th>Prateleira</th>
							<th>Editar</th>
						</tr>
						<tr>';
				}
			}
			while($valor = mysqli_fetch_array($rs)){
?>
						<th><?php echo $valor['id_livro'];?></th>
						<td align = 'center'><img src = "<?php echo 'img_books/' . $valor['foto_livro'];?>" height = 100em width = 64em></td>
						<td align = 'center'><a href = 'livro?id=<?php echo $valor['id_livro'];?>' style = 'text-decoration: none;'><?php echo $valor['nome_livro'];?></a></td>
						<td align = 'center'><?php echo $valor['autor_livro'];?></td>
						<td align = 'center'><?php echo $valor['prateleira_livro'];?></td>
						<td align = 'center'><a href = 'editar_livro?id=<?php echo $valor['id_livro'];?>'><img width = 15 src = 'edit.png'></a></td>
					</tr>
<?php
			}
			if(mysqli_num_rows($rs) == 0){
				if ($search == "") {
					echo '<h2>RESULTADOS DA BUSCA POR TODOS OS LIVROS</h2>';
					echo '<p>Não existe registro cadastrado. Busque por outro termo.</p><br>';
				} else {
					echo '<h2>RESULTADOS DA BUSCA POR "' .  $conv . '"</h2>';
					echo '<p>Não existe registro cadastrado. Busque por outro termo.</p><br>';
				}
			}
				mysqli_free_result($rs);
				echo '</table><br><br>';
				echo "<a class = 'btn' href = 'cadastrar_livro' style = 'margin-right: 0.625em;'>CADASTRAR LIVROS</a>";
				echo "<a class = 'btn' href = 'busca_livro' style = 'margin-left: 0.625em;'>VOLTAR PARA A BUSCA</a>";
		} else {
			echo '<h2>ERRO DE CONSULTA.</h2><br><br>';
			echo "<a class = 'btn' href = 'busca_livro'>VOLTAR PARA A BUSCA</a>";
		}
	} else {
		echo '<h2>ERRO DE CONEXÃO.</h2>';
	}
	include 'temp/footer.php';
?>