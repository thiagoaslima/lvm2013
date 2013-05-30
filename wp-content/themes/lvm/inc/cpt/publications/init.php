<?php
function lvm_publications_init() {
    $labels = array(
        'name'               => _x( 'Publicações', 'lvm-lang'),
        'singular_name'      => _x( 'Publicação', 'lvm-lang' ),
        'add_new'            => _x( 'Adicionar Nova', 'lvm-lang' ),
        'add_new_item'       => __( 'Adicionar Nova Publicação', 'lvm-lang' ),
        'edit_item'          => __( 'Editar Publicação', 'lvm-lang' ),
        'new_item'           => __( 'Nova Publicação', 'lvm-lang' ),
        'all_items'          => __( 'Todas as Publicações', 'lvm-lang' ),
        'view_item'          => __( 'Ver Publicação', 'lvm-lang' ),
        'search_items'       => __( 'Buscar Publicações', 'lvm-lang' ),
        'not_found'          => __( 'Nenhuma Publicação encontrada', 'lvm-lang' ),
        'not_found_in_trash' => __( 'Nenhuma Publicação encontrada na lixeira', 'lvm-lang' ), 
        'parent_item_colon'  => '',
        'menu_name'          => 'Publicações'
    );
    $args = array(
        'labels'        => $labels,
        'description'   => 'Publicações do Laboratório de Virologia Molecular',
        'public'        => true,
        'menu_position' => 5,
        'supports'      => array( 'title', 'editor' ),
        'has_archive'   => true,
    );
    register_post_type( '_lvm_pubs', $args ); 
}
add_action( 'init', 'lvm_publications_init' );

//custom messages
function my_updated_messages( $messages ) {
    global $post, $post_ID;
    $messages['_lvm_pubs'] = array(
        0 => '', 
        1 => sprintf( __('Publicação atualizada. <a href="%s">Visualizar publicação</a>'), esc_url( get_permalink($post_ID) ) ),
        2 => __('Dado atualizado.'),
        3 => __('Dado apagado.'),
        4 => __('Publicação atualizada.'),
        5 => isset($_GET['revision']) ? sprintf( __('Publicação reestabelecida a partir da revisão %s'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
        6 => sprintf( __('Publicação incluída. <a href="%s">Visualizar publicação</a>'), esc_url( get_permalink($post_ID) ) ),
        7 => __('Publicação gravada.'),
        8 => sprintf( __('Publicação enviada. <a target="_blank" href="%s">Preview</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
        9 => sprintf( __('Publicação agendada para: <strong>%1$s</strong>. <a target="_blank" href="%2$s"Visualizar publicação</a>'), date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( get_permalink($post_ID) ) ),
        10 => sprintf( __('Rascunho atualizado. <a target="_blank" href="%s">Visualizar publicação</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
    );
    return $messages;
}
add_filter( 'post_updated_messages', 'my_updated_messages' );

// register taxonomies
if (file_exists( dirname(__FILE__) . '/taxonomies.php' ) )
{
    include 'taxonomies.php';
}

// register meta boxes
if (file_exists( dirname(__FILE__) . '/metaboxes.php' ) )
{
    include 'metaboxes.php';
}
?>