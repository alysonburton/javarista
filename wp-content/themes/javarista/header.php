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
        
       

        <?php wp_head(); ?>
    

    </head>

    <body>
        <!-- navigation -->
        <nav id="site-navigation" class="navbar navbar-default navbar-fixed-top" role="navigation">
          <div class="container">  
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#main-navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="<?php bloginfo('url');?>"><?php bloginfo( 'name' ); ?></a>
            </div>
          
          <?php wp_nav_menu( array( 
            'theme_location'    => 'primary',
            'container'         => 'div',
            'container_class'   => 'collapse navbar-collapse',
            'container_id'      => 'main-navbar-collapse',
            'menu_class'        => 'nav navbar-nav navbar-right',
            'menu_id'           => '',
            'echo'              => true,
            'fallback_cb'       => 'wp_page_menu',
            'before'            => '',
            'after'             => '',
            'link_before'       => '',
            'link_after'        => '',
            'items_wrap'        => '<ul id="%1$s" class="%2$s">%3$s</ul>',
            'depth'             => 0,
            'walker'            => ''
            )); ?>
          </div>
        </nav>
        <!-- end of navigation -->
         