<?php
/*
Template Name: News
*/
?>

<?php get_header(); ?>

<section class="news">
	<div class="bg"></div>
	<div class="content-width">

		<?php get_template_part('parts/breadcrumbs') ?>

		<?php if (get_field('form_1')): ?>

			<div class="top">

				<?php if ($field = get_field('label_1')): ?>
					<p class="label red"><?= $field ?></p>
				<?php endif ?>

				<?php if ($field = get_field('title_1')): ?>
					<h1><?= $field ?></h1>
				<?php endif ?>

				<?php if ($field = get_field('form_1')): ?>
					<div class="form-wrap">
						<?= do_shortcode('[contact-form-7 id="' . $field . '" html_class="form-subscribe"]') ?>
					</div>
				<?php endif ?>

			</div>
		<?php endif ?>

		<?php 
		$posts_ids = [];
		$wp_query = new WP_Query(array('post_type' => 'post', 'posts_per_page' => 4, 'paged' => get_query_var('paged')));
		if($wp_query->have_posts()): 
			?>

			<?php if ($field = get_field('title_2')): ?>
				<h2><?= $field ?></h2>
			<?php endif ?>
			
			<div class="content top-content">

				<?php while ($wp_query->have_posts()): $wp_query->the_post(); ?>
					<?php 
					get_template_part('parts/content', 'post', ['index' => $wp_query->current_post + 1]);
					$posts_ids[] = get_the_ID();
					?>
				<?php endwhile; ?>

			</div>

			<?php 
		endif;
		wp_reset_query(); 
		?>

		<?php 
		$wp_query = new WP_Query(array('post_type' => 'post', 'posts_per_page' => 16, 'post__not_in' => $posts_ids, 'paged' => get_query_var('paged')));
		if($wp_query->have_posts()): 
			?>

			<?php if ($field = get_field('title_3')): ?>
				<h2><?= $field ?></h2>
			<?php endif ?>
			
			<div class="content">

				<?php while ($wp_query->have_posts()): $wp_query->the_post(); ?>
					<?php get_template_part('parts/content', 'post', ['index' => $wp_query->current_post + 1]) ?>
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