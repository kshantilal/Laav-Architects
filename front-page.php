<?php get_header(); ?>
	<div class="row">
		<div class="container">
				<?php  
				$arg = array(
					'post_type' => 'slider', 
					'posts_per_page' => 5				
				);
				$images = new WP_Query($arg);

				?>
			<div class="col-xs-12">
				<?php if($images->have_posts()): ?>
					<?php while($images->have_posts()): $images->the_post(); ?>

					<?php endwhile; ?>
				

				<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
					<!-- Indicators -->
					<ol class="carousel-indicators">
						<?php while($images->have_posts()): $images->the_post(); ?>
							<?php $i = 0; ?>
							<li data-target="#carousel-example-generic" data-slide-to="<?$i ?>" <?php if($i == 0): ?><?php endif; ?>></li>
						<?php endwhile; ?>
					</ol>
					<div class="carousel-inner" role="listbox">
						<?php $count = 0 ?>
						<?php while($images->have_posts()): $images->the_post(); ?>
							
								<div class="item <?php echo ($count == 0) ? 'active' : ''; ?>">
									<?php the_post_thumbnail('Front-page-feature', array('class' => 'img-responsive')); ?>
								</div>
						<?php $count++; ?>
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
					<?php endif; ?>
				</div>
			</div>
		</div>		
	</div>
<?php get_footer(); ?>

	
	
