<!DOCTYPE HTML>
<html class="no-js" lang="en">
	<head>
		<title><?php
		if(is_home()) {
			echo "Homepage |"; bloginfo('name');
		} else {
			wp_title('&mdash;','true','right'); bloginfo('name');
		}
		?></title>
		<meta name="description" content="TEDxGlasgow is an independant TEDx event operated under license from TED.">
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
  	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
		<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/img/favicon.ico"/>
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>