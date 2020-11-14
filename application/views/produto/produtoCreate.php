<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<?php $this->load->view('components/bootstrap'); ?>
		<title>Cadastro de Produtos</title>
	</head>
	<?php $this->load->view('components/centerFormStyle'); ?>
	<?php $this->load->view('components/nav'); ?><br><br><br>
	<body>
		<h1 class="text-center">Cadastro de Produtos</h1><br><br>
		<div div class="container center_div">
			<form action="/HARDWARE171_CODEIGNITER/produto/insert" method="post" enctype="multipart/form-data" accept-charset="utf-8">
				<label for="fornecedor">Escolha um fornecedor</label>
				<select class="" name="id_fornecedor">
				<?php foreach ($fornecedor as $dadosfornecedor): ?>
					<option value="<?php echo $dadosfornecedor['id']; ?>"><?php echo $dadosfornecedor['nome']; ?></option>
				<?php endforeach; ?>;
				</select><br><br>
				<label for="nome">Digite o nome do produto</label>
				<input type="nome" name="nome" value="" required ><br><br>
				<label for="precoCompra">Digite o preço de compra do produto</label>
				<input type="number" name="precoCompra" value="" required ><br><br>
				<label for="precoVenda">Digite o preço de venda do produto</label>
				<input type="number" name="precoVenda" value="" required ><br><br>
				<label for="quantidade">Digite a quantidade do produto</label>
				<input type="number" name="quantidade" value="" required ><br><br>
				<label for="descricao">Digite a descricao do produto</label>
				<input type="text" name="descricao" value="" required ><br><br>
				<label for="logo">Selecione a foto do produto</label>
				<input type="file" name="foto" value="" required ><br><br>
				<button class="btn btn-primary btn-lg">Cadastrar</button>
			</form>
		</div>
	</body>
	<?php $this->load->view('components/footer'); ?>
</html>
