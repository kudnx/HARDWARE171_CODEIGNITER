<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cliente extends CI_Controller {

	public function __construct()
	{
    parent::__construct();

		$this->load->library("session");
    $this->load->library('form_validation');
		$this->load->helper('form');
    $this->load->model('clienteModel');
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
			$data['cliente'] = $this->clienteModel->getCliente();
			$this->load->view('cliente/clienteList', $data);
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
			$this->load->view('cliente/clienteCreate');
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
			$data['cliente'] = $this->clienteModel->getSelectedCliente($id);
			$this->load->view('cliente/clienteEdit', $data);
		}
	}

	public function insert()
	{
		$this->form_validation->set_rules('nome', 'Nome', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('cidade', 'cidade', 'required');

		if($this->form_validation->run() == FALSE)
		{
			echo "<script>alert('Erro no cadastro do Cliente, Verifique os campos e tente Novamente!!')</script>";
			$this->load->view('cliente/clienteCreate');
		}
		else
		{
			$this->clienteModel->setCliente();
			echo "<script>alert('Cliente Cadastrado com Sucesso!!')</script>";
			$this->load->view('cliente/clienteCreate');
		}
	}

	public function update()
	{
		$this->form_validation->set_rules('id', 'Id', 'required');
		$this->form_validation->set_rules('nome', 'Nome', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('cidade', 'Cidade', 'required');

		if($this->form_validation->run() == FALSE)
		{
			echo "<script>alert('Erro na edição do Cliente, Verifique os campos e tente Novamente!!')</script>";
			$this->load->view('cliente/clienteEdit');
		}
		else
		{
			$this->clienteModel->updateCliente();
			echo "<script>alert('Cliente Editado com Sucesso!!')</script>";
			$data['cliente'] = $this->clienteModel->getCliente();
			$this->load->view('cliente/clienteList', $data);
		}
	}

	public function delete() {
		$id = $this->uri->segment(3);
		$this->clienteModel->deleteCliente($id);
		$data['cliente'] = $this->clienteModel->getCliente();
		$this->load->view('cliente/clienteList', $data);
	}

}
