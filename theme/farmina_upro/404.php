<?php get_header(); ?>

<section class="block-404">
	<div class="bg"></div>
	<div class="content-width">
		<div class="content">

			<?php if ($field = get_field('image_1_404', 'option')): ?>
				<div class="item-404">
					<?= wp_get_attachment_image($field['ID'], 'full') ?>
				</div>
			<?php endif ?>
			
			<?php if ($field = get_field('image_2_404', 'option')): ?>
				<figure>
					<?= wp_get_attachment_image($field['ID'], 'full') ?>
				</figure>
			<?php endif ?>
			
			<div class="text">

				<?php if ($field = get_field('text_404', 'option')): ?>
					<?= $field ?>
				<?php endif ?>

				<?php if ($field = get_field('link_404', 'option')): ?>
					<div class="btn-wrap">
						<a href="<?= $field['url'] ?>" class="btn-default"<?php if($field['target']) echo ' target="_blank"' ?>><?= $field['title'] ?> <img src="<?= get_stylesheet_directory_uri() ?>/img/icon-1.svg" alt=""></a>
					</div>
				<?php endif ?>

			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>