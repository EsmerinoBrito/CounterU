<?php include("cabecalho.php");
include("conecta.php");
include("banco-produto.php"); ?>

<?php
	if(array_key_exists("removido", $_GET) && $_GET["removido"]==true ) {
?>
	<p class="alert-success">Produto removido com sucesso.</p>
<?php
	}
?>

<table class="table table-striped table-bordered">
	<tr>
		<td><b>Nome</b></td>
		<td><b>Preco</b></td>
		<td><b>Descrição</b></td>
		<td><b>Categoria</b></td>
	</tr>
<?php
	$produtos = listaProdutos($conexao);
	
	foreach($produtos as $produto){
	?>
	
		<tr>
			<td><?= $produto['nome'] . "<br/>" ?></td>
			<td><?= $produto['preco'] . "<br/>" ?></td>
			<td><?= substr($produto['descricao'],0,40) . "<br/>" ?></td>
			<td><?= $produto['categoria_nome'] ?></td>
			<td>
				<form action="remove-produto.php?id<?=$produto['id']?>" method="post">
				<input type="hidden" name="id" value="<?=$produto['id']?>">
					<center><button class="btn btn-danger">Remover</button></center>
				</form>
			</td>
		</tr>
	
	<?php
	}
	?>
	
</table>

<?php>include("rodape.php"); ?>