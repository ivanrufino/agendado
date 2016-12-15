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
<!-- Modal Structure -->

<script>
    var eventos;
    $(document).ready(function () {
//        $('.datepicker').pickadate({
//            weekdaysShort: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
//            showMonthsShort: true
//        })
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
        console.log(new Date());
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
        });
    })

</script>