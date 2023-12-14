<?php get_header(); ?>

<?php if ($_GET['post_type'] == 'vacancy'): ?>

	<?php 
	if (isset($_GET)) {
		foreach ($_GET as $key => $item) {
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

	$wp_query = new WP_Query(array(
		'post_type' => $_GET['post_type'], 
		's' => get_search_query(), 
		'tax_query' => array(
			'relation' => 'AND',
			$vacancy_cat,
			$vacancy_city,
		), 
		'posts_per_page' => -1,
		'paged' => get_query_var('paged')));
		?>

		<section class="career">
			<div class="bg"></div>
			<div class="content-width">

				<?php get_template_part('parts/breadcrumbs') ?>

				<div>
					<div class="content">

						<?php if($wp_query->have_posts()):  ?>
							<h1><?php _e('You searched', 'Farmina') ?>: <?= get_search_query() ?></h1>
							<ul class="accordion">

								<?php while ($wp_query->have_posts()): $wp_query->the_post(); ?>
									<?php get_template_part('parts/content', 'vacancy') ?>
								<?php endwhile ?>

							</ul>

						<?php else: ?>
							<h1><?php _e('Sorry, nothing found', 'Farmina') ?></h1>
							<?php 
						endif;
						wp_reset_query(); 
						?>

					</div>
				</div>
			</div>
		</section>

	<?php elseif ($_GET['post_type'] == 'pharmacy'): ?>

		<?php 
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
		} 

		$wp_query = new WP_Query(array(
			'post_type' => $_GET['post_type'], 
			's' => get_search_query(), 
			'tax_query' => array(
				'relation' => 'AND',
				$pharmacy_city,
				$pharmacy_time,
			), 
			'posts_per_page' => -1,
			'paged' => get_query_var('paged')));
			?>

			<section class="career map-block">
				<div class="bg"></div>
				<div class="content-width">

					<?php get_template_part('parts/breadcrumbs') ?>

					<div>
						<div class="content">

							<?php if($wp_query->have_posts()):  ?>
								<h1><?php _e('You searched', 'Farmina') ?>: <?= get_search_query() ?></h1>

								<div class="map-content">
									<div class="address">
										<div class="wrap">

											<?php while ($wp_query->have_posts()): $wp_query->the_post(); ?>
												<?php get_template_part('parts/content', 'pharmacy', ['counter' => $wp_query->current_post]) ?>
											<?php endwhile; ?>

										</div>
									</div>
									<div class="map-wrap">
										<div id="map"></div>
									</div>
								</div>

							<?php else: ?>
								<h1><?php _e('Sorry, nothing found', 'Farmina') ?></h1>
								<?php 
							endif;
							wp_reset_query(); 
							?>

						</div>
					</div>
				</div>
			</section>

		<?php endif ?>
		<?php get_footer(); ?>