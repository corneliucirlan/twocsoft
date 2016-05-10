<?php

	if(function_exists("register_field_group"))
	{
		register_field_group(array (
			'id' => 'acf_about',
			'title' => 'About',
			'fields' => array (
				array (
					'key' => 'field_5731a543517c6',
					'label' => 'Experience',
					'name' => 'experience',
					'type' => 'wysiwyg',
					'default_value' => '',
					'toolbar' => 'full',
					'media_upload' => 'yes',
				),
				array (
					'key' => 'field_5731aa2e37c66',
					'label' => 'Certifications',
					'name' => 'certifications',
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
						'value' => '44',
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