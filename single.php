<?php get_header(); ?>
	<div class="container">
		<div class="row">

 			 
			<?php if(have_posts()): ?>
				<?php while(have_posts()): the_post(); ?>
					

					<div class="col-md-6">
						<h3>#<?php echo get_post_meta($post->ID, 'ProjectNumber', true); ?></h3>
						<h2><?php the_title(); ?></h2>
						<?php the_post_thumbnail('Single-Image'); ?>
						
						<?php $custom = get_post_meta($post->ID, 'custom_image_data', true); ?>
						<?php $customImage = $custom['src'];?>
						<?php $ImageCropped = wp_get_attachment_image( $customImage, 'medium' );?>

							<img src="<?php echo $customImage; ?>" alt="test">
							

					</div>
					<div class="col-md-6">
						<p class="single-content"><?php the_content(); ?></p>

					</div>


				<?php endwhile; ?>
			<?php endif; ?>

		</div>
	</div>
<?php get_footer(); ?>