<!DOCTYPE html>
<html>
<head>
<?php $this->load->view('head'); ?>
  <title></title>
</head>
<body>
    <?php 
      if ($mensage==1) {
          echo '<div style="right: 2%; position: absolute; top: 2%; border-radius: 5px; border: solid 1px #d5d5d5;" id="no" class="notification is-danger">';
      ?>
            <button class="delete" onclick="document.getElementById('no').style.display = 'none';"></button>
      <?php
            echo $mensagem;
          echo '</div>';
      }    
     ?>
    
    <div style="left: 35%; position: absolute; width: 30%; top: 5%; background-color: #fff; border-radius: 5px; border: solid 1px #d5d5d5; padding: 2%;">
      <div class="field">
          <?php  echo '<img src="'.base_url('assets/img/profile.jpg').'" style="width:100%; max-height:200px;">'?>
      </div>
      <hr>
        <p class="menu-label" style="font-size: 16px; text-align: center;">Login - Sublime</p>
      <form method="POST" <?php  echo 'action="'.base_url('index.php/valida').'"'?>>
      <hr>

        <div class="field">
        <label class="label">Email</label>
        <div class="control has-icons-left has-icons-right">
          <input class="input is-danger" name="email" type="email" placeholder="Email@dominio.com">
          <span class="icon is-small is-left">
            <i class="fas fa-envelope"></i>
          </span>
          <span class="icon is-small is-right">
            <i class="fas fa-exclamation-triangle"></i>
          </span>
        </div>
      </div>
      <div class="field">
        <label class="label">Senha</label>
        <div class="control has-icons-left has-icons-right">
          <input class="input is-danger" name="senha" type="password" placeholder="Senha">
          <span class="icon is-small is-left">
            <i class="fas fa-lock"></i>
          </span>
          
        </div>
      </div>
          <div class="field">
            <div class="control" style="text-align: right;">
              <button type="Submit" class="button is-success is-rounded" style="width: 100px;">Entrar</button>
            </div>
          </div>  
      </form>
    </div>
</body>
</html>