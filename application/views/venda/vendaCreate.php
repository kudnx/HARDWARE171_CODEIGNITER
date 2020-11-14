<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<?php $this->load->view('components/bootstrap'); ?>
		<title>Cadastro de Venda</title>
		<script src="https://code.jquery.com/jquery-3.5.1.js" type="text/JavaScript"></script>
  		<script>
			$(document).ready(function(){
				$("#id_produto").change(function(){
				var produto_id = $(this).val();
				$.ajax({  
					url:"/HARDWARE171/Venda/quantidade",  
					method:"POST", 
					data:{produto_id:produto_id},
					success:function(data){
						data = parseInt(data);
						document.getElementById("quantidade").setAttribute("max", data);
					},
					error: function(error){
						alert(error);
					}
				});
				});
				document.getElementById("quantidade").setAttribute("value", 0);
			});
  </script>
	</head>
	<?php $this->load->view('components/centerFormStyle'); ?>
	<?php $this->load->view('components/nav'); ?><br><br><br>
	<body>
		<h1 class="text-center">Cadastro de Venda</h1><br><br>
		<div div class="container center_div">
			<form action="/HARDWARE171_CODEIGNITER/venda/insert" method="post" accept-charset="utf-8">
				<label for="produto">Escolha um Cliente</label>
				<select class="" name="id_cliente">
				<?php foreach ($cliente as $dadoscliente): ?>
					<option value="<?php echo $dadoscliente['id']; ?>"><?php echo $dadoscliente['nome']; ?></option>
				<?php endforeach; ?>;
				</select><br><br>
				<label for="produto">Escolha um Produto</label>
				<select class="" name="id_produto" id="id_produto">
				<option value="">--</option>
				<?php foreach ($produto as $dadosproduto): ?>
					<option value="<?php echo $dadosproduto['id']; ?>"><?php echo $dadosproduto['nome']; ?></option>
				<?php endforeach; ?>;
				</select><br><br>
				<label for="quantidade">Digite a quantidade do produto</label>
				<input type="number" name="quantidade" id="quantidade" min="1" max="1" required><br><br>
				<button class="btn btn-primary btn-lg">Cadastrar</button>
			</form>
		</div>
	</body>
	<?php $this->load->view('components/footer'); ?>
</html>
