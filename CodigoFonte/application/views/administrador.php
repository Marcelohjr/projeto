<!DOCTYPE html>
<html>
  <head>
    <?php 
       $this->load->view('head');
     ?>
     <style type="text/css">
       .contenttd{
        font-size: 16px;
        text-align:center;
        padding: 7px;
        color: #7a7a7a;
        letter-spacing: 0.1em;
        font-weight: bold;
       }
       .add{
        width:65px; 
        height:65px;
        border-radius: 50%;
        position: absolute;
        right: 3%;
        text-align:center;
       }

       .cotd{
        font-size: 16px;
        text-align:center;
        padding: 7px;
        color: #7a7a7a;
        letter-spacing: 0.1em;
       }
       .cotr{
          border-top: solid 1px #dee2e6;
          border-bottom: solid 2px #dee2e6;
          margin:20px;
       }
       .cotrc{
          border-top: solid 1px #dee2e6;
          margin:20px;
       }
     </style>
  </head>
  <body style="background-color: #2e363f">
    <?php $this->load->view('menu');?>
    <!--Inicio do Conteúdo-->
      <div class="wrapper" style="background-color: #e6e6e6;   border-bottom: solid 1px #666;">
        <div class="columns">
          <aside class="column is-2 aside">
            <nav class="menu" style="padding: 10%;">
             <?php 
              echo '<img style="border-radius:50%; border: solid 5px #cc99cc;" src="'.base_url('assets/img/profile.jpg').'" alt="">';
            ?>
                <p class="menu-label">
                  Administrador
                </p>
                <ul class="menu-list">
                  <li><a class="is-active" id="slide" onclick="transicaoSlide();"><span class="icon is-small"><i class="fa fa-database"></i></span> Slide Show</a></li>
                  <li><a class="" id="categorias" onclick="transicaoCategorias();"><span class="icon is-small"><i class="fa fa-shopping-basket"></i></span> Categorias</a></li>
                  <li><a class="" id="produtos" onclick="transicaoProdutos();"><span class="icon is-small"><i class="fa fa-star-o"></i></span> Produtos</a></li>
                  <li><a class="" onclick="transicaoVendas();" id="vendas" ><span class="icon is-small"><i class="fa fa-shopping-basket"></i></span> Vendas</a></li>
                  <li><a class="" onclick="transicaoRelatorios();" id="relatorios" ><span class="icon is-small"><i class="fa fa-shopping-basket"></i></span> Relatórios</a></li>

                </ul>
                
            </nav>
          </aside>
          <main class="column main" style="min-height: 100%; position: relative;">
            <nav class="breadcrumb is-small" aria-label="breadcrumbs">
              <ul>
               <li class="is-active"><a href="#"><i class="fa fa-tachometer"> </i> &nbsp;&nbsp;Perfil</a></li>
              
            </nav>
            <?php 
              if ($this->session->mensage==1) {
                  echo '<div style="right: 2%; position: absolute; top: 2%; border-radius: 5px; border: solid 1px #d5d5d5;" id="no" class="notification '.$this->session->tipomensage.'">';
              ?>
                    <button class="delete" onclick="document.getElementById('no').style.display = 'none';"></button>
              <?php
                    echo $this->session->mensagem;
                    $this->session->mensage=0;
                  echo '</div>';
              }    
             ?>
            </ul>
                <div id="conteudoSlide" >
                  <p><h1 class="menu-label" style="font-size: 16px; color: black;">Meus Dados</h1></p>
                  <p><h1 class="menu-label" style="font-size: 16px;">Dados da Conta</h1></p>
                   <hr>
                 
                </div>
                <div id="conteudoCategorias" style="display: none;">
                  <div id="conteudocat">
                  <br>
                  
                   <table style="background-color: #fff; border-radius: 5px; position: relative; width: 100%">
                     <thead>
                      <h1 class="menu-label" style="font-size: 16px;">Categorias</h1><hr>
                      <tr class="cotr">
                        <td class="contenttd">
                          <p>
                            <b>#</b>
                          </p>
                        </td>
                        <td class="contenttd">
                          <p>
                            NOME
                          </p>
                        </td>
                        <td class="contenttd">
                          <p>
                            GENÊRO
                          </p>
                        </td>
                        <td class="contenttd">
                          <p>
                            OPERAÇÕES
                          </p>
                        </td>
                      </tr>
                      </thead>
                     <tbody>
                        <?php 
                          foreach ($categorias as $cat) {
                            echo '<tr class="cotrc">';
                                echo '<td class="cotd">';
                                  echo '<p>';
                                  echo $cat->idCategoria;
                                  echo '</p>';
                                echo '</td>';
                                echo '<td class="cotd">';
                                  echo '<p>';
                                  echo $cat->nome;
                                  echo '</p>';
                                echo '</td>';
                                echo '<td class="cotd">';
                                  echo '<p>';
                                  echo $cat->sexo;
                                  echo '</p>';
                                echo '</td>';
                                echo '<td class="cotd">';
                                  echo '<p>';
                                  echo 'editar';
                                  echo '</p>';
                                echo '</td>';
                            echo '</tr>';
                          } 
                      ?>
                     </tbody>  
                   </table>
                   <br>
                     <div class="add">
                        <a onclick="transicaoForm();">
                            <?php 
                                echo '<img  src="'.base_url('assets/img/addicon.png').'" alt="">';
                             ?> 
                        </a>
                    </div>
                  <br><br><br><br>
                  </div>
                  <div id="conteudoform" style="display: none;">
                      <form method="POST" <?php echo 'action="'.base_url('index.php/cadastrarcategoria').'"'; ?>>
                        <div>
                            <hr>
                            <p class="menu-label" style="font-size: 16px; text-align: center;">Cadastro de Categoria</p>
                            <hr>
                            <div class="field">
                              <label class="label">Nome da Categoria</label>
                              <div class="control has-icons-left">
                                <input class="input is-primary" name="cnome" type="text" placeholder="Nome da Categoria" required>
                              </div>
                            </div>
                             <div class="field">
                                <label class="label">Genêro da categoria</label>
                              <div class="field-body">
                                <div class="field is-narrow">
                                  <div class="control has-icons-left">
                                    <div class="select is-fullwidth is-primary">
                                      <select name="cgenero">
                                        <option value="Feminino">Feminino</option>
                                        <option value="Masculino">Masculino</option>
                                        <option value="Unisex">Unisex</option>
                                      </select>
                                    </div>
                                     <span class="icon is-small is-left">
                                      <i class="fas fa-venus-mars"></i>
                                    </span>
                                  </div>
                                </div>
                              </div>
                            </div>
                              <div class="field is-grouped is-grouped-right">
                                 <div class="control" style="text-align: right;">
                                  <span onclick="transicaoFormBack();" class="button is-info is-rounded" style="width: 100px;"><i class="fas fa-arrow-left"></i> &nbsp;  Voltar</span>
                                </div>
                                <div class="control" style="text-align: right;">
                                  <button  class="button is-success is-rounded" style="width: 100px;">Cadastrar &nbsp;  <i class="fas fa-check "></i></button>
                                </div>
                              </div> 
                        </div>
                        </form>
                  </div>
                </div> 
                <div id="conteudoProdutos" style="display: none;">
                  <div id="conteudoprod">
                  <br>
                   <table style="background-color: #fff; border-radius: 5px; position: relative; width: 100%">
                     <thead>
                      <h1 class="menu-label" style="font-size: 16px;">Produtos</h1><hr>
                      <tr class="cotr">
                        <td class="contenttd">
                          <p>
                            <b>#</b>
                          </p>
                        </td>
                        <td class="contenttd">
                          <p>
                            NOME
                          </p>
                        </td>
                        <td class="contenttd">
                          <p>
                            DESCRIÇÃO RESUMIDA
                          </p>
                        </td>
                        <td class="contenttd">
                          <p>
                            MARCA
                          </p>
                        </td>
                        <td class="contenttd">
                          <p>
                            VALOR DE CUSTO
                          </p>
                        </td>
                        <td class="contenttd">
                          <p>
                            CATEGORIA
                          </p>
                        </td>
                        <td class="contenttd">
                          <p>
                            QUANTIDADE
                          </p>
                        </td>
                        <td class="contenttd">
                          <p>
                            GENÊRO
                          </p>
                        </td>
                        <td class="contenttd">
                          <p>
                            OPERAÇÕES
                          </p>
                        </td>
                      </tr>
                      </thead>
                     <tbody>
                        <?php 
                          foreach ($produtos as $prod) {
                            echo '<tr class="cotrc">';
                                echo '<td class="cotd">';
                                  echo '<p>';
                                  echo $prod->idProduto;
                                  echo '</p>';
                                echo '</td>';
                                echo '<td class="cotd">';
                                  echo '<p>';
                                  echo $prod->nomeProduto;
                                  echo '</p>';
                                echo '</td>';
                                echo '<td class="cotd">';
                                  echo '<p>';
                                  echo $prod->descricaoResumida;
                                  echo '</p>';
                                echo '</td>';
                                echo '<td class="cotd">';
                                  echo '<p>';
                                  echo $prod->marca;
                                  echo '</p>';
                                echo '</td>';
                                echo '<td class="cotd">';
                                  echo '<p>';
                                  echo $prod->valorCusto;
                                  echo '</p>';
                                echo '</td>';
                                echo '<td class="cotd">';
                                  echo '<p>';
                                  echo $prod->categoria;
                                  echo '</p>';
                                echo '</td>';
                                echo '<td class="cotd">';
                                  echo '<p>';
                                  echo $prod->quantidade;
                                  echo '</p>';
                                echo '</td>';
                                echo '<td class="cotd">';
                                  echo '<p>';
                                  echo $prod->genero;
                                  echo '</p>';
                                echo '</td>';
                                echo '<td class="cotd">';
                                  echo '<p>';
                                  echo 'editar';
                                  echo '</p>';
                                echo '</td>';
                            echo '</tr>';
                          } 
                      ?>
                     </tbody>  
                   </table>
                   <br>
                     <div class="add">
                        <a onclick="transicaoFormProdutos();">
                            <?php 
                                echo '<img  src="'.base_url('assets/img/addicon.png').'" alt="">';
                             ?> 
                        </a>
                    </div>
                  <br><br><br><br>
                  </div>
                  <div id="conteudoformprodutos" style="display: none;">
                      <form method="POST" <?php echo 'action="'.base_url('index.php/cadastrarprodutos').'"'; ?>>
                        <div id="pessoais">
                            <hr>
                            <p class="menu-label" style="font-size: 16px; text-align: center;">Cadastro de Produto</p>
                            <hr>
                            <div class="field">
                              <label class="label">Nome do produto</label>
                              <div class="control has-icons-left">
                                <input class="input is-primary" name="pnome" type="text" placeholder="Nome do Produto" required>
                              </div>
                            </div>
                            <div class="field">
                            <label class="label">Marca</label>
                            <div class="control has-icons-left has-icons-right">
                              <input class="input is-primary" name="marca" type="text" placeholder="Marca">
                            </div>
                          </div>

                          <div class="field">
                              <label class="label">Valor de custo</label>
                              <div class="control has-icons-left">
                                <input class="input is-primary" name="valorcusto" type="number" step="0.01" placeholder="Valor" required>
                              </div>
                            </div>

                          <div class="field">
                            <label class="label">Percentual de lucro</label>
                            <div class="control has-icons-left has-icons-right">
                              <input class="input is-primary" name="percentuallucro" type="number">                             
                            </div>
                          </div>   

                          <div class="field">
                            <label class="label">Desconto</label>
                            <div class="control has-icons-left has-icons-right">
                              <input class="input is-primary" name="desconto" type="number" step="0.01">                             
                            </div>
                          </div>                                           


                          <div class="field">
                                <label class="label">Categoria</label>
                              <div class="field-body">
                                <div class="field is-narrow">
                                  <div class="control has-icons-left">
                                    <div class="select is-fullwidth is-primary">
                                      <select name="categoria" >
                                        <?php 
                                            foreach ($categorias as $cat) {
                                              echo '<option value="'.$cat->idCategoria.'">'.$cat->nome.' - '.$cat->sexo.'</option>';
                                            }
                                         ?>
                                      </select>
                                    </div>
                                     <span class="icon is-small is-left">
                                      <i class="fas fa-venus-mars"></i>
                                    </span>
                                  </div>
                                </div>
                              </div>
                            </div>

                            <div class="field">
                            <label class="label">Quantidade</label>
                            <div class="control has-icons-left has-icons-right">
                              <input class="input is-primary" name="quantidade" type="number">                             
                            </div>
                          </div>  
                          <div class="field">
                                <label class="label">Genêro do produto</label>
                              <div class="field-body">
                                <div class="field is-narrow">
                                  <div class="control has-icons-left">
                                    <div class="select is-fullwidth is-primary">
                                      <select name="pgenero">
                                        <option value="Feminino">Feminino</option>
                                        <option value="Masculino">Masculino</option>
                                        <option value="Unisex">Unisex</option>
                                      </select>
                                    </div>
                                     <span class="icon is-small is-left">
                                      <i class="fas fa-venus-mars"></i>
                                    </span>
                                  </div>
                                </div>
                              </div>
                            </div>
                          
                            <div class="field">
                                <label class="label">Descrição Resumida</label>
                              <div class="field-body">
                                <div class="field">
                                  <div class="control ">
                                    <textarea class="textarea is-primary" name="descricaoresumida" placeholder="Informe um ponto de referência."></textarea>
                                  </div>
                                </div>
                              </div>
                            </div>

                              <div class="field">
                                  <label class="label">Descrição Completa</label>
                                <div class="field-body">
                                  <div class="field">
                                    <div class="control ">
                                      <textarea class="textarea is-primary" name="descricao" placeholder="Informe um ponto de referência."></textarea>
                                    </div>
                                  </div>
                                </div>
                              </div>

                              <div class="field is-grouped is-grouped-right">
                                <div class="control" style="text-align: right;">
                                  <span onclick="transicaoFormProdutosBack();" class="button is-info is-rounded" style="width: 100px;"><i class="fas fa-arrow-left"></i> &nbsp;  Voltar</span>
                                </div>
                                 <div class="control" style="text-align: right;">
                                  <button class="button is-success is-rounded" style="width: 100px;">Cadastrar &nbsp;  <i class="fas fa-check "></i></button>
                                </div>
                              </div> 

                              <br>
                        </div>
                      </div>
                </div>
                <div id="conteudoVendas" style="display: none;">
                  
                </div>
                <div id="conteudoRelatorios" style="display: none;">
                  
                </div>
                    
      </main>           
     </div>
     </div>              
    <!--Fim do Conteúdo-->
    <?php $this->load->view('rodape');?>
    <script type="text/javascript">
      function transicaoSlide(){
        document.getElementById('categorias').className = '';
        document.getElementById('produtos').className = '';
        document.getElementById('vendas').className = '';
        document.getElementById('relatorios').className = '';
        document.getElementById('slide').className= 'is-active'; 
        document.getElementById('conteudoRelatorios').style.display = 'none';
        document.getElementById('conteudoVendas').style.display = 'none';
        document.getElementById('conteudoProdutos').style.display = 'none';
        document.getElementById('conteudoCategorias').style.display = 'none';
        document.getElementById('conteudoSlide').style.display = 'block';     
      }
      function transicaoForm(){
        document.getElementById('conteudocat').style.display = 'none';
        document.getElementById('conteudoform').style.display = 'block';
      }
      function transicaoFormBack(){
        document.getElementById('conteudocat').style.display = 'block';
        document.getElementById('conteudoform').style.display = 'none';
      }
      function transicaoFormProdutos(){
        document.getElementById('conteudoprod').style.display = 'none';
        document.getElementById('conteudoformprodutos').style.display = 'block';
      }
      function transicaoFormProdutosBack(){
        document.getElementById('conteudoprod').style.display = 'block';
        document.getElementById('conteudoformprodutos').style.display = 'none';
      }
      
      function transicaoVendas(){
        document.getElementById('categorias').className = '';
        document.getElementById('produtos').className = '';
        document.getElementById('vendas').className = 'is-active';
        document.getElementById('relatorios').className = '';
        document.getElementById('slide').className= ''; 
        document.getElementById('conteudoRelatorios').style.display = 'none';
        document.getElementById('conteudoVendas').style.display = 'block';
        document.getElementById('conteudoProdutos').style.display = 'none';
        document.getElementById('conteudoCategorias').style.display = 'none';
        document.getElementById('conteudoSlide').style.display = 'none';   
      }
      function transicaoCategorias(){
        document.getElementById('categorias').className = 'is-active';
        document.getElementById('produtos').className = '';
        document.getElementById('vendas').className = '';
        document.getElementById('relatorios').className = '';
        document.getElementById('slide').className= ''; 
        document.getElementById('conteudoRelatorios').style.display = 'none';
        document.getElementById('conteudoVendas').style.display = 'none';
        document.getElementById('conteudoProdutos').style.display = 'none';
        document.getElementById('conteudoCategorias').style.display = 'block';
        document.getElementById('conteudoSlide').style.display = 'none'; 
      }
      function transicaoProdutos(){
        document.getElementById('categorias').className = '';
        document.getElementById('produtos').className = 'is-active';
        document.getElementById('vendas').className = '';
        document.getElementById('relatorios').className = '';
        document.getElementById('slide').className= ''; 
        document.getElementById('conteudoRelatorios').style.display = 'none';
        document.getElementById('conteudoVendas').style.display = 'none';
        document.getElementById('conteudoProdutos').style.display = 'block';
        document.getElementById('conteudoCategorias').style.display = 'none';
        document.getElementById('conteudoSlide').style.display = 'none'; 
      }
      function transicaoRelatorios(){
        document.getElementById('categorias').className = '';
        document.getElementById('produtos').className = '';
        document.getElementById('vendas').className = '';
        document.getElementById('relatorios').className = 'is-active';
        document.getElementById('slide').className= ''; 
        document.getElementById('conteudoRelatorios').style.display = 'block';
        document.getElementById('conteudoVendas').style.display = 'none';
        document.getElementById('conteudoProdutos').style.display = 'none';
        document.getElementById('conteudoCategorias').style.display = 'none';
        document.getElementById('conteudoSlide').style.display = 'none'; 
      }
    </script>
    <?php $this->load->view('scripts');?>
  </body>
</html>
