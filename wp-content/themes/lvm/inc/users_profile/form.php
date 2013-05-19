<div class="custom-profile">

    <h3 class="lvm-wp-data"><?php _e('Dados do Wordpress', 'lvm-lang'); ?></h3>

    <table class="form-table lvm-wp-data">
        <tr>
            <th>
                <label for="user-login"><?php _e('Nome de login', 'lvm-lang'); ?></label>
            </th>

            <td>
                <input type="text" name="user-login" id="user-login" readonly value="<?php echo $user_info->user_login ?>" class="regular-text">
            </td>
        </tr>

        <tr>
            <th>
                <label for="nickname"><?php _e('Apelido', 'lvm-lang') ?><span class="description"><?php _e('(obrigatório)', 'lvm_lang'); ?></span></label> <br>
            </th>

            <td>
                <input type="text" name="nickname" id="nickname" value="<?php echo $user_meta['nickname'][0]; ?>" class="regular-text"><br>
                <span class="description"><?php _e('Preencha este campo com outro valor caso você queira que o Wordpress lhe chame por outro nome que não o nome de login', 'lvm-lang'); ?></span>
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
                <span class="description"><?php _e('Por favor, preencha com seu nascimento', 'lvm-lang') ?></span>
            </td>
        </tr>

        <tr>
            <th>
                <label for="description"><?php _e('Texto de apresentação', 'lvm-lang') ?></label>
            </th>

            <td>
                <textarea name="description" id="description" rows="5" cols="30"><?php echo isset($user_meta['description']) ? $user_meta['description'][0] : ''); ?></textarea>
                <br /><span class="description"><?php _e('Por favor, preencha com seu nascimento', 'lvm-lang') ?></span>
            </td>
        </tr>
    </table>
</div>