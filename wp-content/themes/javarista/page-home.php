<?php get_header();
/*
Template Name: Home Page
*/
?>


<div id="container" class="container">
	<h1>Javarista</h1>
      <div id="output" class="container">
	      <div id="vignette" class="overlay vignette"></div>
	      <div id="noise" class="overlay noise"></div>
	      <div id="controls" class="controls" style="display:none"></div>

      </div>
  </div>

<iframe id="rufous-sandbox" scrolling="no" frameborder="0" allowtransparency="true" allowfullscreen="true" style="position: absolute; visibility: hidden; display: none; width: 0px; height: 0px; padding: 0px; border: none;"></iframe>



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



 <script src="<?php bloginfo('template_directory');?>/js/prefixfree.min.js"></script>
    <script src="<?php bloginfo('template_directory');?>/js/dat.gui.min.js"></script>
    <script src="<?php bloginfo('template_directory');?>/js/fss.min.js"></script>
    <script src="<?php bloginfo('template_directory');?>/js/example.js"></script>
  

  </body>





<?php get_footer(); ?>

