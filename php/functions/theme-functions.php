<?php

    // Security check
    if (!defined('ABSPATH')) die;

?>

<?php

	/**
	 * PRINT ONE SKILL
	 */
	function printSkill($skill)
	{
		?>
		<article class="md-card-holder col-md-2 col-xs-4">
			<h3 style="text-transform: uppercase; font-size: 1.7rem;" class="subtitle"><?php echo $skill->getSkillName() ?></h3>
			<div class="item-stars">
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
		<article class="col-md-12">
			<h3><?php echo $cert->getCertName() ?></h3>
			<p class="text-center"><strong><?php echo strtoupper($cert->getCertOrganisation()) ?></strong></p>
			<p class="text-center"><?php echo strtoupper($cert->getCertYear()) ?></p>
		</article>
		<?php
	}


	/**
	 * GET PHOTO SIZE BASED ON DEVICE
	 */
	function getPhotoSize()
	{
		$detect = new Mobile_Detect();

		$size = 'medium';
		if ($detect->isMobile() && !$detect->isTablet()) $size = 'thumbnail';
			elseif ($detect->isTablet()) $size = 'medium';

		return $size;
	}


	function renderShareButtons($top = false)
	{
		$url = urlencode(get_permalink());
		$title = urlencode(get_the_title());
		$excerpt = urlencode(get_the_excerpt());
		$related = urlencode('twocsoft:TwoCSoft,corneliucirlan:Corneliu Cirlan');
		?>
		
		<ul class="share-buttons <?php echo $top == true ? ' pull-right' : '' ?>">
			<li><span>Share:</span></li>
            <li class="share-button"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $url ?>" title="Share on Facebook"><i class="fa fa-facebook"></i></a></li>
            <li class="share-button"><a target="_blank" href="https://twitter.com/intent/tweet?text=<?php echo $title ?>&amp;url=<?php echo $url ?>&amp;via=TwoCSoft&amp;related=<?php echo $related ?>" title="Share on Twitter"><i class="fa fa-twitter"></i></a></li>
            <li class="share-button"><a target="_blank" href="https://plus.google.com/share?url=<?php echo $url ?>" title="Share on Google+"><i class="fa fa-google-plus"></i></a></li>
            <li class="share-button"><a target="_blank" href="https://www.linkedin.com/shareArticle?mini=true&amp;url=<?php echo $url ?>&amp;title=<?php echo $title ?>&amp;summary=<?php echo $excerpt ?>" title="Share on Linkedin"><i class="fa fa-linkedin"></i></a></li>
        </ul>
		<?php
	}

?>