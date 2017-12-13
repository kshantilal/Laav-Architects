<!DOCTYPE html>
<html>
<head>
	<meta charset="<?php bloginfo('charset') ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<title>Laav Architects</title>
	<?php wp_head(); ?>
</head>
<?php 

	if( is_front_page() ){
		$bodyClass = array('my-body', 'front-page');
	} else {
		$bodyClass = array('my-body');
	}
?>
<body <?php body_class($bodyClass); ?>>
	<div class="row">
		<div class="container customLogo">
			<div class="col-xs-12"><?php the_custom_logo('thumbnail'); ?></div>
		</div>
		<div class="row">
			<nav class="navbar">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>
				<div id="navbar" class="navbar-collapse collapse">
					<?php bootstrap_nav(); ?>
				</div><!--/.nav-collapse -->
			</nav>
		</div>
	</div>
	<div class="container">
		