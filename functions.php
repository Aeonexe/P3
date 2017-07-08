<?php
/**
* @package   Master
* @author    YOOtheme http://www.yootheme.com
* @copyright Copyright (C) YOOtheme GmbH
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

// check compatibility
if (version_compare(PHP_VERSION, '5.3', '>=')) {

    // bootstrap warp
    require(__DIR__.'/warp.php');
}


/************************************************************************************************************************
* ACF */

		// 1. customize ACF path
		add_filter('acf/settings/path', 'acf_settings_path');

		function acf_settings_path( $path ) {

			// update path
			$path = get_stylesheet_directory() . '/acf/';

			// return
			return $path;

		}

		// 2. customize ACF dir
		add_filter('acf/settings/dir', 'acf_settings_dir');

		function acf_settings_dir( $dir ) {

			// update path
			$dir = get_stylesheet_directory_uri() . '/acf/';

			// return
			return $dir;

		}
		include_once( get_stylesheet_directory() . '/acf/acf.php' );

		$user_id = get_current_user_id();
		if ($user_id != 1) {
		    add_filter('acf/settings/show_admin', '__return_false');
		}

		//add_filter('acf/settings/show_admin', '__return_false');

		/***************************************************************************
		* Página de opciones Advanced Custom fields */

			if( function_exists('acf_add_options_page') ) :

				acf_add_options_page(array(
					'page_title' 	=> 'Opciones',
					'menu_title'	=> 'Opciones',
					'menu_slug' 	=> 'opciones-de-panel',
					'capability'	=> 'edit_posts',
					'redirect'		=> false,
					'icon_url'		=> 'dashicons-marker',
				));

				acf_add_options_sub_page(array(
					'page_title' 	=> 'Informaciónd e la empresa',
					'menu_title'	=> 'Información de la empresa',
					'parent_slug'	=> 'options-general.php',
					'capability'	=> 'edit_posts',
				));

				// acf_add_options_sub_page(array(
				// 	'page_title' 	=> 'Opciones acf',
				// 	'menu_title'	=> 'Opciones acf',
				// 	'parent_slug'	=> 'options-general.php',
				// ));

			endif;

/********************************************************************
wp head */

function wk_add_scripts() {
	wp_register_style( 'p3-style-flickity', get_stylesheet_directory_uri() . '/libraries/slick/slick.css' );
	wp_enqueue_style( 'p3-style-flickity' );

	wp_register_script( 'p3-script-flickity', get_stylesheet_directory_uri() . '/libraries/slick/slick.min.js' );
	wp_enqueue_script( 'p3-script-flickity' );
}

add_action( 'wp_enqueue_scripts', 'wk_add_scripts', 100 );

function wk_head() { ?>



<?php }

add_action( 'wp_head', 'wk_head' );

/********************************************************************
CPT */

