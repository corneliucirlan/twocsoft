<?php

	/**
	* SKILLS CLASS
	*/
	class SKILL
	{
		private $skill;
		private $level;
		
		function __construct($skill, $level)
		{
			$this->skill = $skill;
			$this->level = $level;
		}

		public function getSkillName()
		{
			return $this->skill;
		}

		public function getSkillLevel()
		{
			return $this->level;
		}
	}

?>