<?php

    if(function_exists("register_field_group"))
    {
    register_field_group(array (
        'id' => 'acf_websites',
        'title' => 'Websites',
        'fields' => array (
            array (
                'key' => 'field_54974720f2b8c',
                'label' => 'Project URL',
                'name' => 'project-url',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => 'http://www.example.com',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
        ),
        'location' => array (
            array (
                array (
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'post',
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
