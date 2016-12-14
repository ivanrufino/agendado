<style>
    .fc-scroller {   overflow-y: auto !important;}
</style>
<!--<div class="container">-->
<div class="row">
    <div class="col s12 center-align"><h4> <?php echo $funcionario['nome'] . ' - ' . $funcionario['servico'] ?> </h4></div>
    <div class="col s1"> </div>
    <div class="col s2">
        <input type="date" class="datepicker"><a class="waves-effect waves-light btn" href="#agendamento_horario">Horário</a>
        <h4><?php echo $funcionario['nome'] ?></h4>
        <ul class="collection with-header">
            <li class="collection-header"><h6>Agendamento</h6></li>
            <li class="collection-item"> </li>
            <li class="collection-header"><h6>Outros Serviços</h6></li>
            <?php foreach ($servicos as $servico) : ?>
                <li class="collection-item"><a href="<?php echo base_url('servicos/agendar/' . url_title($servico['servico']) . '/' . $servico['id_func_serv']); ?>"><?php echo $servico['servico'] ?></a></li>
            <?php endforeach; ?>
        </ul>
    </div>
    <div class="col s8">
        <br>
        <div id='calendar'></div>
    </div>
    <!--<div class="s1">&nbsp;</div>-->
</div>
<!--</div>-->
<!-- Modal Structure -->

<script>
    var eventos;
    $(document).ready(function () {
        $('.datepicker').pickadate({
            selectMonths: true, // Creates a dropdown to control month
            selectYears: 15 // Creates a dropdown of 15 years to control year
        });
        $('.modal').modal();
        eventos = <?php echo $eventos; ?>;
        /* console.log(eventos);*/

        eventos.push({
            title: 'This is a Material Design event!',
            start: '2016-12-14T11:30:00',
            //end: 'someEndDate',
            backgroundColor: '#C2185B'
        });
        console.log(eventos)
    })
</script>