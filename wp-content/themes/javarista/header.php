<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>" />
        <title><?php wp_title(); ?></title>
        <meta name="description" content="<?php bloginfo( 'description' ); ?>">
        <link rel="profile" href="http://gmpg.org/xfn/11" />
        <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>" type="text/css" media="screen" />
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
        <link rel="stylesheet" href="<?php bloginfo('template_directory')?>/css/style.css;">
        
        
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