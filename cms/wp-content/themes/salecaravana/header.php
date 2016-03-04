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

	<body <?php echo body_class(); ?> id="here">
		<!-- This variable fetches every page's custom fields in turn -->
		<?php 
			$GLOBALS['fields'] = get_fields(); 
			// global $polylang;
			// global $post_button;

			// if($polylang->curlang->slug == 'en') {
			//    $post_button = 'VIEW MORE';
			// }else{
			//    	$post_button = 'VER MAS';
			// }

		?>

		<div id="header-bg"></div>

		<header id="site-header" data-wow-delay="1ms" data-wow-duration="1s">

			<?php

		      	$current_page = $post->post_title;

		      	if ($current_page == 'Home' || get_post_type() == 'entries'){  
            ?>
				<a class="a_h" href="<?php echo esc_url( home_url( '/' ) ); ?>">
				<h1>

						 <img class="logo_header" src="<?php echo bloginfo('template_url'); ?>/assets/images/logo_w.png" alt="Sale Caravana Logo">
						 <img class="logo_header hide" src="<?php echo bloginfo('template_url'); ?>/assets/images/logo_b.png" alt="Sale Caravana Logo">
						 <p>Sale Caravana</p> 
					
				</h1>
				</a>

			<?php }else{ ?>
				
				<a class="a_h" href="<?php echo esc_url( home_url( '/' ) ); ?>">
				<h1>
					
						 <img class="logo_header" src="<?php echo bloginfo('template_url'); ?>/assets/images/logo_b.png" alt="Sale Caravana Logo">
						 <p>Sale Caravana</p> 
					
				</h1>
				</a>

			<?php } ?>

			<div class="button_container" id="toggle">
				<span class="top"></span>
				<span class="middle"></span>
				<span class="bottom"></span>
			</div>

			<div class="overlay" id="overlay">
				<nav class="overlay-menu">

						<?php 
								wp_nav_menu( 
									array(    	 
							  		  'container'       => '',
									  'container_class' => false,
									  'container_id'    => false,
									  'menu_class'      => false,
									  'menu_id'         => false,
									  'theme_location' => 'header-menu' ) 
								);
					  			
					  			dynamic_sidebar('footer_widget'); 
					  	?>

				</nav>
			</div>
		</header>

<?php

  	$current_page = $post->post_name;
  	// var_dump($current_page);

  	if ($current_page == 'posts' || $current_page == 'relatos'):  // Categories 

        $args_term = array(
          'orderby'           => 'date', 
          'order'             => 'DESC'
        ); 

        $terms = get_terms('category', $args_term);
?>				

<div class="categories">
	<nav class="navbar navbar-inverse categories">
	
	  <div class="navbar-header">
	    <a data-toggle="collapse" data-target=".navbar-collapse" href="#">Categories<span class="caret"></span></a>
	   </div>
	
	  <div class="navbar-collapse collapse">
	   
	    <ul class="nav navbar-nav">
	     
	      <?php foreach ($terms as $key):  ?>

	    	  <li><a href="#" class="ajax_token" data-toggle="collapse" data-target=".navbar-collapse" data-token="<?php  echo $key->slug; ?>"><?php  echo $key->name; ?></a></li>

	      <?php endforeach; ?>

	      	  <li class="too"><a href="#" class="ajax_token" data-toggle="collapse" data-target=".navbar-collapse" data-token="">All</a></li>

	    </ul>


	  </div>

	</nav>
</div>

<?php endif; ?>
		
