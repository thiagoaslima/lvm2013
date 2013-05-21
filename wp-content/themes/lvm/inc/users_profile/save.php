<?php
function save_user_profile_fields( $user_id ) { 

    if( !current_user_can( 'edit_user', $user_id ) ) return false;

    update_usermeta( $user_id, 'nascimento', $_POST['nascimento'] );

    $endereco_residencial = array(
                                address => $_POST['endereco_residencial_address'],
                                isPublic => $_POST['endereco_residencial_isPublic']
                            )
    update_usermeta( $user_id, 'endereco_residencial', json_encode($endereco_residencial) );
  //  update_usermeta( $user_id, 'Twitter', $_POST['Twitter'] );
}

add_action( 'personal_options_update', 'save_user_profile_fields' );
add_action( 'edit_user_profile_update', 'save_user_profile_fields' );
?>