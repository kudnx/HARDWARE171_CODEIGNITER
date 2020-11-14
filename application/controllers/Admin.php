<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
    parent::__construct();

		$this->load->library("session");
    $this->load->library('form_validation');
		$this->load->helper('form');
    $this->load->model('adminModel');
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
			$data['admin'] = $this->adminModel->getAdmin();
			$this->load->view('admin/adminList', $data);
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
			$this->load->view('admin/adminCreate');
		}
	}

	public function insert()
	{
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('senha', 'Senha', 'required');

		if($this->form_validation->run() == FALSE)
		{
			echo "<script>alert('Erro no cadastro do Administrador, Verifique os campos e tente Novamente!!')</script>";
			$this->load->view('admin/adminCreate');
		}
		else
		{
			$this->adminModel->setAdmin();
			echo "<script>alert('Administrador Cadastrado com Sucesso!!')</script>";
			$this->load->view('admin/adminCreate');
		}
	}

	public function delete() {
		$id = $this->uri->segment(3);
		$admindata = $this->adminModel->getLoggedAdmin($id);
		$this->adminModel->deleteAdmin($id);
		if ($admindata[0]['email'] === $this->session->userdata('adminLogged'))
		{
			$this->logout();
		}
		else {
			$data['admin'] = $this->adminModel->getAdmin();
			$this->load->view('admin/adminList', $data);
		}
	}

	public function loginForm()
	{
		$this->load->view('admin/adminLogin');
	}

	public function login()
	{
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('senha', 'Senha', 'required');

		if($this->form_validation->run() == FALSE)
		{
			echo "<script>alert('Erro ao realizar o login, verifique os campos e tente novamente!!')</script>";
			$this->load->view('admin/adminLogin');
		}
		else
		{
			if ($this->adminModel->verifyLogin())
			{
				$data['login'] = 'TRUE';
				$adminLogged = $this->adminModel->getLoggedAdmin($this->adminModel->verifyLogin()[0]['id']);
				$data['admin'] = $this->adminModel->getAdmin();
				$this->session->set_userdata('adminLogged', $adminLogged[0]['email']);
				$this->session->set_userdata('adminID', $adminLogged[0]['id']);
				$this->load->view('admin/adminList', $data);
			}
			else {
				$this->load->view('admin/adminLogin');
			}
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('adminLogged');
		$this->load->view('home');
	}
}
