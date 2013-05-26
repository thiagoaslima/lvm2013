<!-- 
    TO DO
    @ADD INICIO, TERMINO, ORIENTADOR, COORIENTADOR
    @ADD SAVE ALL FORMATION DATA
 -->

    <br>
    <h3 class="lvm-formacao"><?php _e('Formação acadêmica/Titulação', 'lvm-lang'); ?></h3>

    <table class="form-table lvm-dados-pessoais">
        <tr>
            <th>
                <button class="add-repeatable button">Adicionar formação</button>
            </th>

              <td>
                <?php 
                $formacoes = isset($user_meta['formacao']) ?
                                json_decode($user_meta['formacao'][0]) : 
                                array( (object)array('grau' => 'mestrado', 
                                                    'instituicao' => '', 
                                                    'curso' => '',
                                                    'status' => '',
                                                    'inicio' => '',
                                                    'termino' => '',
                                                    'titulo' => '',
                                                    'orientador' => '',
                                                    'coorientador' => '',
                                                    'isPublic' => 'admin'
                                                    )
                                                );
                $len = count($formacoes);

                for ($i = 0; $i < $len; $i++) {
                    $formacao = $formacoes[$i];
                ?>
                <div class="repeatable">
                    <div class="group" data-number="<?php echo $i; ?>" data-meta="formacao" data-keys="grau, instituicao, curso, status, inicio, termino, titulo, orientador, coorientador, isPublic">

                        <label for="formacao-grau-<?php echo $i; ?>"><?php _e('Grau acadêmico', 'lvm-lang'); ?></label>
                        <select name="formacao-grau-<?php echo $i; ?>" id="formacao-grau-<?php echo $i; ?>" data-default="option:mestrado">
                            <option <?php selected( $formacao->grau, 'livre docência' ); ?> value="livre docência"><?php _e('Livre docência', 'lvm-lang'); ?></option>
                            <option <?php selected( $formacao->grau, 'pós doutorado' ); ?> value="pós doutorado"><?php _e('Pós doutorado', 'lvm_lang'); ?></option>
                            <option <?php selected( $formacao->grau, 'doutorado' ); ?> value="doutorado"><?php _e('Doutorado', 'lvm-lang'); ?></option>
                            <option <?php selected( $formacao->grau, 'mestrado' ); ?> value="mestrado"><?php _e('Mestrado', 'lvm-lang'); ?></option>
                            <option <?php selected( $formacao->grau, 'mestrado profissionalizante' ); ?> value="mestrado profissionalizante"><?php _e('Mestrado Profissionalizante', 'lvm-lang'); ?></option>
                            <option <?php selected( $formacao->grau, 'especialização' ); ?> value="especialização"><?php _e('Especialização', 'lvm-lang'); ?></option>
                            <option <?php selected( $formacao->grau, 'graduação' ); ?> value="graduação"><?php _e('Graduação', 'lvm-lang'); ?></option>
                            <option <?php selected( $formacao->grau, 'ensino técnico' ); ?> value="ensino técnico"><?php _e('Ensino técnico', 'lvm-lang'); ?></option>
                        </select>
                        <br>

                        <label for="formacao-instituicao-<?php echo $i; ?>"><?php _e('Instituição', 'lvm-lang'); ?></label>
                        <input type="text" name="formacao-instituicao-<?php echo $i; ?>" id="formacao-instituicao-<?php echo $i; ?>" value="<?php echo $formacao->instituicao; ?>" data-default="value:null" placeholder="fulano@ufrj.br" class="regular-text" />
                        <br>

                        <label for="formacao-curso-<?php echo $i; ?>"><?php _e('Curso', 'lvm-lang'); ?></label>
                        <input type="text" name="formacao-curso-<?php echo $i; ?>" id="formacao-curso-<?php echo $i; ?>" value="<?php echo $formacao->curso; ?>" data-default="value:null" placeholder="fulano@ufrj.br" class="regular-text" />
                        <br>

                        <label for="formacao-status-<?php echo $i; ?>"><?php _e('Status do curso', 'lvm-lang'); ?></label>&emsp;
                        <input type="radio" <?php selected( $formacao->status, 'em curso' ); ?> name="formacao-status-<?php echo $i; ?>" id="formacao-status-<?php echo $i; ?>-A" value="em curso" />
                        <label for="formacao-status-<?php echo $i; ?>-A"><?php _e('Em curso', 'lvm-lang') ?></label>&ensp;
                        <input type="radio" <?php selected( $formacao->status, 'completo' ); ?> name="formacao-status-<?php echo $i; ?>" id="formacao-status-<?php echo $i; ?>-B" value="completo" />
                        <label for="formacao-status-<?php echo $i; ?>-B"><?php _e('Completo', 'lvm-lang') ?></label>&ensp;
                        <input type="radio" <?php selected( $formacao->status, 'incompleto' ); ?> name="formacao-status-<?php echo $i; ?>" id="formacao-status-<?php echo $i; ?>-C" value="incompleto" />
                        <label for="formacao-status-<?php echo $i; ?>-C"><?php _e('Incompleto', 'lvm-lang') ?></label>
                        <br>

                        <input type="text" name="formacao-curso-<?php echo $i; ?>" id="formacao-curso-<?php echo $i; ?>" value="<?php echo $formacao->curso; ?>" data-default="value:null" placeholder="fulano@ufrj.br" class="regular-text" />
                        <br>

                        <input type="text" name="formacao-orientador-<?php echo $i; ?>" id="formacao-orientador-<?php echo $i; ?>" value="<?php echo $formacao->curso; ?>" data-default="value:null" placeholder="fulano@ufrj.br" class="regular-text" />
                        <br>

                        <input type="text" name="formacao-curso-<?php echo $i; ?>" id="formacao-curso-<?php echo $i; ?>" value="<?php echo $formacao->curso; ?>" data-default="value:null" placeholder="fulano@ufrj.br" class="regular-text" />
                        <br>

                        <label class="description" for="formacao-isPublic-<?php echo $i; ?>"><?php _e('Informação visível para: ', 'lvm-lang'); ?></label>
                        <select name="formacao-isPublic-<?php echo $i; ?>" id="formacao-isPublic-<?php echo $i; ?>" data-default="option:admin" >
                            <option <?php selected( $formacao->isPublic, 'admin' ); ?> value="admin"><?php echo $msg_isPublic_admin; ?></option>
                            <option <?php selected( $formacao->isPublic, 'logged' ); ?> value="logged"><?php echo $msg_isPublic_logged; ?></option>
                            <option <?php selected( $formacao->isPublic, 'all' ); ?> value="all"><?php echo $msg_isPublic_all; ?></option>
                        </select>
                    </div><br>
                </div>
                <?php } ?>
            </td>
        </tr>
    </table>