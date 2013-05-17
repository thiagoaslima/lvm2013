<?php get_header(); ?>

<div id="main">

    <?php get_sidebar( $name = null ); ?>

    <div id="content">
        <?php
            global $post;
            echo the_content( $more_link_text = null, $stripteaser = false );
        ?>
    </div>
    
</div>