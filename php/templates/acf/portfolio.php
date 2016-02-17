<?php

	if(function_exists("register_field_group"))
	{
		register_field_group(array (
			'id' => 'acf_portfolio',
			'title' => 'Portfolio',
			'fields' => array (
				array (
					'key' => 'field_56c38bb9d005a',
					'label' => 'Project type',
					'name' => 'portfolio-type',
					'type' => 'radio',
					'instructions' => 'The type of this portfolio item',
					'choices' => array (
						'portfolio-website' => 'Website',
						'portfolio-plugin' => 'Plugin',
					),
					'other_choice' => 0,
					'save_other_choice' => 0,
					'default_value' => 'portfolio-website',
					'layout' => 'horizontal',
				),
				array (
					'key' => 'field_56c38ca0a0d49',
					'label' => 'Website URL',
					'name' => 'website-url',
					'type' => 'text',
					'instructions' => 'The web address of the website',
					'conditional_logic' => array (
						'status' => 1,
						'rules' => array (
							array (
								'field' => 'field_56c38bb9d005a',
								'operator' => '==',
								'value' => 'portfolio-website',
							),
						),
						'allorany' => 'all',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'formatting' => 'html',
					'maxlength' => '',
				),
				array (
					'key' => 'field_56c38cdba0d4a',
					'label' => 'Website Services',
					'name' => 'website-services',
					'type' => 'checkbox',
					'instructions' => 'The services provided to the website',
					'conditional_logic' => array (
						'status' => 1,
						'rules' => array (
							array (
								'field' => 'field_56c38bb9d005a',
								'operator' => '==',
								'value' => 'portfolio-website',
							),
						),
						'allorany' => 'all',
					),
					'choices' => array (
						'website-design' => 'Website Design',
						'front-end-development' => 'Front-end Development',
						'back-end-development' => 'Back-end Development',
						'search-engine-optimization' => 'Search Engine Optimization',
						'plugin-development' => 'Plugin Development',
					),
					'default_value' => '',
					'layout' => 'horizontal',
				),
				array (
					'key' => 'field_56c1de2c655ce',
					'label' => 'Plugin Requirements',
					'name' => 'plugin-requirements',
					'type' => 'wysiwyg',
					'conditional_logic' => array (
						'status' => 1,
						'rules' => array (
							array (
								'field' => 'field_56c38bb9d005a',
								'operator' => '==',
								'value' => 'portfolio-plugin',
							),
						),
						'allorany' => 'all',
					),
					'default_value' => '',
					'toolbar' => 'full',
					'media_upload' => 'yes',
				),
				array (
					'key' => 'field_56c1ded1655d0',
					'label' => 'Plugin Instalation',
					'name' => 'plugin-instalation',
					'type' => 'wysiwyg',
					'conditional_logic' => array (
						'status' => 1,
						'rules' => array (
							array (
								'field' => 'field_56c38bb9d005a',
								'operator' => '==',
								'value' => 'portfolio-plugin',
							),
						),
						'allorany' => 'all',
					),
					'default_value' => '',
					'toolbar' => 'full',
					'media_upload' => 'yes',
				),
				array (
					'key' => 'field_56c1decd655cf',
					'label' => 'Plugin Usage',
					'name' => 'plugin-usage',
					'type' => 'wysiwyg',
					'conditional_logic' => array (
						'status' => 1,
						'rules' => array (
							array (
								'field' => 'field_56c38bb9d005a',
								'operator' => '==',
								'value' => 'portfolio-plugin',
							),
						),
						'allorany' => 'all',
					),
					'default_value' => '',
					'toolbar' => 'full',
					'media_upload' => 'yes',
				),
			),
			'location' => array (
				array (
					array (
						'param' => 'post_type',
						'operator' => '==',
						'value' => 'portfolio',
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