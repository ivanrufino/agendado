<style>
    .fc-scroller {   overflow-y: auto !important;}
</style>
<!--<div class="container">-->
<div class="row">
    <div class="col s12 center-align"><h4> <?php echo $funcionario['nome'] . ' - ' . $funcionario['servico'] ?> </h4></div>
    <div class="col m1 hide-on-small-only"> </div>
    <div class="col s12 m2">

        <h4><?php echo $funcionario['nome'] ?></h4>
        <ul class="collection with-header">
            <li class="collection-header"><h6>Agendamento</h6></li>
            <li class=""> 
                <a class="waves-effect waves-light btn" href="#agendamento_horario">Agendar</a>
                <!--<a class="waves-effect waves-light btn" id="agendamento_horario" href="#"  >Horário</a>-->
            </li>
            <li>
                <p>Dias disponíveis: <strong><?php echo getDias($funcionario['dias']) ?></strong></p>
                <p>Horarios disponíveis: <strong></strong></p>
            </li>
            <li class="collection-header"><h6>Outros Serviços</h6></li>
            <?php foreach ($servicos as $servico) : ?>
                <li class="collection-item"><a href="<?php echo base_url('servicos/agendar/' . url_title($servico['servico']) . '/' . $servico['id_func_serv']); ?>"><?php echo $servico['servico'] ?></a></li>
            <?php endforeach; ?>
        </ul>
    </div>
    <div class="col s12 m8 ">
        <br>
        <div id='calendar'></div>
    </div>
    <!--<div class="s1">&nbsp;</div>-->
</div>
<!--</div>-->

<!-- Modal Structure -->
<div id="agendamento_horario" class="modal">
    <div class="modal-content row">
        <h4>Modal Header</h4>

        <div class="col s6">
            <input id="datetimepicker" type="text" style="display:none" >
        </div>
        <div class="col s6"> 
            <p>Dados do Agendamento</p><hr>
            <p><strong>Nome:</strong> Fulando de tal</p>
            <p><strong>Serviço:</strong> <?php echo $servico['servico']; ?></p>
            <p class="data_agend"><strong>Data:</strong> <span></span></p>
            <p class="hora_agend"><strong>Hora:</strong> <span></span></p>
        </div>
    </div>
    <div class="modal-footer">
        <a href="#!" class=" modal-action  waves-effect waves-green btn-flat" id="btn_agendar">Agendar</a>
    </div>
</div>

<script>
    var eventos;
    $(document).ready(function () {
        $('.modal').modal();

        var logic = function (currentDateTime) {
            // 'this' is jquery object datetimepicker
            if (currentDateTime.getDay() == 6) {
                this.setOptions({
                    //allowTimes:['10:00', '11:00','12:00'],
                    //minTime: '11:00:00',formatTime:'H:i'
                });
            } else
                this.setOptions({
                    allowTimes: [],
                    //  minTime: '8:00'
                });
        };


        $('#datetimepicker').appendDtpicker({
            inline: true,
            calendarMouseScroll: false,
           
            //  minuteInterval: 60,
            minTime: '<?php echo $funcionario['hora_inicio']; ?>',
            maxTime: '<?php echo $funcionario['hora_fim']; ?>',
            futureOnly: true,
            locale: "br",
            allowWdays:[ <?php echo $funcionario['dias']; ?>]
            
        });
        
        $('#datetimepicker').handleDtpicker('setDate', new Date(new Date().getTime() + 24 * 60 * 60 * 1000));
        
        eventos = <?php echo $eventos; ?>;


        eventos.push({
            title: 'This is a Material Design event!',
            start: '2016-12-23T11:30:00',
            //end: 'someEndDate',
            backgroundColor: '#C2185B'
        });

        var dataOld = new Date($("#datetimepicker").val());
        var novaData = dataOld.getFullYear() + '-' + (dataOld.getMonth() + 1) + '-' + dataOld.getDate() + ' ' + (dataOld.getHours() + 1) + ':00'
        
       // $("#datetimepicker").val(novaData)
        $("#datetimepicker").change(function () {
          //  console.log($(this).val())
            completeDados($(this).val())
        }).change()
        $('#btn_agendar').click(function () {
            var date = $('#datetimepicker').handleDtpicker('getDate');

           // console.log(date.getFullYear())
        })

        function completeDados(dataFull) {
            dataFull = dataFull.split(" ");
            console.log(dataFull);

            $("p.data_agend > span").html(dataFull[0])
            $("p.hora_agend > span").html(dataFull[1])
            
          //  console.log(data)
        }
        
    })

</script>
