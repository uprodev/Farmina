</main>

<?php $is_form_show = is_front_page() ?>

<?php if ($is_form_show): ?>
  <div class="bg-img">

    <?php if ($field = get_field('background_footer', 'option')): ?>
      <div class="bg">
        <?= wp_get_attachment_image($field['ID'], 'full') ?>
      </div>
    <?php endif ?>

    <?php if ($field = get_field('form_footer', 'option')): ?>
      <section class="contact-form-block" data-aos="fade-up">
        <div class="content-width">
          <div class="content">
            <?= do_shortcode('[contact-form-7 id="' . $field . '" html_class="default-form"]') ?>
          </div>
        </div>
      </section>
    <?php endif ?>

  <?php endif ?>

  <?php if (is_page_template('page-templates/career.php') || is_page_template('page-templates/pharmacies.php')): ?>
  <div class="bg-career">
    <?php get_template_part('parts/career') ?>
  <?php endif ?>

  <footer>
    <div class="content-width">
      <div class="content">

        <?php if ($field = get_field('logo_footer', 'option')): ?>
          <div class="logo-wrap">
            <a href="<?= get_home_url() ?>">
              <?= wp_get_attachment_image($field['ID'], 'full') ?>
            </a>
          </div>
        <?php endif ?>

        <nav class="footer-menu">

          <?php wp_nav_menu( array(
            'theme_location'  => 'header',
            'container'       => '',
            'items_wrap'      => '<ul>%3$s</ul>'
          )); ?>

          <?php if ($field = get_field('form_subscribe_footer', 'option')): ?>
            <div class="form-wrap">
              <?= do_shortcode('[contact-form-7 id="' . $field . '" html_class="form-subscribe"]') ?>
            </div>
          <?php endif ?>

        </nav>

        <?php if ($field = get_field('copyright_footer', 'option')): ?>
          <div class="bottom">
            <p><?= $field ?></p>
          </div>
        <?php endif ?>

      </div>
    </div>
  </footer>

  <?php if ($is_form_show): ?>
  </div>
<?php endif ?>

<?php if (is_page_template('page-templates/contact.php') || is_page_template('page-templates/career.php') || is_page_template('page-templates/pharmacies.php')): ?>
</div>
<?php endif ?>

<?php if (($field = get_field('form_popup', 'option')) && !is_page_template('page-templates/career.php') && !is_page_template('page-templates/pharmacies.php') && !is_search()): ?>
<div id="call" class="popup-default call-popup" style="display: none">
  <div class="popup-main">
    <?= do_shortcode('[contact-form-7 id="' . $field . '" html_class="default-form"]') ?>
  </div>
</div>
<?php endif ?>

<?php if ($field = get_field('thank_text_popup', 'option')): ?>
  <div id="send-ok" class="popup-default send-popup" style="display: none">
    <div class="popup-main">
      <figure>
        <img src="<?= get_stylesheet_directory_uri() ?>/img/icon-4.svg" alt="">
      </figure>
      <?= $field ?>
    </div>
  </div>
<?php endif ?>

<?php if (($field = get_field('form_2', 'option')) && (is_page_template('page-templates/career.php') || $_GET['post_type'] == 'vacancy')): ?>
<div id="career" class="popup-default popup-career" style="display: none">
  <div class="popup-main">
    <?= do_shortcode('[contact-form-7 id="' . $field . '" html_class="default-form"]') ?>
  </div>
</div>
<?php endif ?>

<?php wp_footer(); ?>

<?php if ($field = get_field('scripts_footer', 'option')): ?>
  <?= $field ?>
<?php endif ?>

</body>
</html>