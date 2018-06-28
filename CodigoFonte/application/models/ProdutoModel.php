<?php
class ProdutoModel extends CI_Model{
	public function getProdutosCategoria($id){
		$query = $this->db->get_where('Produtos', array('categoria' => $id));	
		return $query->result();
	}
	public function getLastProdutos(){
		$this->db->select('*')->order_by('datadecadastro', 'DESC')->limit(5);
		$query = $this->db->get('Produtos');	
		return $query->result();
	}
	public function getProdutosMaisVendidos(){
		$this->db->select('*')->order_by('qntvendas', 'DESC')->limit(5);
		$query = $this->db->get('Produtos');	
		return $query->result();
	}
	public function getProdutoById($id){
		$query = $this->db->get_where('Produtos', array('idProduto' => $id));	
		return $query->result();
	}
}
?>