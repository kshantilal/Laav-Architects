<?php 
	/*
		Template Name: Projects Template
	*/
 ?>

 <?php get_header(); ?>
 	<div class="container">
 	<div class="back btn"><i class="fa fa-angle-left fa-lg" aria-hidden="true"></i>Back</div>
 		<div class="row">
 			<?php 
 				$arg = array(
 					'post_type' => 'projects',
 					'posts_per_page' => 9,
 				);
 			 ?>
 			 <?php $projectPosts = new WP_Query($arg); ?>
 			 <h1 class="serviceTitle"><?php the_title(); ?></h1>
 			 <?php if($projectPosts->have_posts()): ?>
 			 	<?php while($projectPosts->have_posts()): $projectPosts->the_post(); ?>
 			 		<div class="col-md-4">
 			 			<a class="permalink" href="<?php echo(get_permalink()); ?>">
				 			<div class="projectImage"><?php the_post_thumbnail('large'); ?></div>
 			 			</a>
 			 			<h3 class="titleNumberInline">#<?php echo get_post_meta($post->ID, 'ProjectNumber', true); ?></h3>
				 		<h5 class="titleNumberInline"><?php the_title();?></h5>


 			 		</div>
 			 	<?php endwhile; wp_reset_query(); ?>
 			 <?php endif; ?>
 		</div>
 	</div>


 <?php get_footer(); ?>
