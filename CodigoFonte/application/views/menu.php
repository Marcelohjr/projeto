
  <header class="hero is-light">
    <div class="hero-head">
      <nav class="navbar has-shadow" role="navigation" aria-label="main navigation">
        <div class="navbar-brand">

          <a class="navbar-item is--brand">
            <img class="navbar-brand-logo" src="<?php echo base_url('assets/img/logo.png')?>" alt="SublimeStore">
          </a>
          <a class="navbar-item is-tab is-hidden-mobile is-active"><span class="icon is-medium"><i class="fa fa-home"></i></span>Home</a>
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
                <a class="navbar-item">
                  <span class="icon is-small">
                    <i class="fa fa-user-o"></i>
                  </span>
                  Profile
                </a>
                <hr class="navbar-divider">
                <a class="navbar-item">
                  <span class="icon is-small">
                    <i class="fa fa-power-off"></i>
                  </span>
                  Logout
                </a>
            </div>
          </div>
        <!--Fim do dropdown Masculino -->
        <!--Inicio do dropdown Feminino -->
          <div class="navbar-item has-dropdown is-hoverable is-hidden-mobile">
            <a class="navbar-link"> Feminino</a>
            <div class="navbar-dropdown">
                <a class="navbar-item">
                  <span class="icon is-small">
                    <i class="fa fa-user-o"></i>
                  </span>
                  Profile
                </a>
                <hr class="navbar-divider">
                <a class="navbar-item">
                  <span class="icon is-small">
                    <i class="fa fa-power-off"></i>
                  </span>
                  Logout
                </a>
            </div>
          </div>
        <!--Fim do dropdown Feminino -->
        <!--Inicio do Sobre -->
          <div class="navbar-brand">
              <a class="navbar-item is-tab is-hidden-mobile">Sobre</a>

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
          <a class="navbar-item nav-tag">
            <span class="icon is-small">
              <i class="fa fa-envelope-o"></i>
            </span>
            <span class="tag is-primary tag-notif">6</span>
          </a>
          <div class="navbar-item has-dropdown is-hoverable">
            <a class="navbar-link">
              <figure class="image is-32x32" style="margin-right:.5em;">
                <img src="https://avatars1.githubusercontent.com/u/7221389?v=4&s=32">
              </figure>
              mazipan
            </a>

            <div class="navbar-dropdown is-right">
                <a class="navbar-item">
                  <span class="icon is-small">
                    <i class="fa fa-user-o"></i>
                  </span>
                  Profile
                </a>
                <hr class="navbar-divider">
                <a class="navbar-item">
                  <span class="icon is-small">
                    <i class="fa fa-power-off"></i>
                  </span>
                  Logout
                </a>
            </div>
          </div>
        </div>
      </nav>
    </div>
  </header>
