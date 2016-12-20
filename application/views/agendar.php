<style>
    .fc-scroller {   overflow-y: auto !important;}
</style>
<!--<div class="container">-->
<div class="row">
    <div class="col s12 center-align"><h4> <?php echo $funcionario['nome'] . ' - ' . $funcionario['servico'] ?> </h4></div>
    <div class="col s1"> </div>
    <div class="col s2">

        <h4><?php echo $funcionario['nome'] ?></h4>
        <ul class="collection with-header">
            <li class="collection-header"><h6>Agendamento</h6></li>
            <li class=""> 
                <a class="waves-effect waves-light btn" href="#agendamento_horario">Agendar</a>
                <!--<a class="waves-effect waves-light btn" id="agendamento_horario" href="#"  >Horário</a>-->
            </li>
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
            setDate: new Date(2016, 12, 25, 13, 0, 0),
            //  minuteInterval: 60,
            minTime: '08:00',
            maxTime: '18:01',
            futureOnly: true,
        });

        eventos = <?php echo $eventos; ?>;


        eventos.push({
            title: 'This is a Material Design event!',
            start: '2016-12-23T11:30:00',
            //end: 'someEndDate',
            backgroundColor: '#C2185B'
        });

        var dataOld = new Date($("#datetimepicker").val());
        var novaData = dataOld.getFullYear() + '-' + (dataOld.getMonth() + 1) + '-' + dataOld.getDate() + ' ' + (dataOld.getHours() + 1) + ':00'
        // var novaData = dataOld.getDate();
        $("#datetimepicker").val(novaData)
        $("#datetimepicker").change(function () {
            console.log($(this).val())
            completeDados($(this).val())
        }).change()
        $('#btn_agendar').click(function () {
            var date = $('#datetimepicker').handleDtpicker('getDate');

            console.log(date.getFullYear())
        })

        function completeDados(dataFull) {
            dataFull = new Date(dataFull);
            var data = addZero(dataFull.getDate()) + '-' + addZero(dataFull.getMonth()+1) + '-' + dataFull.getFullYear();
            var hora = dataFull.getHours() + ':' + addZero(dataFull.getMinutes());
            $("p.data_agend > span").html(data)
            $("p.hora_agend > span").html(hora)
            /*hora_agend
             <p class="data_agend"><strong>Data:</strong> <span></span></p>
             <p class="hora_agend"><strong>Hora:</strong> <span></span></p>*/
            console.log(data)
        }
        function addZero(i) {
            if (i < 10) {
                i = "0" + i;
            }
            return i;
        }
    })

</script>