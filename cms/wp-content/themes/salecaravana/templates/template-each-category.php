  <div class='loader'><img class="pulse" src="<?php echo bloginfo('template_url'); ?>/assets/images/3.gif" alt="Sale Caravana Logo"></div>

   <section class="main-posts">
          <div class="row">
			
			<?php
        
				// Posts Types
				$args = array(
					"post_type"	=> "entries",
					'category_name' =>  $_POST['post_var'],
					"order"     => "desc",
					'cat'	    => '-general'
				);

				$entries = new WP_Query($args);

				if ( $entries->have_posts() ) : 
						while ( $entries->have_posts() ) : $entries->the_post();

							// $heading_url = wp_get_attachment_url( get_post_thumbnail_id( $post->ID ), 'entries_list' );
              $heading_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'entries_list' );

						
			?>
                <div class="col-xs-12 col-sm-6 col-md-4 post" >
                      <div class="thumbnail">
                        
                        	<?php if( $heading_url[0] ): ?>
                         		 <img src="<?php echo $heading_url[0]; ?>" alt="Featured Image" class="wow fadeInUp" data-wow-duration=".5s" data-wow-offset="10">
                         	<?php endif; ?>
                
                          <div class="box-overlay">

                            <div class="box-caption">
                                 <h3><?php  echo the_title(); ?>
                               
                                      <p><?php echo date("dS F Y", strtotime(get_field('date'))); ?></p>
                                 </h3>
                                 <a href="<?php echo get_permalink(); ?>" class="btn">LEER MAS</a>
                                 <!-- <a href="#" class="btn ajax_token" data-token="<?php// echo 'post_'.$post->post_name; ?>">
                                    VIEW MORE
                                </a> -->
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
