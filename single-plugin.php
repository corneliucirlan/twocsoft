<?php

	// SECURITY CHECK
	if (!defined('ABSPATH')) exit;

	the_post();
?>

<?php get_header(); ?>

<main>
	<h2>DESCRIPTION</h2>
	<?php the_content() ?>

	<h2>REQUIREMENTS</h2>

	<h2>INSTALATION</h2>

	<h2>USAGE</h2>
	
</main>

<?php

	/**
	 * - GENERAL CONTENT
	 * - REQUIREMENTS
	 * - INSTALATION
	 * - USAGE
	 * - GITHUB URL - VIEW ON GITHUB
	 */

?>


<?php get_footer(); ?>