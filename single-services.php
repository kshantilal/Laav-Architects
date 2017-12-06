<?php get_header(); ?>
	<?php get_header(); ?>
	<div class="container">
		<div class="row">
			<?php if(have_posts()): ?>
				<?php while(have_posts()): the_post(); ?>


					<div class="col-md-6">
						<h1 class="serviceTitle"><?php the_title(); ?></h1>
						<?php the_post_thumbnail('medium'); ?>
					</div>
					<div class="col-md-6">
						<?php the_content(); ?>

					</div>


				<?php endwhile; ?>
			<?php endif; ?>

		</div>
	</div>


<?php get_footer(); ?>