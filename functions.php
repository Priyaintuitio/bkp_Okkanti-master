<?php
/**
 * Okkanti Website functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Okkanti_Website
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.3' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function okkanti_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Okkanti Website, use a find and replace
		* to change 'okkanti' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'okkanti', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'primary-menu' => esc_html__( 'Primary Links', 'okkanti' ),
			'social-menu'  => esc_html__( 'Social Links', 'okkanti' ),
			'footer-menu'  => esc_html__( 'Footer Links', 'okkanti' ),
			'account-menu' => esc_html__( 'Account Links', 'okkanti' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'okkanti_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'okkanti_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function okkanti_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'okkanti_content_width', 640 );
}
add_action( 'after_setup_theme', 'okkanti_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function okkanti_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'okkanti' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'okkanti' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'okkanti_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function okkanti_scripts() {
	wp_enqueue_style( 'okkanti-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_enqueue_style( 'okkanti-selectivo-style', get_template_directory_uri() .'/assets/styles/selectivo.css', array(), _S_VERSION );
	wp_enqueue_style( 'okkanti-responsive-style', get_template_directory_uri() .'/assets/styles/responsive.css', array(), _S_VERSION );
	wp_enqueue_style( 'okkanti-search-box-style', get_template_directory_uri() .'/assets/styles/search-box.css', array(), _S_VERSION );
	wp_enqueue_style( 'okkanti-slick-style', get_template_directory_uri() .'/assets/styles/slick.css', array(), _S_VERSION );
	//enqueue style sheet for doula archieve page
	wp_enqueue_style( 'okkanti-our-mission', get_template_directory_uri() .'/assets/styles/our-mission.css', array(), _S_VERSION );
	wp_enqueue_style( 'okkanti-testimonial', get_template_directory_uri() .'/assets/styles/testimonial.css', array(), _S_VERSION );
	wp_enqueue_style( 'okkanti-pre-footer', get_template_directory_uri() .'/assets/styles/pre-footer', array(), _S_VERSION );
	wp_enqueue_style( 'okkanti-hero-type-one', get_template_directory_uri() .'/assets/styles/hero-type-one.css', array(), _S_VERSION );
	wp_enqueue_style( 'okkanti-birth-history', get_template_directory_uri() .'/assets/styles/birth-history.css', array(), _S_VERSION );
	wp_enqueue_style( 'okkanti-about-us-hero', get_template_directory_uri() .'/assets/styles/about-us-hero.css', array(), _S_VERSION );
	wp_enqueue_style( 'okkanti-meet-our-team', get_template_directory_uri() .'/assets/styles/meet-our-team.css', array(), _S_VERSION );
	wp_enqueue_style( 'okkanti-in-the-news', get_template_directory_uri() .'/assets/styles/in-the-news.css', array(), _S_VERSION );
	wp_enqueue_style( 'okkanti-modal', get_template_directory_uri() .'/assets/styles/modal.css', array(), _S_VERSION );
	wp_enqueue_style( 'okkanti-form', get_template_directory_uri() .'/assets/styles/form.css', array(), _S_VERSION );
	wp_enqueue_style( 'okkanti-login-form', get_template_directory_uri() .'/assets/styles/login-form.css', array(), _S_VERSION );
	wp_enqueue_style( 'okkanti-forgot-pwd-form', get_template_directory_uri() .'/assets/styles/forgot-pwd-form.css', array(), _S_VERSION );
	wp_enqueue_style( 'okkanti-doula-catalogue-item', get_template_directory_uri() .'/assets/styles/doula-catalogue-item.css', array(), _S_VERSION );
		
	wp_style_add_data( 'okkanti-style', 'rtl', 'replace' );
	wp_enqueue_script( 'okkanti-navigation', get_template_directory_uri() . '/js/navigation.js', array( 'jquery' ), _S_VERSION, true );
	wp_enqueue_script( 'okkanti-slick-script', get_template_directory_uri() . '/assets/scripts/slick.min.js', array( 'jquery' ), _S_VERSION, true );
	wp_enqueue_script( 'okkanti-selectivo-script', get_template_directory_uri() . '/assets/scripts/jquery.selectivo.js', array( 'jquery' ), _S_VERSION, true );
	wp_enqueue_script( 'okkanti-doula-catalouge', get_template_directory_uri() . '/assets/scripts/doula_catalouge.js', array( 'jquery' ), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'okkanti_scripts' );


add_action( 'admin_enqueue_scripts', 'okkanti_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * ACF Blocks.
 */
