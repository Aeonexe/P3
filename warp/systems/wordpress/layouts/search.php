<div class="tm-content-container mrt-blog-feed">
    
    <div class="uk-grid">
        
        <div class="uk-width-medium-1-1 uk-row-first">

            <?php if (have_posts()) : ?>

                <h1 style="padding: 0 12px;" class="uk-h3"><?php _e('Resultados de búsqueda para: ', 'warp'); ?> &#8216;<?php echo stripslashes(strip_tags(get_search_query()));?>&#8217;</h1>

                <form style="margin: 30px 0; padding: 0 12px" id="searchform" class="search" method="get" action="<?php bloginfo('home'); ?>/">

                    <input style="max-width: initial;" required class="tr-ease" type="text" size="80%" name="s" placeholder="<?php _e('Sigue buscando'); ?>" onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;"/>

                   <!-- <button type="submit" value="" class="button fa fa-search" /></button>-->

                </form>

                <?php
                    // loop result
                    while (have_posts()) {
                        the_post();

                        ?>
                            <article id="item-<?php the_ID(); ?>" class="uk-article" data-permalink="<?php the_permalink(); ?>">

                                <?php if (has_post_thumbnail()) : ?>
                                    <a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail('thumbnail'); ?></a>
                                <?php endif; ?>

                                <h1 style="font-size: 16px; font-weight: 400;" class="uk-article-title condensed"><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>

                                <p class="uk-article-meta">
                                    <?php
                                        $date = '<time datetime="'.get_the_date('Y-m-d').'">'.get_the_date().'</time>';
                                        //printf(__('Escrito por %s en %s. %s', 'warp'), '<a href="'.get_author_posts_url(get_the_author_meta('ID')).'" title="'.get_the_author().'">'.get_the_author().'</a>', $date, get_the_category_list(', ')); //hrtzt
                                        echo $date;
                                    ?>
                                </p>

                                <!--<p class="excerpt"><?php echo get_excerpt(); ?></p> -->

                                <ul class="uk-subnav uk-subnav-line">
                                    <li><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php _e('Leer más', 'warp'); ?></a></li>
                                    <li style="background: #fff;"><span class="fa fa-heart" style="color: gray; font-size: 20px;"></span></li>
                                    <?php //if(comments_open() || get_comments_number()) : ?>
                                       <!--  <li><?php //comments_popup_link(__('No Comments', 'warp'), __('1 Comment', 'warp'), __('% Comments', 'warp'), "", ""); ?></li> -->
                                    <?php //endif; ?>
                                </ul>

                                <?php edit_post_link(__('Edit this post.', 'warp'), '<p><i class="uk-icon-pencil"></i> ','</p>'); ?>

                            </article>
                        <?php
                    }
                ?>

            <?php echo $this->render("_pagination", array("type"=>"posts")); ?></p>

            <?php else : ?>

                <h1 style="font-size: 18px;	line-height: 1.5;	font-weight: 400;text-align: center;"><?php _e('No encontramos artículos con esa descripción, intenta de nuevo.', 'warp'); ?></h1>
                <?php get_search_form(); ?>

            <?php endif; ?>
        
        </div>
    
    </div>

</div>