<!DOCTYPE html>
<html lang="pt-br" dir="ltr">
	<head>
	<?php $this->load->view('components/bootstrap'); ?>
	<title>Listagem de Vendas</title>
	</head>
	<?php $this->load->view('components/nav'); ?><br><br>
	<body>
		<h1 class="text-center">Listagem de Vendas</h1>
		<div class="row justify-content-center">
	    <div class="col-auto">
	      <table class="table table-responsive">
					<table class="table table-striped table-dark">
						<thead>
							<tr>
								<th scope="col">ID</th>
								<th scope="col">Data da Venda</th>
								<th scope="col">Nome do Produto</th>
								<th scope="col">Preco do Produto</th>
								<th scope="col">Quantidade</th>
								<th scope="col">Email Admin</th>
								<th scope="col">Nome do Cliente</th>
								<th scope="col">Email do Cliente</th>
								<th scope="col">Cidade do Cliente</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($venda as $vendadata): ?>
								<tr>
									<td><?php echo ($vendadata['venda_id']); ?></td>
									<td><?php echo ($vendadata['data_venda']); ?></td>
									<td><?php echo ($vendadata['produto_nome']); ?></td>
									<td><?php echo ($vendadata['produto_preco_venda']); ?></td>
									<td><?php echo ($vendadata['quantidade']); ?></td>
									<td><?php echo ($vendadata['admin_email']); ?></td>
									<td><?php echo ($vendadata['cliente_nome']); ?></td>
									<td><?php echo ($vendadata['cliente_email']); ?></td>
									<td><?php echo ($vendadata['cliente_cidade']); ?></td>
								</tr>
							<?php endforeach; ?>;
						</tbody>
					</table>
	      </table>
	    </div>
	  </div>
	</body>
	<?php $this->load->view('components/footer'); ?>
</html>
