
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

							$heading_url = wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) );
						
			?>
                <div class="col-sm-4 col-md-4 post" >
                      <div class="thumbnail">
                        
                        	<?php if( $heading_url ): ?>
                         		 <img src="<?php echo $heading_url; ?>" alt="Featured Image" class="wow fadeInUp" data-wow-duration=".5s" data-wow-offset="10">
                         	<?php endif; ?>
                
                          <div class="box-overlay">

                            <div class="box-caption">
                                 <h3><?php  echo the_title(); ?>
                               
                                      <p><?php echo date("dS F Y", strtotime(get_field('date'))); ?></p>
                                 </h3>
                                 <a href="#" class="btn ajax_token" data-token="<?php echo 'post_'.$post->post_name; ?>">
                                    VIEW MORE
                                </a>
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
