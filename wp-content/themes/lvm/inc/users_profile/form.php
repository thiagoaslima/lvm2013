<?php
    $msg_isPublic_admin = __('apenas professores e administradores do site', 'lvm-lang');
    $msg_isPublic_logged = __('apenas usuários logados', 'lvm-lang');
    $msg_isPublic_all = __('todos os visitantes do site', 'lvm-lang');

    $tel_types = array(
                    'residencial' => __('residencial', 'lvm-lang'),
                    'comercial' => __('comercial', 'lvm-lang'),
                    'celular' => __('celular', 'lvm-lang'),
                    'fax' => __('fax', 'lvm-lang'),
                    'outros' => __('outros', 'lvm-lang')
                )
?>
<script id="telefone:select" type="text/template">
    <select name="telefone-type-<?php echo $i; ?>" id="telefone-type-<?php echo $i; ?>" data-default="option:residencial">
        <option selected="selected" value="residencial"><?php echo $tel_types['residencial']; ?></option>
        <option value="comercial"><?php echo $tel_types['comercial']; ?></option>
        <option value="celular"><?php echo $tel_types['celular']; ?></option>
        <option value="fax"><?php echo $tel_types['fax']; ?></option>
        <option value="outros"><?php echo $tel_types['outros']; ?></option>
    </select>
</script>



