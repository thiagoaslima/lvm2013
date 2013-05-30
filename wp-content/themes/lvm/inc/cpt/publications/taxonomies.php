<?php
function _lvm_pubs_category_init() {
    $labels = array(
        'name'              => _x( 'Categorias de Publicação', 'lvm-lang' ),
        'singular_name'     => _x( 'Categoria de Publicação', 'lvm-lang' ),
        'search_items'      => __( 'Buscar Categoria', 'lvm-lang' ),
        'all_items'         => __( 'Todas as Categorias', 'lvm-lang' ),
        'parent_item'       => __( 'Categoria-Mãe', 'lvm-lang' ),
        'parent_item_colon' => __( 'Categoria-Mãe:', 'lvm-lang' ),
        'edit_item'         => __( 'Editar Categoria', 'lvm-lang' ), 
        'update_item'       => __( 'Atualizar Categoria', 'lvm-lang' ),
        'add_new_item'      => __( 'Adicionar Nova Categoria', 'lvm-lang' ),
        'new_item_name'     => __( 'Nova Categoria', 'lvm-lang' ),
        'menu_name'         => __( 'Categorias de Publicação', 'lvm-lang' ),
    );
    $args = array(
        'labels' => $labels,
        'hierarchical' => true,
    );
    register_taxonomy( '_lvm_pubs_category', '_lvm_pubs', $args );
}
add_action( 'init', '_lvm_pubs_category_init', 0 );
?>