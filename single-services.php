<?php get_header(); ?>
	<div class="container">
	<div class="back btn"><i class="fa fa-angle-left fa-lg" aria-hidden="true"></i>Back</div>
		<div class="row">
			<?php if(have_posts()): ?>
				<?php while(have_posts()): the_post(); ?>
					<h1 class="serviceTitle"><?php the_title(); ?></h1>
					<div class="col-md-6">
						<?php $custom = get_post_meta($post->ID, 'custom_image_data', true); ?>
						<?php $customImage = $custom['src'];?>
						<div class="singleImage"><img src="<?php echo $customImage; ?>" style="width: 100%; height: 100%;"></div>
					</div>
					<div class="col-md-6 servicesText">
						<?php the_content(); ?>
					</div>
				<?php endwhile; ?>
			<?php endif; ?>
		</div>
		<?php 

			$showThanks = false;
			if (isset($_POST['contact_name'])) {
				$showThanks = true;
				
			}
 
		 ?>
		<div class="row">
			<div class="col-md-8 col-md-offset-2 form">
				<h1 style="text-align: center;"><?php the_title(); ?> CONTACT FORM</h1>
			</div>
			<div class="col-md-6 col-md-offset-3">
				<?php if($showThanks) { ?>
				<h3 class="services">Thank you for your enquiry, We will get back to you as soon as possible</h3>
				<h3 class="services"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Go back to the homepage</a></h3>
				
				<?php } else { ?>
				<form class="form" method="POST">
					<div class="form-group col-md-5 no-padding">
						<label for="firstName">First Name</label>
						<input type="text" class="form-control" name="contact_name" id="firstName" placeholder="First Name" required>
						<span class="input-errors"></span>
					</div>
					<div class="form-group col-md-5 col-md-offset-2 no-padding">
						<label for="lastName">Last Name</label>
						<input type="text" class="form-control" id="lastName" placeholder="Last Name" required>
						<span class="input-errors"></span>
					</div>
					<div class="form-group">
						<label for="exampleInputPassword1">Address</label>
						<input type="address" class="form-control" id="address" placeholder="Address" required>
						<span class="input-errors"></span>
					</div>
					<div class="form-group">
						<label for="mobile">Mobile Number</label>
						<input type="number" class="form-control" id="mobile" placeholder="Mobile Number" required>
						<span class="input-errors"></span>
					</div>
					<div class="form-group">
						<label for="mobile">Enquiry</label>
						<textarea class="form-control" rows="5" placeholder="Your Enquiry"></textarea>
					</div>

					<button type="submit" class="btn btn-default">Submit</button>
				</form>
				<?php } ?>
			</div>
		</div>
	</div>
<?php get_footer(); ?>