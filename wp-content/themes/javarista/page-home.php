<?php get_header();
/*
Template Name: Home Page
*/
?>


<div id="container" class="container">
    <div id="output" class="container">
		<div id="vignette" class="overlay vignette"></div>
		<div id="noise" class="overlay noise"></div>
		<div class="intro">
			<h1>Javarista</h1>
			<h2>Javascript tutorials for designers</h2>
		</div>
		<div id="controls" class="controls" style="display:none"></div>
    </div>
</div>

<iframe id="rufous-sandbox" scrolling="no" frameborder="0" allowtransparency="true" allowfullscreen="true" style="position: absolute; visibility: hidden; display: none; width: 0px; height: 0px; padding: 0px; border: none;"></iframe>



<div id="about" class="center-block"> <!-- about explaination -->
	<h1 class="about">About Us</h1>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
 	<p><?php the_content(); ?></p>

	<?php endwhile; else: ?>
	    <p>Sorry, no pages matched your criteria.</p>
	<?php endif; ?>

</div>


<div id="tuts" class="center-block"> <!-- tut grid goes here, add isotope -->
	<a name="tutorials"><h1 class="tuts"><?php echo get_post_field('post_title', 30); ?></h1></a>
			
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
 	<p><?php echo get_post_field('post_content', 30); ?></p>

	<?php endwhile; else: ?>
	    <p>Sorry, no pages matched your criteria.</p>
	<?php endif; ?>

	<a class="smoothScroll" href="#top"><p>Go Back to Top</p></a>
</div>



<script src="<?php bloginfo('template_directory');?>/js/prefixfree.min.js"></script>
<script src="<?php bloginfo('template_directory');?>/js/dat.gui.min.js"></script>
<script src="<?php bloginfo('template_directory');?>/js/fss.min.js"></script>
<script src="<?php bloginfo('template_directory');?>/js/example.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory');?>/js/smoothscroll.js"></script>

</body>

<?php get_footer(); ?>