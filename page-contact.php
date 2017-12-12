<?php 
	/*
		Template Name: Contact Page Template
	*/

	$showThanks = false;
	if (isset($_POST['contact_name'])) {
		$showThanks = true;
		
	}

 ?>

 <?php get_header(); ?>
 	<div class="container">
 		<div class="back btn"><i class="fa fa-angle-left fa-lg" aria-hidden="true"></i>Back</div>
 		<div class="row">
			<div class="col-md-8 col-md-offset-2">

			<h1 class="serviceTitle"><?php the_title(); ?></h1>

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

					<button type="submit" id="form-submit-button" class="btn btn-default">Submit</button>
				</form>
				<?php } ?>
			</div>
		</div>
 	</div>


 <?php get_footer(); ?>