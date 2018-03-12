<?php

    /**
     * Custom class
     *
     * @package ccwp
     */

    namespace ccwp\custom;

    // Define class
    class Skill
    {
        /**
         * Contrusct class to activate actions and hooks as soon as the class is initialized
         */
        public function __construct()
        {
            // Create WP table
            $this->createTable();

            // Add menu page
            add_action('admin_menu', array($this, 'addMenuPage'));
        }

        /**
         * Create WP table
         */
        public function createTable()
        {
            // Access global $wpdb
            global $wpdb;

            // Set table name
            $tableName = $wpdb->prefix.'skills';

            // Set charset
            $charsetCollate = $wpdb->get_charset_collate();

            // Prepare sql query
            $sql = " CREATE TABLE $tableName (
                id mediumint(3) NOT NULL AUTO_INCREMENT,
                name tinytext DEFAULT '' NOT NULL,
                level int(2),
                PRIMARY KEY (id)
            ) $charsetCollate";

            require_once(ABSPATH.'wp-admin/includes/upgrade.php');
            dbDelta($sql);
        }

        /**
         * Add menu page
         */
        public function addMenuPage()
        {
            add_menu_page(__('Skills'), __('Skills'), 'manage_options', 'skills', array($this, 'renderSkillPage'), '', 15);
        }

        public function renderSkillPage()
        {
            ?>
            <div class="wrap">
                <h1><?php _e('Skills'); ?></h1>
            </div>
            <?php
        }

        public function renderSkill()
        {
            ?>
    		<div class="card-wrapper col-xs-12 col-sm-6 col-md-2">
    			<div class="card card-flat card-borderless">
    				<h3><?php echo $this->getSkillName() ?></h3>
    				<div class="item-stars text-center">
    					<?php for ($x = 1; $x <= 5; $x++): ?>
    						<?= $x <= $this->getSkillLevel() ? '<i class="fa fa-star"></i>' : '<i class="fa fa-star-o"></i>'; ?>
    					<?php endfor; ?>
    				</div>
    			</div>
    		</div>
    		<?php
        }
    }

?>
