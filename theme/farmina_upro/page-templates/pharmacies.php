<?php
/*
Template Name: Pharmacies
*/
?>

<?php get_header(); ?>

<section class="career map-block">
	<div class="bg"></div>
	<div class="content-width">

		<?php get_template_part('parts/breadcrumbs') ?>

		<div>
			<div class="content">
				<h1><?php the_title() ?></h1>

				<?php get_search_form() ?>

				<?php 
				$wp_query = new WP_Query(array('post_type' => 'pharmacy', 'posts_per_page' => -1, 'paged' => get_query_var('paged')));
				if($wp_query->have_posts()): 
					?>

				<div class="map-content">
					<div class="address">
						<div class="wrap" id="response_pharmacies">
							
						<?php while ($wp_query->have_posts()): $wp_query->the_post(); ?>
							<?php get_template_part('parts/content', 'pharmacy', ['counter' => $wp_query->current_post]) ?>
						<?php endwhile; ?>

						</div>
					</div>
					<div class="map-wrap">
						<div id="map"></div>
					</div>
				</div>

					<?php 
				endif;
				wp_reset_query(); 
				?>

			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>