<?php
	if (function_exists('acf_add_options_page')) {
	acf_add_options_page('Options');
}


add_action( 'after_setup_theme', 'register_my_menu' );
function register_my_menu() {
  register_nav_menu( 'primary', 'My Main Menu' );
}


require_once('wp_bootstrap_navwalker.php'); 


/*-----------------------------------------------------------------------------------*/
/*	Theme Setup
/*-----------------------------------------------------------------------------------*/
/*
add_action( 'after_setup_theme', 'the_theme_setup' );
function the_theme_setup()
{
	// First we check to see if our default theme settings have been applied.
	$the_theme_status = get_option( 'theme_setup_status' );
	// If the theme has not yet been used we want to run our default settings.
	if ( $the_theme_status !== '1' ) {
		// Setup Default WordPress settings
		$core_settings = array(
			'avatar_default' => 'mystery',
			'avatar_rating' => 'G',
			'default_role' => 'author',
			'comments_per_page' => 20
		);
		foreach ( $core_settings as $k => $v ) {
			update_option( $k, $v );
		}

		// Delete dummy post, page and comment.
		wp_delete_post( 1, true );
		wp_delete_post( 2, true );
		wp_delete_comment( 1 );


		// Create Home page
		$home_page = array(
			'post_type'     => 'page' ,
			'post_title'    => 'Home' ,
			'post_status'   => 'publish' ,
			'post_author'   => 1,
		);

			// Insert the post into the database
			wp_insert_post( $home_page );

		// Create Contact page
		$contact_page = array(
			'post_type'     => 'page' ,
			'post_title'    => 'Contact' ,
			'post_status'   => 'publish' ,
			'post_author'   => 1,
		);

			// Insert the post into the database
			wp_insert_post( $contact_page );


		// Once done, we register our setting to make sure we don't duplicate everytime we activate.
		update_option( 'theme_setup_status', '1' );

		// Lets let the admin know whats going on.
		$msg = '
		<div class="error">
			<p>The ' . get_option( 'current_theme' ) . 'theme has changed your WordPress default <a href="' . admin_url( 'options-general.php' ) . '" title="See Settings">settings</a> and deleted default posts & comments.</p>
		</div>';
		add_action( 'admin_notices', $c = create_function( '', 'echo "' . addcslashes( $msg, '"' ) . '";' ) );
	}
	// Else if we are re-activing the theme
	elseif ( $the_theme_status === '1' and isset( $_GET['activated'] ) ) {
		$msg = '
		<div class="updated">
			<p>The ' . get_option( 'current_theme' ) . ' theme was successfully re-activated.</p>
		</div>';
		add_action( 'admin_notices', $c = create_function( '', 'echo "' . addcslashes( $msg, '"' ) . '";' ) );
	}
}
*/