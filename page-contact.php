<?php 
	/*
		Template Name: Contact Page Template
	*/
 ?>

 <?php get_header(); ?>
 	<div class="container">
 		<div class="row">
			<div class="col-md-8 col-md-offset-2">

			<h1 style="text-align: center;"><?php the_title(); ?></h1>

			</div>
			<div class="col-md-6 col-md-offset-3">
				<form class="form" method="POST">
					<div class="form-group col-md-5 no-padding">
						<label for="firstName">First Name</label>
						<input type="text" class="form-control" id="firstName" placeholder="First Name">
						<span class="input-errors"></span>
					</div>
					<div class="form-group col-md-5 col-md-offset-2 no-padding">
						<label for="lastName">Last Name</label>
						<input type="text" class="form-control" id="lastName" placeholder="Last Name">
						<span class="input-errors"></span>
					</div>
					<div class="form-group">
						<label for="exampleInputPassword1">Address</label>
						<input type="address" class="form-control" id="exampleInputPassword1" placeholder="Address">
						<span class="input-errors"></span>
					</div>
					<div class="form-group">
						<label for="mobile">Mobile Number</label>
						<input type="number" class="form-control" id="exampleInputPassword1" placeholder="Mobile Number">
						<span class="input-errors"></span>
					</div>
					<div class="form-group">
						<label for="mobile">Enquiry</label>
						<textarea class="form-control" rows="5" placeholder="Your Enquiry"></textarea>
					</div>

					<button type="submit" class="btn btn-default">Submit</button>
				</form>
			</div>
		</div>
 	</div>


 <?php get_footer(); ?>