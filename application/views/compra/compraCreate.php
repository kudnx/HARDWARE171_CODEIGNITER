<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<?php $this->load->view('components/bootstrap'); ?>
		<title>Cadastro de Compra</title>
	</head>
	<?php $this->load->view('components/centerFormStyle'); ?>
	<?php $this->load->view('components/nav'); ?><br><br><br>
	<body>
		<h1 class="text-center">Cadastro de Compra</h1><br><br>
		<div div class="container center_div">
			<form action="/HARDWARE171_CODEIGNITER/compra/insert" method="post" accept-charset="utf-8">
				<label for="produto">Escolha um Produto</label>
				<select class="" name="id_produto">
				<?php foreach ($produto as $dadosproduto): ?>
					<option value="<?php echo $dadosproduto['id']; ?>"><?php echo $dadosproduto['nome']; ?></option>
				<?php endforeach; ?>;
				</select><br><br>
				<label for="quantidade">Digite a quantidade do produto</label>
				<input type="number" name="quantidade" value="1" min="1" required ><br><br>
				<button class="btn btn-primary btn-lg">Cadastrar</button>
			</form>
		</div>
	</body>
	<?php $this->load->view('components/footer'); ?>
</html>
