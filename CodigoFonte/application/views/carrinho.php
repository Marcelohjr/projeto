<!DOCTYPE html>
<html>
  <head>
    <?php $this->load->view('head');?>
  </head>
  <body>
    <?php $this->load->view('menu');?>
    <!--Inicio do Conteúdo-->
      <div class="wrapper">
          <main class="column main" style="min-height: 100%; position: relative;">
            <nav class="breadcrumb is-small" aria-label="breadcrumbs">
              <ul>
               <li class="is-active"><a href="#"><i class="fa fa-tachometer"> </i> &nbsp;&nbsp;Carrinho</a></li>
              </ul>
            </nav>

            <div class="level">
              <div class="level-left">
                <div class="level-item">
                  <div class="title textTitle"><h1>Produtos</h1></div>
                </div>
              </div>
            </div>
              <?php 
                
                  if ($this->cart->total_items()==0) {    
                    echo '<div class="columns is-multiline">';
                    echo '<div class="column">'; 
                    echo '<br><br><br><br><br>';   
                    echo '<h2 style="font-family: proximanova-light,Arial,sans-serif;font-size:35px; text-align:center;"><i class="fa fa-frown-o fa-lg" aria-hidden="true"></i>&nbsp;Desculpe, você ainda não adicionou nenhum produto em seu carrinho!</h2>';    
                    echo '<br><br><br><br>';       
                    echo '</div>';
                    echo '</div>';
                  }else{
                    $totalValue = 0; 
                    foreach ($this->cart->contents() as $itens){     
                      echo '<div class="card" style="border-radius: 5px;">';
                          echo '<header class="card-header">';
                            echo '<p class="card-header-title">';
                               echo '<a href="#">'.$itens['name'].'</a>';
                            echo '</p>';
                            echo '<a href="'.base_url('index.php/rmvproduto/').$itens['rowid'].'" class="card-header-icon" aria-label="more options">';
                              echo '<span class="icon">';
                                echo '<i class="fas fa-times " aria-hidden="true"></i>';
                              echo '</span>';
                            echo '</a>';
                          echo '</header>';
                          echo '<div class="card-content">';
                            echo '<div class="content">';
                             echo '<div class="columns is-multiline" >';
                              echo '<div class="column">';
                               echo '<a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>';
                              echo '</div>';
                              echo '<div class="column">';
                              echo '<header class="">';
                                echo '<p class="card-header-title">';
                                 echo 'Descrição';
                                echo '</p>';
                              echo '</header>';
                               echo ' <div class="card-body" >';
                               echo '<p class="card-text">'.$itens['descricaoResumida'].'</p>';
                               echo '</div>';
                              echo '</div>';
                             echo '<div class="column">';
                              echo '<header class="">';
                                echo '<span class="card-header-title">';
                                echo '  Preço';
                                echo '</span>';
                              echo '</header>';
                              echo '<div class="card-body" >';
                              echo ' <h5>R$ &nbsp;'.$itens['price'].'</h5>';
                              echo ' </div>';

                           echo ' </div>';
                           echo ' <div class="column">  ';
                            echo '<header class="">';
                                echo '<span class="card-header-title">';
                                echo 'Quantidade';
                                echo '</span>';
                              echo '</header>';
                              echo '<div class="card-body" >';
                              echo ' <h5><form method="POST" action="'.base_url('index.php/updtproduto/').$itens['rowid'].'"><input type="number" class="input is-rounded" min="0" max="9999" style="width:50px;" value="'.$itens['qty'].'" name="qntItens">&nbsp;&nbsp;<input class="button is-primary is-outlined" type="submit" value="OK"></form></h5>';
                              echo ' </div>';
                              echo '<header class="">';
                                echo '<span class="card-header-title">';
                                echo 'Subtotal : R$ '.$itens['subtotal'];
                                echo '</span>';
                              echo '</header>';
                            echo '</div>';
                           echo ' </div>';
                           echo ' </div> ';
                         echo ' </div> ';
                       echo ' </div>';
                       echo ' <br>';
                       $totalValue += $itens['subtotal'];
                      }
                      echo '<div class="card" style="border-radius: 5px;">';
                          echo '<header class="card-header">';
                            echo '<p class="card-header-title">';
                               echo 'Total : R$ '.$totalValue;
                            echo '</p>';
                            echo '<button style="margin:1%;" class="button is-success">Finalizar Compra</button>';
                          echo '</header>';
                     } 
                    ?> 
                    

                    
      </main>           
     </div>              
    <!--Fim do Conteúdo-->
    <?php $this->load->view('rodape');?>
    <?php $this->load->view('scripts');?>
  </body>
</html>
