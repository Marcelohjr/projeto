<?php
class ComentariosModel extends CI_Model{
	public function getComentariosByIdProduct($id){
		$query = $this->db->get_where('vwComentarios', array('fkProduto' => $id));	
		return $query->result();	
	}
}
?>