<!DOCTYPE html>
<html>
  <head>
    <?php 
       $this->load->view('head');
     ?>
     
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
                  <li><a class="is-active" id="dados" onclick="transicaoMeusDados();"><span class="icon is-small"><i class="fa fa-database"></i></span> Slide Show</a></li>
                  <li><a class="" id="compras" onclick="transicaoCompras();"><span class="icon is-small"><i class="fa fa-shopping-basket"></i></span> Categorias</a></li>
                  <li><a class="" id="favoritos" onclick="transicaoFavoritos();"><span class="icon is-small"><i class="fa fa-star-o"></i></span> Produtos</a></li>
                  <li><a class="" id="a" ><span class="icon is-small"><i class="fa fa-shopping-basket"></i></span> Vendas</a></li>
                  <li><a class="" id="a" ><span class="icon is-small"><i class="fa fa-shopping-basket"></i></span> Relatórios</a></li>

                </ul>
                
            </nav>
          </aside>
          <main class="column main" style="min-height: 100%; position: relative;">
            <nav class="breadcrumb is-small" aria-label="breadcrumbs">
              <ul>
               <li class="is-active"><a href="#"><i class="fa fa-tachometer"> </i> &nbsp;&nbsp;Perfil</a></li>
              
            </nav>
            
            </ul>
                <div id="conteudoDadosPessoais" >
                  <p><h1 class="menu-label" style="font-size: 16px; color: black;">Meus Dados</h1></p>
                  <p><h1 class="menu-label" style="font-size: 16px;">Dados da Conta</h1></p>
                   <hr>
                 
                    <?php 
                      $tipo = "";
                      if ($dadoUsuario[0]->privilegio) {
                        $tipo = "Administrador";
                      }else{
                        $tipo = "Padrão";
                      }
                      echo '<p><h2>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-envelope fa-lg"></i>&nbsp;&nbsp;<b>Email:   </b>'.$dadoUsuario[0]->email.'</h2></p>';
                      echo '<p><h2>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-lock fa-lg"> </i>&nbsp;&nbsp;<b>Senha:     </b>***********</h2></p>';
                      echo '<p><h2>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-wrench fa-lg"></i>&nbsp;&nbsp;<b>Tipo de conta:    </b>'.$tipo.'</h2></p>';
                     ?>
                  <br>
                  <p><h1 class="menu-label" style="font-size: 16px;">Dados Pessoais</h1></p><hr>
                  <?php 
                      echo '<p><h2>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-user fa-lg"></i>&nbsp;&nbsp;<b>Nome: </b>'.$dadoUsuario[0]->nome.'</h2></p>';
                      echo '<p><h2>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-id-card fa-lg"></i>&nbsp;&nbsp;<b>CPF:   </b>'.$dadoUsuario[0]->cpf.'</h2></p>';
                      /*if (($dadoUsuario[0]->sexo=="M")||($dadoUsuario[0]->sexo=="m")||($dadoUsuario[0]->sexo=="Masculino")||($dadoUsuario[0]->sexo=="masculino")||($dadoUsuario[0]->sexo==1)) {
                        echo '<p><h2>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-male fa-lg"></i>&nbsp;&nbsp;<b>Sexo:   </b>'.$dadoUsuario[0]->sexo.'</h2></p>';
                      }else{
                        echo '<p><h2>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-female fa-lg"></i>&nbsp;&nbsp;<b>Sexo:   </b>'.$dadoUsuario[0]->sexo.'</h2></p>';

                      }*/
                      echo '<p><h2>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-phone fa-lg"></i>&nbsp;&nbsp;<b>Telefone:   </b>'.$dadoUsuario[0]->telefone.'</h2></p>';
                      echo '<p><h2>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-calendar fa-lg"></i>&nbsp;&nbsp;<b>Nascimento:   </b>'.$dadoUsuario[0]->dataNascimento.'</h2></p>';
                   ?>
                  <br>
                  <p><h1 class="menu-label" style="font-size: 16px;">Endereço</h1></p><hr>
                    <?php 
                      echo '<p><h2>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-map-marker fa-lg"></i>&nbsp;&nbsp;<b>'.$dadoEndereco[0]->logradouro.'&nbsp;'.$dadoEndereco[0]->endereco.', &nbsp;'.$dadoEndereco[0]->numero.'</b></h2></p>';
                      echo '<p><h2>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$dadoEndereco[0]->complemento.', &nbsp;&nbsp;'.$dadoEndereco[0]->bairro.'</h2></p>';
                      echo '<p><h2>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$dadoEndereco[0]->cep.',&nbsp;&nbsp;'.$dadoEndereco[0]->cidade.'&nbsp; - &nbsp;'.$dadoEndereco[0]->estado.'</h2></p>';
                      echo '<p><h2>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-map-pin fa-lg"></i>&nbsp;&nbsp;<b>Referência:   </b>'.$dadoEndereco[0]->referencia.'</h2></p>';
                     ?>
                  <br>
                </div>
                <div id="conteudoCompras" style="display: none;">
                  
                <div id="conteudoFavoritos" style="display: none;">
                  
                </div>
                    
      </main>           
     </div>
     </div>              
    <!--Fim do Conteúdo-->
    <?php $this->load->view('rodape');?>
    <script type="text/javascript">
      function transicaoMeusDados(){
        document.getElementById('dados').className = '';
        document.getElementById('compras').className = '';
        document.getElementById('favoritos').className = '';
        document.getElementById('conteudoCompras').style.display = 'none';
        document.getElementById('conteudoFavoritos').style.display = 'none';
        document.getElementById('conteudoDadosPessoais').style.display = 'block';
        document.getElementById('dados').className= 'is-active'; 
      }
      function transicaoCompras(){
        document.getElementById('dados').className = '';
        document.getElementById('compras').className = '';
        document.getElementById('favoritos').className = '';
        document.getElementById('conteudoFavoritos').style.display = 'none';
        document.getElementById('conteudoDadosPessoais').style.display = 'none';
        document.getElementById('conteudoCompras').style.display = 'block';
        document.getElementById('compras').className= 'is-active'; 
      }
      function transicaoFavoritos(){
        document.getElementById('dados').className = '';
        document.getElementById('compras').className = '';
        document.getElementById('favoritos').className = '';
        document.getElementById('conteudoDadosPessoais').style.display = 'none';
        document.getElementById('conteudoCompras').style.display = 'none';
        document.getElementById('conteudoFavoritos').style.display = 'block';
        document.getElementById('favoritos').className= 'is-active'; 
      }
    </script>
    <?php $this->load->view('scripts');?>
  </body>
</html>
