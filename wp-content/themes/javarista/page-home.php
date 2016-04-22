<?php get_header(); ?>

<div id="container">
	<div id="home">
		<h1 class="home"> Javarista </h1>
		<h2>Javascript tutorials</h2>

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








<?php get_footer(); ?>
