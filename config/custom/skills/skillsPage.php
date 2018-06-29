<?php

    /**
     * Callbacks for Skills
     *
     * @package ccwp
     */

    namespace ccwp\custom\skills;

    // Load dependencies
    use ccwp\custom\skills\skills;

    // Define class
    class SkillsPage
    {
        /**
         * Skills table
         */
        private $skillsTable;

        /**
         * Skill WP_List_Table object
         */
        public $objects;

        /**
         * Contrusct class to activate actions and hooks as soon as the class is initialized
         */
        public function __construct()
        {
            global $wpdb;

            // Set skills table name
            $this->skillsTable = $wpdb->prefix.'skills';

            add_filter('set-screen-option', array($this, 'set_screen'), 10, 3);
            add_action('admin_menu', array($this, 'plugin_menu'));

            // Save new skill
            add_action('admin_post_new_skill', array($this, 'saveNewSkill'));
        }

        public function set_screen($status, $option, $value)
        {
            return $value;
        }

        public function plugin_menu()
        {
            // All Skills
            $hook = add_menu_page(__('Skills'), __('Skills'), 'manage_options', 'skills', array($this, 'renderSkillsPage'), 'dashicons-businessman', 10);
            add_action('load-'.$hook, array($this, 'screen_option'));
            $hook = add_submenu_page('skills', __('Skills', 'cornelius'), __('Skills', 'cornelius'), 'manage_options', 'skills', array($this, 'renderSkillsPage'));
            add_action('load-'.$hook, array($this, 'screen_option'));

            // Add new SKill
            $hook = add_submenu_page('skills', __('New skill', 'cornelius'), __('New Skill', 'cornelius'), 'manage_options', 'skill-new', array($this, 'renderNewSkill'));
        }

        public function screen_option()
        {
            $option = 'per_page';
            $args = array(
                'label'     => __('Skills'),
                'default'   => 5,
                'option'    => 'skills_per_page'
            );
            add_screen_option($option, $args);

            $this->objects = new Skills();
        }

        /**
         * Load page template
         */
        public function renderSkillsPage()
        {
            ?>
            <div class="wrap">
                <h1>
                    <?php _e('Skills', 'cornelius'); ?>
                    <a class="add-new-h2" href="?page=skill-new"><?php _e('Add new skill', 'cornelius'); ?></a>
                </h1>

                <form class="" action="" method="post">
                    <?php

                        // Prepare items
                        $this->objects->prepare_items();

                        // Render views
                        $this->objects->views();

                        // Search
                        $this->objects->search_box('search', 'search_id');

                        // Render items
                        $this->objects->display();

                    ?>
                </form>
            </div>
            <?php
        }

        /**
         * Add new skill
         *
         * Page to add new skill
         */
        public function renderNewSkill()
        {
            global $wpdb;

            // Check if edit triggered
            if (isset($_REQUEST['id'])):
                $id = absint($_REQUEST['id']);

                // Get skill to edit
                $skill = $wpdb->get_row("SELECT * FROM $this->skillsTable WHERE id=$id");
            endif;

            ?>
            <div class="wrap">
                <h1><?php sprintf("%s", isset($id) ? _e('Edit Skill', 'cornelius') : _e('Add new Skill', 'cornelius')); ?></h1>

                <form class="" action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="post">
                    <input type="hidden" name="action" value="new_skill" />
                    <input type="hidden" name="request_uri" value="<?php echo $_SERVER['REQUEST_URI'] ?>" />

                    <table class="form-table">
                        <tbody>

                            <!-- Skill name -->
                            <tr>
                                <th scope="row"><?php _e('Skill name', 'cornelius'); ?></th>
                                <td>
                                    <input type="text" class="regular-text" name="skill-name" id="skill-name" value="<?php echo isset($id) ? $skill->name : '' ?>" />
                                    <label for="skill-name"><?php _e(' name of the skill', 'cornelius'); ?></label>
                                </td>
                            </tr>

                            <!-- Skill level -->
                            <tr>
                                <th scope="row"><?php _e('Skill level', 'cornelius'); ?></th>
                                <td>
                                    <input type="number" min="1" max="5" name="skill-level" id="skill-level" value="<?php echo isset($id) ? $skill->level : '' ?>" />
                                    <label for="skill level"><?php _e(' current skill level', 'cornelius'); ?></label>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <?php submit_button(sprintf(isset($id) ? __('Edit skill', 'cornelius') : __('Add skill', 'cornelius'))); ?>
                </form>
            </div>
            <?php
        }

        public function saveNewSkill()
        {
            global $wpdb;

            // Check if edit triggered
            if (isset($_REQUEST['id'])):
                $id = absint($_REQUEST['id']);
            endif;

            $skill = array(
                'name'  => $_REQUEST['skill-name'],
                'level' => $_REQUEST['skill-level']
            );

            if (isset($id)):

                    // Edit skill
                    $wpdb->update($this->skillsTable,
                        array(
                            'name'  => $skill['name'],
                            'level' => $skill['level']
                        ),
                        array('id' => $id)
                    );

                // Add skill
                else:
                    $wpdb->insert($this->skillsTable,
                        array(
                            'name'  => $skill['name'],
                            'level' => $skill['level']
                        )
                    );
            endif;

            // Redirect
            wp_redirect($_REQUEST['request_uri']);
        }
    }

?>
