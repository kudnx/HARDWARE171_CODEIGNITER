<?php
	class AdminModel extends CI_Model {
		public function __construct()
			 {
							 $this->load->database();
							 $this->load->helper('url');
			 }

		public function setAdmin()
			 {
		    $data = array(
		        'email' => $this->input->post('email'),
		        'senha' => md5($this->input->post('senha'))
		    );

		    return $this->db->insert('admin', $data);
			 }

	public function verifyEmail($email)
	{
		$query = $this->db->get_where('admin', array('email' => $email));
		return $query->result_array();
	}

		public function getAdmin()
		 	{
		     $query = $this->db->get('admin');
		     return $query->result_array();
		 	}

			public function getLoggedAdmin($id)
			 	{
					$query = $this->db->get_where('admin', array('id' => $id));
			    return $query->result_array();
			 	}

				public function getLoggedAdminID($email)
				 	{
						$query = $this->db->get_where('admin', array('email' => $email));
				    $data = $query->result_array();
						return $data[0]['id'];
				 	}

		public function deleteAdmin($id)
			{
				$this->db->delete('admin', array('id' => $id));
			}

			public function verifyLogin()
				 {
			    $data = array(
			        'email' => $this->input->post('email'),
			        'senha' => md5($this->input->post('senha'))
			    );
			    $query = $this->db->get_where('admin', array('email' => $data['email']));
					$databd = $query->result_array();

					if (!isset($databd[0]['email']))
					{
						echo "<script>alert('Email não exite na base de dados!!')</script>";
						return FALSE;
					}
					else {
						if ($databd[0]['senha'] === $data['senha'])
						{
							return TRUE;
						}
						else {
							echo "<script>alert('Senha incorreta!! Tente Novamente!!')</script>";
							return FALSE;
						}
					}
				 }
	}
?>
