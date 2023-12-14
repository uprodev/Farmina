<?php
/*
Template Name: Services
*/
?>

<?php get_header(); ?>

<section class="service-block">
	<div class="bg"></div>
	<div class="content-width">

		<?php get_template_part('parts/breadcrumbs') ?>

		<div class="top">
			<h1><?php the_title() ?></h1>
			<?php the_content() ?>
		</div>

		<?php 
		$wp_query = new WP_Query(array('post_type' => 'service', 'posts_per_page' => 8, 'paged' => get_query_var('paged')));
		if($wp_query->have_posts()): 
			?>

			<div class="content">

				<?php while ($wp_query->have_posts()): $wp_query->the_post(); ?>
					<?php get_template_part('parts/content', 'service') ?>
				<?php endwhile; ?>

			</div>

			<?php 
		endif;
		get_template_part('parts/pagination');
		wp_reset_query(); 
		?>

	</div>
</section>

<?php get_footer(); ?>