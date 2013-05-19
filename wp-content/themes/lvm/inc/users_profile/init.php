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

    <style type="text/css">
        .formacao .ui-datepicker-calendar { display: none;}
    </style>

    <script>
        (function (w, $) {
            $(function () {

                <?php 
                    if ( !current_user_can('manage_options') ) 
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

                $( "#nascimento, .inicio-curso, .fim-curso" ).datepicker({
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
                <label for="citacao"><?php _e('Nome em citações bibliográficas', 'lvm-lang') ?></label>
            </th>

            <td>
                <input type="text" name="citacao" id="citacao" value="<?php echo esc_attr( get_the_author_meta( 'citacao', $user->ID ) ); ?>" class="regular-text" /><br />
                <span class="description"><?php _e('Por favor, preencha como seu nome deve constar em citações e referências', 'lvm-lang') ?></span>
            </td>
        </tr>

        <tr>
            <th>
                <label for="lattes"><?php _e('Link para o currículo lattes', 'lvm-lang') ?></label>
            </th>

            <td>
                <input type="url" name="lattes" id="lattes" value="<?php echo esc_attr( get_the_author_meta( 'lattes', $user->ID ) ); ?>" class="regular-text" /><br />
                <span class="description"><?php _e('Por favor, preencha como seu nome deve constar em citações e referências', 'lvm-lang') ?></span>
            </td>
        </tr>
        <tr>
            <th colspan="2">
                <h4><em><?php _e('Formação Acadêmica', 'lvm-lang') ?></em></h4>
            </th>
        </tr>

        <tr class="formacao formacao-1">
            <th>
                <label for="grau-1"><?php _e('Grau Acadêmico', 'lvm-lang') ?></label>
            </th>

            <td>
                <select name="grau-1" id="grau-1">
                    <option value=""></option>
                    <option value="graduação">graduação</option>
                    <option value="especialização">especialização</option>
                    <option value="mestrado profissional">mestrado profissional</option>
                    <option value="mestrado">mestrado</option>
                    <option value="doutorado">graduação</option>
                </select>
            </td>
        </tr>

        <tr class="formacao formacao-1">
            <th>
                <label for="instituicao-1"><?php _e('Instituição', 'lvm-lang') ?></label>
            </th>

            <td>
                <input type="text" name="instituicao-1" id="instituicao-1" value="<?php echo esc_attr( get_the_author_meta( 'instituicao-1', $user->ID ) ); ?>" class="regular-text" /><br />
            </td>
        </tr>

        <tr class="formacao formacao-1">
            <th>
                <label for="curso-1"><?php _e('Curso', 'lvm-lang') ?></label>
            </th>

            <td>
                <input type="text" name="curso-1" id="curso-1" value="<?php echo esc_attr( get_the_author_meta( 'curso-1', $user->ID ) ); ?>" class="regular-text" /><br />
            </td>
        </tr>

        <tr class="formacao formacao-1">
            <th>
                <label for="status-1"><?php _e('Status do curso', 'lvm-lang'); ?></label>
            </th>

            <td>
                <input type="radio" name="status-1" id="status-1-A" /> <label for="status-1-A"><?php _e('em andamento', 'lvm-lang'); ?></label>
                &emsp;&emsp; 
                <input type="radio" name="status-1" id="status-1-B" /> <label for="status-1-B"><?php _e('completo', 'lvm-lang'); ?></label>
                &emsp;&ensp; 
                <input type="radio" name="status-1" id="status-1-C" /> <label for="status-1-C"><?php _e('incompleto', 'lvm-lang'); ?></label>
            </td>
        </tr>

        <tr class="formacao formacao-1">
            <th>
                <?php _e('Período do Curso', 'lvm_lang'); ?>
            </th>

            <td>
                <label for="inicio-1"><?php _e('Inicio do curso', 'lvm-lang') ?></label>
                <input type="text" name="inicio-1" id="inicio-1" class="inicio-curso">
                <br>
                <label for="fim-1"><?php _e('Término do curso', 'lvm-lang') ?></label>
                <input type="text" name="fim-1" id="fim-1" class="fim-curso">
            </td>
        </tr>

        <tr class="formacao formacao-1">
            <th>
                <label for="titulo-1"><?php _e('Título do trabalho/dissertação/tese', 'lvm-lang'); ?></label>
            </th>

            <td>
                <input type="text" name="titulo-1" id="titulo-1" value="<?php echo esc_attr( get_the_author_meta( 'titulo-1', $user->ID ) ); ?>" class="regular-text" /><br>
            </td>
        </tr>

        <tr class="formacao formacao-1">
            <th>
                <label for="orientador-1"><?php _e('Nome do orientador', 'lvm-lang'); ?></label>
            </th>

            <td>
                <input type="text" name="orientador-1" id="orientador-1" value="<?php echo esc_attr( get_the_author_meta( 'orientador-1', $user->ID ) ); ?>" class="regular-text" /><br>
            </td>
        </tr>

        <tr class="formacao formacao-1">
            <th>
                <label for="co-orientador-1"><?php _e('Nome do co-orientador', 'lvm-lang'); ?></label>
            </th>

            <td>
                <input type="text" name="co-orientador-1" id="co-orientador-1" value="<?php echo esc_attr( get_the_author_meta( 'co-orientador-1', $user->ID ) ); ?>" class="regular-text" /><br>
            </td>
        </tr>

    </table>
<?php }

?>