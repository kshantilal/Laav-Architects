<?php 
	/*
		Template Name: Projects Template
	*/
 ?>

 <?php get_header(); ?>
 	<div class="container">
 		<div class="row">
 			<?php 
 				$arg = array(
 					'post_type' => 'projects',
 					'posts_per_page' => 9,
 				);
 			 ?>
 			 <?php $projectPosts = new WP_Query($arg); ?>

 			 <?php if($projectPosts->have_posts()): ?>
 			 	<?php while($projectPosts->have_posts()): $projectPosts->the_post(); ?>
 			 		<div class="col-md-4">
 			 			<a href="<?php echo esc_url(get_permalink()); ?>">
	 			 			<?php the_post_thumbnail('medium'); ?>
	 			 			<h3>#<?php echo get_post_meta($post->ID, 'ProjectNumber', true); ?></h3>
	 			 			<h5><?php the_title();?></h5>
 			 			</a>
 			 		</div>
 			 	<?php endwhile; ?>
 			 <?php endif; ?>
 		</div>
 	</div>


 <?php get_footer(); ?>
