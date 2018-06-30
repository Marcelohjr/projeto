<!DOCTYPE html>
<html>
  <head>
    <?php $this->load->view('head');?>
    <link href="<?php echo base_url('assets/css/carousel.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/modern-business.css')?>" rel="stylesheet">
  </head>
  <body>
    <?php $this->load->view('menu');?>
    <?php $this->load->view('Slide');?>
    <!--Inicio do Conteúdo-->
      <div class="wrapper">
          <main class="column main">
            <nav class="breadcrumb is-small" aria-label="breadcrumbs">
              <ul>
                <li class="is-active"><a href="#"><i class="fa fa-tachometer"> </i> &nbsp;&nbsp;Home</a></li>
              </ul>
            </nav>

            <div class="level">
              <div class="level-left">
                <div class="level-item">
                  <div class="title textTitle"><h1>Ofertas da semana</h1></div>
                </div>
              </div>
              <div class="level-right">
                <div class="level-item">
                  <a style="Color:#666;"><i class="fas fa-plus-circle" >Ver mais</i></a>
                </div>
              </div>
            </div>

            <div class="columns is-multiline">

              <?php 
                  if (empty($lastprodutos)) {    
                    echo '<div class="columns is-multiline">';
                    echo '<div class="column">'; 
                    echo '<br><br><br><br><br>';   
                    echo '<h2 style="font-family: proximanova-light,Arial,sans-serif;font-size:35px; text-align:center;"><i class="fa fa-frown-o fa-lg" aria-hidden="true"></i>&nbsp;Desculpe, nenhum resultado encontrado!</h2>';    
                    echo '<br><br><br><br>';       
                    echo '</div>';
                    echo '</div>';
                  }else{
                     foreach ($lastprodutos as $prod) {
                       echo '<div class="column" style="max-width: 20%;">';
                       echo '<div class="card-an h-100">';
                       echo '<a href="'.base_url('index.php/detalhe/').$prod->idProduto.'"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>';
                       echo '<div class="card-body" >';
                       echo '<h4 class="card-title">';
                       echo '<a href="'.base_url('index.php/detalhe/').$prod->idProduto.'">'.$prod->nomeProduto.'</a>';
                       echo '</h4>';
                       $valor = $prod->valorCusto + (($prod->valorCusto*$prod->percentualLucro)/100);
                       echo '<h5>R$ &nbsp;'.$valor.'</h5>';
                       echo '<p class="card-text">'.$prod->descricaoResumida.'</p>';
                       echo '</div>';
                       echo '<div class="card-footer">';
                       echo '<small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>';
                       echo '<a href="'.base_url('index.php/addcarrinho/'.$prod->idProduto).'" class="button is-rounded is-primary level-right is-small " style="right: 4%; position: absolute; bottom: 3% "><b>Adicionar</b></a>';
                       echo '</div>';
                       echo '</div>';
                       echo '</div>';  
                     }             
                  }  
               ?>
            </div>
            <div class="level">
              <div class="level-left">
                <div class="level-item">
                  <div class="title textTitle"><h1>Produtos mais populares</h1></div>
                </div>
              </div>
              <div class="level-right">
                <div class="level-item">
                  <a style="Color:#666;"><i class="fas fa-plus-circle" >Ver mais</i></a>
                </div>
              </div>
            </div>
            <div class="columns is-multiline">
                <?php 
                  if (empty($maisvendidosprodutos)) {    
                    echo '<div class="columns is-multiline">';
                    echo '<div class="column">'; 
                    echo '<br><br><br><br><br>';   
                    echo '<h2 style="font-family: proximanova-light,Arial,sans-serif;font-size:35px; text-align:center;"><i class="fa fa-frown-o fa-lg" aria-hidden="true"></i>&nbsp;Desculpe, nenhum resultado encontrado!</h2>';    
                    echo '<br><br><br><br>';       
                    echo '</div>';
                    echo '</div>';
                  }else{
                     foreach ($maisvendidosprodutos as $prod) {
                       echo '<div class="column" style="max-width: 20%;">';
                       echo '<div class="card-an h-100">';
                       echo '<a href="'.base_url('index.php/detalhe/').$prod->idProduto.'"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>';
                       echo '<div class="card-body" >';
                       echo '<h4 class="card-title">';
                       echo '<a href="'.base_url('index.php/detalhe/').$prod->idProduto.'">'.$prod->nomeProduto.'</a>';
                       echo '</h4>';
                       $valor = $prod->valorCusto + (($prod->valorCusto*$prod->percentualLucro)/100);
                       echo '<h5>R$ &nbsp;'.$valor.'</h5>';
                       echo '<p class="card-text">'.$prod->descricaoResumida.'</p>';
                       echo '</div>';
                       echo '<div class="card-footer">';
                       echo '<small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>';
                       echo '<a href="'.base_url('index.php/addcarrinho/'.$prod->idProduto).'" class="button is-rounded is-primary level-right is-small " style="right: 4%; position: absolute; bottom: 3% "><b>Adicionar</b></a>';
                       echo '</div>';
                       echo '</div>';
                       echo '</div>';  
                     }             
                  }  
               ?>    
            </div>
                        <div class="level">
                          <div class="level-left">
                            <div class="level-item">
                              <div class="title textTitle"><h1>Informações Importantes</h1></div>
                            </div>
                          </div>
                        </div>
                        <div class="columns is-multiline">
                                <div class="column">
                                    <section class="site-shopping-info" type="site-shopping-info">
                                      <div class="container">
                                        <div class="info-slide">
                                          <div class="img-container">
                                            <img src="<?php echo base_url('assets/img/payment.svg')?>" class="img-container" alt="Pague com cartão de crédito ou boleto">
                                          </div>
                                          <h1>Pague com cartão de crédito ou boleto
                                          </h1>
                                          <p>Aqui você paga parcelado sem juros ou à vista no boleto. É sempre seguro!
                                          </p>

                                        </div>
                                        <div class="info-slide">
                                          <div class="img-container">
                                            <img src="<?php echo base_url('assets/img/shipping.svg')?>" class="img-container" alt="Frete grátis a partir de R$ 120">
                                          </div>
                                          <h1>Frete grátis em produtos selecionados
                                          </h1>
                                          <p>Só por estar cadastrado no nosso site, você tem frete grátis em vários de produtos selecionados.
                                          </p>
                                        </div>
                                        <div class="info-slide">
                                          <div class="img-container">
                                            <img src="<?php echo base_url('assets/img/protected.svg')?>" class="img-container" alt="Segurança, do início ao fim">
                                          </div>
                                          <h1>Segurança, do início ao fim</h1>
                                          <p>Você não gostou do que comprou? Devolva! Aqui não há nada que você não possa fazer, porque você está sempre protegido.
                                          </p>
                                        </div>
                                      </div>
                                    </section>
                        </div>

            </div>
          </main>
      </div>
    <!--Fim do Conteúdo-->

    <?php $this->load->view('rodape');?>
    <?php $this->load->view('scripts');?>
    <script src="<?php echo base_url('assets/js/jquery.min.js')?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.bundle.min.js')?>"></script>
  </body>
</html>
