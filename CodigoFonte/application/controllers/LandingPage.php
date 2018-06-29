<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LandingPage extends CI_Controller {
	public function LoadBase()
	{
		$this->cart;
		$this->session;

	}
	public function index()
	{
		$this->LoadBase();
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
		$this->LoadBase();
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
	public function ReduzNome($nome)
	{
		$cont=0;
		$cont2=0;
		$result="";
		while (1) {
			if ($nome[$cont]==" ") {
				break;
			}else{
				$result[$cont2]=$nome[$cont];
				$cont2++;
			}
			$cont++;
		}
		return $result;
	}
	public function ValidaLogin()
	{	
		$email = $_POST['email'];
		$senha = $_POST['senha'];
		$dados['mensage']=0;
		$this->load->model('UserModel');
		$dados['dadoUsuario']=$this->UserModel->getUserByEmailAndPassoword($email, $senha);
		if ($dados['dadoUsuario']) {
			$this->load->model('EnderecoModel');
			$dados['dadoEndereco']=$this->EnderecoModel->getEnderecoById($dados['dadoUsuario'][0]->endereco);
			$this->session->set_userdata('loged', 1);
			$this->session->set_userdata('idUser', $dados['dadoUsuario'][0]->idPessoa);
			$this->session->set_userdata('userImage', $dados['dadoUsuario'][0]->pessoaImagem);
			$this->session->set_userdata('userName', $this->ReduzNome($dados['dadoUsuario'][0]->nome));
			$this->index();
		}else{
			$dados['mensage']=1;
			$dados['mensagem']="Falha! Usuário ou senha incorreto!";
			$this->load->view('login', $dados);
		}	
	}
	public function Login()
	{
		$dados['mensage']=0;
		$this->load->view('login', $dados);
	}
	public function Logout()
	{
		$this->session->sess_destroy();
		header('Location: home'); 
	}

}
