<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Venda extends CI_Controller {

	public function __construct()
	{
    parent::__construct();
    $this->load->library('form_validation');
		$this->load->helper('form');
		$this->load->helper('url');
    $this->load->model('produtoModel');
    $this->load->model('vendaModel');
    $this->load->model('clienteModel');
		$this->load->library("session");
	}

	public function list()
	{
		if(!$this->session->userdata('adminLogged'))
		{
			echo "<script>alert('Faça login para acessar essa página!!')</script>";
			$this->load->view('admin/adminLogin');
		}
		else {
			$data['venda'] = $this->vendaModel->getvenda();
			$this->load->view('venda/vendaList', $data);
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
			$data['produto'] = $this->produtoModel->getProduto();
			$data['cliente'] = $this->clienteModel->getCliente();
			$this->load->view('venda/vendaCreate', $data);
		}
	}

	public function insert()
	{
		$this->form_validation->set_rules('id_cliente', 'ID do Cliente', 'required');
		$this->form_validation->set_rules('id_produto', 'ID do Produto', 'required');
		$this->form_validation->set_rules('quantidade', 'Quatidade', 'required');

		if($this->form_validation->run() == FALSE)
		{
			echo "<script>alert('Erro no registro de venda, Verifique os campos e tente Novamente!!')</script>";
			$data['produto'] = $this->produtoModel->getProduto();
			$data['cliente'] = $this->clienteModel->getCliente();
			$this->load->view('venda/vendaCreate', $data);
		}
		else
		{
			$id_fornecedor = $this->produtoModel->getSelectedProduto($_POST['id_produto']);
			$id_fornecedor = $id_fornecedor[0]['fornecedor_id'];
			$this->vendaModel->setvenda($id_fornecedor);
			echo "<script>alert('Venda Registrada com Sucesso!!')</script>";
			$data['produto'] = $this->produtoModel->getProduto();
			$this->load->view('venda/vendaCreate', $data);
		}
	}

}
