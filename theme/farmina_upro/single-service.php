<?php get_header(); ?>

<section class="supplements-header">
	<div class="bg"></div>
	<div class="content-width" data-aos="fade-up"<?php if(has_post_thumbnail()) echo ' style="background-image:url(' . get_the_post_thumbnail_url(get_the_ID(), 'full') . ')"' ?>>
		
		<?php get_template_part('parts/breadcrumbs') ?>

		<div class="content">
			<h1><?php the_title() ?></h1>
			<?php the_content() ?>
		</div>
	</div>
</section>

<section class="supplements-grey" >
	<div class="content-width"  data-aos="fade-up">
		<div class="content">

			<?php $images = get_field('icons_2');
			if($images): ?>

				<ul>

					<?php foreach($images as $image): ?>

						<li>
							<?= wp_get_attachment_image($image['ID'], 'full') ?>
						</li>

					<?php endforeach; ?>

				</ul>

			<?php endif; ?>

			<?php if ($field = get_field('text_2')): ?>
				<?= $field ?>
			<?php endif ?>

			<?php if ($field = get_field('link_2')): ?>
				<div class="btn-wrap">
					<a href="<?= $field['url'] ?>" class="btn-default"<?php if($field['target']) echo ' target="_blank"' ?>><?= $field['title'] ?> <img src="<?= get_stylesheet_directory_uri() ?>/img/icon-1.svg" alt=""></a>
				</div>
			<?php endif ?>

		</div>
	</div>
</section>

<?php if(have_rows('items_3')): ?>

	<section class="supplements-items bg-blue">
		<div class="content-width">

			<?php while(have_rows('items_3')): the_row() ?>

				<div class="item" data-aos="fade-up">

					<?php if ($field = get_sub_field('text')): ?>
						<div class="text">
							<?= $field ?>
						</div>
					<?php endif ?>
					
					<?php if ($field = get_sub_field('image')): ?>
						<figure>
							<?= wp_get_attachment_image($field['ID'], 'full') ?>
						</figure>
					<?php endif ?>
					
				</div>

			<?php endwhile ?>

		</div>
	</section>

<?php endif ?>

<section class="item-3n ">
	<div class="content-width">
		<div class="top">

			<?php if ($field = get_field('label_1', 'option')): ?>
				<div class="label red"><?= $field ?></div>
			<?php endif ?>
			
			<?php if ($field = get_field('text_1', 'option')): ?>
				<?= $field ?>
			<?php endif ?>
			
		</div>

		<?php if(have_rows('items_1', 'option')): ?>

			<div class="content">

				<?php while(have_rows('items_1', 'option')): the_row() ?>

					<div class="item" data-aos="fade-up"<?php if($field = get_sub_field('delay')) echo ' data-aos-delay="' . $field . '"'; if($field = get_sub_field('background')) echo ' style="background: ' . $field . ';"'; ?>>

						<?php if ($field = get_sub_field('icon')): ?>
							<div class="img-wrap">
								<?= wp_get_attachment_image($field['ID'], 'full') ?>
							</div>
						<?php endif ?>

						<?php if ($field = get_sub_field('title')): ?>
							<p class="h6"><?= $field ?></p>
						<?php endif ?>

						<?php if ($field = get_sub_field('text')): ?>
							<?= $field ?>
						<?php endif ?>

					</div>

				<?php endwhile ?>

			</div>

		<?php endif ?>

		<?php if ($field = get_field('link_1', 'option')): ?>
			<div class="btn-wrap">
				<a href="<?= $field['url'] ?>" class="btn-default fancybox"><?= $field['title'] ?> <img src="<?= get_stylesheet_directory_uri() ?>/img/icon-1.svg" alt=""></a>
			</div>
		<?php endif ?>

	</div>
</section>

<?php get_footer(); ?>