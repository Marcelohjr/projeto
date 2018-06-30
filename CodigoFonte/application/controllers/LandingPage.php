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
		$this->LoadBase();
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
		$this->LoadBase();	
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
		$a = strlen($nome);
		while ($cont<$a) {
			if (($nome[$cont]==" ")||($cont==$a)) {
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
			$this->session->set_userdata('priv', $dados['dadoUsuario'][0]->privilegio);
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
	public function ShowRegistrar()
	{
		$this->load->view('cadastrarUser');
	}
	public function Registrar()
	{
		$endereco = $_POST['endereco'];
		$logradouro = $_POST['logradouro'];
		$numero = $_POST['numero'];
		$complemento = $_POST['complemento'];
		$cidade = $_POST['cidade'];
		$bairro = $_POST['bairro'];
		$estado = $_POST['estado'];
		$cep = $_POST['cep'];
		$referencia = $_POST['referencia'];
		$dadosEndereco = array(
			'cidade' => $cidade,
			'bairro' => $bairro,
			'estado' => $estado,
			'cep' => $cep,
			'complemento' => $complemento,
			'logradouro' => $logradouro,
			'endereco' => $endereco,
			'numero' => $numero,
			'referencia' => $referencia
			);
		$str = $this->db->insert_string('Enderecos', $dadosEndereco);
		$this->db->query($str);
		$sucess = $this->db->affected_rows();
		if ($sucess) {
			$this->db->select_max('idEndereco');
			$query = $this->db->get('Enderecos');
			$idendereco = $query->result();
			$nome = $_POST['nome'];
			$email = $_POST['email'];
			$cpf = $_POST['cpf'];
			$dataNasc = $_POST['nascimento'];
			$telefone = $_POST['telefone'];
			$senha = $_POST['senha'];
			$cSenha = $_POST['confirmaSenha'];
			$sexo = $_POST['sexo'];
			$imagem = $_POST['imagem'];
			$dadosPessoa = array(
				'nome' => $nome,
				'endereco' => $idendereco[0]->idEndereco,
				'privilegio' => 0,
				'email' => $email,
				'telefone' => $telefone,
				//'pessoaImagem' => $imagem,
				'dataNascimento' => $dataNasc,
				'senha' => $senha,
				'sexo' => $sexo,
				'cpf' => $cpf
				);
			$str = $this->db->insert_string('Pessoas', $dadosPessoa);
			$this->db->query($str);
			$sucess2 = $this->db->affected_rows();
			if ($sucess2) {
				$this->ValidaLogin();
			}else{
				$dados['mensage']=1;
				$dados['mensagem']="Falha! Dados de Usuário incorretos!";
				$this->load->view('cadastrarUser', $dados);
			}
		}else{
			$dados['mensage']=1;
			$dados['mensagem']="Falha! Dados de endereço incorretos!";
			$this->load->view('cadastrarUser', $dados);
		}		
	}
	public function Administrator()
	{
		$this->load->model('CategoriaModel');
		$dados['categorias']=$this->CategoriaModel->getCategorias();
		$this->load->model('ProdutoModel');
		$dados['produtos']=$this->ProdutoModel->getProdutos();
		$dados['home']="";
		$dados['sobre']="";
		$dados['mensage']=0;
		$this->load->view('administrador', $dados);
	}
	public function SetCategorias()
	{
		$this->load->model('CategoriaModel');
		$dados['categorias']=$this->CategoriaModel->getCategorias();
		$dados['home']="";
		$this->load->model('ProdutoModel');
		$dados['produtos']=$this->ProdutoModel->getProdutos();
		$dados['sobre']="";
		$nomeCat = $_POST['cnome'];
		$generoCat = $_POST['cgenero'];
		$dadosCat = array(
				'nome' => $nomeCat,
				'sexo' => $generoCat
				);
			$str = $this->db->insert_string('Categorias', $dadosCat);
			$this->db->query($str);
			$sucess = $this->db->affected_rows();
			if ($sucess) {
				$this->session->set_userdata('mensage', 1);
				$this->session->set_userdata('tipomensage', 'is-success');
				$this->session->set_userdata('mensagem', 'Categoria cadastrada com sucesso!');
				header('Location: admin');
			}else{
				$this->session->set_userdata('mensage', 1);
				$this->session->set_userdata('tipomensage', 'is-danger');
				$this->session->set_userdata('mensagem', 'Falha ao efetuar cadastro! Informe ao administrador.');
				header('Location: admin');
			}
	}
	public function SetProdutos()
	{
		$this->load->model('CategoriaModel');
		$dados['categorias']=$this->CategoriaModel->getCategorias();
		$dados['home']="";
		$this->load->model('ProdutoModel');
		$dados['produtos']=$this->ProdutoModel->getProdutos();
		$dados['sobre']="";
		$nome = $_POST['pnome'];
		$marca = $_POST['marca'];
		$valorCusto = $_POST['valorcusto'];
		$percentualLucro = $_POST['percentuallucro'];
		$desconto = $_POST['desconto'];
		$categoria = $_POST['categoria'];
		$quantidade = $_POST['quantidade'];
		$genero = $_POST['pgenero'];
		$descR = $_POST['descricaoresumida'];
		$descC = $_POST['descricao'];
		$dadosProduto = array(
			'nomeProduto' => $nome,
			'descricaoResumida' => $descR,
			'descricao' => $descC,
			'marca' => $marca,
			'valorCusto' => $valorCusto,
			'percentualLucro' => $percentualLucro,
			'desconto' => $desconto,
			'categoria' => $categoria,
			'quantidade' => $quantidade,
			'datadecadastro' => '',
			'qntvendas' => 0,
			'genero' => $genero
			);
		$str = $this->db->insert_string('Produtos', $dadosProduto);
		$this->db->query($str);
		$sucess = $this->db->affected_rows();
		if ($sucess) {
			$this->session->set_userdata('mensage', 1);
			$this->session->set_userdata('tipomensage', 'is-success');
			$this->session->set_userdata('mensagem', 'Produto cadastrado com sucesso!');
			header('Location: admin');
		}else{
			$this->session->set_userdata('mensage', 1);
			$this->session->set_userdata('tipomensage', 'is-danger');
			$this->session->set_userdata('mensagem', 'Falha ao efetuar cadastro! Informe ao administrador.');
			header('Location: admin');
		}
	}

	public function ShowProdutoDetalhe($id)
	{
		$this->LoadBase();
		$this->load->model('CategoriaModel');
		$dados['categorias']=$this->CategoriaModel->getCategorias();
		$this->load->model('ProdutoModel');
		$dados['dadosProduto']=$this->ProdutoModel->getProdutoById($id);
		$this->load->model('ComentariosModel');
		$dados['comentarios']=$this->ComentariosModel->getComentariosByIdProduct($id);
		$dados['home']="";
		$dados['sobre']="";
		$this->load->view('produtoDetalhe', $dados);
	}
	public function Comentar($idPessoa, $idProduto)
	{
		$comentarioConteudo = $_POST['conteudo'];
		$this->LoadBase();
		$this->load->model('CategoriaModel');
		$dados['categorias']=$this->CategoriaModel->getCategorias();
		$this->load->model('ProdutoModel');
		$dados['dadosProduto']=$this->ProdutoModel->getProdutoById($idProduto);
		$dadosComentario = array(
			'fkPessoa' => $idPessoa,
			'fkProduto' => $idProduto,
			'comentarioConteudo' => $comentarioConteudo
			);
		$str = $this->db->insert_string('Comentarios', $dadosComentario);
		$this->db->query($str);
		$sucess = $this->db->affected_rows();
		if ($sucess) {
			$this->session->set_userdata('mensage', 1);
			$this->session->set_userdata('tipomensage', 'is-success');
			$this->session->set_userdata('mensagem', 'Comentário adicionado com sucesso!');
			header('Location:'.base_url('index.php/detalhe/').$idProduto);
		}else{
			$this->session->set_userdata('mensage', 1);
			$this->session->set_userdata('tipomensage', 'is-danger');
			$this->session->set_userdata('mensagem', 'Falha ao efetuar comentário! Informe ao administrador.');
			header('Location:'.base_url('index.php/detalhe/').$idProduto);
		}
	}



}
