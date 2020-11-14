<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<?php $this->load->view('components/bootstrap'); ?>
		<title>Edição de Produtos</title>
	</head>
	<?php $this->load->view('components/centerFormStyle'); ?>
	<?php $this->load->view('components/nav'); ?><br><br><br>
	<body>
		<h1 class="text-center">Edição de Produtos</h1><br><br>
		<div div class="container center_div">
			<form action="/HARDWARE171_CODEIGNITER/produto/update" method="post" enctype="multipart/form-data" accept-charset="utf-8">
				<input type="text" name="id_fornecedor" value="<?php echo $produto[0]['fornecedor_id']; ?>" hidden>
				<input type="text" name="id" value="<?php echo $produto[0]['id']; ?>" hidden>
				</select><br><br>
				<label for="nome">Digite o nome do produto</label>
				<input type="nome" name="nome" value="<?php echo $produto[0]['nome']; ?>" required ><br><br>
				<label for="precoCompra">Digite o preço de compra do produto</label>
				<input type="number" name="precoCompra" value="<?php echo $produto[0]['precoCompra']; ?>" required ><br><br>
				<label for="precoVenda">Digite o preço de venda do produto</label>
				<input type="number" name="precoVenda" value="<?php echo $produto[0]['precoVenda']; ?>" required ><br><br>
				<input type="number" name="quantidade" value="<?php echo $produto[0]['quantidade']; ?>" hidden >
				<label for="descricao">Digite a descricao do produto</label>
				<input type="text" name="descricao" value="<?php echo $produto[0]['descricao']; ?>" required ><br><br>
				<label for="logo">Selecione a foto do produto</label>
				<input type="file" name="foto" value="<?php echo $produto[0]['foto']; ?>" required ><br><br>
				<button class="btn btn-primary btn-lg">Cadastrar</button>
			</form>
		</div>
	</body>
	<?php $this->load->view('components/footer'); ?>
</html>
