<!DOCTYPE html>
<html>
<head>
	<meta charset="<?php bloginfo('charset') ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
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
	</div>

	<div class="container">
		