<?php
class CategoriaModel extends CI_Model{
	public function getCategorias(){
		$this->db->select('idCategoria, nome, sexo'); 
		$query = $this->db->get('Categorias');	
		return $query->result();
	}
}
?>