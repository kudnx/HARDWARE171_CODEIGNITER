<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<?php $this->load->view('components/bootstrap'); ?>
		<title>Cadastro de Administradores</title>
	</head>
	<?php $this->load->view('components/centerFormStyle'); ?>
	<?php $this->load->view('components/nav'); ?><br><br><br>
	<body>
		<h1 class="text-center">Cadastro de Administradores</h1><br><br>
		<div class="container center_div">
			<form action="/HARDWARE171_CODEIGNITER/admin/insert" method="post" accept-charset="utf-8">
				<label for="email">Digite o Email</label>
				<input type="email" name="email" value="" placeholder="exemplo@123.com" required ><br><br>
				<label for="email">Digite a Senha</label>
				<input type="password" name="senha" value="" placeholder="*******" required ><br><br>
				<button class="btn btn-primary btn-lg">Cadastrar</button>
			</form>
		</div>
	</body>
	<?php $this->load->view('components/footer'); ?>
</html>
