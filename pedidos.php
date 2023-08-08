<?php
	$pageTitle = "Lista de Devolução | BIBLIOIECP";
	date_default_timezone_set('America/Sao_Paulo');
	include 'temp/header.php';
	function hexBrightness($hexColor) {
        $r = hexdec(substr($hexColor, 1, 2));
        $g = hexdec(substr($hexColor, 3, 2));
        $b = hexdec(substr($hexColor, 5, 2));
        $brilho = ($r * 0.2126) + ($g * 0.7152) + ($b * 0.0722);
        return $brilho;
    }
    function getCorTexto($fundo) {
        $brilho = hexBrightness($fundo);
        return ($brilho > 200) ? 'black' : 'white';
    }
	if($con){
		$sql = "SELECT * FROM pedido
				INNER JOIN livro ON livro.id_livro = pedido.id_livro
				INNER JOIN usuario ON usuario.id_usuario = pedido.id_usuario
				ORDER BY pedido.devolucao_pedido, pedido.id_pedido;";
		$rs = mysqli_query($con, $sql);
		if($rs){
			if(mysqli_num_rows($rs) > 0){
				echo '<h2>LISTA DE DEVOLUÇÃO</h2><br>
					<table align = "center" border = 0em width = 80%>
						<tr>
							<th>Capa</th>
							<th>Nome do livro</th>
							<th>Nome do cliente</th>
							<th>Data de empréstimo</th>
							<th>Data de devolução</th>
							<th>Protocolo de renovação</th>							
							<th>Editar</th>
						</tr>';
			}
			while($valor = mysqli_fetch_array($rs)){
				$dataDev = new DateTime($valor['devolucao_pedido']);
				$dataAtual = new DateTime();
				$corFundo = substr($valor['foto_livro'], 0, -30);
				$fundo = "#" . $corFundo;
				$protocolo = strtoupper($corFundo);
				$corTexto = getCorTexto($fundo);
				$dia_emprestimo = substr($valor['emprestimo_pedido'], -2);
				$mes_emprestimo = substr($valor['emprestimo_pedido'], 5, -3);
				$ano_emprestimo = substr($valor['emprestimo_pedido'], 0, -6);
				$dia_devolucao = substr($valor['devolucao_pedido'], -2);
				$mes_devolucao = substr($valor['devolucao_pedido'], 5, -3);
				$ano_devolucao = substr($valor['devolucao_pedido'], 0, -6);
				$emprestimo_pedido = $dia_emprestimo . "/" . $mes_emprestimo . "/" . $ano_emprestimo;
				$devolucao_pedido = $dia_devolucao . "/" . $mes_devolucao . "/" . $ano_devolucao;
				$diferenca = $dataAtual->diff($dataDev);
				$dias = $diferenca->format('%R%a');
				if ($dias < 0) {
					$cor = "red";
				} elseif ($dias <= 2) {
					$cor = "orange";
				} else {
					$cor = "green";
				}
?>
					<tr>
						<td align = 'center'><img src = "<?php echo 'img_books/' . $valor['foto_livro'];?>" height = 100em width = 64em></td>
						<td align = 'center'><a href = 'livro?id=<?php echo $valor['id_livro'];?>' style = 'text-decoration: none;'><?php echo $valor['nome_livro'];?></a></td>
						<td align = 'center'><a href = 'usuario?id=<?php echo $valor['id_usuario'];?>' style = 'text-decoration: none;'><?php echo $valor['nick_usuario'];?></td>
						<td align = 'center'><?php echo $emprestimo_pedido;?></td>
						<td align = 'center' style = 'color:<?php echo $cor;?>;'><?php echo $devolucao_pedido;?></td>
						<td align = 'center' class = 'protocolo' style = 'background-color:<?php echo $fundo;?>; font-size: 2.5em;'><a href = 'fila?id=<?php echo $valor['id_livro'];?>' style = 'color:<?php echo $corTexto;?>; text-decoration: none;'><?php echo $protocolo;?></a></td>
						<td align = 'center'><a href = 'editar_pedido?id=<?php echo $valor['id_pedido'];?>'><img width = 15 src = 'edit.png'></a></td>
					</tr>
<?php
			}
			if(mysqli_num_rows($rs) == 0){
				echo '<h2>LISTA DE DEVOLUÇÃO</h2>';
				echo '<p>Não existe pedido registrado.</p><br>';
			}
				mysqli_free_result($rs);
				echo '</table><br><br>';
				echo "<a class = 'btn' href = 'cadastrar_pedido'>CADASTRAR PEDIDO</a>";
		} else {
			echo '<h2>ERRO DE CONSULTA.</h2><br><br>';
			echo "<a class = 'btn' href = 'index'>VOLTAR PARA A PÁGINA INICIAL</a>";
		}
	} else {
		echo '<h2>ERRO DE CONEXÃO.</h2>';
	}
	include 'temp/footer.php';
?>