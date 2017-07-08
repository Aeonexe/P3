<section class="tab-content tab-content-top">						
    
    <ul class="wk-tabs clearfix" data-tabgroup="first-tab-group">

        <?php
        
            if( is_page( 'procesos' ) ) :
                $term = 'procesos';
            elseif( is_page( '105' ) ) :
                $term = 'personas';
            elseif( is_page( 'prioridades' ) ) :
                $term = 'prioridades';
            endif;
        
            $args = array(
                    'post_type' 		=> 'servicios',
                    'posts_per_page'     => -1,
                    'tax_query'			=> array(
                            array(
                                    'taxonomy'		=> 'producto',
                                    'field'			=> 'slug',
                                    'terms'			=> $term
                                ),
                        ),
                ); 

            $wp_querys = new WP_Query( $args ); 
        ?>

        <?php if( $wp_querys->have_posts() ) : $counter = 0; ?>

            <?php while( $wp_querys->have_posts() ) : $counter++; $wp_querys->the_post(); ?>

                <?php if( $counter == 1 ) : $active_class = 'active'; else : $active_class = '';  endif; ?>

                <li>
                    <a href="#tab-<?php the_ID(); ?>" class="<?php echo $active_class; ?>">
                        <h5 class="" style="margin: 0;  text-transform: uppercase; letter-spacing: -0.05em;"><strong><?php the_title(); ?></strong></h5> </a>
                </li>

            <?php endwhile; wp_reset_postdata(); ?>

        <?php endif; ?>

    </ul>

    <section id="first-tab-group" class="wk-tabgroup wk-tabgroup-a <?php echo $term; ?>">

        <?php

            $args = array(
                    'post_type' 		=> 'servicios',
                    'posts_per_page'     => -1,
                    'tax_query'			=> array(
                            array(
                                    'taxonomy'		=> 'producto',
                                    'field'			=> 'slug',
                                    'terms'			=> $term
                                ),
                        ),
                ); 

            $wp_query = new WP_Query( $args );

            if( $wp_query->have_posts() ) : $counter = 0; while( $wp_query->have_posts() ) : $counter++; $wp_query->the_post(); ?>

                <?php if( $counter == 1 ) : $active_class = 'active'; else : $active_class = '';  endif; ?>

                <div id="tab-<?php the_ID(); ?>" class="tab">
                    <?php if( is_user_logged_in() ) : ?><h4 class="" style="margin-bottom: 22px; text-transform: uppercase; letter-spacing: -0.05em;"><strong><?php the_title(); ?></strong></h4><?php endif; ?>
                    <?php the_content(); ?>					
                </div>

            <?php endwhile; wp_reset_postdata(); endif; ?>

    </section>

</section><!--.tab-content-->