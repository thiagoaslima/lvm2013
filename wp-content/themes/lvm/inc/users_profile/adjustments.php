<script>
    (function (w, $) {
        $(function () {

            <?php 
                if ( !current_user_can('manage_options') ) 
                { ?>
            /* Hide configuration elements */
            $('h3').first().hide().next('table').hide();

            $('#display_name').clone().appendTo('.display_name').end().remove();
            $('#password').clone().appendTo('.row-password').unwrap('tr#password').end().remove();
            
            // $('#your-profile').children().not('input[type="hidden"], .custom-profile').remove();
            <?php } ?>


            /* Brazilian initialisation for the jQuery UI date picker plugin. */
            /* Written by Leonildo Costa Silva (leocsilva@gmail.com). */
            $.datepicker.regional['pt-BR'] = {
                closeText: 'Fechar',
                prevText: '&#x3C;Anterior',
                nextText: 'Próximo&#x3E;',
                currentText: 'Hoje',
                monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho',
                'Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
                monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun',
                'Jul','Ago','Set','Out','Nov','Dez'],
                dayNames: ['Domingo','Segunda-feira','Terça-feira','Quarta-feira','Quinta-feira','Sexta-feira','Sábado'],
                dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb'],
                dayNamesMin: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb'],
                weekHeader: 'Sm',
                dateFormat: 'd/mm/yy',
                firstDay: 0,
                isRTL: false,
                showMonthAfterYear: false,
                yearSuffix: ''};
            $.datepicker.setDefaults($.datepicker.regional['pt-BR']);

            $( "#nascimento, .inicio-curso, .fim-curso" ).datepicker({
                changeMonth: true,
                changeYear: true,
            });
        });
    }(this, this.jQuery));
</script>