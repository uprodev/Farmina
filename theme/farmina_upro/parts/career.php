<section class="career-info">
  <div class="content-width">
    <div class="content">
      <div class="title">

        <?php if ($field = get_field('title_3', 'option')): ?>
          <p class="h3"><?= $field ?></p>
        <?php endif ?>
        
        <?php if ($field = get_field('text_3', 'option')): ?>
          <p><?= $field ?></p>
        <?php endif ?>
        
      </div>
      <div class="right">
        <ul>

          <?php if ($field = get_field('phone_3', 'option')): ?>
            <li>
              <p><?php _e('Phone', 'Farmina') ?>:</p>
              <p><a href="tel:+<?= preg_replace('/[^0-9]/', '', $field) ?>"><?= $field ?></a></p>
            </li>
          <?php endif ?>
          
          <?php if ($field = get_field('mobile_3', 'option')): ?>
            <li>
              <p><?php _e('Mobile', 'Farmina') ?>:</p>
              <p><a href="tel:+<?= preg_replace('/[^0-9]/', '', $field) ?>"><?= $field ?></a></p>
            </li>
          <?php endif ?>
          
          <?php if ($field = get_field('email_3', 'option')): ?>
            <li>
              <p><?php _e('Email', 'Farmina') ?>:</p>
              <p class="email"><a href="mailto:<?= $field ?>"><?= $field ?></a></p>
            </li>
          <?php endif ?>
          
          <?php if ($field = get_field('open_hours_3', 'option')): ?>
            <li>
              <p><?php _e('Open hours', 'Farmina') ?>:</p>
              <p><?= $field ?></p>
            </li>
          <?php endif ?>
          
        </ul>

        <?php if ($field = get_field('link_3', 'option')): ?>
          <div class="btn-wrap">
            <a href="<?= $field['url'] ?>" class="btn-default"<?php if($field['target']) echo ' target="_blank"' ?>><?= $field['title'] ?></a>
          </div>
        <?php endif ?>

      </div>
    </div>
  </div>
</section>