
<link href="<?php echo base_url('assets/css/admin/page-center.css') ?> " type="text/css" rel="stylesheet" media="screen,projection">
<body class="cyan">
    <!-- Start Page Loading -->

    <!-- End Page Loading -->
    <div id="login-page" class="row">
        <div class="col s12 z-depth-4 card-panel">
            <form class="register-form" method="post" action="cadastrar_completo">
                <div class="row">
                    <div class="input-field col s12 center">
                        <h4>Complete seu cadastro</h4>
                        <p class="center">Antes de acessar o sistema precisamos só de algumas informações adcionais. <br> Demora menos de dois minutinhos</p>
                    </div>

                </div>
                <div class="row margin">
                    <div class=" input-field col s6">
                        <i class="mdi-social-person-outline prefix"></i>                        
                        <input id="nome" type="text" name="nome" value="<?php echo set_value('nome'); ?>">
                        <label for="nome" class="center-align">Nome Empresa</label>
                        <?php echo form_error('nome'); ?>
                    </div>
                    <div class=" input-field col s6">
                        <select name ="tipo" id="tipo">
                            <option value="" disabled selected>Escolha uma opção</option>
                            <option value="1" <?php echo  set_select('tipo', '1'); ?>>Pessoa Júridica</option>
                            <option value="2" <?php echo  set_select('tipo', '2'); ?>>Pessoa Física</option>                            
                        </select>
                        <label>Tipo</label>
                        <?php echo form_error('tipo'); ?>
                    </div>
                </div>
                <div class="row margin">
                    <div class="input-field col s6">
                        <i class="material-icons prefix">person</i>

                        <input id="cnpj_cpf" type="text" name="cnpj_cpf" class="cnpj_cpf" disabled="" value="<?php echo set_value('cnpj_cpf'); ?>">
                        <label for="cnpj_cpf" class="center-align">CPF ou CNPJ</label>
                        <?php echo form_error('cnpj_cpf'); ?>
                    </div>
                    <div class="input-field col s6">
                        <i class="mdi-communication-email prefix"></i>
                        <input id="telefone" type="text" name="telefone" class="telefone" value="<?php echo set_value('telefone'); ?>">
                        <label for="telefone" class="center-align">Telefone</label>
                        <?php echo form_error('telefone'); ?>
                    </div>
                </div>
                <div class="row margin">
                    <div class="input-field col s12">
                        <i class="mdi-communication-email prefix"></i>
                        <input id="url" type="text" name="url" value="<?php echo set_value('url',  base_url()); ?>" readonly="">
                        <label for="url" class="center-align">Url de acesso</label>
                        <?php echo form_error('url'); ?>
                    </div>
                    
                </div>
                <div class="row margin">
                    <div class="input-field col s6">
                        <i class="mdi-action-lock-outline prefix"></i>
                        <input id="hora_inicio" type="text" name="hora_inicio" class="time" value="<?php echo set_value('hora_inicio'); ?>">
                        <label for="hora_inicio">Hora de Inicio</label>
                        <?php echo form_error('hora_inicio'); ?>
                    </div>

                    <div class="input-field col s6">
                        <!--<i class="mdi-action-lock-outline prefix"></i>-->
                        <input id="hora_fim" type="text" name="hora_fim" class="time" value="<?php echo set_value('hora_fim'); ?>">
                        <label for="hora_fim">Hora Final</label>
                        <?php echo form_error('hora_fim'); ?>
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
    <script type="text/javascript" src="<?php echo base_url('assets/js/admin/jquery-1.11.2.min.js') ?>"> </script>
    <!-- jQuery mask -->
<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.mask.min.js')?>"></script>
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

    <script src="<?php echo base_url('assets/js/url_slug.js') ?>"></script>
    <script>
    $(document).ready(function(){
        var url =  $("#url").val()
        $("#nome").keyup(function(){
            
            console.log($("#nome").val());
            $("#url").val(url+ url_slug($("#nome").val()));
        })
//        if($(".cnpj_cpf").val()!== ""){
//            $(".cnpj_cpf").removeAttr('disabled');
//        }
        $("#tipo").change(function(){
            var cpf_cnpj = $(".cnpj_cpf");
            cpf_cnpj.removeAttr('disabled');
            if($(this).val()==1){
                cpf_cnpj.removeClass('cpf').addClass('cnpj').focus()
            }else{
                cpf_cnpj.removeClass('cnpj').addClass('cpf').focus()
            }
            
        }).change();
    })
    </script>
</body>

</html>