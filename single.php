<?php get_header(); ?>
	<div class="container">
		<div class="row">

 			
			<?php if(have_posts()): ?>
				<?php while(have_posts()): the_post(); ?>
					<div class="col-md-6">
						<h3>#<?php echo get_post_meta($post->ID, 'ProjectNumber', true); ?></h3>
						<h2><?php the_title(); ?></h2>
						<div class="projectImage"><?php the_post_thumbnail('Single-Image'); ?></div>

						<?php if (is_null($customImage)){ ?>
								<?php $custom = get_post_meta($post->ID, 'custom_image_data', true);?>
								<?php $customImage = $custom['src']; ?>
								<?php echo($customImage) ?>
								
						
						<?php 
							}
							else { ?>
							
						<?php						   
							}
						?> 



						
								<!-- 
								=============
								DO NOT DELETE
								=============
								<?php $custom = get_post_meta($post->ID, 'custom_image_data', true);?>
								<?php $customImage = $custom['src']; ?>
								<div><img src="<?php echo $customImage; ?>" style="width: 100%; height: 100%;"></div> -->

					</div>
					<div class="col-md-6">
						<p class="single-content"><?php the_content(); ?></p>

					</div>


				<?php endwhile; ?>
			<?php endif; ?>

		</div>
	</div>
<?php get_footer(); ?>