<?php 
if(($args['index'] - 1) == 0 || ($args['index'] - 1) % 4 == 0) $data_aos_delay = '';
elseif($args['index'] % 4 == 0) $data_aos_delay = 150;
elseif ($args['index'] % 3 == 0) $data_aos_delay = 100;
elseif ($args['index'] % 2 == 0) $data_aos_delay = 50;
?>

<div class="item" data-aos="fade-up"<?php if($data_aos_delay) echo ' data-aos-delay="' . $data_aos_delay . '"' ?>>
	<a href="<?php the_permalink() ?>">

		<?php if (has_post_thumbnail()): ?>
			<figure>
			<?php the_post_thumbnail('full') ?>
		</figure>
		<?php endif ?>
		
		<div class="text-wrap">
			<p class="h6"><?php the_title() ?></p>

			<?php if (get_the_excerpt()): ?>
				<p class="text"><?php the_excerpt() ?></p>
			<?php endif ?>
			
		</div>
	</a>
</div>