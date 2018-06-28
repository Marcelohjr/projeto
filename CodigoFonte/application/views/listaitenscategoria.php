<!DOCTYPE html>
<html>
  <head>
    <?php $this->load->view('head');?>
  </head>
  <body>
    <?php $this->load->view('menu');?>
    <!--Inicio do Conteúdo-->
      <div class="wrapper">
          <main class="column main">
            <nav class="breadcrumb is-small" aria-label="breadcrumbs">
              <ul>
              <?php 
                foreach ($categorias as $ca) {
                  if ($idCat==$ca->idCategoria) {
                    echo '<li class="is-active"><a href="#"><i class="fa fa-tachometer"> </i> &nbsp;&nbsp;'.$ca->sexo.'</a></li>';
                    echo '<li class="is-active"><a href="#">&nbsp;&nbsp;'.$ca->nome.'</a></li>';
                  }
                }
               ?>
              </ul>
            </nav>

            <div class="level">
              <div class="level-left">
                <div class="level-item">
                  <div class="title textTitle"><h1>Resultados</h1></div>
                </div>
              </div>
            </div>
              <?php 
                  if (empty($produtos)) {    
                    echo '<div class="columns is-multiline">';
                    echo '<div class="column">'; 
                    echo '<br><br><br><br><br>';   
                    echo '<h2 style="font-family: proximanova-light,Arial,sans-serif;font-size:35px; text-align:center;"><i class="fa fa-frown-o fa-lg" aria-hidden="true"></i>&nbsp;Desculpe, nenhum resultado encontrado!</h2>';    
                    echo '<br><br><br><br>';       
                    echo '</div>';
                    echo '</div>';
                  }else{
                    $cont=0;
                    $controle=0;/*variavel de controle para abertura e fechamento da div is-multiline*/
                    foreach ($produtos as $prod) {
                      if ((($cont!=0)&&($cont%5)==0)&&($controle==1)){
                        echo '</div>';
                        $controle=0;
                      } 
                     if (($cont==0) || (($cont%5)==0)) {
                        $controle=1;
                        echo '<div class="columns is-multiline">';
                      } 
                     echo '<div class="column" style="max-width: 20%;">';
                     echo '<div class="card-an h-100">';
                     echo '<a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>';
                     echo '<div class="card-body" >';
                     echo '<h4 class="card-title">';
                     echo '<a href="#">'.$prod->nomeProduto.'</a>';
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
                     $cont++;
                    }
                    echo '</div>';
                  }  
               ?>

      </main>           
     </div>              
    <!--Fim do Conteúdo-->
    <?php $this->load->view('rodape');?>
    <?php $this->load->view('scripts');?>
  </body>
</html>
