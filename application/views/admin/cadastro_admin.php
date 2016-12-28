
<link href="<?php echo base_url('assets/css/admin/page-center.css') ?> " type="text/css" rel="stylesheet" media="screen,projection">
<body class="cyan">
    <!-- Start Page Loading -->

    <!-- End Page Loading -->
    <div id="login-page" class="row">
        <div class="col s12 z-depth-4 card-panel">
            <form class="register-form" method="post" action="cadastrar_adm">
                <div class="row">
                    <div class="input-field col s12 center">
                        <h4>Cadastre-se</h4>
                        <p class="center">Junte ao agendado e tenha toda facilidade para gerenciar seus agendamentos!</p>
                    </div>

                </div>
                <div class="row margin">
                    <div class=" input-field col s6">
                        <i class="mdi-social-person-outline prefix"></i>                        
                        <input id="nome" type="text" name="nome_responsavel" value="<?php echo set_value('nome_responsavel'); ?>">
                        <label for="nome" class="center-align">Nome</label>
                        <?php echo form_error('nome_responsavel'); ?>
                    </div>
                    <div class=" input-field col s6">
                        <input id="sobrenome" type="text" name="sobrenome_responsavel" value="<?php echo set_value('sobrenome_responsavel'); ?>">
                        <label for="sobrenome" class="center-align">Sobrenome</label>
                        <?php echo form_error('sobrenome_responsavel'); ?>
                    </div>
                </div>
                <div class="row margin">
                    <div class="input-field col s12">
                        <i class="material-icons prefix">person</i>
                        
                        <input id="login" type="text" name="login" value="<?php echo set_value('login'); ?>">
                        <label for="login" class="center-align">Login</label>
                        <?php echo form_error('login'); ?>
                    </div>
                </div>
                <div class="row margin">
                    <div class="input-field col s12">
                        <i class="mdi-communication-email prefix"></i>
                        <input id="email" type="email" name="email" value="<?php echo set_value('email'); ?>">
                        <label for="email" class="center-align">Email</label>
                        <?php echo form_error('email'); ?>
                    </div>
                </div>
                <div class="row margin">
                    <div class="input-field col s6">
                        <i class="mdi-action-lock-outline prefix"></i>
                        <input id="senha" type="password" name="senha">
                        <label for="senha">Senha</label>
                        <?php echo form_error('senha'); ?>
                    </div>
               
                    <div class="input-field col s6">
                        <!--<i class="mdi-action-lock-outline prefix"></i>-->
                        <input id="repita-senha" type="password" name="repita-senha">
                        <label for="repita-senha">Repita a senha</label>
                        <?php echo form_error('repita-senha'); ?>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <button class="btn waves-effect waves-light col s4" type="submit" name="action">Cadastrar
                            <i class="material-icons right">send</i>
                        </button>
                    </div>


                    <div class="input-field col s12">
                        <p class="margin center medium-small sign-up">Já tenho uma conta? <a href="login_adm">Login</a></p>
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