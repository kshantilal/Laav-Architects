<?php 
	/*
		Template Name: Test
	*/
 ?>

 <?php get_header(); ?>
	<h1>Test Template</h1>

	<?php echo get_post_meta($post->ID, 'custom_image_data', true); ?>
 <?php get_footer(); ?>
