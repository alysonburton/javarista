<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>" />
        <title><?php wp_title(); ?></title>
        <meta name="description" content="<?php bloginfo( 'description' ); ?>">
        <link rel="profile" href="http://gmpg.org/xfn/11" />
        <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>" type="text/css" media="screen" />
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<<<<<<< HEAD:wp-content/themes/javarista/header.php
        <link rel="stylesheet" href="<?php bloginfo( 'template_directory' ); ?>/css/bootstrap.min.css">
         <link rel="stylesheet" href="<?php bloginfo( 'template_directory' ); ?>/css/bootstrap-theme.min.css">
         <link rel="stylesheet" href="<?php bloginfo( 'template_directory' ); ?>/css/style.css">
         <link href='https://fonts.googleapis.com/css?family=Roboto:400,100' rel='stylesheet' type='text/css'>
        <?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); ?>
        <!-- add in roboto -->
=======
        <link rel="stylesheet" href="<?php bloginfo('template_directory')?>/css/style.css;">
        
        
>>>>>>> home_page:wp-content/themes/javarista/header.php
        <?php wp_head(); ?>
    

    </head>

    <body>

        <!-- <div class="row">
            <div class="small-11 columns">
            <header>
                <div id="logo" class="logo_hide">
                    <a href="<?php bloginfo('url'); ?>"><h1>
                        <?php bloginfo('name'); ?>    
                    </h1></a>
                </div>
            </header> -->