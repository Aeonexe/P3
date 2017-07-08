<article id="item-<?php the_ID(); ?>" class="uk-article blog-article" data-permalink="<?php the_permalink(); ?>">

    <?php if (has_post_thumbnail()) : ?>
    <?php 
            $featured_img_id = get_post_thumbnail_id($post->id); 
                    
            $featured_img_large_attr = wp_get_attachment_image_src( $featured_img_id, 'large' );
            $featured_img_thumb_attr = wp_get_attachment_image_src( $featured_img_id, 'thumbnail' );
            $featured_img_alt = get_post_meta($featured_img_id, '_wp_attachment_image_alt', true);   

    ?>
        <a class="mrt-post-thumbnail"href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>" style="background-image: url(<?php echo $featured_img_thumb_attr[0]; ?>);"></a>
    <?php endif; ?>

    <h1 style="font-size: 16px; font-weight: 400;" class="uk-article-title condensed">
        <a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
        <span class="uk-article-meta">
            <?php
                $date = '<time datetime="'.get_the_date('Y-m-d').'">'.get_the_date().'</time>';
                //printf(__('Escrito por %s en %s. %s', 'warp'), '<a href="'.get_author_posts_url(get_the_author_meta('ID')).'" title="'.get_the_author().'">'.get_the_author().'</a>', $date, get_the_category_list(', ')); //hrtzt
                echo $date;
            ?>
        </span>
    </h1>


    <p class="excerpt"><?php echo wp_trim_words( get_the_excerpt(), 30, '...' ); ?>
</p> 

    <ul class="uk-subnav uk-subnav-line">
        <li><a class="" href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php _e('Leer más', 'warp'); ?></a></li>
        <li style="background: #fff; color: black;"><?php if( function_exists('dot_irecommendthis') ) dot_irecommendthis(); ?></li>
        <?php //if(comments_open() || get_comments_number()) : ?>
           <!--  <li><?php //comments_popup_link(__('No Comments', 'warp'), __('1 Comment', 'warp'), __('% Comments', 'warp'), "", ""); ?></li> -->
        <?php //endif; ?>
    </ul>

    <?php edit_post_link(__('Edit this post.', 'warp'), '<p><i class="uk-icon-pencil"></i> ','</p>'); ?>

</article>
