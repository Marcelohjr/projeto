<?php
class UserModel extends CI_Model{
	public function getUserById($id){
		$query = $this->db->get_where('Pessoas', array('idPessoa' => $id));	
		return $query->result();	
	}

}
?>