// Custom Post Type - servicios
			function wk_cpt_servicios() {

				$labels = array(
					'name'                  => _x( 'Servicios', 'Post Type General Name', 'wpkit_text_domain' ),
					'singular_name'         => _x( 'Servicio', 'Post Type Singular Name', 'wpkit_text_domain' ),
					'menu_name'             => __( 'Servicios', 'wpkit_text_domain' ),
					'name_admin_bar'        => __( 'Servicios', 'wpkit_text_domain' ),
					'archives'              => __( 'Archivo', 'wpkit_text_domain' ),
					'parent_item_colon'     => __( 'Superior', 'wpkit_text_domain' ),
					'all_items'             => __( 'Servicios', 'wpkit_text_domain' ),
					'add_new_item'          => __( 'Añadir', 'wpkit_text_domain' ),
					'add_new'               => __( 'Nuevo', 'wpkit_text_domain' ),
					'new_item'              => __( 'Nuevo', 'wpkit_text_domain' ),
					'edit_item'             => __( 'Editar', 'wpkit_text_domain' ),
					'update_item'           => __( 'Actualizar', 'wpkit_text_domain' ),
					'view_item'             => __( 'Ver', 'wpkit_text_domain' ),
					'search_items'          => __( 'Buscar', 'wpkit_text_domain' ),
					'not_found'             => __( 'No se encontró', 'wpkit_text_domain' ),
					'not_found_in_trash'    => __( 'No se encontró en la papelera', 'wpkit_text_domain' ),
					'featured_image'        => __( 'Imagen destacada', 'wpkit_text_domain' ),
					'set_featured_image'    => __( 'Seleccionar como icono de servicio', 'wpkit_text_domain' ),
					'remove_featured_image' => __( 'Quitar icono se servicio', 'wpkit_text_domain' ),
					'use_featured_image'    => __( 'Usar como imagen de servicio', 'wpkit_text_domain' ),
					'insert_into_item'      => __( 'Insertar', 'wpkit_text_domain' ),
					'uploaded_to_this_item' => __( 'Adjuntas a esta publicación', 'wpkit_text_domain' ),
					'items_list'            => __( 'Listado de elementos', 'wpkit_text_domain' ),
					'items_list_navigation' => __( 'Navegación por items', 'wpkit_text_domain' ),
					'filter_items_list'     => __( 'Filtrar por item en el listado', 'wpkit_text_domain' ),
				);
				$rewrite = array(
					'slug'                  => 'servicios',
					'with_front'            => true,
					'pages'                 => true,
					'feeds'                 => true,
				);
				$capabilities = array(
					'edit_post'             => 'edit_post',
					'read_post'             => 'read_post',
					'delete_post'           => 'delete_post',
					'edit_posts'            => 'edit_posts',
					'edit_others_posts'     => 'edit_others_posts',
					'publish_posts'         => 'publish_posts',
					'read_private_posts'    => 'read_private_posts',
				);
				$args = array(
					'label'                 => __( 'Servicios', 'wpkit_text_domain' ),
					'description'           => __( 'Servicios de la empresa', 'wpkit_text_domain' ),
					'labels'                => $labels,
					'supports'              => array(
													'title',
													'editor',
													'excerpt',
													//'author',
													'thumbnail',
													//'comments',
													//'trackbacks',
													//'revisions',
													//'custom-fields',
													//'page-attributes',
													//'post-formats',
												),
					'taxonomies'            => array(
													// 'post_tag',
													// 'category'
												),
					'hierarchical'          => true,
					'public'                => true,
					'show_ui'               => true,
					'show_in_menu'          => true,
					'menu_position'         => 5,
					'menu_icon'             => 'dashicons-admin-post',
					'show_in_admin_bar'     => true,
					'show_in_nav_menus'     => true,
					'can_export'            => true,
					'has_archive'           => true,
					'exclude_from_search'   => false,
					'publicly_queryable'    => true,
					'rewrite'               => $rewrite,
					// 'capabilities'          => $capabilities,
				);
				register_post_type( 'servicios', $args );

			}
			add_action( 'init', 'wk_cpt_servicios', 0 );
		

		// Taxonomy - Tipo de servicio
				function wk_tax_producto() {

					$labels = array(
						'name'                       => _x( 'Categoría de servicios', 'Taxonomy General Name', 'wpkit-txt-domain' ),
						'singular_name'              => _x( 'Categoría de servicio', 'Taxonomy Singular Name', 'wpkit-txt-domain' ),
						'menu_name'                  => __( 'Categoria de servicio', 'wpkit-txt-domain' ),
						'all_items'                  => __( 'Todas las categorías de servicios', 'wpkit-txt-domain' ),
						'parent_item'                => __( 'Categoría superior', 'wpkit-txt-domain' ),
						'parent_item_colon'          => __( 'Categoría superior:', 'wpkit-txt-domain' ),
					);
					$args = array(
						'labels'                     => $labels,
						'hierarchical'               => true,
						'public'                     => true,
						'show_ui'                    => true,  // Show in admin menu and metabox
						'show_in_menu'				 => 'edit.php',  // Show in admin menu
						'show_admin_column'          => true,  // Show column in the posts list view
						'show_in_nav_menus'          => true,  // Show in the menu editor
						'show_tagcloud'              => false,
					);
					register_taxonomy( 'producto', array( 'servicios' ), $args );

				}
				add_action( 'init', 'wk_tax_producto', 0 );

/*******************************************************************************************************************
Añade scripts y styles */
	function wk_enqueue_scripts() {

		wp_register_style( 'wk-flickity-style', get_stylesheet_directory_uri() . '/libraries/flickity/flickity.css' );
		wp_enqueue_style( 'wk-flickity-style' );


		wp_register_script( 'wk-flickity-script', get_stylesheet_directory_uri() . '/libraries/flickity/flickity.pkgd.js' );
		wp_enqueue_script( 'wk-flickity-script' );

	}

	add_action( 'wp_enqueue_scripts', 'wk_enqueue_scripts' );

