<?php
/*
Template Name: Home
*/
?>

<?php get_header(); ?>

<section class="home-banner">
	<div class="bg">

		<?php if ($field = get_field('video_1')): ?>
			<video muted autoplay loop poster="" ><source src="<?= $field['url'] ?>" type="video/mp4">
				<?php _e("Your browser doesn't support HTML5 video tag.", 'Farmina') ?>
			</video>
		<?php endif ?>
		
		<?php if ($field = get_field('image_1')): ?>
			<?= wp_get_attachment_image($field['ID'], 'full') ?>
		<?php endif ?>
		
	</div>
	<div class="content-width">
		<div class="content" data-aos="fade-up">

			<?php if ($field = get_field('text_1')): ?>
				<?= $field ?>
			<?php endif ?>

			<?php if ($field = get_field('link_1')): ?>
				<div class="btn-wrap">
					<a href="<?= $field['url'] ?>" class="btn-default"<?php if($field['target']) echo ' target="_blank"' ?>><?= $field['title'] ?> <img src="<?= get_stylesheet_directory_uri() ?>/img/icon-1.svg" alt=""></a>
				</div>
			<?php endif ?>

		</div>
	</div>
</section>

<section class="info-number" >
	<div class="content-width " data-aos="fade-up" data-aos-offset="100" data-aos-delay="1000">

		<?php if ($field = get_field('label_2')): ?>
			<p class="label"><?= $field ?></p>
		<?php endif ?>
		
		<div class="top">

			<?php if ($field = get_field('title_2')): ?>
				<div class="title">
					<h2><?= $field ?></h2>
				</div>
			<?php endif ?>

			<?php if ($field = get_field('text_2')): ?>
				<div class="info">
					<p><?= $field ?></p>
				</div>
			<?php endif ?>

		</div>

		<?php if(have_rows('items_2')): ?>

			<div class="content-number">
				<ul>

					<?php while(have_rows('items_2')): the_row() ?>

						<li class="item item-<?= get_row_index() ?>">

							<?php if ($field = get_sub_field('title')): ?>
								<p class="h6"><?= $field ?></p>
							<?php endif ?>
							
							<?php if ($field = get_sub_field('text')): ?>
								<p><?= $field ?></p>
							<?php endif ?>
							
						</li>

					<?php endwhile ?>

				</ul>
			</div>

		<?php endif ?>

	</div>
</section>

<section class="title-text-img bg-blue">

	<?php if ($field = get_field('icon_3')): ?>
		<div class="bg">
			<div class="wrap">
				<?= wp_get_attachment_image($field['ID'], 'full') ?>
			</div>
		</div>
	<?php endif ?>
	
	<div class="content-width" data-aos="fade-up">
		<div class="top">

			<?php if ($field = get_field('label_3')): ?>
				<div class="label red "><?= $field ?></div>
			<?php endif ?>
			
			<?php if ($field = get_field('text_3')): ?>
				<?= $field ?>
			<?php endif ?>
			
		</div>

		<?php if(have_rows('items_3')): ?>

			<div class="content">

				<?php if ($field = get_field('image_3')): ?>
					<figure>
						<?= wp_get_attachment_image($field['ID'], 'full') ?>
					</figure>
				<?php endif ?>

				<?php while(have_rows('items_3')): the_row() ?>

					<div class="item item-<?= get_row_index() ?>" data-aos="fade-up"<?php if($field = get_sub_field('delay')) echo ' data-aos-delay="' . $field . '"' ?>>

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

	</div>
</section>

<section class="item-3n bg-blue">
	<div class="content-width">
		<div class="top">

			<?php if ($field = get_field('label_4')): ?>
				<div class="label red"><?= $field ?></div>
			<?php endif ?>
			
			<?php if ($field = get_field('text_4')): ?>
				<?= $field ?>
			<?php endif ?>
			
		</div>

		<?php if(have_rows('items_4')): ?>

			<div class="content">

				<?php while(have_rows('items_4')): the_row() ?>

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

		<?php if ($field = get_field('link_4')): ?>
			<div class="btn-wrap">
				<a href="<?= $field['url'] ?>" class="btn-default fancybox"><?= $field['title'] ?> <img src="<?= get_stylesheet_directory_uri() ?>/img/icon-1.svg" alt=""></a>
			</div>
		<?php endif ?>

	</div>
