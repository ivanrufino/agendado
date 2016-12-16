<style>
    .fc-scroller {   overflow-y: auto !important;}
</style>
<!--<div class="container">-->
<div class="row">
    <div class="col s12 center-align"><h4> <?php echo $funcionario['nome'] . ' - ' . $funcionario['servico'] ?> </h4></div>
    <div class="col s1"> </div>
    <div class="col s2">

        <div class="hidden" >
            <input type="date" class="datepicker" style="display:none"/>
            <input type="date" class="timepicker" />
        </div>

        <h4><?php echo $funcionario['nome'] ?></h4>
        <ul class="collection with-header">
            <li class="collection-header"><h6>Agendamento</h6></li>
            <li class=""> 

                <a class="waves-effect waves-light btn" id="agendamento_horario" href="#"  >Horário</a>
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
<a class="waves-effect waves-light btn" href="#modal1">Modal</a>
<!-- Modal Structure -->
<div id="modal1" class="modal">
    <div class="modal-content">
        <h4>Modal Header</h4>

        <input id="datetimepicker" type="text" >

    </div>
    <div class="modal-footer">
        <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat" id="btn_agendar">Agendar</a>
    </div>
</div>

<script>
    var eventos;
    $(document).ready(function () {
        var logic = function (currentDateTime) {
            // 'this' is jquery object datetimepicker
            if (currentDateTime.getDay() == 6) {                
                this.setOptions({
                    //allowTimes:['10:00', '11:00','12:00'],
                    minTime: '11:00',formatTime:'H:i'
                });
            } else
                this.setOptions({
                    allowTimes:[],
                    minTime: '8:00'
                });
        };
        var showEvento = function (current_time, $input) {
            $('#btn_agendar').focus();
            console.log(current_time);
            console.log($input);
        };
        $('#datetimepicker').datetimepicker({
            mask: '39-19-9999 29:59',
            format: 'd-m-Y H:i',
            lang: 'pt-BR',
            inline: true,
            onChangeDateTime: logic,
            onShow: logic,
            weeks: true,
            minDate: 0,
            startDate: '17/12/2016',
            onSelectTime: showEvento,
            
            /*allowTimes: [
                '09:00',
                '11:00',
                '12:00',
                '21:00'
            ],*/
            disabledDates: ['16-12-2016'],formatDate:'d-m-Y'


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


        /* setTimeout(() => {
         var input = $('.datepicker').pickadate();
         var picker = input.pickadate('picker');
         picker.on('open', function () {
         console.log('Opened.. and here I am!');
         })
         
         
         }, 1000);*/
        /*
         $('.timepicker').pickatime({
         twelvehour: false,
         donetext: 'Done',
         format: 'HH:i',    
         formatSubmit: 'HH:i',
         interval:60,
         min: [8,0],
         disable:[{from:8,to:true}],
         
         onClose:function(){
         if($('.timepicker').val() != ""){
         var dataHora = $('.datepicker').val()+"T"+$('.timepicker').val();
         $('#agendamento_horario').html(dataHora);
         $('#calendar').fullCalendar( 'gotoDate', dataHora);
         
         console.log($('.timepicker').val())
         $('#calendar').fullCalendar('renderEvent',{title: 'Novo evento',start: dataHora,});
         }
         },
         beforeShow: function () {
         activeElement = $(document.activeElement)
         activeForm = activeElement.closest('form')[0]
         
         // Remove existing validation errors
         activeForm.ClientSideValidations.removeError(activeElement)
         
         // Prevent a validation error occurring when element un-focusses
         activeElement.disableClientSideValidations();
         },
         afterDone: function () {
         activeElement = $(document.activeElement)
         $(activeElement).enableClientSideValidations();
         }
         });
         $('#agendamento_horario').on('click', function (event) {
         event.stopPropagation();
         var input = $('.datepicker').pickadate({
         today:'Hoje',
         clear: 'Limpar',
         close: 'Ok',
         closeOnSelect: true,
         format: 'yyyy-mm-dd',
         min:'0',
         onClose: function(){
         $('.timepicker').focus();
         var dataHora = $('.datepicker').val();
         $('#agendamento_horario').html(dataHora)
         console.log('asd');return true;
         
         },
         });
         var picker = input.pickadate('picker');
         picker.open();
         });*/
    })

</script>