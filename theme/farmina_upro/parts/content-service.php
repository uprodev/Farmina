<div class="item"  data-aos="fade-up">

	<?php if (has_post_thumbnail()): ?>
		<figure>
			<a href="<?php the_permalink() ?>">
				<?php the_post_thumbnail('full') ?>
			</a>
		</figure>
	<?php endif ?>
	
	<div class="text">
		<h2><?php the_title() ?></h2>

		<?php if (get_the_excerpt()): ?>
			<p><?php the_excerpt() ?></p>
		<?php endif ?>
		
		<div class="btn-wrap">
			<a href="<?php the_permalink() ?>" class="btn-default btn-border"><?php _e('Read More', 'Farmina') ?> <img src="<?= get_stylesheet_directory_uri() ?>/img/icon-1-1.svg" alt=""></a>
		</div>
	</div>
</div>