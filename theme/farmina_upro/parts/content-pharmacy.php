<?php 
$start_time = get_field('schedule')['day_' . date('w')]['start'];
$end_time = get_field('schedule')['day_' . date('w')]['end'];

$date_now = new DateTime("now", new DateTimeZone('Europe/Tallinn') );
$now = $date_now->format('U');
$start_time_stamp = strtotime(date('Y-m-d') . $start_time);
$end_time_stamp = strtotime(date('Y-m-d') . $end_time);
?>

<div class="item item-pharmacy" data-id="<?= $args['counter'] ?>" id="programs-<?= $args['counter'] + 1 ?>">
	<p class="title">
		<img src="<?= get_stylesheet_directory_uri() ?>/img/icon-14.svg" alt="">
		<?php the_field('name') ?>
	</p>
	<p class="status"><?= $now >= $start_time_stamp && $now <= $end_time_stamp ? __('Open', 'Farmina') : __('Closed', 'Farmina') ?></p>
	<ul>

		<?php $terms = wp_get_object_terms(get_the_ID(), 'pharmacy_city') ?>

		<?php if ($terms): ?>
			<li>
				<div class="img-wrap loc-link">
					<img src="<?= get_stylesheet_directory_uri() ?>/img/icon-15-1.svg" alt="">
				</div>
				<a href="#"><?= $terms[0]->name ?></a>
			</li>
		<?php endif ?>
		
		<?php if ($field = get_field('phone')): ?>
			<li>
				<div class="img-wrap">
					<img src="<?= get_stylesheet_directory_uri() ?>/img/icon-15-2.svg" alt="">
				</div>
				<a href="tel:+<?= preg_replace('/[^0-9]/', '', $field) ?>"><?= $field ?></a>
			</li>
		<?php endif ?>
		
		<?php if ($start_time && $end_time): ?>
		<li>
			<div class="img-wrap">
				<img src="<?= get_stylesheet_directory_uri() ?>/img/icon-15-3.svg" alt="">
			</div>
			<p>Open: <?= $start_time ?>-<?= $end_time ?></p>
		</li>
	<?php endif ?>

</ul>
</div>