require get_template_directory() . '/inc/acf.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

// Custom post type : Doulas

// Register Custom Post Type Doulas
function create_doulas_cpt() {
	

	$labels = array(
		'name' => _x( 'Doulas', 'Post Type General Name', 'okkanti' ),
		'singular_name' => _x( 'Doulas', 'Post Type Singular Name', 'okkanti' ),
		'menu_name' => _x( 'Doulas', 'Admin Menu text', 'okkanti' ),
		'name_admin_bar' => _x( 'Doulas', 'Add New on Toolbar', 'okkanti' ),
		'archives' => __( 'Doulas Archives', 'okkanti' ),
		'attributes' => __( 'Doulas Attributes', 'okkanti' ),
		'parent_item_colon' => __( 'Parent Doulas:', 'okkanti' ),
		'all_items' => __( 'All Doulas', 'okkanti' ),
		'add_new_item' => __( 'Add New Doulas', 'okkanti' ),
		'add_new' => __( 'Add New', 'okkanti' ),
		'new_item' => __( 'New Doulas', 'okkanti' ),
		'edit_item' => __( 'Edit Doulas', 'okkanti' ),
		'update_item' => __( 'Update Doulas', 'okkanti' ),
		'view_item' => __( 'View Doulas', 'okkanti' ),
		'view_items' => __( 'View Doulas', 'okkanti' ),
		'search_items' => __( 'Search Doulas', 'okkanti' ),
		'not_found' => __( 'Not found', 'okkanti' ),
		'not_found_in_trash' => __( 'Not found in Trash', 'okkanti' ),
		'featured_image' => __( 'Featured Image', 'okkanti' ),
		'set_featured_image' => __( 'Set featured image', 'okkanti' ),
		'remove_featured_image' => __( 'Remove featured image', 'okkanti' ),
		'use_featured_image' => __( 'Use as featured image', 'okkanti' ),
		'insert_into_item' => __( 'Insert into Doulas', 'okkanti' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Doulas', 'okkanti' ),
		'items_list' => __( 'Doulas list', 'okkanti' ),
		'items_list_navigation' => __( 'Doulas list navigation', 'okkanti' ),
		'filter_items_list' => __( 'Filter Doulas list', 'okkanti' ),
	);
	$args = array(
		'label' => __( 'Doulas', 'okkanti' ),
		'description' => __( '', 'okkanti' ),
		'labels' => $labels,
		'menu_icon' => '',
		'supports' => array('title', 'editor', 'excerpt', 'thumbnail', 'revisions', 'author', 'page-attributes', 'post-formats', 'custom-fields'),
		'taxonomies' => array(),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_icon' => 'dashicons-book',
		'menu_position' => 5,
		'show_in_admin_bar' => true,
		'show_in_nav_menus' => true,
		'can_export' => true,
		'has_archive' => true,
		'hierarchical' => false,
		'exclude_from_search' => false,
		'show_in_rest' => true,
		'publicly_queryable' => true,
		'capability_type' => 'post',
	);
	register_post_type( 'doulas', $args );
	
	//Creating custom taxonomy visit types

	$taxlabels = array(
		'name'              => _x( 'Visit Types', 'taxonomy general name', 'okkanti' ),
		'singular_name'     => _x( 'Visit Type', 'taxonomy singular name', 'okkanti' ),
		'search_items'      => __( 'Search Visit Types', 'okkanti' ),
		'all_items'         => __( 'All Visit Types', 'okkanti' ),
		'parent_item'       => __( 'Parent Visit Type', 'okkanti' ),
		'parent_item_colon' => __( 'Parent Visit Type:', 'okkanti' ),
		'edit_item'         => __( 'Edit Visit Type', 'okkanti' ),
		'update_item'       => __( 'Update Visit Type', 'okkanti' ),
		'add_new_item'      => __( 'Add New Visit Type', 'okkanti' ),
		'new_item_name'     => __( 'New Visit Type Name', 'okkanti' ),
		'menu_name'         => __( 'Visit Type', 'okkanti' ),
	);
	$taxargs = array(
		'labels' => $taxlabels,
		'description' => __( '', 'okkanti' ),
		'hierarchical' => true,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'show_in_nav_menus' => true,
		'show_tagcloud' => true,
		'show_in_quick_edit' => true,
		'show_admin_column' => true,
		'show_in_rest' => true,
		'query_var'         => true,
	);
	register_taxonomy( 'visit_type', 'doulas', $taxargs );
	
	$taxlabelsSpecialty = array(
		'name'              => _x( 'Specialties', 'taxonomy general name', 'okkanti' ),
		'singular_name'     => _x( 'Specialty', 'taxonomy singular name', 'okkanti' ),
		'search_items'      => __( 'Search Specialties', 'okkanti' ),
		'all_items'         => __( 'All Specialties', 'okkanti' ),
		'parent_item'       => __( 'Parent Specialty', 'okkanti' ),
		'parent_item_colon' => __( 'Parent Specialty:', 'okkanti' ),
		'edit_item'         => __( 'Edit Specialty', 'okkanti' ),
		'update_item'       => __( 'Update Specialty', 'okkanti' ),
		'add_new_item'      => __( 'Add New Specialty', 'okkanti' ),
		'new_item_name'     => __( 'New Specialty Name', 'okkanti' ),
		'menu_name'         => __( 'Specialty', 'okkanti' ),
	);
	$taxargsSpecialty = array(
		'labels' => $taxlabelsSpecialty,
		'description' => __( '', 'okkanti' ),
		'hierarchical' => true,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'show_in_nav_menus' => true,
		'show_tagcloud' => true,
		'show_in_quick_edit' => true,
		'show_admin_column' => true,
		'show_in_rest' => true,
		'query_var'         => true,
		'hide_empty' => false,
	);
	register_taxonomy( 'specialty', 'doulas', $taxargsSpecialty );

}
add_action( 'init', 'create_doulas_cpt', 0 );


// for Pagination of Doula Archive file

add_action( 'pre_get_posts' ,'speciality_query_post_type', 1, 1 );
function speciality_query_post_type( $query )
{
    if ( ! is_admin() && is_post_type_archive( 'doulas' ) && $query->is_main_query() )
    {
        $query->set( 'posts_per_page', 2 ); //set query arg ( key, value )
    }
}


//Ajax filter


add_action('wp_ajax_myfilter', 'misha_filter_function'); // wp_ajax_{ACTION HERE} 
add_action('wp_ajax_nopriv_myfilter', 'misha_filter_function');

function misha_filter_function(){


	
	$args = array(
		'post_type'  => 'doulas',
		'orderby' => 'date',
		'posts_per_page' => 2

	);

	
	if( isset($_POST['categoryfilter']) && !empty($_POST['categoryfilter']) && empty($_POST['visit_typefilter']) ){
		$args['tax_query'] = array(
			array(
				'taxonomy' => 'specialty',
				'field'    => 'id',
				'terms'    => $_POST['categoryfilter'],
			)
		);
		
	}elseif( isset($_POST['visit_typefilter']) && !empty($_POST['visit_typefilter']) && empty($_POST['categoryfilter']) ){
		$args['tax_query'] = array(
			array(
				'taxonomy' => 'visit_type',
				'field'    => 'id',
				'terms'    => $_POST['visit_typefilter'],
			)
		);
	}elseif( isset($_POST['visit_typefilter']) && !empty($_POST['visit_typefilter']) && isset($_POST['categoryfilter']) && !empty($_POST['categoryfilter']) ){
		$args['tax_query'] = array(
			'relation' => 'AND',
            array(
                'taxonomy' => 'specialty',
                'field'    => 'id',
                'terms'    => $_POST['categoryfilter'],
            ),
            array(
                'taxonomy' => 'visit_type',
                'field'    => 'id',
                'terms'    => $_POST['visit_typefilter'],
            )
		);
	}
	
	// ACF filter code above
	
	if( isset($_POST['zipcode']) && !empty($_POST['zipcode']) && empty($_POST['distance']) ){
		//echo "id call zipcode ";
		$args['meta_query'] = array( 
			array(
                'key' => 'zip_code',
				'value' => $_POST['zipcode'],
				'compare' => 'LIKE',  
			)				
		);
	}else if( isset($_POST['distance']) && !empty($_POST['distance']) && empty($_POST['zipcode']) ){
		//echo "id call distance ";
		$args['meta_query'] = array( 
            array(
                'key' => 'distance',
				'value' => $_POST['distance'],
				'compare' => 'LIKE',
            ) 
		);
	}elseif( isset($_POST['distance']) && !empty($_POST['distance']) && isset($_POST['zipcode']) && !empty($_POST['zipcode']) ){
		//echo "both else";
		$args['meta_query'] = array(
			'relation' => 'AND',
            array(
                'key' => 'zip_code',
				'value' => $_POST['zipcode'],
				'compare' => 'LIKE',
            ), 
            array(
                'key' => 'distance',
				'value' => $_POST['distance'],
				'compare' => 'LIKE',
            ) 
		);
	}

	 ?>

	<?php	 

	$query = new WP_Query( $args );
	$max_num_pages = $query->max_num_pages;
	$post_count = $query->found_posts;
     
     // echo '<pre>';

     // echo $max_num_pages;
     // echo '<br>';
     // echo $post_count;
     // echo '<br>';
     // print_r($query);
     // die;



	
	
	
	if( $query->have_posts() ) :
		while( $query->have_posts() ): $query->the_post();
		?>
		    <div class="okn_catalogue-item">
              <div class="okn_catalogue-title-section">
                <div class="okn_catalogue-avatar-wrapper">
                  <img class="okn_catalogue-avatar" src="<?php the_post_thumbnail();?>" alt="me"/>
                </div>
                <div class="okn_w-100">
                  <div class="okn_catalogue-item-name"><?php the_title(); ?></div>
                  <div class="okn_catalogue-item-details">
                                  <div class="okn_catalogue-item-subtexts">
                              <?php
                                 $terms_specialty = get_the_terms( $post->ID, 'specialty' );
                                 $release_years_str = get_the_term_list( $post->ID,'specialty','', ',' );

                                 
                                 if(!empty($terms_specialty)){
                                 foreach($terms_specialty as $termspeIterm){
                                 	?>
                              <div class="okn_catalogue-item-subtxt">
                                 <?php 
                                    echo $termspeIterm->name;
                                    ?>
                              </div>
                              <?php }
                                 }
                                 if(!empty($first_year)){
                                 	?>
                              <div class="okn_catalogue-item-subtxt">
                                 <?php 
                                    echo $first_year;
                                    ?>
                              </div>
                              <?php 
                                 }
                                  ?>
                              <div class="okn_catalogue-item-subtxt">
                                 <?php
                                    $release_years_str = get_the_term_list( $post->ID,'specialty','', ',' );
                                    $release_years_arr = explode(',', $release_years_str);

                                    $second_year = $release_years_arr[ 1 ];

                                    if(!empty($$second_year)){
                                    foreach ( $second_year as $termspes ) {
                                    	echo $term2->name;
                                    }
                                    }
                                     ?>
                              </div>
                              <div class="okn_catalogue-item-subtxt">Mental Health Specialist</div>
                           </div>
                    <div class="okn_catalogue-item-icons">
					

					<?php
					$terms_specialty = get_the_terms( $post->ID, 'specialty' );
						
					if(!empty($terms_specialty)){
						 foreach($terms_specialty as $termspeIterm){
							$terms = get_term_meta($termspeIterm->term_id);									
							$imageID = $terms['taxonomy_image'][0];
							
							if(!empty($imageID)){
								$attachment_image = wp_get_attachment_url( $imageID ); ?>
								<img class="okn_catalogue-item-icon" src="<?php echo $attachment_image; ?>" />
								<?php
							}
	
						}
					}
	 
						?>

                    </div>
                  </div>
                </div>
              </div>
              <div class="okn_catalogue-body-section">
                <div class="okn_catalogue-features">
                  <div class="okn_catalogue-feature">Hour Rate &nbsp;<span class="okn_bold-txt"><?php the_field('hour_rate'); ?></span></div>
                  <div class="okn_catalogue-feature">Visit Duration &nbsp;<span class="okn_bold-txt"><?php the_field('visit_duration'); ?></span></div>
                </div>
                <div class="okn_catalogue-description">
                  <p><?php the_content(); ?></p>
                </div>
              </div>
              <hr class="okn_grey-horizontal-line"/>
              <div class="okn_catalogue-item-footer">
                <div class="okn_footer-text">Next Available:</div>
                <div class="okn_catalogue-footer-button-wrapper">
                  <button class="okn_btn okn_dark-green-outlined-btn">21st Oct, 12:00 am</button>
                  <button class="okn_btn okn_dark-green-btn">Check availability</button>
                </div>
              </div>
            </div>


			  <?php
      endwhile;

      	print '@$@';
      	print $max_num_pages;
		print '@#@';
		print $post_count;
		print '@%@';
		//print $totalpages.'@~@'.$paged;
      ?>

	  <!-- Pagination Goes Here -->
	<div class="row">
    <div class="small-12 columns">test12
    <?php
    the_posts_pagination( array(
      'mid_size'  => 2,
      'prev_text' => '<svg xmlns="http://www.w3.org/2000/svg" width="14" height="22" viewBox="0 0 14 22" fill="none">
		<path d="M1.08769 11.6794L11.5371 21.6356C11.7114 21.8018 11.9431 21.8945 12.1839 21.8945C12.4248 21.8945 12.6565 21.8018 12.8308 21.6356L12.8421 21.6244C12.9269 21.5438 12.9944 21.4468 13.0406 21.3393C13.0867 21.2318 13.1105 21.116 13.1105 20.999C13.1105 20.8821 13.0867 20.7663 13.0406 20.6588C12.9944 20.5513 12.9269 20.4543 12.8421 20.3737L3.00206 10.9987L12.8421 1.62748C12.9269 1.5469 12.9944 1.44991 13.0406 1.34241C13.0867 1.23491 13.1105 1.11915 13.1105 1.00216C13.1105 0.885176 13.0867 0.769413 13.0406 0.661913C12.9944 0.554413 12.9269 0.457426 12.8421 0.376852L12.8308 0.365601C12.6565 0.199392 12.4248 0.10667 12.1839 0.10667C11.9431 0.10667 11.7114 0.199392 11.5371 0.365601L1.08769 10.3219C0.99579 10.4094 0.922629 10.5147 0.87264 10.6314C0.822651 10.7481 0.796875 10.8737 0.796875 11.0006C0.796875 11.1275 0.822651 11.2531 0.87264 11.3698C0.922629 11.4865 0.99579 11.5918 1.08769 11.6794Z" fill="black"/>
		</svg>',
      'next_text' => '
	  <svg xmlns="http://www.w3.org/2000/svg" width="14" height="22" viewBox="0 0 14 22" fill="none">
		<path d="M12.9123 10.3206L2.46294 0.364398C2.28858 0.198189 2.05694 0.105469 1.81606 0.105469C1.57518 0.105469 1.34354 0.198189 1.16919 0.364398L1.15794 0.375648C1.07312 0.456223 1.00558 0.553209 0.959435 0.660709C0.913283 0.768208 0.889484 0.883973 0.889484 1.00096C0.889484 1.11795 0.913283 1.23371 0.959435 1.34121C1.00558 1.44871 1.07312 1.5457 1.15794 1.62627L10.9979 11.0013L1.15794 20.3725C1.07312 20.4531 1.00558 20.5501 0.959435 20.6576C0.913283 20.7651 0.889484 20.8808 0.889484 20.9978C0.889484 21.1148 0.913283 21.2306 0.959435 21.3381C1.00558 21.4456 1.07312 21.5426 1.15794 21.6231L1.16919 21.6344C1.34354 21.8006 1.57518 21.8933 1.81606 21.8933C2.05694 21.8933 2.28858 21.8006 2.46294 21.6344L12.9123 11.6781C13.0042 11.5906 13.0774 11.4853 13.1274 11.3686C13.1773 11.2519 13.2031 11.1263 13.2031 10.9994C13.2031 10.8725 13.1773 10.7469 13.1274 10.6302C13.0774 10.5135 13.0042 10.4082 12.9123 10.3206Z" fill="black"/>
	</svg>
	  ',
    ) );?>
    </div>
  </div>
  <?php wp_reset_postdata();
		

	else :
		echo 'No posts found';
	endif;
	
	die();
}?>





