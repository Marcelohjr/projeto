<?php
class EnderecoModel extends CI_Model{
	public function getEnderecoById($id){
		$query = $this->db->get_where('Enderecos', array('idEndereco' => $id));
		return $query->result();	
	}

}
?>