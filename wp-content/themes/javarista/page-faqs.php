<?php get_header();
/*
Template Name: FAQ Page
*/
?>

<div class="container faq-title">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<h1><?php the_title(); ?></h1>
	 	<p><?php the_content(); ?></p>

	  <?php endwhile; else: ?>
	    <p>Sorry, no pages matched your criteria.</p>
	<?php endif; ?>
</div>


<div class="container center-block faqs">
	<?php if (have_posts()) : while (have_posts()) : the_post();
	echo '<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">';
	$i=1;
	$faqs = get_field('faqs');
	  foreach($faqs as $faq){
	?>
	<div class="panel panel-default">
	  	<div class="panel-heading" role="tab" id="headingOne">
	      <h5 class="panel-title">
	        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#c<?php echo $i;?>" aria-expanded="true" aria-controls="collapseOne">
	          <?php echo $faq['question'];?>
	        </a>
	      </h5>
	    </div>
	    <div id="c<?php echo $i;?>" class="panel-collapse collapse <?php echo ($i == 1)? ' in':'';?>" role="tabpanel" aria-labelledby="headingOne">
	      <div class="panel-body">
	        <?php echo $faq['answer'];?>
	      </div>
	    </div>
	</div>
	<?php $i++;} ?>

	<?php endwhile; else: ?>
	  <p>Sorry, no pages matched your criteria.</p>
	<?php endif; ?>
</div>


<?php get_footer(); ?>