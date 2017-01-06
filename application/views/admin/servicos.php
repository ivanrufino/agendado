<link href="http://cdn.datatables.net/1.10.6/css/jquery.dataTables.min.css" type="text/css" rel="stylesheet" media="screen,projection">
<!-- START CONTENT -->
<section id="content">

    <!--breadcrumbs start-->
    <div id="breadcrumbs-wrapper" class=" grey lighten-3">
        <div class="container">
            <div class="row">
                <div class="col s12 m12 l12">
                    <h5 class="breadcrumbs-title">Dashboard</h5>
                    <ol class="breadcrumb">
                        <li><a href="_index">Dashboard</a>
                        </li>
                        <!--<li><a href="#">Pages</a></li>-->
                        <li class="active">Serviços</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs end-->


    <!--start container-->
    <div class="container">
        <div class="section">

            <p class="caption">Cadastre aqui todos os serviços oferecidos.</p>
            <div class="divider"></div>

            <!--DataTables example-->
            <div id="table-datatables">
                <h4 class="header">DataTables example</h4>
                <div class="row">
                                    
                    <div class="col s12">
                        <table id="data-table-simple" class="responsive-table display highlight responsive-table" cellspacing="0" style="width: 100%">
                            <thead>
                                <tr>
                                    <th>Serviços</th>
                                    <th>Ação</th>

                                </tr>
                            </thead>

                            <tfoot>
                                <tr>
                                    <th>Serviços</th>
                                    <th>Ação</th>

                                </tr>
                            </tfoot>

                            <tbody>
                                <?php foreach ($servicos as $servico) :?>
                                    
                                
                                <tr> 
                                    <td><?php echo $servico['nome']; ?></td>
                                    <td><a href="" class="btn btn-small blue darken-2">Alterar</a> <a href="" class="btn  btn-small red darken-2">Excluir</a> <a href="" class=" btn  btn-small green darken-2">Agendamentos</a></td>

                                </tr>
                                    <?php endforeach;?> 
                            </tbody>
                        </table>
                    </div>
                </div>
            </div> 
            
            <div class="divider"></div>
            <p></p>




        </div>

    </div>
    <!--end container-->

</section>
<!-- END CONTENT -->


