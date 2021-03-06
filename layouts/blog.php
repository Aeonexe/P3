<?php
/**
* @package   Master
* @author    YOOtheme http://www.yootheme.com
* @copyright Copyright (C) YOOtheme GmbH
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

// get theme configuration
include($this['path']->path('layouts:theme.config.php'));

?>
<!DOCTYPE HTML>
<html lang="<?php echo $this['config']->get('language'); ?>" dir="<?php echo $this['config']->get('direction'); ?>"  data-config='<?php echo $this['config']->get('body_config','{}'); ?>'>

<head>
<?php echo $this['template']->render('head'); ?>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">

<link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,700" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Oswald:300,400,700" rel="stylesheet">
<link type="text/css" rel="stylesheet" media="screen and (max-width:756px)" href="<?php echo get_template_directory_uri(); ?>/css/mobile.css">
    
    <style>
        .tm-content, .tm-content-container, #tm-main-bottom {
        padding: 0 !important;
        margin: 0;
        }
    </style>

</head>

<body class="<?php echo $this['config']->get('body_classes'); ?>">


	<?php if( get_field( 'mrt_option_tag_manager', 'option' ) ) : the_field( 'mrt_tag_manager_body', 'option' ); endif; ?> 

	<?php if( wp_is_mobile() or is_user_logged_in() ) : ?>

		<?php if( get_field( 'mrt_show_phone_button', 'option' ) ) : ?>
			<a id="movil-phone" href="tel:<?php the_field( 'mrt_telefono_de_contacto_movil', 'option' ); ?>"><span><i class="fa fa-phone"></i></span></a>
		<?php endif; ?>

	<?php endif; ?>

	<div class="uk-container uk-container-center">

		<?php if ($this['widgets']->count('toolbar-l + toolbar-r')) : ?>
		<div class="tm-toolbar uk-clearfix uk-hidden-small">

			<?php if ($this['widgets']->count('toolbar-l')) : ?>
			<div class="uk-float-left"><?php echo $this['widgets']->render('toolbar-l'); ?></div>
			<?php endif; ?>

			<?php if ($this['widgets']->count('toolbar-r')) : ?>
			<div class="uk-float-right"><?php echo $this['widgets']->render('toolbar-r'); ?></div>
			<?php endif; ?>

		</div>
		<?php endif; ?>

		<?php if ($this['widgets']->count('logo + headerbar')) : ?>
		<div class="tm-headerbar uk-clearfix uk-hidden-small">

			<?php if ($this['widgets']->count('logo')) : ?>
			<a class="tm-logo" href="<?php echo $this['config']->get('site_url'); ?>"><?php echo $this['widgets']->render('logo'); ?></a>
			<?php endif; ?>

			<?php echo $this['widgets']->render('headerbar'); ?>

		</div>
		<?php endif; ?>

		<?php if ($this['widgets']->count('menu + search')) : ?>
		<nav class="tm-navbar uk-navbar">

			<?php if ($this['widgets']->count('menu')) : ?>
			<?php echo $this['widgets']->render('menu'); ?>
			<?php endif; ?>

			<?php if ($this['widgets']->count('offcanvas')) : ?>
			<a href="#offcanvas" class="uk-navbar-toggle uk-visible-small" data-uk-offcanvas></a>
			<?php endif; ?>

			<?php if ($this['widgets']->count('search')) : ?>
			<div class="uk-navbar-flip">
				<div class="uk-navbar-content uk-hidden-small"><?php echo $this['widgets']->render('search'); ?></div>
			</div>
			<?php endif; ?>

			<?php if ($this['widgets']->count('logo-small')) : ?>
			<div class="uk-navbar-content uk-navbar-center uk-visible-small"><a class="tm-logo-small" href="<?php echo $this['config']->get('site_url'); ?>"><?php echo $this['widgets']->render('logo-small'); ?></a></div>
			<?php endif; ?>

		</nav>
		<?php endif; ?>

		<?php if ($this['widgets']->count('top-a')) : ?>
		<section id="tm-top-a" class="<?php echo $grid_classes['top-a']; echo $display_classes['top-a']; ?>" data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin><?php echo $this['widgets']->render('top-a', array('layout'=>$this['config']->get('grid.top-a.layout'))); ?></section>
		<?php endif; ?>

		<?php if ($this['widgets']->count('top-b')) : ?>
		<section id="tm-top-b" class="<?php echo $grid_classes['top-b']; echo $display_classes['top-b']; ?>" data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin><?php echo $this['widgets']->render('top-b', array('layout'=>$this['config']->get('grid.top-b.layout'))); ?></section>
		<?php endif; ?>

		<?php if ($this['widgets']->count('main-top + main-bottom + sidebar-a + sidebar-b') || $this['config']->get('system_output', true)) : ?>
		<div id="tm-middle" class="tm-middle uk-grid" data-uk-grid-match data-uk-grid-margin>

			<?php if ($this['widgets']->count('main-top + main-bottom') || $this['config']->get('system_output', true)) : ?>
			<div class="<?php echo $columns['main']['class'] ?>">

				<?php if ($this['widgets']->count('main-top')) : ?>
				<section id="tm-main-top" class="<?php echo $grid_classes['main-top']; echo $display_classes['main-top']; ?>" data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin><?php echo $this['widgets']->render('main-top', array('layout'=>$this['config']->get('grid.main-top.layout'))); ?></section>
				<?php endif; ?>

				<?php if ($this['config']->get('system_output', true)) : ?>
				<main id="tm-content" class="tm-content">

					<?php if ($this['widgets']->count('breadcrumbs')) : ?>
					<?php echo $this['widgets']->render('breadcrumbs'); ?>
					<?php endif; ?>

					<style>
						
						article {
						    width: 33.33%;
						    box-sizing: border-box;
						    padding: 12px;
						    margin: 0 !important;
						}

						.tm-content-container {
						    margin: 50px auto 0;
						}

						@media ( max-width: 768px ) {
							article {
								width: 100%;
							}
						}

					</style>

					<div class="tm-content-container uk-grid blog-grid wk-flex-item wk-flex-wrap wk-m-flex-column">
						
						<?php //echo $this['template']->render('content'); 
						
							$wp_query = new WP_Query( 'post_type=post&posts_per_page=-1&cat=-31' );

							if( $wp_query->have_posts() ) : while( $wp_query->have_posts() ) : $wp_query->the_post(); ?>


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

							<?php endwhile; endif;?>

					<?php echo $this->render("_pagination", array("type"=>"posts")); ?>
					</div>


				<?php endif; ?>

				<?php if ($this['widgets']->count('main-bottom')) : ?>
				<section id="tm-main-bottom" class="<?php echo $grid_classes['main-bottom']; echo $display_classes['main-bottom']; ?>" data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin><?php echo $this['widgets']->render('main-bottom', array('layout'=>$this['config']->get('grid.main-bottom.layout'))); ?></section>
				<?php endif; ?>

			</div>
			<?php endif; ?>

            <?php foreach($columns as $name => &$column) : ?>
            <?php if ($name != 'main' && $this['widgets']->count($name)) : ?>
            <aside class="<?php echo $column['class'] ?>"><?php echo $this['widgets']->render($name) ?></aside>
            <?php endif ?>
            <?php endforeach ?>

		</div>
		<?php endif; ?>

		<?php if ($this['widgets']->count('bottom-a')) : ?>
		<section id="tm-bottom-a" class="<?php echo $grid_classes['bottom-a']; echo $display_classes['bottom-a']; ?>" data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin><?php echo $this['widgets']->render('bottom-a', array('layout'=>$this['config']->get('grid.bottom-a.layout'))); ?></section>
		<?php endif; ?>

		<?php if ($this['widgets']->count('bottom-b')) : ?>
		<section id="tm-bottom-b" class="<?php echo $grid_classes['bottom-b']; echo $display_classes['bottom-b']; ?>" data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin><?php echo $this['widgets']->render('bottom-b', array('layout'=>$this['config']->get('grid.bottom-b.layout'))); ?></section>
		<?php endif; ?>

		<?php if ($this['widgets']->count('footer + debug') || $this['config']->get('warp_branding', true) || $this['config']->get('totop_scroller', true)) : ?>
		<footer id="tm-footer" class="tm-footer">

			<?php if ($this['config']->get('totop_scroller', true)) : ?>
			<a class="tm-totop-scroller" data-uk-smooth-scroll href="#"></a>
			<?php endif; ?>

			<?php
				echo $this['widgets']->render('footer');
				$this->output('warp_branding');
				echo $this['widgets']->render('debug');
			?>

		</footer>
		<?php endif; ?>

	</div>

	<?php echo $this->render('footer'); ?>

	<?php if ($this['widgets']->count('offcanvas')) : ?>
	<div id="offcanvas" class="uk-offcanvas">
		<div class="uk-offcanvas-bar"><?php echo $this['widgets']->render('offcanvas'); ?></div>
	</div>
	<?php endif; ?>

</body>
</html>