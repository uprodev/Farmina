<?php if(have_rows('list')): ?>

	<ol>

		<?php while(have_rows('list')): the_row() ?>

			<?php if ($field = get_sub_field('text')): ?>
				<li>
					<?= $field ?>
				</li>
			<?php endif ?>

		<?php endwhile ?>

	</ol>

	<?php endif ?>