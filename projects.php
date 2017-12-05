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
 					'post_type' => 'project',
 					'posts_per_page' => 9,
 					'paged' => get_query_var('paged')
 				);
 			 ?>
 			 <?php $projectPosts = new WP_Query($args); ?>

 			 <?php if($projectPosts->have_posts()): ?>
 			 	<?php while($projectPosts->have_posts()): $projectPosts->the_post(); ?>
 			 		<?php the_post_thumbnail('medium'); ?>
 			 		<h1><?php the_title();?></h1>
 					<p><?php the_content(); ?></p>
 			 	<?php endwhile; ?>
 			 <?php endif; ?>

 			</div>
 		</div>

 	</div>


 <?php get_footer(); ?>


 <!--  				<?php if(have_posts()): ?>
 					<?php while(have_posts()): the_post(); ?>
 						<?php the_post_thumbnail('medium'); ?>
 						<h1><?php the_title();?></h1>
 						<p><?php the_content(); ?></p>
 						<h1>projects</h1>


 					<?php endwhile; ?>
 				<?php endif; ?> -->