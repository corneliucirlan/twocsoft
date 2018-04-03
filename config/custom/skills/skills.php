<?php

    /**
     * Custom class
     *
     * @package ccwp
     */

    namespace ccwp\custom\skills;

    // Pre-requirements
	if (!class_exists('WP_List_Table')):
	    require_once(ABSPATH.'/wp-admin/includes/class-wp-list-table.php');
    endif;

    // Define class
    class Skills extends \WP_List_Table
    {
        public $skillsTable;

        const WP_NONCE = 'cornelius-skill-action';

        /**
         * Contrusct class to activate actions and hooks as soon as the class is initialized
         */
        public function __construct()
        {
            global $wpdb;

            // Set skills table name
            $this->skillsTable = $wpdb->prefix.'skills';

            // Create WP table
            $this->createTable();

            parent::__construct(array(
                'singular'  => __('Skill', 'cornelius'),
                'plural'    => __('Skills', 'cornelius'),
                'ajax'      => false,
            ));
        }

        /**
        * Create WP table
        *
        * Create the necessary table in the database
        */
        public function createTable()
        {
            // Access global $wpdb
            global $wpdb;

            // Set charset
            $charsetCollate = $wpdb->get_charset_collate();

            // Prepare sql query
            $sql = " CREATE TABLE $this->skillsTable (
                id mediumint(3) NOT NULL AUTO_INCREMENT,
                name tinytext DEFAULT '' NOT NULL,
                level int(2),
                status int(1) DEFAULT 1,
                status tinyint(1) DEFAULT 1,
                PRIMARY KEY (id)
            ) $charsetCollate";

            require_once(ABSPATH.'wp-admin/includes/upgrade.php');
            dbDelta($sql);
        }

        /**
         * Get columns
         *
         * Get array of all columns used
         */
        public function get_columns()
        {
            $columns = array(
                'cb'        => '<input name="bulk-delete[]" type="checkbox" />',
                'name'      => __('Skill name', 'cornelius'),
                'level'     => __('Skill level', 'cornelius')
            );

            return $columns;
        }

        /**
         * Default column
         *
         * Fallback function to render column
         */
        public function column_default($item, $column_name)
        {
            return $item[$column_name];
        }

        /**
         * Checkbox column
         *
         * Render checkbox column
         */
        public function column_cb($item)
        {
            return sprintf('<input type="checkbox" name="%1$s[]" value="%2$s" />', $this->_args['singular'], $item['id']);
        }

        /**
         * Name column
         *
         * Render name column
         */
        public function column_name($item)
        {
            $title = $item['name'];

            // Edit nonce
            $wpNonce = wp_create_nonce(self::WP_NONCE);

            if (isset($_GET['status']) && $_GET['status'] == "trash"):
                    $actions = array(
                        'restore'   => sprintf('<a href="%s">Restore</a>', add_query_arg(array(
                            'page'      => $_REQUEST['page'],
                            'id'        => $item['id'],
                            'action'    => 'restore',
                            '_wpnonce'  => $wpNonce
                        ))),
                        'delete'    => sprintf('<a href="%s">Delete permanently</a>', add_query_arg(array(
                            'page'      => $_REQUEST['page'],
                            'id'        => $item['id'],
                            'action'    => 'delete',
                            '_wpnonce'  => $wpNonce
                        )))
                    );
                else:
                    $actions = array(
                        'edit'      => sprintf('<a href="%s">Edit</a>', add_query_arg(array(
                            'page'      => 'skill-new',
                            'id'        => $item['id'],
                            '_wpnonce'  => $wpNonce
                        ))),
                        'trash'     => sprintf('<a href="%s">Trash</a>', add_query_arg(array(
                            'page'      => $_REQUEST['page'],
                            'id'        => $item['id'],
                            'action'    => 'trash',
                            '_wpnonce'  => $wpNonce
                        ))),
                    );
            endif;

            // Return column data
            return sprintf('%1$s %2$s', $title, $this->row_actions($actions));
        }

        /**
         * Set sortable columns
         *
         * Set a list of columns that can be used to sort the data
         *
         * @return array associative array containing all sortable columns
         */
        public function get_sortable_columns()
        {
            $columns = array(
                'name'  => array('name', true),
                'level' => array('level', false)
            );

            return $columns;
        }

        /**
        * Set bulk actions
        *
        * Set all actions available in bulk
        */
        public function get_bulk_actions()
        {
            if (isset($_GET['status']) && $_GET['status'] == "trash"):
                $actions = array(
                    'bulk-restore'  => __('Restore', 'cornelius'),
                    'bulk-delete'   => __('Delete permanently', 'cornelius')
                );
            else:
                $actions = array(
                    'bulk-trash'    => __('Trash', 'cornelius')
                );
            endif;


            return $actions;
        }

        /**
         * Process bulk action
         *
         * Process all actions taken on given data
         */
        public function process_bulk_action()
        {
            global $wpdb;

            // Check if a _REQUEST is triggered
            if (isset($_REQUEST['id']))
                $id = absint($_REQUEST['id']);

            // Trash action
            if ('trash' === $this->current_action()):
                $nonce = esc_attr($_REQUEST['_wpnonce']);

                if (!wp_verify_nonce($nonce, self::WP_NONCE)):
                        die('Go get a life.');
                    else:
                        $wpdb->update($this->skillsTable, array('status' => 0), array('id' => $id));
                endif;
            endif;

            // Restore action
            if ('restore' === $this->current_action()):
                $nonce = esc_attr($_REQUEST['_wpnonce']);

                if (!wp_verify_nonce($nonce, self::WP_NONCE)):
                        die('Go get a life.');
                    else:
                        $wpdb->update($this->skillsTable, array('status' => 1), array('id' => $id));
                endif;
            endif;

            // Delete permanently action
            if ('delete' == $this->current_action()):
                $nonce = esc_attr($_REQUEST['_wpnonce']);

                if (!wp_verify_nonce($nonce, self::WP_NONCE)):
                        die('Go get a life.');
                    else:
                        self::deleteSkill($id);
                endif;
            endif;

            // Bulk restore action
            if ((isset($_POST['action']) && $_POST['action'] == 'bulk-restore') || (isset($_POST['action2']) && $_POST['action2'] == 'bulk-restore')):

                $restoreIDs = esc_sql($_POST[$this->_args['singular']]);
                foreach ($restoreIDs as $id):
                    $wpdb->update($this->skillsTable, array('status' => 1), array('id' => $id));
                endforeach;

            endif;

            // Bulk trash action
            if ((isset($_POST['action']) && $_POST['action'] == 'bulk-trash') || (isset($_POST['action2']) && $_POST['action2'] == 'bulk-trash')):

                $trashIDs = esc_sql($_POST[$this->_args['singular']]);
                foreach ($trashIDs as $id):
                    $wpdb->update($this->skillsTable, array('status' => 0), array('id' => $id));
                endforeach;

            endif;

            // Bulk delete action
            if ((isset($_POST['action']) && $_POST['action'] == 'bulk-delete') || (isset($_POST['action2']) && $_POST['action2'] == 'bulk-delete')):

                $deleteIDs = esc_sql($_POST[$this->_args['singular']]);
                foreach ($deleteIDs as $id):
                    self::deleteSkill($id);
                endforeach;

            endif;
        }

        /**
         * Prepare items
         *
         * Prepare data for rendering
         */
        public function prepare_items()
        {
            // How many records are to be shown on page
			$per_page = 20;

            // Columns array to be displayed
	        $columns = $this->get_columns();

            // Columns array to be hidden
	        $hidden = array();

            // List of sortable columns
	        $sortable = $this->get_sortable_columns();

	        // Create the array that is used by the class
	        $this->_column_headers = array($columns, $hidden, $sortable);

	        // Process bulk actions
	        $this->process_bulk_action();

            // Current page
	        $current_page = $this->get_pagenum();

            // Get contests
	        $data = $this->getSkills();

	        // Total number of items
	        $total_items = count($data);

	        // Slice data for pagination
	        $data = array_slice($data, (($current_page-1)*$per_page), $per_page);

	        // Send processed data to the items property to be used
	        $this->items = $data;

	        // Register pagination options & calculations
	        $this->set_pagination_args(array(
	            'total_items' => $total_items,                  //WE have to calculate the total number of items
	            'per_page'    => $per_page,                     //WE have to determine how many items to show on a page
	            'total_pages' => ceil($total_items/$per_page)   //WE have to calculate the total number of pages
	        ));
        }

        /**
	     * Set views
	     *
	     * Set number of puhlished/trashed items
	     */
	    public function get_views()
	    {
	    	global $wpdb;
	    	$views = array();

            $current = (!empty($_REQUEST['status']) ? $_REQUEST['status'] : 'publish');
			$publishedItems = $wpdb->get_var("SELECT COUNT(status) FROM ".$this->skillsTable." WHERE status=1");
			$trashedItems = $wpdb->get_var("SELECT COUNT(status) FROM ".$this->skillsTable." WHERE status=0");

            // Publish link
			if ($publishedItems):
				$class = ($current == 'publish' ? ' class="current"' :'');
				$publishedURL = remove_query_arg('status');
				$views['publish'] = "<a href='{$publishedURL }' {$class} >Publish ({$publishedItems})</a>";
			endif;

            // Trash link
			if ($trashedItems):
				$class = ($current == 'trash' ? ' class="current"' :'');
				$trashedURL = add_query_arg('status', 'trash');
				$views['trash'] = "<a href='{$trashedURL}' {$class} >Trash ({$trashedItems})</a>";
			endif;

            return $views;
	    }

        /**
         * Delete skill
         *
         * Helper function to delete a record from the database
         *
         * @param  int $id id of the record to be deleted
         */
        public function deleteSkill($id)
        {
            global $wpdb;

            $wpdb->delete($this->skillsTable, array('id' => $id), array('%d'));
        }

        /**
         * Get Skills
         *
         * Queue the database to retreive all data based on given filters
         *
         * @return array associative array containing all data
         */
	    public function getSkills()
	    {
	    	global $wpdb;

	    	// Get item status
	        $status = (!empty($_REQUEST['status']) ? $_REQUEST['status'] : 'publish');

	        // Get order params for the SQL query
			$orderby = (!empty($_REQUEST['orderby'])) ? $_REQUEST['orderby'] : 'id'; //If no sort, default to title
			$order = (!empty($_REQUEST['order'])) ? $_REQUEST['order'] : 'DESC'; //If no order, default to asc

	        // Set where SQL
	        $where = 'WHERE ';
	        if ($status == 'publish') $where .= 'status=1 AND ';
	        	else $where .= 'status=0 AND ';

	        // Search SQL
	        if (isset($_GET['s']))
	        	$where .= 'contest_name LIKE "%'.esc_attr($_GET['s']).'%" AND';
	        $where = rtrim($where, ' AND ');

	        // Return data from the db
	      	return $wpdb->get_results("SELECT * FROM ".$this->skillsTable." $where ORDER BY $orderby $order", ARRAY_A);
	    }

        /**
         * No items
         *
         * When no items found, set a message
         */
        public function no_items()
        {
            _e('No skills found', 'cornelius');
        }
    }

?>
