<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fornecedor extends CI_Controller {

	public function __construct()
	{
    parent::__construct();
    $this->load->library('form_validation');
		$this->load->helper('form');
		$this->load->helper('url');
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
			$data['fornecedor'] = $this->fornecedorModel->getFornecedor();
			$this->load->view('fornecedor/fornecedorList', $data);
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
			$this->load->view('fornecedor/fornecedorCreate');
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
			$data['fornecedor'] = $this->fornecedorModel->getSelectedFornecedor($id);
			$this->load->view('fornecedor/fornecedorEdit', $data);
		}
	}

	public function insert()
	{
		$this->form_validation->set_rules('nome', 'Nome', 'required');
		$imageName = $_POST['nome'];
		$logo    = $_FILES['logo'];
		$extension = strrchr($logo['name'],'.');
		$imageName = $imageName . $extension;

		$config['upload_path']          = 'C:xampp/htdocs/HARDWARE171_CODEIGNITER/assets/fornecedor/';
    $config['allowed_types']        = 'gif|jpg|png';
		$config['file_name']						= $imageName;

		if($this->form_validation->run() == FALSE)
		{
			echo "<script>alert('Erro no cadastro do Fornecedor, Verifique os campos e tente Novamente!!')</script>";
			$this->load->view('fornecedor/fornecedorCreate');
		}
		else
		{
			$this->load->library('upload', $config);
			$this->upload->do_upload('logo');
			$this->fornecedorModel->setFornecedor($imageName);
			echo "<script>alert('Fornecedor Cadastrado com Sucesso!!')</script>";
			$this->load->view('fornecedor/fornecedorCreate');
		}
	}

	public function update()
	{
		$this->form_validation->set_rules('id', 'Id', 'required');
		$this->form_validation->set_rules('nome', 'Nome', 'required');

		$data = $this->fornecedorModel->getSelectedFornecedor($_POST['id']);

		$imageName = $data[0]['logo'];
		$logo = $_FILES['logo'];
		$extension = strrchr($logo['name'],'.');
		$novaImageName = $_POST['nome'] . $extension;

		$config['upload_path'] = 'C:xampp/htdocs/HARDWARE171_CODEIGNITER/assets/fornecedor/';
    	$config['allowed_types'] = 'gif|jpg|png';
		$config['file_name'] = $novaImageName;

		if($this->form_validation->run() == FALSE)
		{
			echo "<script>alert('Erro na edição do Fornecedor, Verifique os campos e tente Novamente!!')</script>";
			$this->load->view('cliente/clienteEdit');
		}
		else
		{
			unlink($config['upload_path'] . $imageName);
			$this->load->library('upload', $config);
			$this->upload->do_upload('logo');
			$this->fornecedorModel->updateFornecedor($novaImageName);
			echo "<script>alert('Fornecedor Editado com Sucesso!!')</script>";
			$data['fornecedor'] = $this->fornecedorModel->getFornecedor();
			$this->load->view('fornecedor/fornecedorList', $data);
		}
	}

	public function delete()
	{
		$id = $this->uri->segment(3);
		$imageName = $this->fornecedorModel->deleteImage($id);
		$config['upload_path'] = 'C:xampp/htdocs/HARDWARE171_CODEIGNITER/assets/fornecedor/';
		unlink($config['upload_path'] . $imageName);
		$this->fornecedorModel->deleteFornecedor($id);
		echo "<script>alert('Fornecedor Excluido com Sucesso!!')</script>";
		echo "<script>window.location.href = 'http://localhost/HARDWARE171_CODEIGNITER/fornecedor/list'</script>";
	}


}
