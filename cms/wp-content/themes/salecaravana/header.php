<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>

		<link href="//www.google-analytics.com" rel="dns-prefetch">
        <link href="<?php echo get_template_directory_uri(); ?>/img/icons/favicon.ico" rel="shortcut icon">
        <link href="<?php echo get_template_directory_uri(); ?>/img/icons/touch.png" rel="apple-touch-icon-precomposed">

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="<?php bloginfo('description'); ?>">

		<?php wp_head(); ?>
		 <script>
        // // conditionizr.com
        // // configure environment tests
        // conditionizr.config({
        //     assets: '<?php echo get_template_directory_uri(); ?>',
        //     tests: {}
        // });
        </script>

	</head>

	<body <?php echo body_class(); ?> >
		<!-- This variable fetches every page's custom fields in turn -->
		<?php $GLOBALS['fields'] = get_fields(); ?>

		<div id="header-bg"></div>

		<header id="site-header" class="" data-wow-delay="1ms" data-wow-duration="1s">

			<h1>
			 <img src="<?php echo bloginfo('template_url'); ?>/assets/images/logo_header.png" alt="Sale Caravana Logo">
			 <p>Sale Caravana</p> 
			</h1>

			<div class="button_container" id="toggle">
				<span class="top"></span>
				<span class="middle"></span>
				<span class="bottom"></span>
			</div>

			<div class="overlay" id="overlay">
			<nav class="overlay-menu">

					<?php 
							wp_nav_menu( array(    	 
				  		  'container'       => '',
						  'container_class' => false,
						  'container_id'    => false,
						  'menu_class'      => false,
						  'menu_id'         => false,
						  'theme_location' => 'header-menu' ) );
				  ?> 
				  <?php dynamic_sidebar('footer_widget'); ?>

			</nav>
			</div>

		</header>
