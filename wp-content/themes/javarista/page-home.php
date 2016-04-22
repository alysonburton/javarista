<?php get_header(); ?>

<div id="container">
	<div id="home">
<<<<<<< HEAD
		<h1 class="home"> Home </h1>
=======
		<h1 class="home"> Javarista </h1>
		<h2>Javascript tutorials</h2>
>>>>>>> home_page

	<?php if ( have_posts() ) : ?>
		<?php else : ?>
	<?php endif; ?>

	<?php while ( have_posts() ) : the_post(); ?>
	<?php endwhile; ?>

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








<<<<<<< HEAD
<?php get_footer(); ?>
=======
<?php get_footer(); ?>
>>>>>>> home_page
