<!DOCTYPE html>
<html>
  <head>
    <link href="<?php echo base_url('assets/css/carousel.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/shop-homepage.css')?>" rel="stylesheet">
    <?php $this->load->view('head');?>
  </head>
  <body>
    <?php $this->load->view('menu');?>
    <!--Inicio do Conteúdo-->
      <div class="wrapper">
          <main class="column main">
            <nav class="breadcrumb is-small" aria-label="breadcrumbs">
              <ul>
                <li><a href="#"><i class="fa fa-tachometer"> </i> &nbsp;&nbsp;<?php foreach($categorias as $ca){
                  if($ca->idCategoria==$dadosProduto[0]->categoria){
                            echo $ca->sexo;
                          }}?></a></li>
                 <li class="is-active"><a href="#"> &nbsp;&nbsp;<?php echo $dadosProduto[0]->nomeProduto; ?></a></li>
              </ul>
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
            <div class="card" style="width: 60%; left: 20%; border-radius: 5px; padding: 2%">
                  <div class="columns is-multiline">
                    <div style="width: 100%;">
                       <hr>
                        <p class="menu-label" style="font-size: 16px; text-align: center;"><?php echo $dadosProduto[0]->nomeProduto; ?></p>
                       <hr>
                     </div>
                    <div class="column" style="width: 20%; padding: 2%;">
                        <div style="width: 100%; margin-bottom: 10px;"><a><img data-target="#carouselExampleIndicators" data-slide-to="0" class="active" src="http://placehold.it/900x350"></a></div>
                        <div style="width: 100%; margin-bottom: 10px;"><a><img data-target="#carouselExampleIndicators" data-slide-to="1" src="http://placehold.it/900x350"></a></div>
                        <div style="width: 100%; margin-bottom: 10px;"><a><img data-target="#carouselExampleIndicators" data-slide-to="2" src="http://placehold.it/900x350"></a></div>
                    </div>

                   <div style="width: 80%;">
                      <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel"> 
                        <div class="carousel-inner" role="listbox">
                          <div class="carousel-item active">
                            <img class="d-block img-fluid" src="http://placehold.it/900x350" alt="First slide">
                          </div>
                          <div class="carousel-item">
                            <img class="d-block img-fluid" src="http://placehold.it/900x350" alt="Second slide">
                          </div>
                          <div class="carousel-item">
                            <img class="d-block img-fluid" src="http://placehold.it/900x350" alt="Third slide">
                          </div>

                        </div>
                      </div>
                   </div>
                   <div style="width: 100%;">
                     <br>
                     <hr>
                      <p class="menu-label" style="font-size: 16px; text-align: left;">Descrição</p>
                     <hr>
                     <p  style="font-size: 16px; text-align: justify; position: relative; color: #000; word-wrap: break-word;"><?php echo $dadosProduto[0]->descricao; ?>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</p>
                     <br>
                     <?php 
                        echo '<h2><b>Marca : </b>'.$dadosProduto[0]->marca.'<h2>'; 
                        foreach($categorias as $ca){
                          if($ca->idCategoria==$dadosProduto[0]->categoria){
                            echo '<h2><b>Genêro : </b>'.$ca->sexo.'<h2>';
                          }

                        }
                     ?>
                   </div>
                  </div>

            
            </div>
           <br><br>
           <div class="card" style="width: 60%; left: 20%; border-radius: 5px; ">
               <header class="card-header" style="padding: 2%;">
               <p class="card-header-title">
                <?php echo 'Valor : R$ '.($dadosProduto[0]->valorCusto+(($dadosProduto[0]->valorCusto*$dadosProduto[0]->percentualLucro)/100)); ?>
               </p>
               <?php 
               echo '<a style="margin:1%;" class="button is-primary" href="'.base_url('index.php/addcarrinho/'.$dadosProduto[0]->idProduto).'">Adicionar ao carrinho</a>'
                ?>
               <button style="margin:1%;" class="button is-success">Comprar</button>
               </header>

            </div>
            <br><br>
            <div class="card" style="width: 60%; left: 20%; padding: 2%; border-radius: 5px; ">
              <hr>
                <p class="menu-label" style="font-size: 16px; text-align: left;">Comentários</p>
             <hr>
             <br>
             <div>
                <?php
                if (empty($comentarios)) {
                    echo '<p>Nenhum comentário! Seja o primeiro a comentar.</p>';
                }else{
                  foreach ($comentarios as $c) {
                    echo '<p>'.$c->comentarioConteudo.'</p>';
                    echo '<small style="color: #6c757d;" class="text-muted">Postado por '.$c->pessoaNome.'</small>';
                    echo '<hr>';
                  }
                 } 
                ?>
             </div>
                 <div>
                   <form method="POST" <?php echo 'action="'.base_url('index.php/setcomentario/').$this->session->idUser.'/'.$dadosProduto[0]->idProduto.'"'; ?> >
                      <div class="field">
                        <label class="label">Comentar</label>
                        <div class="control is-grouped has-icons-left has-icons-right">
                          <input style="width: 90%;" class="input is-primary" name="conteudo" type="text" placeholder="Seu comentário...">
                          <span class="icon is-small is-left">
                           <i class="fa fa-commenting" aria-hidden="true"></i>
                          </span>
                          <input class="button is-grouped is-primary is-outlined" type="submit" value="OK" <?php   if ((isset($this->session->loged))&&($this->session->loged==1)) {echo "";}else{echo "disabled";}?> >
                        </div>
                      </div>
                   </form>
                 </div>
            </div>
          </main>
      </div>
    <!--Fim do Conteúdo-->
      <!--Inicio Script google Maps-->
    <script>
     
   </script>
  <!--Fim do Script-->
    <?php $this->load->view('rodape');?>
    <?php $this->load->view('scripts');?>
     <script src="<?php echo base_url('assets/js/jquery.min.js')?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.bundle.min.js')?>"></script>
  </body>
</html>
