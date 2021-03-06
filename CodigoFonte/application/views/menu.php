
  <header class="hero is-light">
    <div class="hero-head">
      <nav class="navbar has-shadow" role="navigation" aria-label="main navigation">
        <div class="navbar-brand">

          <a class="navbar-item is--brand">
            <img class="navbar-brand-logo" src="<?php echo base_url('assets/img/logo.png')?>" alt="SublimeStore">
          </a>
          <a href="<?php echo base_url(); ?>" <?php echo 'class="navbar-item is-tab is-hidden-mobile '.$home.'"'?> ><span class="icon is-medium"><i class="fa fa-home"></i></span>Home</a>
          <button class="button navbar-burger" data-target="navMenu">
            <span></span>
            <span></span>
            <span></span>
          </button>
        </div>
        <!--Inicio do dropdown Masculino -->
        <div class="navbar-item has-dropdown is-hoverable is-hidden-mobile">
            <a class="navbar-link"> Masculino</a>
            <div class="navbar-dropdown">
                <?php
                $a=0;
                foreach ($categorias as $cat) {
                  if (($cat->sexo=="Masculino") || ($cat->sexo=="masculino")){
                    if($a==0){
                      $a++;
                    }else{
                      echo '<hr class="navbar-divider">';
                    }
                    echo '<a ';
                    echo ' href=" ';
                    echo base_url('index.php/listacategoria/'.$cat->idCategoria);
                    echo '"';
                    echo 'class="navbar-item">';
                    echo $cat->nome;
                    echo '</a>';
                   }
                 }
                ?>
            </div>
          </div>
        <!--Fim do dropdown Masculino -->
        <!--Inicio do dropdown Feminino -->
          <div class="navbar-item has-dropdown is-hoverable is-hidden-mobile">
            <a class="navbar-link"> Feminino</a>
            <div class="navbar-dropdown">
                <?php
                $a=0;
                foreach ($categorias as $cat) {
                  if (($cat->sexo=="Feminino") || ($cat->sexo=="feminino")){
                    if($a==0){
                      $a++;
                    }else{
                      echo '<hr class="navbar-divider">';
                    }
                    echo '<a ';
                    echo ' href=" ';
                    echo base_url('index.php/listacategoria/'.$cat->idCategoria);
                    echo '"';
                    echo 'class="navbar-item">';
                    echo $cat->nome;
                    echo '</a>';
                   }
                 }
                ?>          
            </div>
          </div>
        <!--Fim do dropdown Feminino -->
        <!--Inicio do Sobre -->
          <div class="navbar-brand">
              <a href="<?php echo base_url('index.php/sobre'); ?>" <?php echo 'class="navbar-item is-tab is-hidden-mobile  '.$sobre.'"'?>>Sobre</a>

          </div>
        <!--Fim do Sobre-->

        <!--inicio do Formulário de Busca-->
      <div class="navbar-brand">
        <div class="field has-addons is-hidden-mobile" style="margin-left:10%; -webkit-box-align: center;-ms-flex-align: center;align-items: center;display: -webkit-box;display: -ms-flexbox;display: flex;">
          <div class="control">
            <input class="input" type="text" placeholder="O que você procura?">
          </div>
          <div class="control">
            <a class="button is-custom">
              <i class="fas fa-search"></i>
            </a>
          </div>
         </div>
      </div>
            <!--Fim do Formulário de Busca-->



        <div class="navbar-menu navbar-end" id="navMenu" >

          <a class="navbar-item is-tab is-hidden-tablet is-active">Home</a>
          <a class="navbar-item is-tab is-hidden-tablet">Masculino</a>
          <a class="navbar-item is-tab is-hidden-tablet">Feminino</a>
          <a class="navbar-item is-tab is-hidden-tablet">Sobre</a>
          <?php
            echo '<a href="'.base_url('index.php/carrinho').'" class="navbar-item nav-tag">';
            echo '<span class="icon is-medium">';
            echo ' <i class="fa fa-cart-plus "></i>';
            echo '</span>';
            echo '<span class="tag is-primary tag-notif is-small" style="background-color: #fff;color: #cc99cc;"><b>'.$this->cart->total_items().'</b></span>';
            echo '</a>';
            ?>
          <div class="navbar-item has-dropdown is-hoverable">
            <?php
             if ((isset($this->session->loged))&&($this->session->loged==1)) {
               echo '<a class="navbar-link">';
                 echo '<figure class="image is-32x32" style="margin-right:.5em;">';
                   echo '<img src="'.base_url('assets/img/').$this->session->userImage.'">';
                 echo '</figure>';
                 echo $this->session->userName;
               echo '</a>';
              }else{
                 echo '<a class="navbar-link">';
                 echo '<figure class="image is-32x32" style="margin-right:.5em;">';
                 echo '<img src="'.base_url('assets/img/notloged.jpeg').'">';
                 echo '</figure>';
                 echo 'Convidado';
                 echo '</a>';
              }
            ?>          
            <div class="navbar-dropdown is-right">
              <?php
                if ((isset($this->session->loged))&&($this->session->loged==1)) {
                  echo '<a href="'.base_url('index.php/profile/').$this->session->idUser.'" class="navbar-item">';
                   echo ' <span class="icon is-small">';
                     echo ' <i class="fa fa-user-o"></i>';
                    echo '</span>';
                    echo 'Perfil';
                  echo '</a>';
                  if ($this->session->priv) {
                  echo '<hr class="navbar-divider">';  
                  echo '<a href="'.base_url('index.php/admin').'" class="navbar-item">';
                   echo ' <span class="icon is-small">';
                     echo ' <i class="fa fa-cogs"></i>';
                    echo '</span>';
                    echo 'Administrador';
                  echo '</a>';
                  }
                  echo '<hr class="navbar-divider">';
                  echo '<a href="'.base_url('index.php/sair').'" class="navbar-item">';
                    echo '<span class="icon is-small">';
                      echo '<i class="fa fa-power-off"></i>';
                    echo '</span>';
                    echo 'Logout';
                  echo '</a>';
                }else{
                  echo '<a class="navbar-item" href="'.base_url('index.php/login').'">';
                   echo ' <span class="icon is-small">';
                     echo ' <i class="fa fa-user-o"></i>';
                    echo '</span>';
                    echo '&nbsp;Entrar';
                  echo '</a>';
                  echo '<hr class="navbar-divider">';
                  echo '<a href="'.base_url('index.php/cadastrar').'" class="navbar-item">';
                    echo '<span class="icon is-small">';
                      echo '<i class="fa fa-user-plus"></i>';
                    echo '</span>';
                    echo '&nbsp;  Registrar-se';
                  echo '</a>';
                }
              ?>  
            </div> 
          </div>
        </div>
      </nav>
    </div>
  </header>
