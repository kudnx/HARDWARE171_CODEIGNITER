<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<?php $this->load->view('components/bootstrap'); ?>
	<title>Bem-Vindo!!</title>

	<style type="text/css">

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	#container{
		margin: 40px;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	p.footer {
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}

	img{
		margin-left: 83%
	}

	footer a{
		margin-left: 90%
	}

	</style>
</head>
<body>

	<nav class="navbar navbar-dark bg-dark navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="/HARDWARE171_CODEIGNITER/">HARDWARE 171</a>
	<?php
		if (isset($adminLogged))
		{
			echo "
			<!-- Example split danger button -->
				<div class='btn-group'>
					<button type='button' class='btn btn-info'>Administrador</button>
					<button type='button' class='btn btn-info dropdown-toggle dropdown-toggle-split' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
						<span class='sr-only'>Toggle Dropdown</span>
					</button>
					<div class='dropdown-menu'>
						<a class='dropdown-item' href='/HARDWARE171_CODEIGNITER/admin/list'>Ver</a>
						<a class='dropdown-item' href='/HARDWARE171_CODEIGNITER/admin/createForm'>Cadastrar</a>
					</div>
				</div>
				]<div class='btn-group'>
					<button type='button' class='btn btn-info'>Cliente</button>
					<button type='button' class='btn btn-info dropdown-toggle dropdown-toggle-split' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
						<span class='sr-only'>Toggle Dropdown</span>
					</button>
					<div class='dropdown-menu'>
						<a class='dropdown-item' href='/HARDWARE171_CODEIGNITER/cliente/list'>Ver</a>
						<a class='dropdown-item' href='/HARDWARE171_CODEIGNITER/cliente/createForm'>Cadastrar</a>
					</div>
				</div>
				]<div class='btn-group'>
					<button type='button' class='btn btn-info'>Fornecedor</button>
					<button type='button' class='btn btn-info dropdown-toggle dropdown-toggle-split' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
						<span class='sr-only'>Toggle Dropdown</span>
					</button>
					<div class='dropdown-menu'>
						<a class='dropdown-item' href='/HARDWARE171_CODEIGNITER/fornecedor/list'>Ver</a>
						<a class='dropdown-item' href='/HARDWARE171_CODEIGNITER/fornecedor/createForm'>Cadastrar</a>
					</div>
				</div>
				]<div class='btn-group'>
					<button type='button' class='btn btn-info'>Produto</button>
					<button type='button' class='btn btn-info dropdown-toggle dropdown-toggle-split' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
						<span class='sr-only'>Toggle Dropdown</span>
					</button>
					<div class='dropdown-menu'>
						<a class='dropdown-item' href='/HARDWARE171_CODEIGNITER/produto/list'>Ver</a>
						<a class='dropdown-item' href='/HARDWARE171_CODEIGNITER/produto/createForm'>Cadastrar</a>
					</div>
				</div>
				]<div class='btn-group'>
					<button type='button' class='btn btn-info'>Compra</button>
					<button type='button' class='btn btn-info dropdown-toggle dropdown-toggle-split' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
						<span class='sr-only'>Toggle Dropdown</span>
					</button>
					<div class='dropdown-menu'>
						<a class='dropdown-item' href='/HARDWARE171_CODEIGNITER/compra/list'>Ver</a>
						<a class='dropdown-item' href='/HARDWARE171_CODEIGNITER/compra/createForm'>Cadastrar</a>
					</div>
				</div>
				]<div class='btn-group'>
					<button type='button' class='btn btn-info'>Venda</button>
					<button type='button' class='btn btn-info dropdown-toggle dropdown-toggle-split' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
						<span class='sr-only'>Toggle Dropdown</span>
					</button>
					<div class='dropdown-menu'>
						<a class='dropdown-item' href='/HARDWARE171_CODEIGNITER/venda/list'>Ver</a>
						<a class='dropdown-item' href='/HARDWARE171_CODEIGNITER/venda/createForm'>Cadastrar</a>
					</div>
				</div>
			";
		}
	 ?>
</nav>

<div id="container">
	<h1>Bem vindo a HARDWARE 171!!</h1>

	<div id="body">
		<h3>A sua loja de hardware com os melhores preços.</h3><br><br>

		<?php
			if (!isset($adminLogged))
			{
				echo "<a href='/HARDWARE171_CODEIGNITER/admin/loginForm'>
				<button class='btn btn-primary btn-lg'>Login</button></a>";
			}
		 ?>
		 <p class="footer">Made with <span style="color: #e25555;">&hearts;</span> by HARDWARE171 team</p><br>
		 <a target="_blank" href="https://twitter.com/i/web/status/1326739496503685120">
			 <img src="https://danbooru.donmai.us/data/sample/__inugami_korone_and_pac_man_hololive_and_1_more_drawn_by_vinhnyu__sample-a192d50ae6bae925a8f03dada24026e7.jpg"
		  width="200" height="298" alt="inugami korone"></a><br>
		 <br>
</div><br>

<?php
	if (isset($adminLogged))
	{
		echo "
		<footer>
			<a href='/HARDWARE171_CODEIGNITER/admin/logout'><button type='button' id='sair' name='button'
			class='btn btn-danger btn-lg'>Sair</button></a>
			<h6>Administrador Logado: $adminLogged</h6>
		</footer>
			";
	}
 ?>

</body>
</html>
