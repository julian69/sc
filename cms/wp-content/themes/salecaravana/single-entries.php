<?php 
	get_header();
?>

<main class="single-entries-template">

<?php

	$post = str_replace('post_', '', $_POST['post_var']);
	$args = array(
		  'name'        => $post,
		  'post_type'   => 'entries',
		  'post_status' => 'publish',
		  'numberposts' => 1
	);

	$entries = new WP_Query($args);

		if ( $entries->have_posts() ) : 
				while ( $entries->have_posts() ) : $entries->the_post();

					echo the_title();
					echo get_field('subtitle');
					echo get_field('content');
					echo get_field('date');
					$heading_url = wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) );
					echo $heading_url;

					foreach (get_field('images') as $key) {

						echo $key['image']['sizes']['slideshow_home'];
						echo $key['caption'];
					}

        		endwhile; 
		endif; 
?>
</main>

<?php 
	get_footer();
?>