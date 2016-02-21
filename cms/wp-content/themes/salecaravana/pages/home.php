<?php
/*
    Template Name: 01- Home
*/

    get_header();
    // var_dump($fields); exit;
?>

<main class="index-template">

   <ul class="cb-slideshow" >
       
       <?php 
       		$i = 0;
       		foreach ($fields['slideshow_images'] as $key) :
       ?>
	       
	        <li>
	            <span style="background: transparent no-repeat center url(<?php echo $key['images']['sizes']['slideshow_home'];  ?>)"></span>

	            <?php if ($i == 0): ?>
		          
		            <div class="cd-caption wow fadeIn" data-wow-delay="1ms" data-wow-duration="1s">
		              
		               <h3><?php echo $fields['slideshow_text']; ?><br>
		                 <a href="<?php echo $fields['slideshow_button_link']; ?>" class="btn"><?php echo $fields['slideshow_button_value']; ?></a>
		               </h3>

		            </div>

		         <?php endif; ?>
	        </li>

		<?php
				$i++;
			 endforeach; 
		?>
   </ul>
   
   <div class="arrow wow bounceInDown" >
      <a href="#sroll-heading" class="anchor">
        <span class="bottom"></span>
      </a>
   </div>

   <div class="hero-content" id="scroll-hero"></div>

   <section class="index-heading" id="sroll-heading">
      <div class="container">
        <div class="row">
        
	        <div class="inner">
	           <h4 class="wow fadeInUp col-md-12" data-wow-duration=".5s" data-wow-offset="10"><?php echo $fields['headline']; ?></h4>
	              <img src="<?php echo bloginfo('template_url'); ?>/assets/images/logo_solo.png" alt="..." class="wow fadeInUp img-responsive" data-wow-duration=".5s" data-wow-offset="50"> 
	        </div>

        </div>
      </div>
   </section>

   <section class="main-posts">
          <div class="row">
			
			<?php

				// Posts Types
				$args_events = array(
					"post_type"	=> "entries",
					'posts_per_page'   => 4,
					"order"     => "desc",
					'cat'	    => '-general'
				);

				$entries = new WP_Query($args_events);

				if ( $entries->have_posts() ) : 
						while ( $entries->have_posts() ) : $entries->the_post();

							$heading_url = wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) );
						
			?>
                <div class="col-sm-6 post" >
                      <div class="thumbnail">
                        
                        	<?php if( $heading_url ): ?>
                         		 <img src="<?php echo $heading_url; ?>" alt="Featured Image" class="wow fadeInUp" data-wow-duration=".5s" data-wow-offset="10">
                         	<?php endif; ?>
                
                          <div class="box-overlay">

                            <div class="box-caption">
                                 <h3><?php  echo the_title(); ?>
                               
                                      <p><?php echo date("dS F Y", strtotime(get_field('date'))); ?></p>
                                 </h3>
                                 <a href="<?php echo get_permalink(); ?>" class="btn">LEER MAS</a>
                            </div>

                          </div>

                       </div>
                </div>
            <?php
            		endwhile; 
				endif; 
            ?>
          </div>
   </section>

   <section class="index-subsections">
      <div class="container">
        <div class="row">

        <?php foreach ($fields['redirections'] as $key): ?>
         
            <div class="col-sxs-12 col-md-4">
             <a href="<?php echo $key['link']; ?>"><img src="<?php echo bloginfo('template_url'); ?>/assets/images/mundo.svg" alt=""></a> 
                <span class="col-md-12" ><?php echo $key['content']; ?></span>
            </div>

         <?php endforeach; ?>
            
        </div>
      </div>
   </section>
</main>

<?php
	get_footer(); 
?>