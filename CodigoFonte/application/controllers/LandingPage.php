<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LandingPage extends CI_Controller {
	public function LoadBase()
	{
		$this->cart;
		$dados['0']=1;
		return $dados;
	}
	public function index()
	{
		$dados['loged']=$this->LoadBase();
		$this->load->model('CategoriaModel');
		$this->load->model('ProdutoModel');
		$dados['categorias']=$this->CategoriaModel->getCategorias();
		$dados['lastprodutos']=$this->ProdutoModel->getLastProdutos();
		$dados['maisvendidosprodutos']=$this->ProdutoModel->getProdutosMaisVendidos();
		$dados['home']="is-active";
		$dados['sobre']="";
		$this->load->view('index', $dados);
	}

	public function ListaCategoria($idCat)
	{
		$dados['loged']=$this->LoadBase();
		$this->load->model('ProdutoModel');
		$this->load->model('CategoriaModel');
		$dados['categorias']=$this->CategoriaModel->getCategorias();
		$dados['produtos']=$this->ProdutoModel->getProdutosCategoria($idCat);
		$dados['idCat'] = $idCat;	
		$dados['home']="";
		$dados['sobre']="";
		$this->load->view('listaitenscategoria', $dados);
	}
	public function Sobre()
	{
		$dados['loged']=$this->LoadBase();
		$this->load->model('CategoriaModel');
		$dados['categorias']=$this->CategoriaModel->getCategorias();
		$dados['home']="";
		$dados['sobre']="is-active";
		$this->load->view('sobre', $dados);
	}
	public function AddToCart($id)
	{
		$this->load->model('ProdutoModel');
		$dado =$this->ProdutoModel->getProdutoById($id);
		$valor = $dado[0]->valorCusto + (($dado[0]->valorCusto*$dado[0]->percentualLucro)/100);
		$p = array(
			'id' => $dado[0]->idProduto,
			'qty' => 1,
			'price' => $valor, 
			'name' => $dado[0]->nomeProduto,
			'descricaoResumida' => $dado[0]->descricaoResumida,
			'genero' => $dado[0]->genero,
			'categoria' => $dado[0]->categoria
			);
		if ($this->cart->insert($p)){
			
		}else{
			
		}
		$this->index();
	}
	public function ShowTheCart()
	{
		$dados['loged']=$this->LoadBase();	
		$this->load->model('CategoriaModel');
		$dados['categorias']=$this->CategoriaModel->getCategorias();
		$dados['home']="";
		$dados['sobre']="";
		$this->load->view('carrinho', $dados);
	}
	public function RemoveProductTheCart($rowId)
	{
		$this->cart->remove($rowId);
		$this->ShowTheCart();
	}
	public function UpdateQtyProductTheCart($rowId)
	{
		$qnt = $_POST['qntItens'];
		$data = array ('rowid' => $rowId, 'qty' => $qnt);
		$this->cart->update($data);
		$this->ShowTheCart();
	}
	public function ShowTheProfile($id)
	{
		$dados['loged']=$this->LoadBase();
		$this->load->model('CategoriaModel');
		$dados['categorias']=$this->CategoriaModel->getCategorias();
		$this->load->model('UserModel');
		$dados['dadoUsuario']=$this->UserModel->getUserById($id);
		$this->load->model('EnderecoModel');
		$dados['dadoEndereco']=$this->EnderecoModel->getEnderecoById($dados['dadoUsuario'][0]->endereco);
		$dados['home']="";
		$dados['sobre']="";
		$this->load->view('perfil', $dados);
	}
}
