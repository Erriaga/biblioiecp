<?php
	$pageTitle = "Resultados da Busca | BIBLIOIECP";
	include 'temp/header.php';
	if($con){
		$conv = $_GET['var_usuario'];
		$nospc = str_replace(' ', '', $conv);
		$search = strtolower($nospc);
		$sql = "SELECT * FROM usuario
				WHERE var_usuario LIKE '%$search%'";
		$rs = mysqli_query($con, $sql);
		if($rs){
			if(mysqli_num_rows($rs) > 0){
				if ($search == "") {
					echo '<h2>RESULTADOS DA BUSCA POR TODOS OS USUÁRIOS</h2><br>
					<table align = "center" border = 0em width = 80%>
						<tr>
							<th>Nº ROL</th>
							<th>Foto</th>
							<th>Nome</th>
							<th>Cargo</th>
							<th>Editar</th>
						</tr>
						<tr>';
				} else {
				echo '<h2>RESULTADOS DA BUSCA POR "' .  $conv . '"</h2><br>
					<table align = "center" border = 0em width = 80%>
						<tr>
							<th>Nº ROL</th>
							<th>Foto</th>
							<th>Nome</th>
							<th>Cargo</th>
							<th>Editar</th>
						</tr>
						<tr>';
				}
			}
			while($valor = mysqli_fetch_array($rs)){
?>
						<th><?php echo $valor['id_usuario'];?></th>
						<td align = 'center'><img src = "<?php echo 'img_users/' . $valor['foto_usuario'];?>" height = 80 width = 80></td>
						<td align = 'center'><a href = 'usuario?id=<?php echo $valor['id_usuario'];?>' style = 'text-decoration: none;'><?php echo $valor['full_usuario'];?></a></td>
						<td align = 'center'><?php echo $valor['cargo_usuario'];?></td>
						<td align = 'center'><a href = 'editar_usuario?id=<?php echo $valor['id_usuario'];?>'><img width = 15 src = 'edit.png'></a></td>
					</tr>
<?php
			}
			if(mysqli_num_rows($rs) == 0){
				if ($search == "") {
					echo '<h2>RESULTADOS DA BUSCA POR TODOS OS USUÁRIOS</h2>';
					echo '<p>Não existe registro cadastrado. Busque por outro termo.</p><br>';
				} else {
					echo '<h2>RESULTADOS DA BUSCA POR "' .  $conv . '"</h2>';
					echo '<p>Não existe registro cadastrado. Busque por outro termo.</p><br>';
				}
			}
				mysqli_free_result($rs);
				echo '</table><br><br>';
				echo "<a class = 'btn' href = 'cadastrar_usuario' style = 'margin-right: 0.625em;'>CADASTRAR USUÁRIOS</a>";
				echo "<a class = 'btn' href = 'busca_usuario' style = 'margin-left: 0.625em;'>VOLTAR PARA A BUSCA</a>";
		} else {
			echo '<h2>ERRO DE CONSULTA.</h2><br><br>';
			echo "<a class = 'btn' href = 'busca_usuario'>VOLTAR PARA A BUSCA</a>";
		}
	} else {
		echo '<h2>ERRO DE CONEXÃO.</h2>';
	}
	include 'temp/footer.php';
?>