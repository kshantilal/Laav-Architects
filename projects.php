<?php 
	/*
		Template Name: Projects Template
	*/
 ?>

 <?php get_header(); ?>
 	<div class="container">
 		<div class="row">
 			<div class="col-md-3">
 			<?php 
 				$arg = array(
 					'post_type' => 'projects',
 					'posts_per_page' => 9,
 				);
 			 ?>
 			 <?php $projectPosts = new WP_Query($arg); ?>

 			 <?php if($projectPosts->have_posts()): ?>
 			 	<?php while($projectPosts->have_posts()): $projectPosts->the_post(); ?>
 			 		<?php the_post_thumbnail('medium'); ?>
 			 		<p>#<?php echo get_post_meta($post->ID, 'projects', true); ?></p>
 			 		<h4><?php the_title();?></h4>
 					<p><?php the_content(); ?></p>
 			 	<?php endwhile; ?>
 			 <?php endif; ?>

 			</div>
 		</div>
 	</div>


 <?php get_footer(); ?>
