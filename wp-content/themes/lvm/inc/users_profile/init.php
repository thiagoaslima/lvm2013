<?php
// http://www.onextrapixel.com/2012/11/14/powerful-ways-to-customize-wordpress-user-profiles/
// http://teachingyou.net/wordpress/add-and-remove-wordpress-user-profile-fields/
// http://justintadlock.com/archives/2009/09/10/adding-and-using-custom-user-profile-fields
// http://www.netmagazine.com/tutorials/user-friendly-custom-fields-meta-boxes-wordpress
// http://wp.tutsplus.com/tutorials/plugins/how-to-create-custom-wordpress-writemeta-boxes/
// http://wp.tutsplus.com/tutorials/three-practical-uses-for-custom-meta-boxes/
// 

function hide_instant_messaging( $contactmethods ) {
    unset($contactmethods['rich_editing']);
    unset($contactmethods['aim']);
    unset($contactmethods['yim']);
    return $contactmethods;
}
add_filter('user_contactmethods', 'hide_instant_messaging', 10, 1);

add_action( 'show_user_profile', 'extra_profile' );
add_action( 'edit_user_profile', 'extra_profile' );

function extra_profile( $user ) { ?>

    <script>
        (function (w, $) {
            $(function () {
                $('h3').first().hide().
                    next('table').hide();


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

                $( "#nascimento" ).datepicker({
                    changeMonth: true,
                    changeYear: true,
                });

            });
        }(this, this.jQuery));
    </script>

    <!-- DADOS PESSOAIS -->
    <h3><?php _e('Dados Pessoais', 'lvm-lang') ?></h3>

    <table class="form-table">

        <tr>
            <th>
                <label for="nome"><?php _e('Nome', 'lvm-lang') ?></label>
            </th>
            <td>
                <input type="text" name="nome" id="nome" value="<?php echo esc_attr( get_the_author_meta( 'nome', $user->ID ) ); ?>" class="regular-text" /><br />
                <span class="description"><?php _e('Por favor, preencha com seu nome', 'lvm-lang') ?></span>
            </td>
        </tr>

        <tr>
            <th>
                <label for="sobrenome"><?php _e('Sobrenome', 'lvm-lang') ?></label>
            </th>

            <td>
                <input type="text" name="sobrenome" id="sobrenome" value="<?php echo esc_attr( get_the_author_meta( 'sobrenome', $user->ID ) ); ?>" class="regular-text" /><br />
                <span class="description"><?php _e('Por favor, preencha com seu sobrenome', 'lvm-lang') ?></span>
            </td>
        </tr>

        <tr>
            <th>
                <label for="citacao"><?php _e('Citação', 'lvm-lang') ?></label>
            </th>

            <td>
                <input type="text" name="citacao" id="citacao" value="<?php echo esc_attr( get_the_author_meta( 'citacao', $user->ID ) ); ?>" class="regular-text" /><br />
                <span class="description"><?php _e('Por favor, preencha com seu citacao', 'lvm-lang') ?></span>
            </td>
        </tr>

        <tr>
            <th>
                <label for="nascimento"><?php _e('Data de Nascimento', 'lvm-lang') ?></label>
            </th>

            <td>
                <input type="text" name="nascimento" id="nascimento" value="<?php echo esc_attr( get_the_author_meta( 'nascimento', $user->ID ) ); ?>" class="regular-text" /><br />
                <span class="description"><?php _e('Por favor, preencha com seu nascimento', 'lvm-lang') ?></span>
            </td>
        </tr>

    </table>

    <!-- CONTATOS -->
    
      <table class="form-table">

        <tr>
            <th>
                <label for="nome"><?php _e('Nome', 'lvm-lang') ?></label>
            </th>
            <td>
                <input type="text" name="nome" id="nome" value="<?php echo esc_attr( get_the_author_meta( 'nome', $user->ID ) ); ?>" class="regular-text" /><br />
                <span class="description"><?php _e('Por favor, preencha com seu nome', 'lvm-lang') ?></span>
            </td>
        </tr>
    </table>
<?php }

?>