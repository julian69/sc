<?php
/*
    Template Name: 01- Home
*/
    get_header();
?>
<main class="index-template">

<?php

    // $post = str_replace('post_', '', $_POST['post_var']);
	$args = array(
		  'name'        => $post->post_name,
		  'post_type'   => 'entries',
		  'post_status' => 'publish',
		  'numberposts' => 1
	);

	$entries = new WP_Query($args);

	if ( $entries->have_posts() ) : 
		while ( $entries->have_posts() ) : $entries->the_post();

		// $heading_url = wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) );
		$heading_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'slideshow_home' );
				
		if ($heading_url[0]):
?>	
			<div class="post-featured-image">
				<span style="background: transparent no-repeat center url(<?php echo $heading_url[0];  ?>)"></span>

				<div class="caption wow fadeIn" data-wow-delay="1ms" data-wow-duration="1s">
		              
	                <h3>
	               		<?php echo get_field('title'); ?>
	               		<small><?php echo get_field('subtitle'); ?></small>
	               	 </h3>

				</div>
	        </div>

		<?php endif; ?>
		

		<div class="hero-content" id="scroll-hero"></div>

		<section class="text-content">
	      <div class="container">
	        <div class="row">
	        
		        <div class="inner">
		            <!-- <small><?php  //echo get_field('date'); ?></small>  -->
		        	<p><?php echo get_field('content'); ?></p>
		        </div>

	        </div>
	      </div>
	    </section>

	    <section class="pics">
	    	<div class="container">
	        	<div class="row">

					<?php foreach (get_field('images') as $key): ?>
						
						<figure>
							<img src="<?php echo $key['image']['sizes']['slideshow_home']; ?>" alt="Post images" class="img-responsive">
							<figcaption><?php echo $key['caption']; ?></figcaption>
						</figure>

					<?php endforeach; ?>
				
				</div>
			</div>
		</section>

		<?php
			endwhile; 
	    endif; 
		?>

</main>

<?php
	get_footer(); 
?>