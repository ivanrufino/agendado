
<link href="<?php echo base_url('assets/css/admin/page-center.css')?> " type="text/css" rel="stylesheet" media="screen,projection">
<body class="cyan">
  <!-- Start Page Loading -->
   
    <!-- End Page Loading -->
<div id="login-page" class="row">
    <div class="col s12 z-depth-4 card-panel">
        <form class="login-form" action="acessar_adm" method="post">
        <div class="row">
          <div class="input-field col s12 center">
              <img src="<?php echo base_url('assets/images/login-logo.png') ?>" alt="" class="circle responsive-img valign profile-image-login">
            <p class="center login-form-text">Material Design Admin Template</p>
          </div>
        </div>
        <div class="row margin">
          <div class="input-field col s12">
            <i class="mdi-social-person-outline prefix"></i>
            <input id="login_fake" name="login" type="text" autocomplete="off" style="display: none;">
            <input id="login" name="login" type="text">
            
            <label for="login" class="center-align">Login ou Email</label>
          </div>
        </div>
        <div class="row margin">
          <div class="input-field col s12">
            <i class="mdi-action-lock-outline prefix"></i>
            <input id="senha" name="senha" type="password">
            <label for="senha">Senha</label>
          </div>
        </div>
        <div class="row">          
          <div class="input-field col s12 m12 l12  login-text">
              <input type="checkbox" id="remember-me" name="lembre-me" />
              <label for="remember-me">Lembre-me</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12">
                <button class="btn waves-effect waves-light col s12" type="submit" name="action">Submit
                <i class="material-icons right">send</i>
            </button>
              <!--<input type="submit" class="btn waves-effect waves-light col s12" >-->
            <!--<a href="index.html" class="btn waves-effect waves-light col s12">Entrar</a>-->
          </div>
        </div>
          
        <div class="row">
          <div class="input-field col s6 m6 l6">
            <p class="margin medium-small"><a href="page-register.html">Cadastre-se</a></p>
          </div>
          <div class="input-field col s6 m6 l6">
              <p class="margin right-align medium-small"><a href="page-forgot-password.html">Esqueceu a Senha?</a></p>
          </div>          
        </div>

      </form>
    </div>
  </div>

<!-- jQuery Library -->
<script type="text/javascript" src="<?php echo base_url('assets/js/admin/jquery-1.11.2.min.js')?>"></script>
<!--materialize js-->
<script src="<?php echo base_url('assets/js/admin/materialize.js') ?>"></script>
<!--prism-->
<script type="text/javascript" src="<?php echo base_url('assets/js/admin/prism.js')?>"></script>
<!--scrollbar-->
<script type="text/javascript" src="<?php echo base_url('assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js')?>"></script>
<!-- chartist -->
<script type="text/javascript" src="<?php echo base_url('assets/plugins/chartist-js/chartist.min.js')?>"></script>   

<!--plugins.js - Some Specific JS codes for Plugin Settings-->
<script type="text/javascript" src="<?php echo base_url('assets/js/plugins.js')?>"></script>

</body>

</html>