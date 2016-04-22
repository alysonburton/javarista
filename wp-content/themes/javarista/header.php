<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>" />
        <title><?php wp_title(); ?></title>
        <meta name="description" content="<?php bloginfo( 'description' ); ?>">
        <link rel="profile" href="http://gmpg.org/xfn/11" />
        <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>" type="text/css" media="screen" />
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
        <link rel="stylesheet" href="<?php bloginfo( 'template_directory' ); ?>/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php bloginfo( 'template_directory' ); ?>/css/bootstrap-theme.min.css">
        <link href='https://fonts.googleapis.com/css?family=Roboto:400,100' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="<?php bloginfo('template_directory')?>/css/style.css">
        
        <script src="<?php bloginfo( 'template_directory' );?>"/js/dat.gui.min.js></script>
        <script src="<?php bloginfo( 'template_directory' );?>"/js/example.js></script>
        <script src="<?php bloginfo( 'template_directory' );?>"/js/fss.min.js></script>
        <script src="<?php bloginfo( 'template_directory' );?>"/js/prefixfree.min.js> </script>
        
        

        <?php wp_head(); ?>
    

    </head>

    <body style="background-color: <?php the_field('background_color', 'option'); ?>">

 </header>