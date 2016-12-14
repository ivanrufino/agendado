<div class="container">
    <div class="section">

        <!--   Icon Section   -->
        <div class="row">
            <ul class="collapsible" data-collapsible="accordion">
                <?php foreach ($servicos as $servico) : ?>
                    <li>
                        <div class="collapsible-header"><i class="material-icons">whatshot</i><?php echo $servico['nome'] ?></div>
                        <div class="collapsible-body">
                            <?php
                            if (isset($servico['detalhes'])) { 
                                $id = 0; ?>
                                <ul class='collection'>
                                <?php foreach ($servico['detalhes'] as $detalhe) :
                                    ?>
                                <li class="collection-item avatar">
                                <?php if ($id != $detalhe['id']): ?>
                                        
                                    <img src="<?php echo base_url("assets/images/logo_empresa/".$detalhe['logo'])?>" alt="" class="circle">
                                            <span class="title"><?php echo $detalhe['empresa'] ?></span>
                                        
                                        <?php
                                        $id = $detalhe['id'];
                                    endif;
                                    ?>
                                            <p><a href="<?php echo base_url('servicos/agendar/'.url_title($detalhe['nome_servico']).'/'.$detalhe['id_func_serv']) ;?>" title="Quero este"><?php echo str_pad($detalhe['funcionario'], 80, ' _') . ' R$ ' . $detalhe['valor'] ?></a><br>
                                            Pode ser aqui o valor
                                        </p>
                                        <a href="#!" class="secondary-content"><i class="material-icons">grade</i></a>
                                    <!--<li class="list_funcionario">Funcionário: <?php echo str_pad($detalhe['funcionario'], 80, ' _') . ' R$ ' . $detalhe['valor'] ?></li>-->
                                            </li>
                                    <br>
                                 
                                        
                                    
                                <?php
                                endforeach; ?>
                                </ul>;
                            <?php }else {
                                ?>
                                <p>Serviço não oferecido</p>
    <?php } ?>
                        </div>
                    </li>
<?php endforeach; ?>
                
            </ul>
        </div>

    </div>
</div>