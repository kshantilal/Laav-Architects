<?php get_header(); ?>
	<div class="container">
	<div class="back btn"><i class="fa fa-angle-left fa-lg" aria-hidden="true"></i>Back</div>
		<div class="row">

 			
			<?php if(have_posts()): ?>
				<?php while(have_posts()): the_post(); ?>
					<div class="col-md-6">
						<div class="projectImage"><?php the_post_thumbnail('Single-Image'); ?></div>
						<h3 class="projectNumber titleNumberInline">#<?php echo get_post_meta($post->ID, 'ProjectNumber', true); ?></h3>
						<h3 class="titleNumberInline"><?php the_title(); ?></h3>

					</div>
					<div class="col-md-6">
						<p><?php the_content(); ?></p>

					</div>


				<?php endwhile; ?>
			<?php endif; ?>

		</div>
	</div>
<?php get_footer(); ?>