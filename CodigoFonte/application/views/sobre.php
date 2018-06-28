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
                <li class="is-active"><a href="#"><i class="fa fa-info"> </i> &nbsp;&nbsp;Sobre</a></li>
              </ul>
            </nav>

            <div class="level">
              <div class="level-left">
                <div class="level-item">
                  <div class="title textTitle"><h1>Sobre nós</h1></div>
                </div>
              </div>
            </div>

            <div class="columns is-multiline">

              <div class="column">
                  <div style="overflow: hidden; background-color: #fff; margin: 20px; border-radius: 10px;  margin: 16px 0 0;">
                    <div style="margin:20px;">
                      aaa
                    </div>
                  </div>
              </div>
            </div>

            <div class="level">
              <div class="level-left">
                <div class="level-item">
                  <div class="title textTitle"><h1>Contatos</h1></div>
                </div>
              </div>
            </div>
            <div class="columns is-multiline">
             <div class="column">
                 <div style="overflow: hidden; background-color: #fff; margin-top: 20px; border-radius: 10px;  margin: 16px 0 0;">
                   <div class="textTitle" style="margin:20px;">
                     <ul>
                       <li>
                         <h2><i class="fa fa-envelope fa-lg"></i>&nbsp;&nbsp;<b>Email:</b></h2><h3>sublime.contato@gmail.com</h3><br>
                       </li>
                       <li>
                         <h2><i class="fas fa-mobile fa-lg"></i>&nbsp;&nbsp;<b>Telefone:</b></h2><h3>(038) 3621-2545</h3><br>
                       </li>
                       <li>
                         <h2><i class="fa fa-home fa-lg"></i>&nbsp;&nbsp;<b>Endereço:</b></h2><h3>Av Cônego Ramiro Leite, 496A (Centro)</h3>
                            <h3>Januária, MG</h3>
                            <h3>39480-000</h3>
                            <h3>Brasil</h3><br>
                       </li>
                     </ul>
                     <div id="map"></div>

                   </div>
                 </div>
            </div>
          </div>
            <div class="level">
              <div class="level-left">
                <div class="level-item">
                  <div class="title textTitle"><h1>Contate-nos</h1></div>
                </div>
              </div>
            </div>
            <div style="overflow: hidden; background-color: #fff; margin-top: 20px; border-radius: 10px;  margin: 16px 0 0;">
            <div class="columns" style="margin: 20px;">
                    <div class="column is-multiline is-6" >
                            <div class="field">
                              <div class="control has-icons-left has-icons-right">
                                <input class="input is-medium" type="email" placeholder="Seu Nome">
                                <span class="icon is-left">
                                  <i class="fas fa-child fa-sm"></i>
                                </span>
                                <span class="icon is-right">
                                  <i class="fas fa-check fa-sm"></i>
                                </span>
                              </div>
                            </div>

                            <div class="field">
                              <div class="control has-icons-left has-icons-right">
                                <input class="input is-medium" type="email" placeholder="Seu Telefone">
                                <span class="icon is-left">
                                  <i class="fas fa-mobile fa-sm"></i>
                                </span>
                                <span class="icon is-right">
                                  <i class="fas fa-check fa-sm"></i>
                                </span>
                              </div>
                            </div>

                            <div class="field">
                              <div class="control has-icons-left has-icons-right">
                                <input class="input is-medium" type="email" placeholder="Seu Email">
                                <span class="icon is-left">
                                  <i class="fas fa-envelope fa-sm"></i>
                                </span>
                                <span class="icon is-right">
                                  <i class="fas fa-check fa-sm"></i>
                                </span>
                              </div>
                            </div>
                    </div>
                    <div class="column is-6 is-right">
                            <div class="field">
                                <div class="control has-icons-right">
                                <textarea style="height:160px;" class="textarea" placeholder="Sua Mensagem..."></textarea>
                                <span class="icon is-right fa-lg">
                                    <i class="fa fa-commenting-o" aria-hidden="true"></i>
                                </span>
                              </div>
                            </div>
                    </div>
              </div>
            <div class="column is-multiline" align="center">
                  <button style="" type="button" class="button is-primary is-outlined fa-lg" name="button">  <i class="fas fa-send fa-sm"></i>&nbsp; &nbsp;Enviar Mensagem</button>
            </div>
          </div>
          </main>
      </div>
    <!--Fim do Conteúdo-->
      <!--Inicio Script google Maps-->
    <script>
     function initMap() {
       var uluru = {lat: -15.4812049, lng: -44.3669965};
       var map = new google.maps.Map(document.getElementById('map'), {
         zoom: 4,
         center: uluru
       });
       var marker = new google.maps.Marker({
         position: uluru,
         map: map
       });
     }
   </script>
   <script async defer
   src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAwcqrP1r9QxXm9PSep0yJQ2vQlSwliF70&callback=initMap">
   </script>
  <!--Fim do Script-->
    <?php $this->load->view('rodape');?>
    <?php $this->load->view('scripts');?>
  </body>
</html>
