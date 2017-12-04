<?php get_header(); ?>
	<div class="row">
		<div class="container">
			<div class="col-xs-12">
				<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
					<!-- Indicators -->
					<ol class="carousel-indicators">
						<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
						<li data-target="#carousel-example-generic" data-slide-to="1"></li>
						<li data-target="#carousel-example-generic" data-slide-to="2"></li>
						<li data-target="#carousel-example-generic" data-slide-to="3"></li>
						<li data-target="#carousel-example-generic" data-slide-to="4"></li>
					</ol>

					<!-- Wrapper for slides -->
					<div class="carousel-inner" role="listbox">
						<?php $slider = get_posts(array(
							'post_type' => 'slider', 
							'posts_per_page' => 5
						)); 


						?>
							<?php $count = 0; ?>
							<?php foreach($slider as $slide): ?>
	
							<div class="item <?php echo ($count == 0) ? 'active' : ''; ?>">

								<img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id($slide->ID)) ?>" class="img-responsive"/>
							</div>
							<?php $count++; ?>
							<?php endforeach; ?>
					</div>

					<!-- Controls -->
					<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
						<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
					</a>
					<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
						<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
					</a>
				</div>
			</div>

			<?php  
			$arg = array(
				'post_type' => 'slider', 
				'posts_per_page' => 5				
			);
			$images = new WP_Query($arg);

			?>
			<?php if($images->have_posts()): ?>
				<?php while($images->have_posts()): $images->the_post(); ?>

				<?php endwhile; ?>
			

			<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
					<!-- Indicators -->					
					<ol class="carousel-indicators">
					<?php while($images->have_posts()): $images->the_post(); ?>
						<?php $i = 0; ?>
						<li data-target="#carousel-example-generic" data-slide-to="<?$i ?>" <?php if($i == 0): ?> active <?php endif; ?>></li>
					<?php endwhile; ?>
					</ol>
					<?php while($images->have_posts()): $images->the_post(); ?>
						<?php $count = 0 ?>
							<div class="item <?php echo ($count == 0) ? 'active' : ''; ?>">
			
									<?php the_post_thumbnail('Front-page-feature', array('class' => 'img-responsive')); ?>

							</div>
					<?php endwhile; ?>	
					</div>

					<!-- Controls -->
					<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
						<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
					</a>
					<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
						<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
					</a>
				</div>
			<?php endif; ?>


		</div>
	</div>
<?php get_footer(); ?>

	
	
