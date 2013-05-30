<?php
/* Fire our meta box setup function on the post editor screen. */
add_action( 'load-post.php', '_lvm_pubs_boxes_setup' );
add_action( 'load-post-new.php', '_lvm_pubs_boxes_setup' );

/* Meta box setup function. */
function _lvm_pubs_boxes_setup() {
    /* Add meta boxes on the 'add_meta_boxes' hook. */
    add_action( 'add_meta_boxes', '_lvm_pubs_add_post_meta_boxes' );
}

/* Create one or more meta boxes to be displayed on the post editor screen. */
function _lvm_pubs_add_post_meta_boxes() {

    add_meta_box(
        '_lvm_pubs_citacao',          // Unique ID
        esc_html__( 'Citação', 'lvm-lang' ),      // Title
        '_lvm_pubs_citacao_meta_box',     // Callback function
        '_lvm_pubs',                 // Admin page (or post type)
        'normal',                 // Context
        'default'               // Priority
    );

    add_meta_box(
        '_lvm_pubs_autores',          // Unique ID
        esc_html__( 'Autores', 'lvm-lang' ),      // Title
        '_lvm_pubs_autores_meta_box',     // Callback function
        '_lvm_pubs',                 // Admin page (or post type)
        'side',                 // Context
        'default'               // Priority
    );
}

/* Display the post meta box. */
function _lvm_pubs_citacao_meta_box( $object, $box ) { ?>

    <?php wp_nonce_field( basename( __FILE__ ), '_lvm_pubs_class_nonce' ); ?>

    <p>
        <label for="_lvm_pubs_citacao"><?php _e( "Preencha com a forma correta para a citação da publicação em artigos e bibliografias", 'example' ); ?></label>
        <br />
        <textarea cols="178" rows="6" name="_lvm_pubs_citacao" id="_lvm_pubs_citacao"><?php echo esc_attr( get_post_meta( $object->ID, '_lvm_pubs_citacao', true ) ); ?></textarea>
    </p>
<?php }

/* Display the post meta box. */
function _lvm_pubs_autores_meta_box( $object, $box ) { ?>

    <?php wp_nonce_field( basename( __FILE__ ), '_lvm_pubs_class_nonce' ); ?>

    <?php 
    $args = array(
        'orderby'       => 'name', 
        'order'         => 'ASC', 
        'number'        => null,
        'optioncount'   => false, 
        'exclude_admin' => true, 
        'show_fullname' => true,
        'hide_empty'    => false,
        'echo'          => false,
        'feed'          => '', 
        'feed_image'    => '',
        'feed_type'     => '',
        'style'         => 'list',
        'html'          => false 
    ); 
    $users = get_all_users();

    $colab = get_posts(  array(
        'orderby'            =>    'title',
        'order'              =>    'ASC',
        'post_type'          =>    '_lvm_colaboradores',
        'post_status'        =>    'publish' )
    );

    print_r($users);
    print_r($colab);

    $authors_list = array_merge($users, $colab);
    sort($authors_list);
    ?>

    <p>
        <input type="text" list="persons" name="_lvm_pubs_autores" id="_lvm_pubs_autores" placeholder="<?php _e('Nome do autor a ser incluído', 'lvm-lang') ?>">

        <datalist id="persons">
            <?php 
            foreach ($authors_list as $person) {
                echo "<option value={$person->ID}>$person->name</option>";
            }?>
        </datalist>


    </p>
<?php }
?>