<?php get_header();
/*
Template Name: Home Page
*/
?>
<!-- <div id="container">
	<div id="home">
	<canvas>
<div class="row">
            <div class="small-11 columns">
            <header>
                <div id="logo" class="logo_hide">
                    <a href="<?php bloginfo('url'); ?>"><h1>
                        <?php bloginfo('name'); ?>    
                    </h1></a>
                </div>
          
	<!- 	<h1 class="home"> Javarista </h1>
		<h2>Javascript tutorials</h2>
		 -->
	<!-- </canvas> --> -->

	<div id="container" class="container">
      <div id="output" class="container">
      <canvas width="1378" height="352" style="display: block;"></canvas></div>
      <div id="vignette" class="overlay vignette">
      </div>
      <div id="noise" class="overlay noise">
      </div>
      <div id="ui" class="wrapper">
        <header id="header" class="header">
          
        </header>
        
		


	</div>
	<div id="about"> <!-- about explaination -->
		<h1 class="about"> About </h1>

	<?php if ( have_posts() ) : ?>
	<?php else : ?>
	<?php endif; ?>

	<?php while ( have_posts() ) : the_post(); ?>
	<?php endwhile; ?>

	</div>
	<div id="tuts"> <!-- tut grid goes here, add isotope -->
	<h1 class="tuts"> Tutorials </h1>
		
	<?php if ( have_posts() ) : ?>
	<?php else : ?>
	<?php endif; ?>

	<?php while ( have_posts() ) : the_post(); ?>
	<?php endwhile; ?>

	</div>









<?php get_footer(); ?>

