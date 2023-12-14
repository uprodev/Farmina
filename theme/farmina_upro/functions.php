<?php 

// show_admin_bar( false );

add_action('wp_enqueue_scripts', 'load_style_script');
function load_style_script(){

	wp_enqueue_style('my-normalize', get_template_directory_uri() . '/css/normalize.css');
	wp_enqueue_style('my-fonts', 'https://fonts.googleapis.com/css2?family=Mulish:wght@400;600;700&display=swap');
	wp_enqueue_style('my-fancybox', get_template_directory_uri() . '/css/jquery.fancybox.min.css');
	wp_enqueue_style('my-nice-select', get_template_directory_uri() . '/css/nice-select.css');
	wp_enqueue_style('my-swiper', get_template_directory_uri() . '/css/swiper.min.css');
	wp_enqueue_style('my-intlTelInput', get_template_directory_uri() . '/css/intlTelInput.min.css');
	wp_enqueue_style('my-aos', get_template_directory_uri() . '/css/aos.css');
	wp_enqueue_style('my-styles', get_template_directory_uri() . '/css/styles.css');
	wp_enqueue_style('my-responsive', get_template_directory_uri() . '/css/responsive.css');
	wp_enqueue_style('my-style-main', get_template_directory_uri() . '/style.css');

	wp_enqueue_script('jquery');
	wp_enqueue_script('my-swiper', get_template_directory_uri() . '/js/swiper.js', array(), false, true);
	wp_enqueue_script('my-fancybox', get_template_directory_uri() . '/js/jquery.fancybox.min.js', array(), false, true);
	wp_enqueue_script('my-nice-select', get_template_directory_uri() . '/js/jquery.nice-select.min.js', array(), false, true);
	wp_enqueue_script('my-animateNumber', get_template_directory_uri() . '/js/jquery.animateNumber.min.js', array(), false, true);
	wp_enqueue_script('my-intlTelInput', get_template_directory_uri() . '/js/intlTelInput.min.js', array(), false, true);
	wp_enqueue_script('my-aos', get_template_directory_uri() . '/js/aos.js', array(), false, true);
	wp_enqueue_script('my-cuttr', get_template_directory_uri() . '/js/cuttr.min.js', array(), false, true);
	wp_enqueue_script('my-nicescroll', get_template_directory_uri() . '/js/jquery.nicescroll.min.js', array(), false, true);
	wp_enqueue_script('my-maps', 'https://maps.google.com/maps/api/js?key=AIzaSyA6kqZr_qU4SLyk5wEhcchavuLXy4FkZtY&sensor=false', array(), false, true);
	wp_enqueue_script('my-script', get_template_directory_uri() . '/js/script.js', array(), false, true);
	wp_enqueue_script('my-add', get_template_directory_uri() . '/js/add.js', array(), false, true);

	if(is_search()){
		$pharmacy_args = array(
			'post_type' => 'pharmacy', 
			'posts_per_page' => -1, 
		);

		if (isset($_GET)) {
			foreach ($_GET as $key => $item) {
				if(str_contains($key, 'pharmacy_')){
					$$key = $item ? 
					array(
						'taxonomy' => $key,
						'field'    => 'id',
						'terms'    => $item
					) :
					'';
				}
			}

			if(isset($_GET['pharmacy_city']) || isset($_GET['pharmacy_time']))
				$pharmacy_args['tax_query'] = array(
					'relation' => 'AND',
					$pharmacy_city,
					$pharmacy_time,
				);
		}

	} else $pharmacy_args = array('post_type' => 'pharmacy', 'posts_per_page' => -1);

	$pharmacies = get_posts($pharmacy_args);
	$pharmacies_arr_for_js = [];
	
	foreach ($pharmacies as $item) {
		$pharmacies_arr_for_js[] = [
			'address' => get_the_title($item->ID),
			'title' => get_field('name', $item->ID),
			'image' => get_the_post_thumbnail_url($item->ID, $size = 'full'),
			'phone' => get_field('phone', $item->ID),
			'phone_regex' => preg_replace('/[^0-9]/', '', get_field('phone', $item->ID)),
			'schedule' => get_field('schedule', $item->ID),
			'map' => get_field('map', $item->ID),
		];
	}

	$my_script = array(
		'counter_values' => get_field('items_2', apply_filters('wpml_object_id', 20, 'page')),
	);
	$my_add = array(
		'pharmacies_arr_for_js' => $pharmacies_arr_for_js,
	);
	wp_localize_script('my-script', 'php_vars', $my_script);
	wp_localize_script('my-add', 'php_vars', $my_add);

}


add_action('after_setup_theme', function(){
	register_nav_menus( array(
		'header' => 'Menu',
	) );
});


add_theme_support( 'title-tag' );
add_theme_support('html5');
add_theme_support( 'post-thumbnails' ); 


if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Main settings',
		'menu_title'	=> 'Theme options',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
}


add_filter('wpcf7_autop_or_not', '__return_false');


function my_acf_init() {
	acf_update_setting('google_api_key', 'AIzaSyDiyT05YehIdz2LrV-QOeRa5M18WfKtlnY');
}
add_action('acf/init', 'my_acf_init');


add_filter('tiny_mce_before_init', 'override_mce_options');
function override_mce_options($initArray) {
	$opts = '*[*]';
	$initArray['valid_elements'] = $opts;
	$initArray['extended_valid_elements'] = $opts;
	return $initArray;
}


function custom_language_switcher(){
	$languages = icl_get_languages('skip_missing=0&orderby=id&order=desc');
	if(!empty($languages)){

		echo '<div class="lang-wrap"><div class="nice-select" tabindex="0">';

		foreach($languages as $index => $language){

			switch ($index) {
				case 'en':
				$image_name = 'lang-1.svg';
				break;
				case 'ro':
				$image_name = 'lang-2.jpg';
				break;
				case 'ru':
				$image_name = 'lang-3.png';
				break;

				default:
				break;
			}

			if($language['active'] === '1') echo '<img src="' . get_stylesheet_directory_uri() . '/img/' . $image_name . '" alt="">' . $language['native_name'];
		}

		foreach($languages as $index => $language){

			switch ($index) {
				case 'en':
				$image_name = 'lang-1.svg';
				break;
				case 'ro':
				$image_name = 'lang-2.jpg';
				break;
				case 'ru':
				$image_name = 'lang-3.png';
				break;

				default:
				break;
			}

			if($index == 'en'){
				echo '<ul class="list">';
				$li_class = 'option selected';
			}
			else{
				$li_class = 'option';
			}

			echo '<li class="' . $li_class . '"><a href="' . $language['url'] . '"><img src="' . get_stylesheet_directory_uri() . '/img/' . $image_name . '" alt="">' . $language['native_name'];
			echo '</a></li> ';

			if($index == 'ru'){
				echo '</ul>';
			}

		}

		echo '</div></div>';

	}
}


add_filter('bcn_breadcrumb_title', 'my_breadcrumb_title_swapper', 3, 10);
function my_breadcrumb_title_swapper($title, $type, $id)
{
	if(in_array('home', $type))
	{
		$title = __('Home', 'Farmina');
	}
	return $title;
}


remove_filter('the_excerpt', 'wpautop');


require 'inc/gutenberg.php';
require 'inc/ajax.php';