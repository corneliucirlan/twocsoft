<?php

    /**
     * Widgets class
     *
     * @package cornelius
     */

    namespace cornelius\core;

    class Widgets
    {
        /**
         * Contrusct class to activate actions and hooks as soon as the class is initialized
         */
        public function __construct()
        {
            add_action('widgets_init', array($this, 'initWidgets'));
        }

        /**
         * Register sidebar
         */
        public function initWidgets()
        {
            register_sidebar(array(
                'name'          => esc_html__('Sidebar', 'cornelius'),
                'id'            => 'cornelius-sidebar',
                'description'   => esc_html__('Default sidebar to add all your widgets.', 'cornelius'),
                'before_widget' => '<section id="%1$s" class="widget %2$s">',
                'after_widget'  => '</section>',
                'before_title'  => '<h2 class="widget-title">',
                'after_title'   => '</h2>',
            ));
        }
    }

?>
