<?php get_header();
/*
Template Name: Contact Page
*/
?>

<div class="container contact-title">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
  	<h1><?php the_title(); ?></h1>
 	<p><?php the_content(); ?></p>

<?php endwhile; else: ?>
    <p>Sorry, no pages matched your criteria.</p>
<?php endif; ?>
</div>

<!--Form-->
<div class="container center-block form">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<?php the_field("form"); ?>

<?php endwhile; else: ?>
	<p>Sorry, no pages matched your criteria.</p>
<?php endif; ?>
</div>

<?php get_footer(); ?>