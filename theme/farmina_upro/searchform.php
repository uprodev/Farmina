<?php if (is_page_template('page-templates/career.php')/* || isset($_GET['vacancy_cat']) || isset($_GET['vacancy_city'])*/): ?>
	<form role="search" method="get" action="<?php echo esc_url( home_url( '/' )) ?>" class="select-line" id="filter_vacancies">

		<?php 
		$terms = get_terms( [
			'taxonomy' => 'vacancy_cat',
			'hide_empty' => false,
		] ); 
		?>

		<?php if ($terms): ?>
			<div class="select-block item">
				<label class="form-label" for="vacancy_cat"></label>
				<select name="vacancy_cat" id="vacancy_cat">
					<option value=""><?php _e('All vacancies', 'Farmina') ?></option>

					<?php foreach ($terms as $term): ?>
						<option value="<?= $term->term_id ?>"><?= $term->name ?></option>
					<?php endforeach ?>

				</select>
			</div>
		<?php endif ?>
		
		<?php 
		$terms = get_terms( [
			'taxonomy' => 'vacancy_city',
			'hide_empty' => false,
		] ); 
		?>

		<?php if ($terms): ?>
			<div class="select-block item">
				<label class="form-label" for="vacancy_city"></label>
				<select name="vacancy_city" id="vacancy_city">
					<option value=""><?php _e('All cities', 'Farmina') ?></option>

					<?php foreach ($terms as $term): ?>
						<option value="<?= $term->term_id ?>"><?= $term->name ?></option>
					<?php endforeach ?>

				</select>
			</div>
		<?php endif ?>
		
		<div class="item find">
			<label for="s"></label>
			<input type="hidden" name="post_type" value="vacancy" />
			<input type="text" id="s" name="s" placeholder="<?php _e('Enter vacancies', 'Farmina') ?>">
			<button type="submit"><img src="<?= get_stylesheet_directory_uri() ?>/img/search.svg" alt=""></button>
		</div>
	</form>
<?php else: ?>
	<form role="search" method="get" action="<?php echo esc_url( home_url( '/' )) ?>" class="select-line">
		
		<?php 
		$terms = get_terms( [
			'taxonomy' => 'pharmacy_city',
			'hide_empty' => false,
		] ); 
		?>

		<?php if ($terms): ?>
			<div class="select-block item">
				<label class="form-label" for="pharmacy_city"></label>
				<select name="pharmacy_city" id="pharmacy_city">
					<option value=""><?php _e('All cities', 'Farmina') ?></option>

					<?php foreach ($terms as $term): ?>
						<option value="<?= $term->term_id ?>"><?= $term->name ?></option>
					<?php endforeach ?>

				</select>
			</div>
		<?php endif ?>
		
		<div class="item find">
			<label for="search-item"></label>
			<input type="hidden" name="post_type" value="pharmacy" />
			<input type="search" id="s" name="s" placeholder="<?php _e('Enter farmacii address', 'Farmina') ?>">
			<button type="submit"><img src="<?= get_stylesheet_directory_uri() ?>/img/search.svg" alt=""></button>
		</div>
		
		<?php 
		$terms = get_terms( [
			'taxonomy' => 'pharmacy_time',
			'hide_empty' => false,
		] ); 
		?>

		<?php if ($terms): ?>
			<div class="select-block item">
				<label class="form-label" for="pharmacy_time"></label>
				<select name="pharmacy_time" id="pharmacy_time">
					<option value=""><?php _e('All time', 'Farmina') ?></option>

					<?php foreach ($terms as $term): ?>
						<option value="<?= $term->term_id ?>"><?= $term->name ?></option>
					<?php endforeach ?>

				</select>
			</div>
		<?php endif ?>
		
	</form>
	<?php endif ?>