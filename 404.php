<style>
html {
	background-image: url( <?php echo get_template_directory_uri(); ?>/images/404-bg.png ) !important;
}


 	.button {
 		-webkit-appearance: none;
 		margin: 0;
 		border: none;
 		overflow: visible;
 		font: inherit;
 		color: #444444;
 		text-transform: none;
 		display: inline-block;
 		box-sizing: border-box;
 		padding: 0 22px;
 		background: #eeeeee;
 		vertical-align: middle;
 		line-height: 30px;
 		min-height: 30px;
 		font-size: 1rem;
 		text-decoration: none;
 		text-align: center;

		min-height: 40px;
		padding: 0 32px;
		line-height: 40px;
		font-size: 16px;
		background-color: #1cbbb4;

		background-color: #1cbbb4;
		color:white;

		text-transform: uppercase;
		font-family: 'Open Sans', sans-serif;

 		display: inline-block;
 		margin: auto;
 		width: 170px;
 		margin-top: 80px;
 		font-weight: 900;
 	}

 	span {
 		position: absolute;
 		top: 0;
 		left: 0;
 		bottom: 0;
 		right: 0;
 		display: inline-block;
 		width: 50%;
 		height: 50%;
 		margin: auto;
 		text-align: center;
 	}

 	img {
 		width: 100%;
 	}


</style>

<?php
/**
* @package   Master
* @author    YOOtheme http://www.yootheme.com
* @copyright Copyright (C) YOOtheme GmbH
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

// get warp
$warp = require(__DIR__.'/warp.php');

// render error layout
//echo $warp['template']->render('error', array('title' => __('Page not found', 'warp'), 'error' => '404', 'message' => sprintf(__('404_page_message', 'warp'), $warp['system']->url, $warp['config']->get('site_name'))));


?>

<span ="container">

	<img src="<?php echo get_template_directory_uri() ?>/images/404-error.png">

	<a class="button" href="<?php bloginfo('url'); ?>">Ir a Inicio</a>

</span>