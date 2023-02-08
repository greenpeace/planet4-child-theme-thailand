<?php

/**
 * Additional code for the child theme goes in here.
 */

add_action( 'wp_enqueue_scripts', 'enqueue_child_styles', 99);

function enqueue_child_styles() {
	$css_creation = filectime(get_stylesheet_directory() . '/style.css');

	wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', [], $css_creation );
}

// Set `thai` tokenizer for ElasticSearch indexation 
add_filter(
    'ep_config_mapping',
    function ($mapping) {
        $mapping['settings']['analysis']['analyzer']['default']['tokenizer'] = 'thai';
        return $mapping;
    },
    99,
    1
);
