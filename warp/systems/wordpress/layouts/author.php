
      <h1 style="display: none;"><?php _e('Author Archive', 'warp'); ?></h1> 

<?php the_post(); ?>

<?php if (get_the_author_meta('description')) : ?>
<div class="uk-panel uk-panel-box uk-margin mrt-autor-box">

    <div class="uk-align-medium-left">

          
          <?php 
          
            $author_id = get_the_author_meta('ID');
            $author_avatar = get_field('wk_profile_avatar', 'user_'. $author_id );
            $author_avatar_thumbnail = $author_avatar[sizes][thumbnail];
            $default_avatar = 'http://codecase.work/marte/p3/wp-content/themes/warp_p3/images/default-avatar.png';
          
          ?>
          
          <img class="avatar photo" src="<?php if( $author_avatar ) : echo $author_avatar_thumbnail; else : echo $default_avatar; endif; ?>">

        <?php //echo get_avatar(get_the_author_meta('user_email')); ?>
          
    </div>

      <h2 class="uk-h3 uk-margin-top-remove condensed color"><?php the_author(); ?></h2>
      
      <hr class="border">

    <div class="uk-margin"><?php the_author_meta('description'); ?></div>

</div>
<?php endif; ?>

<?php rewind_posts(); ?>
<?php if (have_posts()) : ?>
      
      <h3 class="condensed strong remate">Artículos escritos</h3>

    <?php echo $this->render('_posts'); ?>

    <?php echo $this->render("_pagination", array("type"=>"posts")); ?></p>

<?php endif; ?>

