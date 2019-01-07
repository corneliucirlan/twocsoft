<?php

    /**
     * Header template file
     *
     * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
     *
     * @package ccwp
     */

    // Security check
    if (!defined('ABSPATH')) die;

?>

<!DOCTYPE html>
<html <?php language_attributes() ?>>
	<head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <?php wp_head() ?>
    </head>

    <body <?php body_class() ?>>
