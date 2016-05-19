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
			<h2>Practical Javascript tutorials</h2>
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


<div id="tuts"> <!-- tut grid goes here, add isotope -->
	<a name="tutorials"><h1 class="tuts"><?php echo get_post_field('post_title', 30); ?></h1></a>
		<!-- Easy level Tut -->
		<?php
		    $args = array(
		     'post_type' => 'tutorial',
		     'level' => 'Tall',
		     'order' => 'ASC'
		    );
		    $query = new WP_Query( $args );
		?>

	    <!-- The Loop -->
	    <div id="container" class="js-masonry tut-masonry" data-masonry-options='{ "columnWidth": 200, "itemSelector": ".item" }'>
	    	<div class="col-sm-12"><h4>- TALL -</h4></div>
	    	<?php if( $query->have_posts() ) : while( $query->have_posts() ) : $query->the_post(); ?>
	    	<div class="item col-sm-12">
				<a href="<?php the_permalink()?>">
	        		<?php the_post_thumbnail(); ?> 
	        		<p><?php the_title(); ?></p>
	        	</a>
      		</div>

	    <!-- End The Loop -->
			<?php endwhile; endif; wp_reset_postdata(); ?>
		</div>

		<!-- Medium level Tut -->
		<?php
		    $args = array(
		     'post_type' => 'tutorial',
		     'level' => 'grande',
		     'order' => 'ASC'
		    );
		    $query = new WP_Query( $args );
		?>

	    <!-- The Loop -->
	    <div id="container" class="js-masonry tut-masonry" data-masonry-options='{ "columnWidth": 200, "itemSelector": ".item" }'>
	    	<div class="col-sm-12"><h4>- GRANDE -</h4></div>
	    	<?php if( $query->have_posts() ) : while( $query->have_posts() ) : $query->the_post(); ?>
	    	<div class="item col-sm-12">
				<a href="<?php the_permalink()?>">
	        		<?php the_post_thumbnail(); ?> 
	        		<p><?php the_title(); ?></p>
	        	</a>
      		</div>

	    <!-- End The Loop -->
			<?php endwhile; endif; wp_reset_postdata(); ?>
		</div>

		<!-- Hard level Tut -->
		<?php
		    $args = array(
		     'post_type' => 'tutorial',
		     'level' => 'venti',
		     'order' => 'ASC'
		    );
		    $query = new WP_Query( $args );
		?>

	    <!-- The Loop -->
	    <div id="container" class="js-masonry tut-masonry" data-masonry-options='{ "columnWidth": 200, "itemSelector": ".item" }'>
	    	<div class="col-sm-12"><h4>- VENTI -</h4></div>
	    	<?php if( $query->have_posts() ) : while( $query->have_posts() ) : $query->the_post(); ?>
	    	<div class="item col-sm-12">
				<a href="<?php the_permalink()?>">
	        		<?php the_post_thumbnail(); ?> 
	        		<p><?php the_title(); ?></p>
	        	</a>
      		</div>

	    <!-- End The Loop -->
			<?php endwhile; endif; wp_reset_postdata(); ?>
		</div>

	<div class="col-xs-12">
		<a class="smoothScroll" href="#top"><p>Go Back to Top</p></a>
	</div>
</div>



<script src="<?php bloginfo('template_directory');?>/js/prefixfree.min.js"></script>
<script src="<?php bloginfo('template_directory');?>/js/dat.gui.min.js"></script>
<script src="<?php bloginfo('template_directory');?>/js/fss.min.js"></script>
<script src="<?php bloginfo('template_directory');?>/js/example.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory');?>/js/smoothscroll.js"></script>

</body>

<?php get_footer(); ?>