<!DOCTYPE html>
<html>
<head>
<?php $this->load->view('head'); ?>
  <title></title>
</head>
<body>
    <?php 
     /* if ($mensage==1) {
          echo '<div style="right: 2%; position: absolute; top: 2%; border-radius: 5px; border: solid 1px #d5d5d5;" id="no" class="notification is-danger">';
      ?>
            <button class="delete" onclick="document.getElementById('no').style.display = 'none';"></button>
      <?php
            echo $mensagem;
          echo '</div>';
      }  */  
     ?>
    
    <div style="left: 35%; position: absolute; width: 30%; top: 5%; background-color: #fff; border-radius: 5px; border: solid 1px #d5d5d5; padding: 2%;">

      

        
        <form method="POST" <?php echo 'action="'.base_url('index.php/registrar').'"'; ?>>
        <div id="pessoais">
            <hr>
            <p class="menu-label" style="font-size: 16px; text-align: center;">Informações Pessoais</p>
            <hr>
            <div class="field">
              <label class="label">Nome</label>
              <div class="control has-icons-left">
                <input class="input is-primary" name="nome" type="text" placeholder="Nome" required>
                <span class="icon is-small is-left">
                <i class="fas fa-user"></i>
              </span>
              </div>
            </div>
            <div class="field">
            <label class="label">Email</label>
            <div class="control has-icons-left has-icons-right">
              <input class="input is-primary" name="email" type="email" placeholder="Email@dominio.com" required>
              <span class="icon is-small is-left">
                <i class="fas fa-envelope"></i>
              </span>
            </div>
          </div>

          <div class="field">
              <label class="label">CPF</label>
              <div class="control has-icons-left">
                <input class="input is-primary" name="cpf" type="text" placeholder="123.456.789-10" required>
                <span class="icon is-small is-left">
                <i class="fas fa-id-card"></i>
              </span>
              </div>
            </div>

          <div class="field">
            <label class="label">Data de nascimento</label>
            <div class="control has-icons-left has-icons-right">
              <input class="input is-primary" name="nascimento" type="date" placeholder="Senha">
              <span class="icon is-small is-left">
                <i class="fas fa-calendar"></i>
              </span>
              
            </div>
          </div>

          <div class="field">
            <label class="label">Telefone</div>
            <div class="field-body">
              <div class="field is-expanded">
                <div class="field has-addons">
                  <p class="control ">
                    <a class="button is-static">
                      +55
                    </a>
                  </p>
                  <p class="control is-expanded has-icons-left">
                    <input class="input is-primary" name="telefone" type="tel" placeholder="Telefone">
                    <span class="icon is-small is-left">
                      <i class="fas fa-phone"></i>
                    </span>

                  </p>
                </div>
              </div>
            </div>
          

           <label class="label">Senha</label>
          <div class="field is-horizontal">
               
              <div class="field-body">
                <div class="field">
                  <p class="control is-expanded has-icons-left">
                    <input class="input is-primary" name="senha" type="password" placeholder="Senha" required>
                    <span class="icon is-small is-left">
                      <i class="fas fa-lock"></i>
                    </span>
                  </p>
                </div>
                <div class="field">
                  <p class="control is-expanded has-icons-left has-icons-right">
                    <input class="input is-primary" name="confirmaSenha" type="password" placeholder="Repita" required>
                    <span class="icon is-small is-left">
                      <i class="fas fa-lock"></i>
                    </span>
                    <span class="icon is-small is-right">
                      <i class="fas fa-check"></i>
                    </span>
                  </p>
                </div>
              </div>
            </div>

          <div class="field">
                <label class="label">Sexo</label>
              <div class="field-body">
                <div class="field is-narrow">
                  <div class="control has-icons-left">
                    <div class="select is-fullwidth is-primary">
                      <select name="sexo" >
                        <option value="Masculino">Masculino</option>
                        <option value="Feminino">Feminino</option>
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
              <label class="label">Imagem</label>
              <div class="control">
                <input class="input is-primary" name="imagem" type="file">
              </div>
            </div>


              <div class="field">
                <div class="control" style="text-align: right;">
                  <span onclick="proximo();" class="button is-success is-rounded" style="width: 100px;">Próximo &nbsp;  <i class="fas fa-arrow-right "></i></span>
                </div>
              </div> 
        </div>






        <div id="endereco" style="display: none;">
              <hr>
              <p class="menu-label" style="font-size: 16px; text-align: center;">Informações de Endereço</p>
              <hr>
            <div class="field">
            <label class="label">Endereço</label>
            <div class="control has-icons-left has-icons-right">
              <input class="input is-primary" name="endereco" type="text" placeholder="Nome da sua rua">
              <span class="icon is-small is-left">
                <i class="fas fa-home"></i>
              </span>
            </div>
          </div>

          <label class="label">Logradouro / Numero</label>
          <div class="field is-horizontal">
               
              <div class="field-body">
                <div class="field">
                  <p class="control is-expanded has-icons-left">
                    <div class="select is-primary">
                      <select name="logradouro" placeholder="Numero" >
                        <option value="Rua">Rua</option>
                        <option value="Avenida">Avenida</option>
                        <option value="Praça">Praça</option>
                        <option value="Area">Area</option>
                        <option value="Distrito">Distrito</option>
                        <option value="Esplanada">Esplanada</option>
                        <option value="Favela">Favela</option>
                        <option value="Outro">Outro</option>
                      </select>
                    </div>
                  </p>
                </div>
                <div class="field">
                  <p class="control is-expanded has-icons-left has-icons-right">
                    <input class="input is-primary" name="numero" type="text" placeholder="Numero" required reset>
                   
                  </p>
                </div>
              </div>
            </div>
          <div class="field">
            <label class="label">Complemento</label>
            <div class="control has-icons-left has-icons-right">
              <input class="input is-primary" name="complemento" type="text" placeholder="Complemento">
              <span class="icon is-small is-left">
                <i class="fas fa-map-pin"></i>
              </span>
              
            </div>
          </div>

           <div class="field">
              <label class="label">Cidade</label>
              <div class="control has-icons-left">
                <input class="input is-primary" name="cidade" type="text" placeholder="Cidade" required>
                <span class="icon is-small is-left">
                <i class="fas fa-map-marker"></i>
              </span>
              </div>
            </div>
            <div class="field">
            <label class="label">Bairro</label>
            <div class="control has-icons-left has-icons-right">
              <input class="input is-primary" name="bairro" type="text" placeholder="Bairro" required>
             
            </div>
          </div>

          <div class="field">
              <label class="label">Estado</label>
              <div class="control has-icons-left">
                <input class="input is-primary" name="estado" type="text" placeholder="Estado, ex: MG" required>
                
              </div>
            </div>

          <div class="field">
            <label class="label">CEP</label>
            <div class="control has-icons-left has-icons-right">
              <input class="input is-primary" name="cep" type="text" placeholder="12.147-000">
              </div>
          </div>

          <div class="field">
              <label class="label">Referência</label>
            <div class="field-body">
              <div class="field">
                <div class="control ">
                  <textarea class="textarea is-primary" name="referencia" placeholder="Informe um ponto de referência."></textarea>
                </div>
              </div>
            </div>
          </div>


              <div class="field is-grouped is-grouped-right">
                <div class="control" style="text-align: right;">
                  <span onclick="anterior();" class="button is-info is-rounded" style="width: 100px;"><i class="fas fa-arrow-left"></i>&nbsp; Voltar</span>
                </div>
                <div class="control" style="text-align: right;">
                  <button type="Submit" class="button is-success is-rounded" style="width: 100px;">Cadastrar &nbsp;<i class="fas fa-check "></i></button>
                </div>
              </div> 
          </div>
      </form>
    </div>
    <script type="text/javascript">
      function proximo(){
        document.getElementById('pessoais').style.display = 'none';
        document.getElementById('endereco').style.display = 'block';
      }
      function anterior(){
        document.getElementById('endereco').style.display = 'none';
        document.getElementById('pessoais').style.display = 'block';
      }

    </script>
</body>
</html>