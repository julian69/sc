
  <?php 
        // Categories
      $args_term = array(
        
        'orderby'           => 'date', 
        'order'             => 'DESC'
      ); 

      $terms = get_terms('category', $args_term);
  ?>
  <section class="main-posts">
          <div class="row">
        
        <?php

            foreach ($terms as $term):
                $image_category = get_field('category_image',$term);
        ?>
               

                <div class="col-sm-4 col-md-4 post" >
                      <div class="thumbnail">
                        
                          <img src="<?php echo $image_category['sizes']['slideshow_home']; ?>" alt="Category Image" class="wow fadeInUp" data-wow-duration=".5s" data-wow-offset="10">
                
                          <div class="box-overlay">

                            <div class="box-caption">
                                 <h3><?php  echo $term->name; ?>
                               
                                      <p><?php //echo date("dS F Y", strtotime(get_field('date'))); ?></p>
                                 </h3>
                                  <a href="<?php echo get_permalink(); ?>" class="btn">LEER MAS</a>
                                 <!-- <a href="<?php// echo $term->slug; ?>" class="btn">LEER MAS</a> -->
                            </div>
                          </div>

                       </div>
                </div>

               <?php endforeach; ?>

          </div>
  </section>
