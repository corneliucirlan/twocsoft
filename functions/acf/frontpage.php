<?php
	
	if(function_exists("register_field_group"))
	{
		register_field_group(array (
			'id' => 'acf_frontpage',
			'title' => 'FrontPage',
			'fields' => array (
				array (
					'key' => 'field_5751c2dc86373',
					'label' => 'Button #1',
					'name' => 'button-1',
					'type' => 'page_link',
					'post_type' => array (
						0 => 'page',
					),
					'allow_null' => 0,
					'multiple' => 0,
				),
				array (
					'key' => 'field_5751c3dd96fc5',
					'label' => 'Button #1 Text',
					'name' => 'button-1-text',
					'type' => 'text',
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'formatting' => 'html',
					'maxlength' => '',
				),
				array (
					'key' => 'field_5751c3b186375',
					'label' => 'Button #2',
					'name' => 'button-2',
					'type' => 'page_link',
					'post_type' => array (
						0 => 'page',
					),
					'allow_null' => 0,
					'multiple' => 0,
				),
				array (
					'key' => 'field_5751c40d96fc7',
					'label' => 'Button #2 Text',
					'name' => 'button-2-text',
					'type' => 'text',
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'formatting' => 'html',
					'maxlength' => '',
				),
				array (
					'key' => 'field_5751c3b086374',
					'label' => 'Button #3',
					'name' => 'button-3',
					'type' => 'page_link',
					'post_type' => array (
						0 => 'page',
					),
					'allow_null' => 0,
					'multiple' => 0,
				),
				array (
					'key' => 'field_5751c40b96fc6',
					'label' => 'Button #3 Text',
					'name' => 'button-3-text',
					'type' => 'text',
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'formatting' => 'html',
					'maxlength' => '',
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