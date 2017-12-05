<?php 
	// =============================================
	//Add css and scripts
	// =============================================
	function customThemeEnqueues(){
		wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '3.3.7', 'all' );
		wp_enqueue_style( 'customStyle', get_template_directory_uri() . '/css/LaavArchitects.css', array(), '1.0.0', 'all' );

		wp_enqueue_script( 'jquery' );
		wp_enqueue_script( 'bootstrapjs', get_template_directory_uri().'/js/bootstrap.min.js', array(), '3.3.7', true );
		wp_enqueue_script( 'customScript', get_template_directory_uri() . '/js/LaavArchitects.js', array(), '1.0.0', true ); //true is asking is it in the footer. true or false.
	}
	add_action('wp_enqueue_scripts', 'customThemeEnqueues');



	function addGoogleFonts(){
		wp_enqueue_style( 'wp-open-sans', 'http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,700italic,400,700,300', false );
	}
	add_action('wp_enqueue_scripts', 'addGoogleFonts');



	// =============================================
	//Header
	// =============================================
	function customLogoSetup(){
		$customLogoSettings = array(
			'height' => 100,
			'width' => 100,
			'flex-height' => true,
			'flex-width' => true,
			'header-text' => array('Branding Logo', 'This is your branding logo')
		);
		add_theme_support('custom-logo', $customLogoSettings);
	}
	add_theme_support('custom-logo');
	add_action('after_setup_theme', 'customLogoSetup');
	
	// =============================================
	//Navigation bar
	// =============================================
	function customMenuSetup(){
		add_theme_support('menus');
		register_nav_menu('primary', 'This is the main navigation located at the top of the page');
	}
	add_action('init', 'customMenuSetup');
	
	// Register Custom Navigation Walker
	require_once get_template_directory() . '/wp-bootstrap-navwalker.php';
	// Bootstrap navigation
	function bootstrap_nav(){
		wp_nav_menu( array(
				'theme_location'    => 'primary',
				'depth'             => 2,
				'container'         => 'false',
				'menu_class'        => 'nav navbar-nav',
				'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
				'walker'            => new wp_bootstrap_navwalker())
		);
	}


	// =============================================
	// Front Page Slider Section
	// =============================================
	function frontPageSlider() {
		$labels = array(
			'name'               => _x( 'Slider', 'post type general name'),
			'singular_name'      => _x( 'Slide', 'post type singular name'),
			'menu_name'          => _x( 'Front Page Slider', 'admin menu'),
			'name_admin_bar'     => _x( 'Slide', 'add new on admin bar'),
			'add_new'            => _x( 'Add New Slide', 'Slide'),
			'add_new_item'       => __( 'Name'),
			'new_item'           => __( 'New Slide'),
			'edit_item'          => __( 'Edit Slide'),
			'view_item'          => __( 'View Slide'),
			'all_items'          => __( 'All Slides'),
			'search_items'       => __( 'Search Slide'),
			'parent_item_colon'  => __( 'Parent Slide:'),
			'not_found'          => __( 'No Slide found.'),
			'not_found_in_trash' => __( 'No Slide found in Trash.'),
		);

		$args = array(
			'labels'             => $labels,
			'menu_icon'	         => 'dashicons-image-flip-horizontal',
			'description'        => __( 'Description.'),
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => true,
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => true,
			'menu_position'      => null,
			'supports'           => array('title','thumbnail')
		);

		register_post_type( 'slider', $args );
		add_theme_support( 'post-thumbnails' );
	} 
	add_action( 'init', 'frontPageSlider' );

	// =============================================
	// Projects Section
	// =============================================
		function projectsSection() {
		$labels = array(
			'name'               => _x( 'Projects', 'post type general name'),
			'singular_name'      => _x( 'Project', 'post type singular name'),
			'menu_name'          => _x( 'Projects', 'admin menu'),
			'name_admin_bar'     => _x( 'Project', 'add new on admin bar'),
			'add_new'            => _x( 'Add New Project', 'Project'),
			'add_new_item'       => __( 'Add New Project'),
			'new_item'           => __( 'New Project'),
			'edit_item'          => __( 'Edit Project'),
			'view_item'          => __( 'View Project'),
			'all_items'          => __( 'All Projects'),
			'search_items'       => __( 'Search Projects'),
			'parent_item_colon'  => __( 'Parent Projects:'),
			'not_found'          => __( 'No Project found.'),
			'not_found_in_trash' => __( 'No Project found in Trash.'),
		);

		$args = array(
			'labels'             => $labels,
			'menu_icon'	         => 'dashicons-admin-home',
			'description'        => __( 'Description.'),
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array('slug' => 'projects'),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => null,
			'supports'           => array('title', 'editor', 'thumbnail', 'page-attributes')
		);

		register_post_type( 'programmes', $args );
	} 
	add_action( 'init', 'projectsSection' );













	// =============================================
	// Custom Crop Images
	// =============================================
	add_theme_support( 'post_thumbnails' );

	add_image_size( 'Front-page-feature', 850, 560, true);


	// =============================================
	// Delete Comments Section 
	// =============================================
	function removeCommentsAdmin() {
		global $wp_admin_bar;
		$wp_admin_bar->remove_menu('comments');
	}
	add_action( 'wp_before_admin_bar_render', 'removeCommentsAdmin' );


	// Disable support for comments and trackbacks in post types
	function df_disable_comments_post_types_support() {
		$post_types = get_post_types();
		foreach ($post_types as $post_type) {
			if(post_type_supports($post_type, 'comments')) {
				remove_post_type_support($post_type, 'comments');
				remove_post_type_support($post_type, 'trackbacks');
			}
		}
	}
	add_action('admin_init', 'df_disable_comments_post_types_support');
	
	// Close comments on the front-end
	function df_disable_comments_status() {
		return false;
	}
	add_filter('comments_open', 'df_disable_comments_status', 20, 2);
	add_filter('pings_open', 'df_disable_comments_status', 20, 2);
	
	// Hide existing comments
	function df_disable_comments_hide_existing_comments($comments) {
		$comments = array();
		return $comments;
	}
	add_filter('comments_array', 'df_disable_comments_hide_existing_comments', 10, 2);
	
	// Remove comments page in menu
	function df_disable_comments_admin_menu() {
		remove_menu_page('edit-comments.php');
	}
	add_action('admin_menu', 'df_disable_comments_admin_menu');
	
	// Redirect any user trying to access comments page
	function df_disable_comments_admin_menu_redirect() {
		global $pagenow;
		if ($pagenow === 'edit-comments.php') {
			wp_redirect(admin_url()); exit;
		}
	}
	add_action('admin_init', 'df_disable_comments_admin_menu_redirect');
	
	// Remove comments metabox from dashboard
	function df_disable_comments_dashboard() {
		remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');
	}
	add_action('admin_init', 'df_disable_comments_dashboard');
	
	// Remove comments links from admin bar
	function df_disable_comments_admin_bar() {
		if (is_admin_bar_showing()) {
			remove_action('admin_bar_menu', 'wp_admin_bar_comments_menu', 60);
		}
	}
	add_action('init', 'df_disable_comments_admin_bar');



	// =============================================
	//Customize 
	// =============================================
	function laavCustomise($wp_customize){
		//Settings
			//Footer Text
			$wp_customize->add_setting('laav_footer_text', array(
				'default' => 'This is your footer text',
				'transport' => 'refresh'
			));
			//Footer Setting Background Colour
			$wp_customize->add_setting('laav_footer_colour', array(
				'default' => '#53607a',
				'transport' => 'refresh'
			));
			//Footer Setting Text Colour
			$wp_customize->add_setting('laav_footer_text_colour', array(
				'default' => '#fff',
				'transport' => 'refresh'
			));
			//Navigation Text Colour
			$wp_customize->add_setting('laav_nav_colour', array(
				'default' => '#fff',
				'transport' => 'refresh'
			));
			//Background Colour
			$wp_customize->add_setting('laav_background_colour', array(
				'default' => '#2a364a',
				'transport' => 'refresh'
			));
			


		//Section
			// Footer Section
			$wp_customize->add_section('laav_footer_section', array(
				'title' => __('Footer', 'New Custom Theme'),
				'priority' => 30
			));
			// Navigation Section
			$wp_customize->add_section('laav_nav_section', array(
				'title' => __('Navigation', 'New Custom Theme'),
				'priority' => 30
			));
			//Background Section
			$wp_customize->add_section('laav_background_section', array(
				'title' => __('Background', 'New Custom Theme'),
				'priority' => 30
			));


		//Control
			//Footer Text
			$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'laav_footer_text_control', array(
				'label' => 'Footer Text',
				'section' => 'laav_footer_section',
				'settings' => 'laav_footer_text'
			)));
			//Footer Control Background Colour
			$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'laav_footer_colour_control', array(
				'label' => __('Footer Background Colour', 'New Custom Theme'),
				'section' => 'laav_footer_section',
				'settings' => 'laav_footer_colour'

			)));
			//Footer Control Text Colour
			$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'laav_footer_text_colour_control', array(
				'label' => __('Footer Text Colour', 'New Custom Theme'),
				'section' => 'laav_footer_section',
				'settings' => 'laav_footer_text_colour'

			)));
			//Navigation Control Text Colour
			$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'laav_navigation_colour_control', array(
				'label' => __('Navigation Text Colour & Border', 'New Custom Theme'),
				'section' => 'laav_nav_section',
				'settings' => 'laav_nav_colour'

			)));
			//Background Control Colour
			$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'laav_background_colour_control', array(
				'label' => __('Background Colour', 'New Custom Theme'),
				'section' => 'laav_background_section',
				'settings' => 'laav_background_colour'

			)));

	}

	add_action('customize_register', 'laavCustomise');


	// =============================================
	//Custom CSS
	// =============================================
	function laav_customize_css_footer(){
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
	add_action('wp_footer', 'laav_customize_css_footer');

	function laav_customize_css_navigation(){
	?>
		<style type="text/css">
				#navbar a {
					color: <?php echo get_theme_mod('laav_nav_colour'); ?>
				}
				.nav>li>a:hover {
					border: 1px solid <?php echo get_theme_mod('laav_nav_colour'); ?>
				}
				
				body{
					background-color: <?php echo get_theme_mod('laav_background_colour'); ?>
				}
		</style>


	<?php 
	}
	add_action('wp_head', 'laav_customize_css_navigation');






















