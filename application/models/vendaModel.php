<?php
	class vendaModel extends CI_Model {
		public function __construct()
			 {
				$this->load->database();
				$this->load->library("session");
				$this->load->helper('url');
			 }

		public function setVenda($id_fornecedor)
			 {
				$adminID = $this->session->userdata('adminID');
		    	$data = array(
				'cliente_id' => $this->input->post('id_cliente'),
				'produto_id' => $this->input->post('id_produto'),
				'admin_id' => $adminID,
				'quantidade' => $this->input->post('quantidade')
		    );

		    return $this->db->insert('venda', $data);
			 }

			public function getVenda()
			 	{
					$this->db->select('venda.id as venda_id,
						venda.data as data_venda,
						produto.nome as produto_nome,
						produto.precoVenda as produto_preco_venda,
						venda.quantidade,
						admin.email as admin_email,
						cliente.nome as cliente_nome,
						cliente.email as cliente_email,
						cliente.cidade as cliente_cidade
					');
					$this->db->from('venda');
					$this->db->join('produto', 'venda.produto_id = produto.id');
					$this->db->join('admin', 'venda.admin_id = admin.id');
					$this->db->join('cliente', 'venda.cliente_id = cliente.id');
					$this->db->order_by('data_venda', 'desc');
					$query = $this->db->get();
			    return $query->result_array();
			 	}

			public function deleteImage($id)
			{
				$data = $this->produtoModel->getSelectedProduto($id);
				return $data[0]['foto'];
			}

			public function getSelectedProduto($id)
			 	{
					$query = $this->db->get_where('produto', array('id' => $id));
					return $query->result_array();
			 	}

		public function deleteProduto($id)
			{
				$this->db->delete('produto', array('id' => $id));
			}
	}
?>
