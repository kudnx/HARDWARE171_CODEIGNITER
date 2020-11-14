<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<?php $this->load->view('components/bootstrap'); ?>
		<title>Cadastro de Fornecedores</title>
	</head>
	<?php $this->load->view('components/centerFormStyle'); ?>
	<?php $this->load->view('components/nav'); ?><br><br><br>
	<body>
		<h1 class="text-center">Cadastro de Fornecedor</h1><br><br>
		<div div class="container center_div">
			<form action="/HARDWARE171_CODEIGNITER/fornecedor/insert" method="post" enctype="multipart/form-data" accept-charset="utf-8">
				<label for="nome">Digite o nome</label>
				<input type="nome" name="nome" value="" required ><br><br>
				<label for="logo">Selecione a logo</label>
				<input type="file" name="logo" value="" required ><br><br>
				<button class="btn btn-primary btn-lg">Cadastrar</button>
			</form>
		</div>
	</body>
	<?php $this->load->view('components/footer'); ?>
</html>
