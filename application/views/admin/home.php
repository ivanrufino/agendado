<!-- START CONTENT -->
<section id="content">

    <!--breadcrumbs start-->
    <div id="breadcrumbs-wrapper" class=" grey lighten-3">
        <div class="container">
            <div class="row">
                <div class="col s12 m12 l12">
                    <h5 class="breadcrumbs-title">Dashboard</h5>
                    <!--                <ol class="breadcrumb">
                                      <li><a href="index.html">Dashboard</a>
                                      </li>
                                      <li><a href="#">Pages</a>
                                      </li>
                                      <li class="active">Calendar</li>
                                    </ol>-->
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs end-->


    <!--start container-->
    <div class="container">
        <div class="section">

                       <!--card stats start-->
            <div id="card-stats" class="seaction">
                <!--<h4 class="header">Stats Cards</h4>-->
                <p> Show your important stats with top stats in colorful cards.</p>
                <div class="row">
                    <div class="col s12 m6 l3">
                        <div class="card">
                            <div class="card-content  green white-text">
                                <p class="card-stats-title"><i class="mdi-action-trending-up"></i> Serviços</p>
                                <h4 class="card-stats-number"><?php echo $servicos['count']?></h4>
                                <p class="card-stats-compare"> <span class="blue-grey-text text-lighten-5"><a href='<?php echo base_url('admin/_servicos')?>' class="btn btn-link white blue-grey-text">Visualizar</a></span>
                                </p>
                            </div>
                            <div class="card-action  green darken-2">
                                <div id="clients-bar"></div>
                            </div>
                        </div>
                    </div>

                    <div class="col s12 m6 l3">
                        <div class="card">
                            <div class="card-content blue-grey white-text">
                                <p class="card-stats-title"><i class="mdi-social-group-add"></i> Clientes</p>
                                <h4 class="card-stats-number"><?php echo $cliente_agendamentos['count']?></h4>
                                <p class="card-stats-compare"> <span class="blue-grey-text text-lighten-5"><a href='' class="btn btn-link white blue-grey-text">Visualizar</a></span>
                                </p>
                            </div>
                            <div class="card-action blue-grey darken-2">
                                <div id="profit-tristate"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col s12 m6 l3">
                        <div class="card">
                            <div class="card-content deep-purple white-text">
                                <p class="card-stats-title"><i class="mdi-editor-insert-drive-file"></i> Funcionários</p>
                                <h4 class="card-stats-number"><?php echo $funcionarios['count']?></h4>
                                <p class="card-stats-compare"> <span class="blue-grey-text text-lighten-5"><a href='' class="btn btn-link white blue-grey-text">Visualizar</a></span>
                                </p>
                            </div>
                            <div class="card-action  deep-purple darken-2">
                                <div id="invoice-line"></div>
                            </div>
                        </div>
                    </div>    
                    <div class="col s12 m6 l3">
                        <div class="card">
                            <div class="card-content purple white-text">
                                <p class="card-stats-title"><i class="mdi-editor-attach-money"></i>Plano</p>
                                <h4 class="card-stats-number"><?php echo $plano['nome']?></h4>
                                <p class="card-stats-compare"> <span class="blue-grey-text text-lighten-5"><a href='' class="btn btn-link white blue-grey-text">Visualizar</a></span>
                                </p>
                            </div>
                            <div class="card-action purple darken-2">
                                <div id="sales-compositebar"></div>

                            </div>
                        </div>
                    </div>




                </div>
            </div>
            <!--card stats end-->

            <!-- //////////////////////////////////////////////////////////////////////////// -->
            <div class="divider"></div>

            <!--card widgets start-->
            <div id="card-widgets" class="seaction">
                <div class="row">

                    <div class="col s12 m4 l4">
                        <h4 class="header">Ultimos agendamentos</h4>
                        <ul id="task-card" class="collection with-header">
                            <li class="collection-header cyan">
                                <h4 class="task-card-title">My Task</h4>
                                <p class="task-card-date"><?php echo date("d-m-Y") ?></p>
                            </li>
                            <li class="collection-item dismissable">
                                <input type="checkbox" id="task1" />
                                <label for="task1">Create Mobile App UI. <a href="#" class="secondary-content"><span class="ultra-small">Today</span></a>
                                </label>
                                <span class="task-cat teal">Mobile App</span>
                            </li>

                        </ul>
                    </div>

                    <div class="col s12 m4 l4">
                        <h4 class="header">Ultima Mensagem</h4>
                        <div class="card  light-blue">
                            <div class="card-content white-text">
                                <span class="card-title">Card Title</span>
                                <p>I am a very simple card. I am good at containing small bits of information. I am convenient because I require little markup to use effectively.</p>
                                <p>I am a very simple card. I am good at containing small bits of information.</p>
                                <p>I am convenient because I require little markup to use effectively.</p>
                                <p>I am convenient because I require little markup to use effectively markup to use effectively.</p>
                            </div>
                            <div class="card-action">
                                <a href="#" class="lime-text text-accent-1">This is a link</a>
                                <a href="#" class="lime-text text-accent-1">This is a link</a>
                            </div>
                        </div>
                    </div>

                    <div class="col s12 m4 l4">
                        <h4 class="header">Clientes</h4>
                        <ul id="projects-collection" class="collection">
                            <!--                            <li class="collection-item avatar">
                                                            <i class="mdi-file-folder circle light-blue"></i>
                                                            <span class="collection-header">Projects</span>
                                                            <p>Your Favorites</p>
                                                            <a href="#" class="secondary-content"><i class="mdi-action-grade"></i></a>
                                                        </li>-->
                            <li class="collection-item">
                                <div class="row">
                                    <div class="col s8">
                                        <p class="collections-title">Web App</p>
                                        <p class="collections-content">AEC Company</p>
                                    </div>
                                    <div class="col s4">
                                        <span class="task-cat cyan">Development</span>
                                    </div>

                                </div>
                            </li>
                            <li class="collection-item">
                                <div class="row">
                                    <div class="col s8">
                                        <p class="collections-title">Mobile App for Social</p>
                                        <p class="collections-content">iSocial App</p>
                                    </div>
                                    <div class="col s4">
                                        <span class="task-cat grey darken-3">UI/UX</span>
                                    </div>

                                </div>
                            </li>
                            <li class="collection-item">
                                <div class="row">
                                    <div class="col s8">
                                        <p class="collections-title">Website</p>
                                        <p class="collections-content">MediTab</p>
                                    </div>
                                    <div class="col s4">
                                        <span class="task-cat teal">Marketing</span>
                                    </div>

                                </div>
                            </li>
                            <li class="collection-item">
                                <div class="row">
                                    <div class="col s8">
                                        <p class="collections-title">AdWord campaign</p>
                                        <p class="collections-content">True Line</p>
                                    </div>
                                    <div class="col s4">
                                        <span class="task-cat green">SEO</span>
                                    </div>

                                </div>
                            </li>
                        </ul>
                    </div>



                </div>


            </div>
            <!--card widgets end-->
        </div>
    </div>
    <!--end container-->

</section>
<!-- END CONTENT -->