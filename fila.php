<?php
	$pageTitle = "Lista de Espera | BIBLIOIECP";
	include 'temp/header.php';
	if($con){
		$sql = "SELECT * FROM fila
				INNER JOIN livro ON livro.id_livro = fila.id_livro
				INNER JOIN usuario ON usuario.id_usuario = fila.id_usuario
				WHERE fila.id_livro = ". $_GET['id'] ."
				ORDER BY fila.emprestimo_fila;";
		$rs = mysqli_query($con, $sql);
		$sql_nome = "SELECT nome_livro AS nome_livro FROM livro
				WHERE id_livro = " . $_GET['id'];
		$rs_nome = mysqli_query($con, $sql_nome);
		$data = mysqli_fetch_assoc($rs_nome);
		$livro = $data['nome_livro'];
		if($rs){
			if(mysqli_num_rows($rs) > 0){
				echo '<h2>LISTA DE ESPERA DO LIVRO - ' .  $livro . ' </h2><br>
					<table align = "center" border = 0em width = 80%>
						<tr>
							<th>Foto</th>
							<th>Nome</th>
							<th>Data de empréstimo</th>
							<th>Data de devolução</th>
							<th>Editar</th>
						</tr>
						<tr>';
			}
			while($valor = mysqli_fetch_array($rs)){
				$dia_emprestimo = substr($valor['emprestimo_fila'], -2);
				$mes_emprestimo = substr($valor['emprestimo_fila'], 5, -3);
				$ano_emprestimo = substr($valor['emprestimo_fila'], 0, -6);
				$dia_devolucao = substr($valor['devolucao_fila'], -2);
				$mes_devolucao = substr($valor['devolucao_fila'], 5, -3);
				$ano_devolucao = substr($valor['devolucao_fila'], 0, -6);
				$emprestimo_fila = $dia_emprestimo . "/" . $mes_emprestimo . "/" . $ano_emprestimo;
				$devolucao_fila = $dia_devolucao . "/" . $mes_devolucao . "/" . $ano_devolucao;

?>
						<td align = 'center'><img src = "<?php echo 'img_users/' . $valor['foto_usuario'];?>" height = 80 width = 80></td>
						<td align = 'center'><a href = 'usuario?id=<?php echo $valor['id_usuario'];?>' style = 'text-decoration: none;'><?php echo $valor['nick_usuario'];?></a></td>
						<td align = 'center'><?php echo $emprestimo_fila;?></td>
						<td align = 'center'><?php echo $devolucao_fila;?></td>
						<td align = 'center'><a href = 'editar_fila?id=<?php echo $valor['id_fila'];?>'><img width = 15 src = 'edit.png'></a></td>
					</tr>
<?php
			}
			if(mysqli_num_rows($rs) == 0){
				echo '<h2>LISTA DE ESPERA DO LIVRO - ' .  $livro . '</h2>';
				echo '<p>Não existem pedidos em espera.</p><br>';
			}
				mysqli_free_result($rs);
				echo '</table><br><br>';
				echo "<a class = 'btn' href = 'cadastrar_fila?id=" . $_GET['id'] . "' style = 'margin-right: 0.625em;'>CADASTRAR FILA</a>";
				echo "<a class = 'btn' href = 'pedidos' style = 'margin-left: 0.625em;'>VER PEDIDOS</a>";
		} else {
			echo '<h2>ERRO DE CONSULTA.</h2><br><br>';
			echo "<a class = 'btn' href = 'index'>VOLTAR PARA A PÁGINA INICIAL</a>";
		}
	} else {
		echo '<h2>ERRO DE CONEXÃO.</h2>';
	}
	include 'temp/footer.php';
?>