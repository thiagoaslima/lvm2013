<?php
// http://www.onextrapixel.com/2012/11/14/powerful-ways-to-customize-wordpress-user-profiles/
// http://teachingyou.net/wordpress/add-and-remove-wordpress-user-profile-fields/
// http://justintadlock.com/archives/2009/09/10/adding-and-using-custom-user-profile-fields
// http://www.netmagazine.com/tutorials/user-friendly-custom-fields-meta-boxes-wordpress
// http://wp.tutsplus.com/tutorials/plugins/how-to-create-custom-wordpress-writemeta-boxes/
// http://wp.tutsplus.com/tutorials/three-practical-uses-for-custom-meta-boxes/

function manage_contact_methods( $contactmethods ) {
  unset($contactmethods['yim']);
  unset($contactmethods['aim']);
  unset($contactmethods['jabber']);

  return $contactmethods;
}
add_filter('user_contactmethods', 'manage_contact_methods', 10, 1);

add_action( 'show_user_profile', 'extra_profile' );
add_action( 'edit_user_profile', 'extra_profile' );

function extra_profile( $user ) { ?>

    <?php
        $curr_user = get_current_user_id();
        $user_info = get_userdata( $curr_user );
        $user_meta = get_user_meta( $curr_user);

        include 'form.php';

        include "adjustments.php";
    ?>

<?php }

?>