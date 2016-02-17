<?php

	if(function_exists("register_field_group"))
	{
		register_field_group(array (
			'id' => 'acf_frontpage',
			'title' => 'FrontPage',
			'fields' => array (
				array (
					'key' => 'field_55538b50a6fc2',
					'label' => 'Box 1-1',
					'name' => 'box-1-1',
					'type' => 'wysiwyg',
					'default_value' => '',
					'toolbar' => 'full',
					'media_upload' => 'yes',
				),
				array (
					'key' => 'field_55538c55a6fc7',
					'label' => 'Box 1-2',
					'name' => 'box-1-2',
					'type' => 'wysiwyg',
					'default_value' => '',
					'toolbar' => 'full',
					'media_upload' => 'yes',
				),
				array (
					'key' => 'field_55538c54a6fc6',
					'label' => 'Box 1-3',
					'name' => 'box-1-3',
					'type' => 'wysiwyg',
					'default_value' => '',
					'toolbar' => 'full',
					'media_upload' => 'yes',
				),
				array (
					'key' => 'field_55538c53a6fc5',
					'label' => 'Box 2-1',
					'name' => 'box-2-1',
					'type' => 'wysiwyg',
					'default_value' => '',
					'toolbar' => 'full',
					'media_upload' => 'yes',
				),
				array (
					'key' => 'field_55538c52a6fc4',
					'label' => 'Box 2-2',
					'name' => 'box-2-2',
					'type' => 'wysiwyg',
					'default_value' => '',
					'toolbar' => 'full',
					'media_upload' => 'yes',
				),
				array (
					'key' => 'field_55538c51a6fc3',
					'label' => 'Box 2-3',
					'name' => 'box-2-3',
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
						'value' => '53',
						'order_no' => 0,
						'group_no' => 0,
					),
				),
			),
			'options' => array (
				'position' => 'normal',
				'layout' => 'no_box',
				'hide_on_screen' => array (
				),
			),
			'menu_order' => 0,
		));
	}


?>