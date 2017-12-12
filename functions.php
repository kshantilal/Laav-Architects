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
	// Header
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
	// Navigation bar
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
	// Custom Crop Images
	// =============================================
	function cropImages(){
		add_image_size( 'Front-page-feature', 850, 560, true);
		add_image_size( 'Single-Image', 540, 440, true);
		add_theme_support( 'post_thumbnails' );
	}
	add_action( 'after_setup_theme', 'cropImages' );
	// function move_featured_image(){
	// 	remove_meta_box( 'image_metabox', 'projects', 'advanced' );
	// 	add_meta_box( 'custom_image', 'Single Image', 'image_metabox', 'projects', 'advanced', 'high' );
	// }
	// add_action( 'submitpost_box', 'move_featured_image' );
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
			'rewrite'            => array('slug' => 'projects-gallery'),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => null,
			'supports'           => array('title','editor', 'thumbnail', 'page-attributes')
		);
		register_post_type( 'projects', $args );
	}
	add_action( 'init', 'projectsSection' );
	// =============================================
	// Services Section
	// =============================================
		function servicesSection() {
		$labels = array(
			'name'               => _x( 'Services', 'post type general name'),
			'singular_name'      => _x( 'Service', 'post type singular name'),
			'menu_name'          => _x( 'Services', 'admin menu'),
			'name_admin_bar'     => _x( 'Service', 'add new on admin bar'),
			'add_new'            => _x( 'Add New Service', 'Service'),
			'add_new_item'       => __( 'Add New Service'),
			'new_item'           => __( 'New Service'),
			'edit_item'          => __( 'Edit Services'),
			'view_item'          => __( 'View Services'),
			'all_items'          => __( 'All Services'),
			'search_items'       => __( 'Search Services'),
			'parent_item_colon'  => __( 'Parent Services:'),
			'not_found'          => __( 'No Service found.'),
			'not_found_in_trash' => __( 'No Service found in Trash.'),
		);
		$args = array(
			'labels'             => $labels,
			'menu_icon'	         => 'dashicons-groups',
			'description'        => __( 'Description.'),
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array('slug' => 'services'),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => null,
			'supports'           => array('title','editor', 'thumbnail', 'page-attributes')
		);
		register_post_type( 'services', $args );
	}
	add_action( 'init', 'servicesSection' );
	// =============================================
	// Custom Field for Title
	// =============================================
	$metaboxes = array(
	'projects' => array(
		'title' => __('Custom Fields'),
		'applicableto' => 'projects',
		'location' => 'normal',
		'priority' => 'low',
		'fields' => array(
			'ProjectNumber' => array(
				'title' => 'Project number',
				'type' => 'number'
			),
			// 'ImageOne' => array(
			// 	'title' => 'Image One',
			// 	'desc' => 'Upload an image',
			// 	'id' => $prefix . 'test_image',
			// 	'type' => 'file',
			// 	// 'allow' => array( 'url', 'attachment' ),// limit to just attachments with array( 'attachment' )
			// 	'preview_size' => array( 100, 100 ), // Image size to use when previewing in the admin.
 		// 	),
		)
	)
	);

	function add_post_format_metabox() {
		global $metaboxes;
		if ( ! empty( $metaboxes ) ) {
			foreach ( $metaboxes as $id => $metabox ) {
				add_meta_box( $id, $metabox['title'], 'show_metaboxes', $metabox['applicableto'], $metabox['location'], $metabox['priority'], $id );
			}
		}
	}
	add_action( 'admin_init', 'add_post_format_metabox' );
	function show_metaboxes( $post, $args ) {
		global $metaboxes;
		$custom = get_post_custom( $post->ID );
		$fields = $tabs = $metaboxes[$args['id']]['fields'];
		$output = '<input type="hidden" name="post_format_meta_box_nonce" value="' . wp_create_nonce( basename( __FILE__ ) ) . '" />';
		if ( sizeof( $fields ) ) {
			foreach ( $fields as $id => $field ) {
				switch ( $field['type'] ) {
					default:
					case "number":
						$output .= '<label for="' . $id . '">' . $field['title'] . '</label><input class="customInput" id="' . $id . '" type="number" name="' . $id . '" value="' . $custom[$id][0] . '" style="width: 100%;" />';
					break;
					case "file":
						$output .= '<label for="' . $id . '">' . $field['title'] . '</label><input class="customInput" id="' . $id . '" type="file" name="' . $id . '" value="' . $custom[$id][0] . '" style="width: 100%;" />';
					break;
				}
			}
		}
		echo $output;
	}
	add_action( 'save_post', 'save_metaboxes' );
	function save_metaboxes( $post_id ) {
		global $metaboxes;
		if ( ! wp_verify_nonce( $_POST['post_format_meta_box_nonce'], basename( __FILE__ ) ) )
			return $post_id;
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
			return $post_id;
		if ( 'page' == $_POST['post_type'] ) {
			if ( ! current_user_can( 'edit_page', $post_id ) )
				return $post_id;
		} elseif ( ! current_user_can( 'edit_post', $post_id ) ) {
			return $post_id;
		}
		$post_type = get_post_type();
		foreach ( $metaboxes as $id => $metabox ) {
			if ( $metabox['applicableto'] == $post_type ) {
				$fields = $metaboxes[$id]['fields'];
				foreach ( $fields as $id => $field ) {
					$old = get_post_meta( $post_id, $id, true );
					$new = $_POST[$id];
					if ( $new && $new != $old ) {
						update_post_meta( $post_id, $id, $new );
					}
					elseif ( '' == $new && $old || ! isset( $_POST[$id] ) ) {
						delete_post_meta( $post_id, $id, $old );
					}
				}
			}
		}
	}

	// =============================================
	// Move featured image to left column
	// =============================================
	// function move_featured_image(){
	// 	remove_meta_box( 'postimagediv', 'projects', 'side' );
	// 	add_meta_box( 'custom_image', 'Featured Image', 'post_thumbnail_meta_box', 'projects', 'normal', 'high' );
	// }
	// add_action( 'submitpost_box', 'move_featured_image' );
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
	// Customize
	// =============================================
	function laavCustomise($wp_customize){
		// ===================
		// Settings
		// ===================
			//===============================
			// Master Customisation Settings
			//===============================
			$wp_customize->add_setting('laav_background_colour', array(
				'default' => '#2a364a',
				'transport' => 'refresh'
			));

			$wp_customize->add_setting('laav_main_title_colour', array(
				'default' => '#fff',
				'transport' => 'refresh'
			));
			$wp_customize->add_setting('laav_form_colour', array(
				'default' => '#fff',
				'transport' => 'refresh'
			));
			$wp_customize->add_setting('laav_form_border_colour', array(
				'default' => '#ccc',
				'transport' => 'refresh'
			));
			$wp_customize->add_setting('laav_back_button', array(
				'default' => '#fff',
				'transport' => 'refresh'
			));
			$wp_customize->add_setting('laav_back_button_hover', array(
				'default' => '#fff',
				'transport' => 'refresh'
			));

			//===============================
			//Front page Text Setting
			//===============================
			$wp_customize->add_setting('laav_latestpost_text', array(
				'default' => 'This is your latest post title',
				'transport' => 'refresh'
			));
			//===============================
			//Navigation Setting Text 
			//===============================
			$wp_customize->add_setting('laav_nav_colour', array(
				'default' => '#fff',
				'transport' => 'refresh'
			));
			//===============================
			//Projects Setting 
			//===============================
			$wp_customize->add_setting('laav_projects_text_colour', array(
				'default' => '#fff',
				'transport' => 'refresh'
			));

			//===============================
			//Services Setting 
			//===============================
			$wp_customize->add_setting('laav_services_text_colour', array(
				'default' => '#fff',
				'transport' => 'refresh'
			));
			
			//===============================
			//About us Setting
			//===============================
			$wp_customize->add_setting('laav_about_text_colour', array(
				'default' => '#fff',
				'transport' => 'refresh'
			));
			//===============================
			//Footer Text Setting
			//===============================
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


		// ===================
		// SECTION
		// ===================
			//Master Section
			$wp_customize->add_section('laav_master_section', array(
				'title' => __('Master Customisation', 'New Custom Theme'),
				'priority' => 30
			));
			// Navigation Section
			$wp_customize->add_section('laav_nav_section', array(
				'title' => __('Navigation', 'New Custom Theme'),
				'priority' => 30
			));
			//Front page Section
			$wp_customize->add_section('laav_frontpage_section', array(
				'title' => __('Front page', 'New Custom Theme'),
				'priority' => 30
			));
			//Projects Section
			$wp_customize->add_section('laav_projects_section', array(
				'title' => __('Projects', 'New Custom Theme'),
				'priority' => 30
			));

			//Services Section
			$wp_customize->add_section('laav_services_section', array(
				'title' => __('Services', 'New Custom Theme'),
				'priority' => 30
			));
			//About page Section
			$wp_customize->add_section('laav_about_section', array(
				'title' => __('About us', 'New Custom Theme'),
				'priority' => 30
			));
			// Footer Section
			$wp_customize->add_section('laav_footer_section', array(
				'title' => __('Footer', 'New Custom Theme'),
				'priority' => 30
			));
			

		// ===================
		// CONTROL
		// ===================
			//===============================
			// Master Customisation Control
			//===============================
			$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'laav_background_colour_control', array(
				'label' => __('Background Colour', 'New Custom Theme'),
				'section' => 'laav_master_section',
				'settings' => 'laav_background_colour'
			)));
			$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'laav_main_colour_title_control', array(
				'label' => __('Page Titles', 'New Custom Theme'),
				'section' => 'laav_master_section',
				'settings' => 'laav_main_title_colour'
 			)));
 			$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'laav_form_colour_control', array(
				'label' => __('Form Text Colour', 'New Custom Theme'),
				'section' => 'laav_master_section',
				'settings' => 'laav_form_colour'
 			)));
 			$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'laav_services_colour_form_border_control', array(
				'label' => __('Form Border Colour', 'New Custom Theme'),
				'section' => 'laav_master_section',
				'settings' => 'laav_form_border_colour'
 			)));
 			$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'laav_back_button_control', array(
				'label' => __('Back Button Colour', 'New Custom Theme'),
				'section' => 'laav_master_section',
				'settings' => 'laav_back_button'
 			)));
 			$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'laav_back_button_hover_control', array(
				'label' => __('Back Button Hover', 'New Custom Theme'),
				'section' => 'laav_master_section',
				'settings' => 'laav_back_button_hover'
 			)));


			
			//===============================
			//Navigation Control Text Colour
			//===============================
			$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'laav_navigation_colour_control', array(
				'label' => __('Navigation Text Colour & Border', 'New Custom Theme'),
				'section' => 'laav_nav_section',
				'settings' => 'laav_nav_colour'
			)));

			//===============================
 			//Front Page Text
 			//===============================
			$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'laav_latestpost_text_control', array(
				'label' => 'Front Page Text',
				'section' => 'laav_frontpage_section',
				'settings' => 'laav_latestpost_text'
			)));
			//===============================
			//Projects Control Colour
			//===============================
			$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'laav_projects_colour_control', array(
				'label' => __('Projects Text Colour', 'New Custom Theme'),
				'section' => 'laav_projects_section',
				'settings' => 'laav_projects_text_colour'
 			)));
 			//===============================
			//Services Control Colour
			//===============================
			$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'laav_services_colour_control', array(
				'label' => __('Services Text Colour', 'New Custom Theme'),
				'section' => 'laav_services_section',
				'settings' => 'laav_services_text_colour'
 			)));
			
 			
			//===============================
			//About Us Text
			//===============================
			$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'laav_aboutus_text_control', array(
				'label' => 'About Us Text Colour',
				'section' => 'laav_about_section',
				'settings' => 'laav_about_text_colour'
			)));
			//===============================
			//Footer Text
			//===============================
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
			



	}
	add_action('customize_register', 'laavCustomise');
	// =============================================
	//Custom CSS
	// =============================================
	function laav_customize_css(){
	?>
		<style type="text/css">
			body{
				background-color: <?php echo get_theme_mod('laav_background_colour'); ?>;
			}
			.back{
				color: <?php echo get_theme_mod('laav_back_button'); ?>;
			}
			.btn:hover{
				color: <?php echo get_theme_mod('laav_back_button_hover'); ?>; 
			}
			/*================*/
			/*Navigation*/
			/*================*/
			#navbar a {
				color: <?php echo get_theme_mod('laav_nav_colour'); ?>;
			}
			.nav>li>a:hover {
				border: 1px solid <?php echo get_theme_mod('laav_nav_colour'); ?>;
			}
			/*================*/
			/*Projects*/
			/*================*/
			.titleNumberInline{
				color: <?php echo get_theme_mod('laav_projects_text_colour'); ?>;
			}
			
			/*================*/
			/*Services*/
			/*================*/
			.servicesText p{
				color: <?php echo get_theme_mod('laav_services_text_colour'); ?>; !important;
			}
			.serviceTitle{
				color: <?php echo get_theme_mod('laav_main_title_colour'); ?>;
			}

			/*================*/
			/*Form*/
			/*================*/
			.form{
				color: <?php echo get_theme_mod('laav_form_colour'); ?>;
			}
			.form-control{
				border: 2px solid <?php echo get_theme_mod('laav_form_border_colour'); ?>;
			}
			.btn-default{
				border-color: <?php echo get_theme_mod('laav_form_border_colour'); ?>; 
			}

			/*================*/
			/*About US*/
			/*================*/
			.aboutusText{
				color: <?php echo get_theme_mod('laav_about_text_colour'); ?>;
			}


			/*================*/
			/*Footer*/
			/*================*/
			footer{
				background-color: <?php echo get_theme_mod('laav_footer_colour'); ?>;

			}
			footer p{
				color: <?php echo get_theme_mod('laav_footer_text_colour'); ?>;
			}
		</style>


	<?php
	}
	add_action('wp_head', 'laav_customize_css');
