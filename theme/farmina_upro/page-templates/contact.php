<?php
/*
Template Name: Contact
*/
?>

<?php get_header(); ?>

<?php if (has_post_thumbnail()): ?>
	<div class="bg">
		<?php the_post_thumbnail('full') ?>
	</div>
<?php endif ?>

<section class="contact">
	<div class="content-width">

		<?php get_template_part('parts/breadcrumbs') ?>

		<div class="content">
			<div class="left">

				<?php if ($field = get_field('title')): ?>
					<h1><?= $field ?></h1>
				<?php endif ?>
				
				<?php if(have_rows('links')): ?>

					<ul>

						<?php while(have_rows('links')): the_row() ?>

							<?php if ($link = get_sub_field('link')): ?>
								<li>

									<?php if ($title = get_sub_field('title')): ?>
										<p><?= $title ?></p>
									<?php endif ?>

									<a href="<?= $link['url'] ?>"<?php if($link['target']) echo ' target="_blank"' ?>><?= $link['title'] ?></a>
								</li>
							<?php endif ?>

						<?php endwhile ?>

					</ul>

				<?php endif ?>

			</div>

			<?php if ($field = get_field('form')): ?>
				<div class="form-wrap">
					<?= do_shortcode('[contact-form-7 id="' . $field . '" html_class="default-form"]') ?>
				</div>
			<?php endif ?>
			
		</div>
	</div>
</section>

<?php get_footer(); ?>