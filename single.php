<?php get_header(); ?>
	<div class="container">
		<div class="row">
			<?php if(have_posts()): ?>
				<?php while(have_posts()): the_post(); ?>


					<div class="col-md-6">
						<h3>#<?php echo get_post_meta($post->ID, 'ProjectNumber', true); ?></h3>
						<h2><?php the_title(); ?></h2>
						<?php the_post_thumbnail('Single-Image'); ?>
						
						<?php echo $image = wp_get_attachment_image(get_post_meta($Post->ID, 'ImageOne', true), 'medium');?>


					</div>
					<div class="col-md-6">
						<p class="single-content"><?php the_content(); ?></p>

					</div>


				<?php endwhile; ?>
			<?php endif; ?>

		</div>
	</div>
<?php get_footer(); ?>