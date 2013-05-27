<?php
/**
 * SAVE AUTHOR META DATA
 */
add_action( 'personal_options_update', 'save_profile_fields' );
add_action( 'edit_user_profile_update', 'save_profile_fields' );
 
function save_profile_fields( $user_id ) {
 
    if ( !current_user_can( 'edit_user', $user_id ) )
        return false;
 
    // DATA DE NASCIMENTO
    update_usermeta( $user_id, 'nascimento', $_POST['nascimento'] );

    // ENDEREÇO RESIDENCIAL
    $endereco_residencial = array(
                                address => $_POST['endereco_residencial_address'],
                                isPublic => $_POST['endereco_residencial_isPublic']
                            );
    update_usermeta( $user_id, 'endereco_residencial', json_encode_unicode($endereco_residencial) );

    // ENDEREÇO COMERCIAL
    $endereco_comercial = array(
                                address => $_POST['endereco_comercial_address'],
                                isPublic => $_POST['endereco_comercial_isPublic']
                            );
    update_usermeta( $user_id, 'endereco_comercial', json_encode_unicode($endereco_comercial) );

    // TELEFONES
    $telefones = array();
    $i = 0;

    while( isset($_POST['telefone-isPublic-' . $i]) || 
            isset($_POST['telefone-type-' . $i]) ) 
    {
        if ( !isset($_POST['telefone-number-' . $i]) || 
             $_POST['telefone-number-' . $i] == '' ) { $i++; continue; }

        $telefones[] = array(
                type => $_POST['telefone-type-' . $i],
                number => $_POST['telefone-number-' . $i],
                isPublic => $_POST['telefone-isPublic-' . $i]
            );

        $i++;
    }

     update_usermeta( $user_id, 'telefones', json_encode_unicode($telefones) );
}

?>