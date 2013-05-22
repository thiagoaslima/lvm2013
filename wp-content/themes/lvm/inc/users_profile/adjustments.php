<script>
    (function (w, $) {
        $(function () {

            <?php if ( !current_user_can('manage_options') ) : ?>
            /* Hide configuration elements */
            $('h3').first().hide().next('table').hide();

            $('#display_name').clone().appendTo('.display_name').end().remove();
            $('#password').clone().appendTo('.row-password').unwrap('tr#password').end().remove();
            
            $('#your-profile').children().not('input[type="hidden"], .custom-profile, .submit').remove();
            <?php endif; ?>


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

            $('.custom-profile').
                on('click', '.add-repeatable', function (evt) {
                    var repeatable = w.lvm_helpers.repeatable;
                    evt.preventDefault();
                    repeatable($(this).parents('tr').find('.repeatable'));
                }).
                on('change', 'select[name^=telefone-type-]', function () {
                    var $this = $(this),
                        name = $this.attr('name'),
                        id = $this.attr('id');

                    if ($this.val() === 'outros') {
                        $this.replaceWith('<input type="text" name="' + name + '" id="' + id + '" value="">');
                        $('#' + id).focus();
                    }
                }).
                on('blur', 'input[name^=telefone-type-]', function () {
                    $(this).on('blur', function () {
                        var $this = $(this),
                            name = $this.attr('name'),
                            id = $this.attr('id'),
                            select = '<select name="' + name + '" id="' + id + '" data-default="option:residencial">' +
                                '<option selected="selected" value="residencial">residencial</option>' + 
                                '<option value="comercial">comercial</option>' +
                                '<option value="celular">celular</option><option value="fax">fax</option>' +
                                '<option value="outros">outros</option></select>';

                        if ($.trim($this.val()) === '') {
                            $this.replaceWith(select);
                        }
                    })
                });
        });
    }(this, this.jQuery));
</script>