<?php 

	//Add css and scripts
	function customThemeEnqueues(){
		wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '3.3.7', 'all' );
		wp_enqueue_style( 'customStyle', get_template_directory_uri() . '/css/LaavArchitects.css', array(), '1.0.0', 'all' );

		// wp_enqueue_script( 'jquery' );
		wp_enqueue_script( 'bootstrapjs', get_template_directory_uri().'/js/bootstrap.min.js', array(), '3.3.7', true );
		wp_enqueue_script( 'customScript', get_template_directory_uri() . '/js/LaavArchitects.js', array(), '1.0.0', true ); //true is asking is it in the footer. true or false.
	}
	add_action('wp_enqueue_scripts', 'customThemeEnqueues');



	//Footer
	function laav_footer_text($wp_customize){
		//Settings
			$wp_customize->add_setting('laav_footer_text', array(
				'default' => 'This is your footer text',
				'transport' => 'refresh'
			));

		//Section
			$wp_customize->add_section('laav_footer_text_section', array(
				'title' => 'Footer'
			));

		//Control
			$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'laav_footer_text_control', array(
				'label' => 'Footer Text',
				'section' => 'laav_footer_text_section',
				'settings' => 'laav_footer_text'
			)));
	}

	add_action('customize_register', 'laav_Footer_Text');



	//Customize Colours
	function laav_custom_colour($wp_customize){
		//Settings
			//Footer Setting Colour
			$wp_customize->add_setting('laav_footer_colour', array(
				'default' => '#000000',
				'transport' => 'refresh'
			));
			//Footer Setting Text Colour
			$wp_customize->add_setting('laav_footer_text_colour', array(
				'default' => '#000000',
				'transport' => 'refresh'
			));


		//Section
			//Footer Section Colour
			$wp_customize->add_section('laav_footer_colour_section', array(
				'title' => __('Standard Colours', 'New Custom Theme'),
				'priority' => 30
			));
			//Footer Section Text Colour 
			$wp_customize->add_section('laav_footer_text_colour_section', array(
				'title' => __('Standard Colours', 'New Custom Theme'),
				'priority' => 30
			));

		//Control
			//Footer Control Colour
			$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'laav_footer_colour_control', array(
				'label' => __('Footer Background Colour', 'New Custom Theme'),
				'section' => 'colors',
				'settings' => 'laav_footer_colour'

			)));
			//Footer Control Text Colour
			$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'laav_footer_text_colour_control', array(
				'label' => __('Footer Text Colour', 'New Custom Theme'),
				'section' => 'colors',
				'settings' => 'laav_footer_text_colour'

			)));
	}

	add_action('customize_register', 'laav_custom_colour');


	function laav_customize_css(){
	?>
		<style type="text/css">
			
			footer{
				background-color: <?php echo get_theme_mod('laav_footer_colour'); ?>
				
			}
			footer p{
				color: <?php echo get_theme_mod('laav_footer_text_colour'); ?>
			}




		</style>


	<?php 
	}
	add_action('wp_footer', 'laav_customize_css');






