/**********************************************************************************************************************
Cosas en wp head */

	function wk_wp_head() { ?>

		
		<script>


		jQuery(function($) {

			$(window).load(function(){
				url=window.location.href 
				cursor=url.indexOf("#");
				if(cursor!=-1){
					url=url.substr(url.indexOf("#"), url.lenght);				
					$("a[href="+url+"]").click();
					$("body, html").animate({ scrollTop: $("a[href="+url+"]").offset().top }, 1000);
				}
				




			   $(".wk-tabs li a").click(function(e){

			   	e.preventDefault();
			   	url=window.location.href 
				cursor=url.indexOf("#");
				if(cursor!=-1){
				url=url.substr(0, url.indexOf("#"));	
				liga=$(this).attr("href");
				url=url+liga;
				window.location = url;
				}else{
					liga=$(this).attr("href");
					url=url+liga;
					window.location = url;
				}
				
				

			   	$("body, html").animate({ scrollTop: ($("#tm-content").offset().top - 60) +"px" }, 500);
			   });   
			});
				
			
			
							
			$(".button-flex-container a, .click-to-show").click(function(e){
				e.preventDefault();

					$("body, html").animate({ scrollTop: $("#tm-top-a").offset().top + $('#tm-top-a').outerHeight(true)}, 1000);
			});



 
			$("#frm_form_16_container .frm_submit input").click(function(e){
            e.preventDefault();

            tipo="";
            size="";
            desafios="";
            acciones="";

               tipo=$('#frm_field_92_container input:checked').val();
				size=$('#frm_field_91_container input:checked').val();
				desafios=$('#frm_field_93_container input:checked').attr("id");
				desafiosoption=$('#frm_field_93_container input:checked').val();
				switch (desafios) {
					case 'field_q2mau-0':
						desafios_r="Es necesario revisar los procesos, cargas de trabajo y los indicadores de desempeño."
						break;
					case 'field_q2mau-1':
						desafios_r="Se debe de observar el nivel de compromiso, el modelo de liderazgo y la cultura organizacional."
						break;
					case 'field_q2mau-2':
						desafios_r="Se debe analizar la generación y velocidad de ingreso, los niveles de productividad y los procesos."
						break;
					case 'field_q2mau-3':
						desafios_r="Se recomienda evaluar el nivel de compromiso, el modelo de gestión y la generación y velocidad de ingresos."
						break;
					case 'field_q2mau-4':
						desafios_r="Observar la actitud del personal, los usos y costumbres y el modelo de gestión de la organización."
						break;
					default:
						desafios_r="";
						break;
				}
				acciones=$('#frm_field_95_container input:checked').attr("id");
				accionesoption=$('#frm_field_93_container input:checked').val();
				switch (acciones) {
					case 'field_9jkyt-0':
						acciones_r="Y por eso te recomendamos implementar un modelo de gestión de cambio y/o revisar el actual."
						break;
					case 'field_9jkyt-1':
						acciones_r="Y por eso te recomendamos evaluar el modelo de gestión, los planes de desarrollo organizacional y el proceso de institucionalización."
						break;
					case 'field_9jkyt-2':
						acciones_r="Y por eso te recomendamos evaluar el nivel de compromiso y los apoyos de gestión de personal de los terceros."
						break;
					case 'field_9jkyt-3':
						acciones_r="Y por eso te recomendamos hacer un análisis de mercado, de los procesos, indicadores de desempeño y de la generación y velocidad de ingreso."
						break;
					default:
						acciones_r="";
						break;
				}
				name=$('#frm_field_88_container input').val();
				email=$('#frm_field_90_container input').val();
				telefono=$('#frm_field_96_container input').val();
				
				if(size!="" && tipo!="" && desafios!="" && acciones!="" && name!="" && email!="" && telefono!="" && desafios_r!="" && acciones_r!=""){

					$.ajax({
					 type: "POST", 
					 url: "formulario.php", 
					 dataType: "json", 
					 data: {name:name, email:email, telefono:telefono, tipo:tipo, size:size,  desafios_r:desafios_r, acciones_r:acciones_r, desafiosoption:desafiosoption,  accionesoption:accionesoption},
					 success: function (data) {
					 	if(data==1){
					 		
					 		datos="<div class='frm_forms with_frm_style frm_style_formidable-style' id='frm_form_13_container'><div class='frm_message'><p>Hemos recibido tus respuestas, pronto nos pondremos en contacto.</p></div></div>";
						 	$(".mrt-form-home-container").html(datos);
						 	$(".mrt-form-home-container").hide("fast");
						 	$(".button-flex-container, .widget_text").hide();

						 	setTimeout(function(){
						 		$(".mrt-form-home-container").show("slow");
						 		$("html, body").animate({ scrollTop: 600 }, "slow");
						 	},100);
						 	}else{
								alert("no se envió");
							}
					}		
					});

				}else{
					alert("completa los datos");
				}

    		});

		


				});
		</script>

	<?php }

	add_action( 'wp_head', 'wk_wp_head' );

/***********************************************************************************************************************
Update thumbnails */

	update_option('thumbnail_size_w', 414);
	update_option('thumbnail_size_h', 414);
	update_option('medium_size_w', 736);
	update_option('medium_size_h', 736);




