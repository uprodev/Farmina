<?php
/*
Template Name: Career
*/
?>

<?php get_header(); ?>

<section class="career">
	<div class="bg"></div>
	<div class="content-width">

		<?php get_template_part('parts/breadcrumbs') ?>

		<div>
			<div class="content">
				<h1><?php the_title() ?></h1>
				
				<?php get_search_form() ?>

				<?php 
				$wp_query = new WP_Query(array('post_type' => 'vacancy', 'posts_per_page' => -1, 'paged' => get_query_var('paged')));
				if($wp_query->have_posts()): 
					?>

					<ul class="accordion" id="response_vacancies">

						<?php while ($wp_query->have_posts()): $wp_query->the_post(); ?>
							<?php get_template_part('parts/content', 'vacancy') ?>
						<?php endwhile; ?>

					</ul>

					<?php 
				endif;
				wp_reset_query(); 
				?>

			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>