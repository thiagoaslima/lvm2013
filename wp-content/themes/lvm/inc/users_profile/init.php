<?php
// http://www.onextrapixel.com/2012/11/14/powerful-ways-to-customize-wordpress-user-profiles/
// http://teachingyou.net/wordpress/add-and-remove-wordpress-user-profile-fields/
// http://justintadlock.com/archives/2009/09/10/adding-and-using-custom-user-profile-fields
// http://www.netmagazine.com/tutorials/user-friendly-custom-fields-meta-boxes-wordpress
// http://wp.tutsplus.com/tutorials/plugins/how-to-create-custom-wordpress-writemeta-boxes/
// http://wp.tutsplus.com/tutorials/three-practical-uses-for-custom-meta-boxes/
// 

function manage_contact_methods( $contactmethods ) {

  unset($contactmethods['yim']);
  unset($contactmethods['aim']);
  unset($contactmethods['jabber']);

  $contactmethods['email2'] = __('Email alternativo', 'lvm-lang');
  $contactmethods['twitter'] = __('Twitter', 'lvm-lang');
  $contactmethods['facebook'] = __('Facebook', 'lvm-lang');
  $contactmethods['tel1'] = __('Telefone 1', 'lvm-lang');
  $contactmethods['tel2'] = __('Telefone 2', 'lvm-lang');
  $contactmethods['tel3'] = __('Telefone 3', 'lvm-lang');

  return $contactmethods;
}
add_filter('user_contactmethods', 'manage_contact_methods', 10, 1);

add_action( 'show_user_profile', 'extra_profile' );
add_action( 'edit_user_profile', 'extra_profile' );

function extra_profile( $user ) { ?>

    <script>
        (function (w, $) {
            $(function () {

                <?php 
                    if ( ! current_user_can('manage_options') ) 
                    { ?>
                /* Hide configuration elements */
                $('h3').first().hide().
                    next('table').hide();
                        
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
                <label for="endereco"><?php _e('Endereço', 'lvm-lang') ?></label>
            </th>
            <td>
                <textarea name="endereco" id="endereco" class="regular-text" cols="30" rows="3"><?php echo esc_attr( get_the_author_meta( 'endereco', $user->ID ) ); ?></textarea>
                <br />
                <span class="description"><?php _e('Preferencialmente, um endereço para correspondência', 'lvm-lang') ?></span>
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

    <!-- DADOS ACADÊMICOS -->
    <h3>Informações Acadêmicas</h3>
    
      <table class="form-table">
        
        <tr>
            <th>
                <label for="citacao"><?php _e('Citação', 'lvm-lang') ?></label>
            </th>

            <td>
                <input type="text" name="citacao" id="citacao" value="<?php echo esc_attr( get_the_author_meta( 'citacao', $user->ID ) ); ?>" class="regular-text" /><br />
                <span class="description"><?php _e('Por favor, preencha com seu citação', 'lvm-lang') ?></span>
            </td>
        </tr>

        <tr>
            <th colspan="2">
                <h4><em><?php _e('Formação Acadêmica', 'lvm-lang') ?></em></h4>
            </th>
        </tr>

        <tr>
            <th>
                <label for="grau-1"><?php _e('Grau Acadêmico', 'lvm-lang') ?></label>
            </th>

            <td>
                <select name="grau-1" id="grau-1"></select>
                <input type="text" name="grau-1" id="grau-1" value="<?php echo esc_attr( get_the_author_meta( 'grau-1', $user->ID ) ); ?>" class="regular-text" /><br />
                <span class="description"><?php _e('Por favor, preencha com seu Grau', 'lvm-lang') ?></span>
            </td>
        </tr>

    </table>
<?php }

?>