<div class="custom-profile">

    <h3 class="lvm-wp-data"><?php _e('Dados do Wordpress', 'lvm-lang'); ?></h3>

    <table class="form-table lvm-wp-data">
        <tr>
            <th>
                <label for="user-login"><?php _e('Nome de login', 'lvm-lang'); ?></label><br>
            </th>

            <td>
                <input type="text" name="user-login" id="user-login" readonly value="<?php echo $user_info->user_login; ?>" class="regular-text">
                <span class="description"><?php _e('Não é possível alterar o nome cadastrado', 'lvm-lang'); ?></span>
            </td>
        </tr>

        <tr>
            <th>
                <label for="nickname"><?php _e('Apelido', 'lvm-lang') ?> <span class="description"><?php _e('(obrigatório)', 'lvm_lang'); ?></span></label> <br>
            </th>

            <td>
                <input type="text" name="nickname" id="nickname" value="<?php echo $user_meta['nickname'][0]; ?>" class="regular-text"><br>
                <span class="description"><?php _e('Preencha este campo caso você queira que o Wordpress lhe chame por outro nome que não o nome de login', 'lvm-lang'); ?></span>
            </td>
        </tr>

        <tr>
            <th>
                <label for="email"><?php _e('Email de cadastro', 'lvm-lang') ?> <span class="description"><?php _e('(obrigatório)', 'lvm_lang'); ?></span></label> <br>
            </th>

            <td>
                <input type="text" name="email" id="email" value="<?php echo $user_info->user_email; ?>" class="regular-text"><br>
            </td>
        </tr>

        <tr>
            <th>
                <label for="display_name"><?php _e('Exibir o nome publicamente como', 'lvm-lang'); ?></label><br>
            </th>

            <td class='display_name'>
            </td>
        </tr>

        <tr class="row-password">
        </tr>   
    </table>
    <!-- /WP DATA -->
    

    <!-- DADOS PESSOAIS -->
    <br>
    <h3 class="lvm-dados-pessoais"><?php _e('Dados Pessoais', 'lvm-lang'); ?></h3>

    <table class="form-table lvm-dados-pessoais">
        <tr>
            <th>
                <label for="first_name"><?php _e('Nome', 'lvm-lang'); ?></label>
            </th>

            <td>
                <input type="text" name="first_name" id="first_name" value="<?php echo $user_meta['first_name'][0]; ?>" class="regular-text">
            </td>
        </tr>

        <tr>
            <th>
                <label for="last_name"><?php _e('Sobrenome', 'lvm_lang') ?></label>
            </th>

            <td>
                <input type="text" name="last_name" id="last_name" value="<?php echo $user_meta['last_name'][0] ?>" class="regular-text">
            </td>
        </tr>

        <tr>
            <th>
                <label for="nascimento"><?php _e('Data de Nascimento', 'lvm-lang') ?></label>
            </th>

            <td>
                <input type="text" name="nascimento" id="nascimento" value="<?php echo isset($user_meta['nascimento']) ? $user_meta['nascimento'][0] : ''; ?>" class="regular-text" /><br />
                <span class="description"><?php _e('Por favor, preencha do seguinte modo: dd/mm/yyyy. Ex.: 1/05/1990', 'lvm-lang') ?></span>
            </td>
        </tr>

        <tr>
            <th>
                <label for="description"><?php _e('Texto de apresentação', 'lvm-lang') ?></label>
            </th>

            <td>
                <textarea name="description" id="description" rows="5" cols="30"><?php echo isset($user_meta['description']) ? $user_meta['description'][0] : ''; ?></textarea>
                <br /><span class="description"><?php _e('Escreva uma minibiografia para constar no seu perfil. Essas informações poderão ser vistas por todos.', 'lvm-lang') ?></span>
            </td>
        </tr>
    </table>
    <!-- /DADOS PESSOAIS -->

    <!-- CONTATO -->
    <br>
    <h3 class="lvm-contatos"><?php _e('Informações de contato', 'lvm-lang'); ?></h3>

    <table class="form-table lvm-dados-pessoais">
        <tr>
            <th>
                <label for="endereco_address"><?php _e( 'Endereço para correspondência', 'lvm-lang' ); ?></label>
            </th>

            <td>
                <?php
                $endereco = isset( $user_meta['endereco'] ) ? 
                                        json_decode($user_meta['endereco'][0]) : (object)array('address' => '', 'isPublic' => '');
                ?>

                <textarea rows="3" cols="30" name="endereco_address" id="endereco_address"><?php echo $endereco->address; ?></textarea>
                <br>
                <span class="description"><?php _e( 'Defina o grau de visibilidade: ', 'lvm-lang' ); ?></span>
                <select name="endereco_isPublic" id="endereco_isPublic">
                    <option <?php selected( $endereco->isPublic, 'admin' ); ?> value="admin"><?php echo $msg_isPublic_admin; ?></option>
                    <option <?php selected( $endereco->isPublic, 'logged' ); ?> value="logged"><?php echo $msg_isPublic_logged; ?></option>
                    <option <?php selected( $endereco->isPublic, 'all' ); ?> value="all"><?php echo $msg_isPublic_all; ?></option>
                </select>
            </td>
        </tr>

        <tr data-tags='input,textarea,select'>
            <th>
                <label for="telefone"><?php _e('Telefones', 'lvm-lang'); ?></label><span>&emsp;</span><button class="add-repeatable button">Adicionar telefone</button>
            </th>

            <td>
                <?php 
                $telefones = isset($user_meta['telefones']) ?
                                json_decode($user_meta['telefones'][0]) : array( (object)array('type' => 'residencial', 'number' => '', 'isPublic' => 'admin') );
                $len = count($telefones);

                for ($i = 0; $i < $len; $i++) {
                    $tel = $telefones[$i];
                ?>
                <div class="repeatable">
                    <div class="group" data-number="<?php echo $i; ?>" data-meta="telefone" data-keys="type, number, isPublic">
                        <select name="telefone-type-<?php echo $i; ?>" id="telefone-type-<?php echo $i; ?>" data-default="option:residencial">
                            <option <?php selected( $tel->type, 'residencial' ); ?> value="residencial"><?php echo $tel_types['residencial']; ?></option>
                            <option <?php selected( $tel->type, 'comercial' ); ?> value="comercial"><?php echo $tel_types['comercial']; ?></option>
                            <option <?php selected( $tel->type, 'celular' ); ?> value="celular"><?php echo $tel_types['celular']; ?></option>
                            <option <?php selected( $tel->type, 'fax' ); ?> value="fax"><?php echo $tel_types['fax']; ?></option>
                            <?php 
                                $options = array('residencial', 'comercial', 'celular', 'fax');
                                if ( is_string($tel->type) && !in_array($tel->type, $options) )
                                { ?>
                            <option value="<?php echo $tel->type; ?>" selected="selected"><?php echo $tel->type; ?></option>
                                <?php } ?>
                            <option value="outros"><?php echo $tel_types['outros']; ?></option>
                        </select>
                        <span>&emsp;</span>
                        <input type="text" name="telefone-number-<?php echo $i; ?>" id="telefone-number-<?php echo $i; ?>" value="<?php echo $tel->number; ?>" data-default="value:null" placeholder="+55 21 2345 6789" class="regular-text" /><br />

                        <label class="description" for="telefone-isPublic-<?php echo $i; ?>"><?php _e('Informação visível para: ', 'lvm-lang'); ?></label>
                        <select name="telefone-isPublic-<?php echo $i; ?>" id="telefone-isPublic-<?php echo $i; ?>" data-default="option:admin" >
                            <option <?php selected( $tel->isPublic, 'admin' ); ?> value="admin"><?php echo $msg_isPublic_admin; ?></option>
                            <option <?php selected( $tel->isPublic, 'logged' ); ?> value="logged"><?php echo $msg_isPublic_logged; ?></option>
                            <option <?php selected( $tel->isPublic, 'all' ); ?> value="all"><?php echo $msg_isPublic_all; ?></option>
                        </select>
                    </div><br>
                </div>
                <?php } ?>
            </td>
        </tr>

        <tr data-tags='input,textarea,select'>
            <th>
                <label for="emails"><?php _e('Email', 'lvm-lang'); ?></label><span>&emsp;</span><button class="add-repeatable button">Adicionar email</button>
            </th>

            <td>
                <?php 
                $emails = isset($user_meta['emails']) ?
                                json_decode($user_meta['emails'][0]) : array( (object)array('value' => '', 'isPublic' => 'admin') );
                $len = count($emails);

                for ($i = 0; $i < $len; $i++) {
                    $email = $emails[$i];
                ?>
                <div class="repeatable">
                    <div class="group" data-number="<?php echo $i; ?>" data-meta="email" data-keys="value, isPublic">
                        <input type="email" name="email-value-<?php echo $i; ?>" id="email-value-<?php echo $i; ?>" value="<?php echo $email->value; ?>" data-default="value:null" placeholder="fulano@ufrj.br" class="regular-text" />
                        <br>
                        <label class="description" for="email-isPublic-<?php echo $i; ?>"><?php _e('Informação visível para: ', 'lvm-lang'); ?></label>
                        <select name="email-isPublic-<?php echo $i; ?>" id="email-isPublic-<?php echo $i; ?>" data-default="option:admin" >
                            <option <?php selected( $email->isPublic, 'admin' ); ?> value="admin"><?php echo $msg_isPublic_admin; ?></option>
                            <option <?php selected( $email->isPublic, 'logged' ); ?> value="logged"><?php echo $msg_isPublic_logged; ?></option>
                            <option <?php selected( $email->isPublic, 'all' ); ?> value="all"><?php echo $msg_isPublic_all; ?></option>
                        </select>
                    </div><br>
                </div>
                <?php } ?>
            </td>
        </tr>

    </table>
    <!-- /CONTATO -->


    <!-- FORMAÇÃO ACADÊMICA / TITULAÇÃO -->
    <!-- IN FUTURE: LOOK FOR FORMACAO.PHP IN THE SAME FOLDER -->
</div>