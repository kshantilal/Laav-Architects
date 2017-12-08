<?php get_header(); ?>
	<div class="container">
		<div class="row">
			<?php if(have_posts()): ?>
				<?php while(have_posts()): the_post(); ?>


					<div class="col-md-6">
						<h2><?php the_title(); ?></h2>
						<?php the_post_thumbnail('large'); ?>
						
						<?php $image = wp_get_attachment_image( get_post_meta( get_the_ID(), 'single_image1_id', 1 ), 'medium' );?>


					</div>
					<div class="col-md-6">
						<?php the_content(); ?>

					</div>


				<?php endwhile; ?>
			<?php endif; ?>

		</div>
	</div>
<?php get_footer(); ?>