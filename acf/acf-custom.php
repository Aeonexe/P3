<?php
/*
*
*  Contiene los campos personalizados añadidos como default en WPKit
*
* @package WPKit
* @author ALUMIN
* @version WPKIT 2.0
*/

/************************************************************************************************************************
* Fecha de cumpleaños en Perfíl de usuario
************************************************************************************************************************/

     if( function_exists('acf_add_local_field_group') ):

            acf_add_local_field_group(array (
                  'key' => 'group_56b0f53407dff',
                  'title' => 'Fecha de cumpleaños',
                  'fields' => array (
                        array (
                              'key' => 'field_56b0f5567bd8d',
                              'label' => 'Fecha de cumpleaños',
                              'name' => 'birthdate_user', // Para get_field
                              'type' => 'date_picker',
                              //'instructions' => '',
                              'required' => 0,
                              'conditional_logic' => 0,
                              'wrapper' => array (
                                    'width' => '',
                                    'class' => '',
                                    'id' => '',
                              ),
                              'display_format' => 'F j, Y',
                              'return_format' => 'd/m/Y',
                              'first_day' => 1,
                        ),
                  ),
                  'location' => array (
                        array (
                              array (
                                    'param' => 'user_role',
                                    'operator' => '==',
                                    'value' => 'all',
                              ),
                        ),
                  ),
                  'menu_order' => 0,
                  'position' => 'normal',
                  'style' => 'default',
                  'label_placement' => 'top',
                  'instruction_placement' => 'label',
                  'hide_on_screen' => '',
                  'active' => 1,
                  'description' => '',
            ));

      endif;

/************************************************************************************************************************
* Custom avatar - Requiere ACF's */

	if( function_exists('acf_add_local_field_group') ):

		acf_add_local_field_group(array (
			'key' => 'group_573ca04d05be7',
			'title' => 'Avatar',
			'fields' => array (
				array (
					'key' => 'field_573ca05159d41',
					'label' => 'Avatar',
					'name' => 'custom_avatar',
					'type' => 'image',
					'instructions' => 'Si no asignas una imagen de perfíl se utilizará Gravatar del email que registraste.',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => 'custom_avatar',
						'id' => '',
					),
					'return_format' => 'array',
					'preview_size' => 'thumbnail',
					'library' => 'all',
					'min_width' => '',
					'min_height' => '',
					'min_size' => '',
					'max_width' => '',
					'max_height' => '',
					'max_size' => '',
					'mime_types' => '',
				),
			),
			'location' => array (
				array (
					array (
						'param' => 'user_role',
						'operator' => '==',
						'value' => 'all',
					),
					array (
						'param' => 'user_form',
						'operator' => '!=',
						'value' => 'register',
					),
				),
			),
			'menu_order' => 0,
			'position' => 'normal',
			'style' => 'default',
			'label_placement' => 'top',
			'instruction_placement' => 'field',
			'hide_on_screen' => '',
			'active' => 1,
			'description' => '',
		));

	endif;

	/* Retreive

		$user_ID = get_current_user_id();
		$user_ID_composed = 'user_' . $user_ID;
		$avatar_field = get_field('custom_avatar', $user_ID_composed );

		echo $avatar_field['sizes'][ 'thumbnail' ];

		info: https://www.advancedcustomfields.com/resources/how-to-get-values-from-a-user/

	*/
