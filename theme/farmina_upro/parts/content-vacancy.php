<li class="accordion-item">
	<div class="accordion-thumb">
		<p class="title"><?php the_title() ?></p>
	</div>
	<div class="accordion-panel">
		<div class="wrap">
			<p class="date">Posted on <?= get_the_date() ?></p>

			<?php if(have_rows('items')): ?>
				<?php while(have_rows('items')): the_row() ?>

					<?php if ($field = get_sub_field('title')): ?>
						<p class="sub-title"><?= $field ?></p>
					<?php endif ?>
					
					<?php if ($field = get_sub_field('text')): ?>
						<?= $field ?>
					<?php endif ?>

				<?php endwhile ?>
			<?php endif ?>

			<div class="btn-wrap">
				<a href="#career" class="btn-default btn-border btn-red fancybox upload_cv"><?php _e('Upload CV', 'Farmina') ?></a>
			</div>
		</div>
	</div>
</li>