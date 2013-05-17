<?php
/*
Template Name: Página Inicial
*/
get_header(); ?>

<div id="main" class="clearfix">

    <?php get_sidebar( $name = null ); ?>

    <div id="content">

        <div class="variable">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); 
            the_content( $more_link_text = null, $stripteaser = false );
            ?>
        <!-- post -->
        <?php endwhile; ?>
        <!-- post navigation -->
        <?php endif; ?>
        </div>

    </div>
    
    <?php get_sidebar( $name = 'sticky-posts' ); ?>

</div>

<?php get_footer(); ?>