<?php
class UserModel extends CI_Model{
	public function getUserById($id){
		$query = $this->db->get_where('Pessoas', array('idPessoa' => $id));	
		return $query->result();	
	}
	public function getUserByEmailAndPassoword($email, $senha){
		$query = $this->db->get_where('Pessoas', array('email' => $email, 'senha' => $senha));
		$num = count($query);
		/*$sql = "SELECT COUNT(*) FROM Pessoas WHERE email = ? AND senha = ?";
		$query = $this->db->query($sql, array($email, $senha));*/
		if ($num==1) {
				$query = $this->db->get_where('Pessoas', array('email' => $email, 'senha' => $senha));
				return $query->result();
			}	
		return false;	
	}
}
?>