<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

  <!-- HEADER（固定） -->
  <header class="site-header">
    <a href="<?php echo esc_url( home_url('/') ); ?>" class="site-logo">
      <img
        src="<?php echo esc_url( get_template_directory_uri() . '/images/hobby-select-logo-round.png' ); ?>"
        alt="Hobby Select"
        class="site-logo__img"
        width="400"
        height="400"
      >
    </a>
    <div class="header-actions">
      <a href="<?php echo esc_url( home_url('/about') ); ?>" class="header-link<?php echo is_page('about') ? ' is-current' : ''; ?>">Tim HobbySelectJP</a>
    </div>
  </header>

