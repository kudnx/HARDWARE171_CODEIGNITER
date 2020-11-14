<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produto extends CI_Controller {

	public function __construct()
	{
    parent::__construct();
    $this->load->library('form_validation');
		$this->load->helper('form');
		$this->load->helper('url');
    $this->load->model('produtoModel');
    $this->load->model('fornecedorModel');
		$this->load->library("session");
	}

	public function confirmDelete()
	{
		$data['id'] = $this->uri->segment(3);
		$data['modulo'] = $this->uri->segment(1);
		$this->load->view('components/confirmDelete', $data);
	}

	public function list()
	{
		if(!$this->session->userdata('adminLogged'))
		{
			echo "<script>alert('Faça login para acessar essa página!!')</script>";
			$this->load->view('admin/adminLogin');
		}
		else {
			$data['produtofornecedor'] = $this->produtoModel->getProdutoFornecedor();
			$this->load->view('produto/produtoList', $data);
		}

	}

	public function createForm()
	{
		if(!$this->session->userdata('adminLogged'))
		{
			echo "<script>alert('Faça login para acessar essa página!!')</script>";
			$this->load->view('admin/adminLogin');
		}
		else {
			$data['fornecedor'] = $this->fornecedorModel->getFornecedor();
			$this->load->view('produto/produtoCreate', $data);
		}
	}

	public function edit()
	{
		if(!$this->session->userdata('adminLogged'))
		{
			echo "<script>alert('Faça login para acessar essa página!!')</script>";
			$this->load->view('admin/adminLogin');
		}
		else {
			$id = $this->uri->segment(3);
			$data['produto'] = $this->produtoModel->getSelectedProduto($id);
			$this->load->view('produto/produtoEdit', $data);
		}
	}

	public function insert()
	{
		$this->form_validation->set_rules('id_fornecedor', 'ID do Fornecedor', 'required');
		$this->form_validation->set_rules('nome', 'Nome', 'required');
		$this->form_validation->set_rules('precoCompra', 'Preço da Compra', 'required');
		$this->form_validation->set_rules('precoVenda', 'Preço da Venda', 'required');
		$this->form_validation->set_rules('quantidade', 'Quantidade', 'required');
		$this->form_validation->set_rules('descricao', 'descricao', 'required');
		$imageName = $_POST['nome'];
		$logo    = $_FILES['foto'];
		$extension = strrchr($logo['name'],'.');
		$imageName = $imageName . $extension;

		$config['upload_path'] = 'C:xampp/htdocs/HARDWARE171_CODEIGNITER/assets/produto/';
    	$config['allowed_types'] = 'gif|jpg|png';
		$config['file_name'] = $imageName;

		if($this->form_validation->run() == FALSE)
		{
			$data['fornecedor'] = $this->fornecedorModel->getFornecedor();
			echo "<script>alert('Erro no cadastro do Produto, Verifique os campos e tente Novamente!!')</script>";
			$this->load->view('produto/produtoCreate', $data);
		}
		else
		{
			$data['fornecedor'] = $this->fornecedorModel->getFornecedor();
			$this->load->library('upload', $config);
			$this->upload->do_upload('foto');
			$this->produtoModel->setProduto($imageName);
			echo "<script>alert('Produto Cadastrado com Sucesso!!')</script>";
			$this->load->view('produto/produtoCreate', $data );
		}
	}

	public function update()
	{
		$this->form_validation->set_rules('id', 'ID do Produto', 'required');
		$this->form_validation->set_rules('id_fornecedor', 'ID do Fornecedor', 'required');
		$this->form_validation->set_rules('nome', 'Nome', 'required');
		$this->form_validation->set_rules('precoCompra', 'Preço da Compra', 'required');
		$this->form_validation->set_rules('precoVenda', 'Preço da Venda', 'required');
		$this->form_validation->set_rules('quantidade', 'Quantidade', 'required');
		$this->form_validation->set_rules('descricao', 'descricao', 'required');

		$data = $this->produtoModel->getSelectedProduto($_POST['id']);

		$imageName = $data[0]['foto'];
		$logo    = $_FILES['foto'];

		if($this->form_validation->run() == FALSE)
		{
			echo "<script>alert('Erro na edição do Produto, Verifique os campos e tente Novamente!!')</script>";
			$this->load->view('cliente/clienteEdit');
		}
		else
		{
			unlink($config['upload_path'] . $imageName);
			//$extension = strrchr($logo['name'],'.');
			$imageName = $imageName . $extension;
			$config['upload_path'] = 'C:xampp/htdocs/HARDWARE171_CODEIGNITER/assets/produto/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['file_name'] = $imageName;
			$this->load->library('upload', $config);
			$this->upload->do_upload('foto');
			$this->produtoModel->updateProduto($imageName);
			echo "<script>alert('Produto Editado com Sucesso!!')</script>";
			$data['produtofornecedor'] = $this->produtoModel->getProdutoFornecedor();
			$this->load->view('produto/produtoList', $data);
		}
	}

	public function delete()
	{
		$id = $this->uri->segment(3);
		$imageName = $this->produtoModel->deleteImage($id);
		$config['upload_path']          = 'C:xampp/htdocs/HARDWARE171_CODEIGNITER/assets/produto/';
		unlink($config['upload_path'] . $imageName);
		$this->produtoModel->deleteProduto($id);
		$data['produtofornecedor'] = $this->produtoModel->getProdutoFornecedor();
		$this->load->view('produto/produtoList', $data);
	}


}
