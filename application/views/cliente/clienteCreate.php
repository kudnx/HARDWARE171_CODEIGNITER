<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<?php $this->load->view('components/bootstrap'); ?>
		<title>Cadastro de Clientes</title>
	</head>
	<?php $this->load->view('components/centerFormStyle'); ?>
	<?php $this->load->view('components/nav'); ?><br><br><br>
	<body>
		<h1 class="text-center">Cadastro de Cliente</h1><br><br>
		<div div class="container center_div">
			<form action="/HARDWARE171_CODEIGNITER/cliente/insert" method="post" accept-charset="utf-8">
				<label for="nome">Digite o nome</label>
				<input type="nome" name="nome" value="" required ><br><br>
				<label for="email">Digite o Email</label>
				<input type="email" name="email" value="" placeholder="exemplo@123.com" required ><br><br>
				<label for="cidade">Digite a Cidade</label>
				<input type="text" name="cidade" value="" required ><br><br>
				<button class="btn btn-primary btn-lg">Cadastrar</button>
			</form>
		</div>
	</body>
	<?php $this->load->view('components/footer'); ?>
</html>
