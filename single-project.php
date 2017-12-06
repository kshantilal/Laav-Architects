<?php get_header(); ?>
	<div class="container">
		<div class="row">
		<h1>hello</h1>
			<?php if(have_posts()): ?>
				<?php while(have_posts()): the_post(); ?>


					<div class="col-md-6">
						<?php the_title(); ?>
						<?php the_post_thumbnail('large'); ?>
					</div>
					<div class="col-md-6">
						<?php the_content(); ?>
						<?php the_terms( $post->ID, 'category', 'categories: ', ' / ' ); ?>

					</div>


				<?php endwhile; ?>
			<?php endif; ?>

		</div>
	</div>
<?php get_footer(); ?>