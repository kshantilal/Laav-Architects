<?php 
	/*
		Template Name: About Us Template
	*/
?>

<?php get_header(); ?>
	<div class="container">
	<div class="back btn"><i class="fa fa-angle-left fa-lg" aria-hidden="true"></i>Back</div>
		<div class="row">
			<?php if(have_posts()): ?>
				<?php while(have_posts()): the_post(); ?>
					<h1 class="serviceTitle"><?php the_title(); ?></h1>

					<div class="col-md-5 col-md-offset-1">			
						<div style="text-align: center;"><?php the_post_thumbnail('Single-Image'); ?></div>
					</div>
					<div class="col-md-4">
						<?php the_content(); ?>

					</div>


				<?php endwhile; ?>
			<?php endif; ?>
		</div>
	</div>





<?php get_footer(); ?>
