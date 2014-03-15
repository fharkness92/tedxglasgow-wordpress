<header role="banner">
  <div class="container">
  	<a href="<?php echo home_url(); ?>" id="brand"><img src="<?php echo get_template_directory_uri(); ?>/img/logo.svg" src="<?php bloginfo( 'name' ); ?>" class="logo"></a>
    <?php
      wp_nav_menu( array(
      'theme_location' => 'primary',
      'container'       => 'nav',
      'container_class' => '',
      'container_id'    => 'primary-navigation',
      'menu_class'      => '',
      'menu_id'         => '',
      )
    ); ?>
  </div>
</header>