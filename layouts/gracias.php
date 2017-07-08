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

    <style>
          #tm-middle {
             padding-top: 0;
            }
    </style>

</head>

<body class="<?php echo $this['config']->get('body_classes'); ?>">

	<?php if( get_field( 'mrt_option_tag_manager', 'option' ) ) : the_field( 'mrt_tag_manager_body', 'option' ); endif; ?>

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
		<!-- <div class="tm-headerbar uk-clearfix uk-hidden-small">

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

		</nav> -->
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

					<?php //echo $this['template']->render('content'); ?>

					<div class="tm-content-container-full wk-wrap-900">

                                    <style>

                                    #p3_landing_content {
                                    min-height: 40vh;
                                    }

                                    #p3_landing_form{
                                    min-height: 60vh;
                                    }


                                          #p3_landing_form {
                                          background-color: #ff6700;
                                          color: #fff;
                                          padding: 60px 5vw;
                                          }

                                          #p3_landing_content {
                                                <?php if( get_field( 'wk_landing_background' ) ) : ?>

                                                      background-image: url(<?php the_field('wk_landing_background'); ?> );

                                                <?php else : ?>

                                                      background-image: url(<?php echo get_template_directory_uri(); ?>/images/landing_back.jpg);

                                                <?php endif; ?>
                                              background-size: cover;
                                              background-position: center;
                                          }

                                                #p3_landing_text {
                                                padding: 50px 4vw;
                                                font-size: 22px;
                                                line-height: 1.5;
                                                }

                                          #p3_landing_form input, #p3_landing_form select {
                                          background-color: white !important;
                                          border-radius: 6px !important;
                                          }

                                                #p3_landing_form button[type="submit"] {
                                                background-color: #1cbbb4 !important;
                                                color: #fff !important;
                                                border: 0 !important;
                                                box-shadow: none;
                                                min-width: 200px;
                                                margin: auto;
                                                display: block;
                                                }

                                                #p3_landing_form .frm_primary_label {
                                                display: none;
                                                }

                                                #p3_landing_form .frm_form_field {
                                                margin: 0px !important;
                                                }


                                                #p3_landing_form [type="submit"] {
                                                    margin-top: 22px !important;
                                                }


                                    </style>

                                    <?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>


                                          <div id="p3_landing_content" class="wk-section wk-flex-item wk-flex-align-end">

                                                <div class="wk-section-wrap wk-cols">

                                                      <div id="p3_landing_text" class="wk-col wk-m-text-center wk-flex-item wk-flex-align-center">

                                                            <?php the_field( 'wk_content' ); ?>

                                                      </div>

                                                      <div class="wk-col wk-flex-item wk-flex-align-center">

                                                            <?php if( get_field( 'wk_image' ) ) : ?>
                                                                  <img src="<?php $image = get_field( 'wk_image' ); echo $image[url]; ?>">
                                                            <?php endif; ?>

                                                      </div>

                                                </div>


                                          </div>

                                          <div id="p3_landing_form" class="wk-section">

                                                <div class="wk-section-wrap wk-cols">

                                                      <div class="wk-col">

                                                            <p class="wk-text-center">Gracias, en breve nos pondremos en contacto</p>

                                                            <?php if( get_field( 'wk_form_shortcode' ) ) : ?>

                                                                  <?php the_field( 'wk_form_shortcode' ); ?>

                                                            <?php else : ?>



                                                            <?php endif; ?>


                                                      </div>

                                                      <div class="wk-col wk-flex-item wk-flex-align-end wk-d-flex-justify-end wk-m-flex-justify-center">

                                                            <a href="<?php bloginfo( 'url' ); ?>" target="_blank" class="wk-m-padding-t-50">

                                                                  <img width="200" src="<?php  bloginfo( 'url' ); ?>/wp-content/themes/warp_p3/images/logo.svg">

                                                            </a>

                                                      </div>

                                                </div>

                                          </div>

                                    <?php endwhile; endif; ?>


					</div>


				<?php endif; ?>

				<!-- <?php if ($this['widgets']->count('main-bottom')) : ?>
				<section id="tm-main-bottom" class="<?php echo $grid_classes['main-bottom']; echo $display_classes['main-bottom']; ?>" data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin><?php echo $this['widgets']->render('main-bottom', array('layout'=>$this['config']->get('grid.main-bottom.layout'))); ?></section>
				<?php endif; ?> -->

			</div>
			<?php endif; ?>

            <?php foreach($columns as $name => &$column) : ?>
            <?php if ($name != 'main' && $this['widgets']->count($name)) : ?>
            <aside class="<?php echo $column['class'] ?>"><?php echo $this['widgets']->render($name) ?></aside>
            <?php endif ?>
            <?php endforeach ?>

		</div>
		<?php endif; ?>

		<!-- <?php if ($this['widgets']->count('bottom-a')) : ?>
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
		<?php endif; ?> -->

	</div>

	<?php echo $this->render('footer'); ?>

	<?php if ($this['widgets']->count('offcanvas')) : ?>
	<div id="offcanvas" class="uk-offcanvas">
		<div class="uk-offcanvas-bar"><?php echo $this['widgets']->render('offcanvas'); ?></div>
	</div>
	<?php endif; ?>

</body>
</html>
