<?php

	/**
	 * PRINT ONE SKILL
	 */
	function printSkill($skill)
	{
		?>
		<article class="skill col-md-2 col-xs-4">
			<h3 class="expertise-title"><?php echo strtoupper($skill->getSkillName()) ?></h3>
			<div class="skikks-item-stars">
				<?php
				for ($x = 1; $x <= 5; $x++):
					if ($x <= $skill->getSkillLevel()) echo '<span class="glyphicon glyphicon-star"></span>';
						else echo '<span class="glyphicon glyphicon-star-empty"></span>';
				endfor;
				?>
			</div>
		</article>
		<?php
	}

	/**
	 * PRINT ONE CERTIFICATION
	 */
	function printCertification($cert)
	{
		?>
		<article class="col-md-6">
			<h3 class="expertise-title"><?php echo strtoupper($cert->getCertName()) ?></h3>
			<p class="row-item-subtitle text-center"><strong><?php echo strtoupper($cert->getCertOrganisation()) ?></strong></p>
			<p class="row-item-subtitle text-center"><?php echo strtoupper($cert->getCertYear()) ?></p>
		</article>
		<?php
	}

?>