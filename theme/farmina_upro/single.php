<?php get_header(); ?>

<section class="page-article">
	<div class="bg"></div>
	<div class="content-width">

		<?php get_template_part('parts/breadcrumbs') ?>

		<div class="top">
			<h1><?php the_title() ?></h1>
		</div>
		<div class="content">
			<?php the_content() ?>
		</div>
	</div>
</section>

<?php 
$wp_query = new WP_Query(array('post_type' => 'post', 'posts_per_page' => 4, 'orderby' => 'rand', 'paged' => get_query_var('paged')));
if($wp_query->have_posts()): 
	?>

	<section class="news">
		<div class="content-width">

			<h2><?php _e('Related News', 'Farmina') ?></h2>
			<div class="btn-wrap-last">
				<a href="<?php the_permalink(apply_filters('wpml_object_id', 28, 'page')) ?>" class="btn-default"><?php _e('See all', 'Farmina') ?><img src="<?= get_stylesheet_directory_uri() ?>/img/icon-1.svg" alt=""></a>
			</div>
			<div class="content ">
				
				<?php while ($wp_query->have_posts()): $wp_query->the_post(); ?>
					<?php get_template_part('parts/content', 'post', ['index' => $wp_query->current_post + 1]) ?>
				<?php endwhile; ?>

			</div>
		</div>
	</section>

	<?php 
endif;
wp_reset_query(); 
?>

<?php get_footer(); ?>