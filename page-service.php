<?php 
	/*
		Template Name: Services Template
	*/
?>

 <?php get_header(); ?>
 	<div class="container">
 	<div class="back btn"><i class="fa fa-angle-left fa-lg" aria-hidden="true"></i>Back</div>
 		<div class="row">
 			<?php 
 				$arg = array(
 					'post_type' => 'services',
 					'posts_per_page' => 3,
 				);
 			 ?>
 			 <?php $services = new WP_Query($arg); ?>
 			 <h1 class="serviceTitle"><?php the_title(); ?></h1>
 			 <?php if($services->have_posts()): ?>
 			 	<?php while($services->have_posts()) : $services->the_post();?>
 			 		<div class="col-md-4 services">
 			 			<h3 class="serviceTitle"><?php the_title();?></h3>
 			 			<a class="permalink" href="<?php echo(get_permalink()); ?>">	 			 			
	 			 			<?php the_post_thumbnail('thumbnail'); ?>
 			 			</a>
 			 			<div class="servicesText">
 			 				<p><?php the_content(); ?></p>
 			 			</div>

 			 		</div>
 			 	<?php endwhile ?>
 			 <?php endif; ?>
 		</div>
 	</div>
 <?php get_footer(); ?>