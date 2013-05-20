<div class="custom-profile">

    <h3 class="lvm-wp-data"><?php _e('Dados do Wordpress', 'lvm-lang'); ?></h3>

    <table class="form-table lvm-wp-data">
        <tr>
            <th>
                <label for="user-login"><?php _e('Nome de login', 'lvm-lang'); ?></label><br>
            </th>

            <td>
                <input type="text" name="user-login" id="user-login" readonly value="<?php echo $user_info->user_login; ?>" class="regular-text">
                <span class="description"><?php _e('Não é possível alterar o nomme cadastrado', 'lvm-lang'); ?></span>
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
                <textarea name="description" id="description" rows="5" cols="30"><?php echo isset($user_meta['description']) ? $user_meta['description'][0] : ''; ?></textarea>
                <br /><span class="description"><?php _e('Escreva uma minibiografia para constar no seu perfil. Essas informações poderão ser vistas por todos.', 'lvm-lang') ?></span>
            </td>
        </tr>
    </table>
    <!-- /DADOS PESSOAIS -->

    <!-- CONTATO -->
    <h3 class="lvm-contatos"><?php _e('Informações de contato', 'lvm-lang'); ?></h3>

    <table class="form-table lvm-dados-pessoais">
        <tr>
            <th>
                <label for="endereco_residencial"><?php _e('Endereço residencial', 'lvm-lang'); ?></label>
            </th>

            <td>
                <textarea rows="3" cols="30" name="endereco_residencial" id="endereco_residencial"><?php echo isset( $user_meta['endereco_residencial'] ) ? $user_meta['endereco_residencial'][0] : ''; ?></textarea>
                <br>
                <span class="description"><?php _e('Defina o grau de visibilidade: ', 'lvm-lang'); ?></span>
                <?php $endereco_residencial = isset( $user_meta['endereco_residencial'] ) ? $user_meta['endereco_residencial'][0] : 'admin'; ?> 
                <select name="endereco_residencial_isPublic" id="endereco_residencial_isPublic">
                    <option <?php selected( $endereco_residencial, 'admin' ); ?> value="admin">apenas professores e administradores do site</option>
                    <option <?php selected( $endereco_residencial, 'logged' ); ?> value="logged">apenas usuários logados</option>
                    <option <?php selected( $endereco_residencial, 'all' ); ?> value="all">todos os visitantes do site</option>
                </select>
            </td>
        </tr>

        <tr>
            <th>
                <label for="endereco_profissional"><?php _e('Endereço profissional', 'lvm-lang'); ?></label>
            </th>

            <td>
                <textarea rows="3" cols="30" name="endereco_profissional" id="endereco_profissional"><?php echo isset( $user_meta['endereco_profissional'] ) ? $user_meta['endereco_residencial'][0] : ''; ?></textarea>
                <br>
                <span class="description"><?php _e('Defina o grau de visibilidade: ', 'lvm-lang'); ?></span>
                <?php $endereco_profissional = isset( $user_meta['endereco_profissional'] ) ? $user_meta['endereco_profissional'][0] : 'admin'; ?> 
                <select name="endereco_profissional_isPublic" id="endereco_profissional_isPublic">
                    <option <?php selected( $endereco_profissional, 'admin' ); ?> value="admin">apenas professores e administradores do site</option>
                    <option <?php selected( $endereco_profissional, 'logged' ); ?> value="logged">apenas usuários logados</option>
                    <option <?php selected( $endereco_profissional, 'all' ); ?> value="all">todos os visitantes do site</option>
                </select>
            </td>
        </tr>

        <tr data-tags='input,textarea,select'>
            <th>
                <label for="telefone"><?php _e('Telefone', 'lvm-lang'); ?></label>
                <br><br>
                <button class="add-repeatable button">Adicionar telefone</button>
            </th>

            <td>
                <div class="repeatable">
                <?php 
                $telefones = isset($user_meta['telefones']) ?
                                json_decode($user_meta['telefones']) : array( array('type' => 'residencial', 'number' => '', 'isPublic' => 'admin') );
                $len = count($telefones);

                for ($i = 0; $i < $len; $i++) {
                    $tel = $telefones[$i];
                ?>
                    <div class="group" data-number="<?php echo $i; ?>">
                        <select name="telefone-type-<?php echo $i; ?>" id="telefone-type-<?php echo $i; ?>" data-default="option:residencial">
                            <option <?php selected( $tel['type'], 'residencial' ); ?> value="residencial">residencial</option>
                            <option <?php selected( $tel['type'], 'comercial' ); ?> value="comercial">comercial</option>
                            <option <?php selected( $tel['type'], 'celular' ); ?> value="celular">celular</option>
                            <option <?php selected( $tel['type'], 'fax' ); ?> value="fax">fax</option>
                        </select>
                        <span>&emsp;</span>
                        <input type="text" name="telefone-number-<?php echo $i; ?>" id="telefone-number-<?php echo $i; ?>" value="<?php echo $tel['number']; ?>" data-default="value:null" placeholder="+55 21 2345 6789" class="regular-text" /><br />

                        <label class="description" for="telefone-isPublic-<?php echo $i; ?>"><?php _e('Informação visível para: ', 'lvm-lang'); ?></label>
                        <select name="telefone-isPublic-<?php echo $i; ?>" id="telefone-isPublic-<?php echo $i; ?>" data-default="option:admin" >
                            <option <?php selected( $tel['isPublic'], 'admin' ); ?> value="admin">apenas professores e administradores do site</option>
                            <option <?php selected( $tel['isPublic'], 'logged' ); ?> value="logged">apenas usuários logados</option>
                            <option <?php selected( $tel['isPublic'], 'all' ); ?> value="all">todos os visitantes do site</option>
                        </select>
                    </div><br>
                <?php } ?>
                </div>
                
            </td>
        </tr>

    </table>
</div>