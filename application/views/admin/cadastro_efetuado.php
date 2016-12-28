
<link href="<?php echo base_url('assets/css/admin/page-center.css') ?> " type="text/css" rel="stylesheet" media="screen,projection">
<body class="cyan">
    <!-- Start Page Loading -->

    <!-- End Page Loading -->
    <div id="login-page" class="row">
        <div class="col s12 z-depth-4 card-panel">
            <form class="login-form" action="<?php echo base_url('acessar_adm')?>" method="post">
                <div class="row">
                    <div class="input-field col s12 center">
                        <img src="<?php echo base_url("assets/images/user/$foto") ?>" alt="" class="circle responsive-img valign profile-image-login">
                        <h4 class="header"><?php echo $nome_responsavel ?></h4>            
                    </div>
                </div>
                <div class="row margin">
                    <div class="input-field col s12">
                        <i class="mdi-social-person-outline prefix"></i>
                        <input id="login_fake" name="login" type="text" autocomplete="off" style="display: none;">
                        <input id="login" name="login" type="text" value="<?php echo $email ?> " >

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
                    <div class="input-field col s12">
                        <div class="input-field col s12">
                            <button class="btn waves-effect waves-light col s12" type="submit" name="action">Acessar
                                <i class="material-icons right">send</i>
                            </button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s6 m6 l6">
                            <p class="margin medium-small"><a href="registro_adm">Cadastre-se</a></p>
                        </div>
                        <div class="input-field col s6 m6 l6">
                            <p class="margin right-align medium-small"><a href="page-forgot-password.html">Esqueceu a Senha?</a></p>
                        </div>          
                    </div>

            </form>
        </div>
    </div>

    <!-- jQuery Library -->
    <script type="text/javascript" src="<?php echo base_url('assets/js/admin/jquery-1.11.2.min.js') ?>"></script>
    <!--materialize js-->
    <script src="<?php echo base_url('assets/js/admin/materialize.js') ?>"></script>
    <!--prism-->
    <script type="text/javascript" src="<?php echo base_url('assets/js/admin/prism.js') ?>"></script>
    <!--scrollbar-->
    <script type="text/javascript" src="<?php echo base_url('assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js') ?>"></script>
    <!-- chartist -->
    <script type="text/javascript" src="<?php echo base_url('assets/plugins/chartist-js/chartist.min.js') ?>"></script>   

    <!--plugins.js - Some Specific JS codes for Plugin Settings-->
    <script type="text/javascript" src="<?php echo base_url('assets/js/plugins.js') ?>"></script>

</body>

</html>