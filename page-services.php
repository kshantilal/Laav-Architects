<?php 
	/*
		Template Name: Services Template
	*/
?>

 <?php get_header(); ?>
 	<div class="container">
 		<div class="row">
 			<?php 
 				$arg = array(
 					'post_type' => 'services',
 					'posts_per_page' => 3,
 				);
 			 ?>
 			 <?php $services = new WP_Query($arg); ?>
 			 <?php if($services->have_posts()): ?>
 			 	<?php while($services->have_posts()) : $services->the_post();?>
 			 		<div class="col-md-4 services">
 			 			<h2 class="serviceTitle"><?php the_title();?></h2>
 			 			<?php the_post_thumbnail('thumbnail'); ?>
 			 			<p><?php the_content(); ?></p>	
 			 		</div>
 			 	<?php endwhile ?>
 			 <?php endif; ?>





 		</div>
 	</div>


 <?php get_footer(); ?>