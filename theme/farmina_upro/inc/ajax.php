<?php

$actions = [
	'filter_vacancies',
	'filter_pharmacies',

];
foreach ($actions as $action) {
	add_action("wp_ajax_{$action}", $action);
	add_action("wp_ajax_nopriv_{$action}", $action);
}


function filter_vacancies(){

	$args = array(
		'post_type' => 'vacancy',
		'posts_per_page' => -1,
	);

	if (isset($_POST)) {
		foreach ($_POST as $key => $item) {
			if(str_contains($key, 'vacancy_')){
				$$key = $item ? 
				array(
					'taxonomy' => $key,
					'field'    => 'id',
					'terms'    => $item
				) :
				'';
			}
		}
	}

	if(isset($_POST['vacancy_cat']) || isset($_POST['vacancy_city']))
		$args['tax_query'] = array(
			'relation' => 'AND',
			$vacancy_cat,
			$vacancy_city,
		);

	$query = new WP_Query( $args );

	if( $query->have_posts() ) :
		while( $query->have_posts() ): $query->the_post(); ?>

			<?php get_template_part('parts/content', 'vacancy') ?>
			<?php 
		endwhile;
		wp_reset_postdata();
	else :
		_e('Sorry, nothing found', 'Farmina');
	endif;

	die();
}

function filter_pharmacies(){

	$args = array(
		'post_type' => 'pharmacy',
		'posts_per_page' => -1,
		'post_status' => 'publish',
		'suppress_filters' => false,
	);

	if (isset($_POST)) {
		foreach ($_POST as $key => $item) {
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
	}

	if(isset($_POST['pharmacy_city']) || isset($_POST['pharmacy_time']))
		$args['tax_query'] = array(
			'relation' => 'AND',
			$pharmacy_city,
			$pharmacy_time,
		);

	$pharmacies = get_posts($args);
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

	$query = new WP_Query($args);

	if( $query->have_posts() ) :
		ob_start();
		while( $query->have_posts() ): $query->the_post(); ?>

			<?php get_template_part('parts/content', 'pharmacy', ['counter' => $query->current_post]) ?>
			<?php 
		endwhile;
		wp_reset_postdata();

		$data = [ob_get_clean(), $pharmacies_arr_for_js, $pharmacy_city, $pharmacy_time];
		echo json_encode($data);
	else :
		_e('Sorry, nothing found', 'Farmina');
	endif;

	die();
}