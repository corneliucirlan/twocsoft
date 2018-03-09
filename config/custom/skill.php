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
         * Skill name
         *
         * @var string
         */
        private $name;

        /**
         * Skill level
         *
         * @var int
         */
        private $level;

        /**
         * Contrusct class to activate actions and hooks as soon as the class is initialized
         */
        public function __construct($name, $level)
        {
            $this->name     = $name;
            $this->level    = $level;
        }

        /**
         * Gt a skill's name
         *
         * @return string the name of the skill
         */
        public function getSkillName()
        {
            return $this->name;
        }

        /**
         * Get a skill's level
         * @return int the level of the skill
         */
        public function getSkillLevel()
        {
            return $this->level;
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
