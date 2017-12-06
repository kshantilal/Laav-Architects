<?php get_header(); ?>
	<div class="container">
		<div class="row">
			<?php if(have_posts()): ?>
				<?php while(have_posts()): the_post(); ?>


					<div class="col-md-6">
						<h2><?php the_title(); ?></h2>
						<?php the_post_thumbnail('large'); ?>
					</div>
					<div class="col-md-6">
						<?php the_content(); ?>

					</div>


				<?php endwhile; ?>
			<?php endif; ?>

		</div>
	</div>
<?php get_footer(); ?>