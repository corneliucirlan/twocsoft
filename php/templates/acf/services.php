<?php

	if(function_exists("register_field_group"))
	{
		register_field_group(array (
			'id' => 'acf_services',
			'title' => 'Services',
			'fields' => array (
				array (
					'key' => 'field_55539ed74fd9a',
					'label' => 'Box-1-1',
					'name' => 'box-1-1',
					'type' => 'wysiwyg',
					'default_value' => '',
					'toolbar' => 'full',
					'media_upload' => 'yes',
				),
				array (
					'key' => 'field_55539ef14fd9f',
					'label' => 'Box-1-2',
					'name' => 'box-1-2',
					'type' => 'wysiwyg',
					'default_value' => '',
					'toolbar' => 'full',
					'media_upload' => 'yes',
				),
				array (
					'key' => 'field_55539ef04fd9e',
					'label' => 'Box-2-1',
					'name' => 'box-2-1',
					'type' => 'wysiwyg',
					'default_value' => '',
					'toolbar' => 'full',
					'media_upload' => 'yes',
				),
				array (
					'key' => 'field_55539ef04fd9d',
					'label' => 'Box-2-2',
					'name' => 'box-2-2',
					'type' => 'wysiwyg',
					'default_value' => '',
					'toolbar' => 'full',
					'media_upload' => 'yes',
				),
				array (
					'key' => 'field_55539eef4fd9c',
					'label' => 'Box-3-1',
					'name' => 'box-3-1',
					'type' => 'wysiwyg',
					'default_value' => '',
					'toolbar' => 'full',
					'media_upload' => 'yes',
				),
				array (
					'key' => 'field_55539eed4fd9b',
					'label' => 'Box-3-2',
					'name' => 'box-3-2',
					'type' => 'wysiwyg',
					'default_value' => '',
					'toolbar' => 'full',
					'media_upload' => 'yes',
				),
			),
			'location' => array (
				array (
					array (
						'param' => 'page',
						'operator' => '==',
						'value' => '149',
						'order_no' => 0,
						'group_no' => 0,
					),
				),
			),
			'options' => array (
				'position' => 'normal',
				'layout' => 'no_box',
				'hide_on_screen' => array (
					0 => 'the_content',
				),
			),
			'menu_order' => 0,
		));
	}

?>