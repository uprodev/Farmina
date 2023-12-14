<?php if ($text = get_field('text')): ?>
	<blockquote>
		<span><?= $text ?></span>”

		<?php if ($name = get_field('name')): ?>
			<p><?= $name ?></p>
		<?php endif ?>
		
	</blockquote>
<?php endif ?>