</section>

<section class="service">
	<div class="content-width">

		<?php if ($field = get_field('label_5')): ?>
			<p class="label"><?= $field ?></p>
		<?php endif ?>
		
		<?php if ($field = get_field('title_5')): ?>
			<h2><?= $field ?></h2>
		<?php endif ?>
		
		<div class="top">

			<?php if ($field = get_field('text_5')): ?>
				<div class="text-wrap">
					<?= $field ?>
				</div>
			<?php endif ?>

			<?php if ($field = get_field('link_5')): ?>
				<div class="btn-wrap">
					<a href="<?= $field['url'] ?>" class="btn-default"<?php if($field['target']) echo ' target="_blank"' ?>><?= $field['title'] ?> <img src="<?= get_stylesheet_directory_uri() ?>/img/icon-1.svg" alt=""></a>
				</div>
			<?php endif ?>

		</div>

		<?php
		$featured_posts = get_field('items_5');
		if($featured_posts): ?>

			<div class="content">

				<?php foreach($featured_posts as $index => $post): 

					global $post;
					setup_postdata($post); ?>
					<div class="item item-<?= $index + 1 ?>" data-aos="fade-up"<?php if($field = get_field('delay')) echo ' data-aos-delay="' . $field . '"' ?>>
						<a href="<?php the_permalink() ?>">

							<?php if (has_post_thumbnail()): ?>
								<?php the_post_thumbnail('full') ?>
							<?php endif ?>
							
							<span class="icon">
								<img src="<?= get_stylesheet_directory_uri() ?>/img/icon-5.svg" alt="">
							</span>
							<div class="text">
								<p class="h3"><?php the_title() ?></p>
							</div>
						</a>
					</div>
				<?php endforeach; ?>

				<?php wp_reset_postdata(); ?>

			</div>

		<?php endif; ?>

	</div>
</section>

<?php if(have_rows('items_6')): ?>

	<section class="img-text">
		<div class="content-width">

			<?php while(have_rows('items_6')): the_row() ?>

				<div class="item item-<?= get_row_index() ?>" data-aos="fade-up">
					<figure>

						<?php if ($field = get_sub_field('image')): ?>
							<?= wp_get_attachment_image($field['ID'], 'full') ?>
						<?php endif ?>
						
						<div class="icon-wrap">

							<?php if ($field = get_sub_field('icon')): ?>
								<div class="wrap">
									<?= wp_get_attachment_image($field['ID'], 'full') ?>
								</div>
							<?php endif ?>

							<div class="info">

								<?php if ($field = get_sub_field('title')): ?>
									<p><?= $field ?></p>
								<?php endif ?>

								<?php if ($field = get_sub_field('number')): ?>
									<p class="h6"><?= $field ?></p>
								<?php endif ?>

							</div>
						</div>

						<?php if ($field = get_sub_field('list')): ?>
							<div class="list">
								<?= $field ?>
							</div>
						<?php endif ?>

					</figure>
					<div class="text">
						
						<?php if ($field = get_sub_field('label')): ?>
							<p class="label"><?= $field ?></p>
						<?php endif ?>
						
						<?php if ($field = get_sub_field('text')): ?>
							<?= $field ?>
						<?php endif ?>
						
						<?php if ($field = get_sub_field('link')): ?>
							<div class="btn-wrap">
								<a href="<?= $field['url'] ?>" class="btn-default"<?php if($field['target']) echo ' target="_blank"' ?>><?= $field['title'] ?> <img src="<?= get_stylesheet_directory_uri() ?>/img/icon-1.svg" alt=""></a>
							</div>
						<?php endif ?>

					</div>
				</div>

			<?php endwhile ?>

		</div>
	</section>

<?php endif ?>

<?php $images = get_field('gallery_7');
if($images): ?>

	<section class="partners" data-aos="fade-up">
		<div class="content-width">

			<?php if ($field = get_field('title_7')): ?>
				<h2><?= $field ?></h2>
			<?php endif ?>

			<div class="content">

				<?php foreach($images as $image): ?>

					<div class="item">
						<?= wp_get_attachment_image($image['ID'], 'full') ?>
					</div>

				<?php endforeach; ?>

			</div>
		</div>
	</section>

<?php endif; ?>

<?php get_footer(); ?>