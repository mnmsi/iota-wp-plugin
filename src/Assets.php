<?php

namespace App;
class Assets
{
    public function __construct()
    {
        add_action('wp_enqueue_scripts', array($this, 'iota_init'));
    }

    public function iota_init()
    {
        wp_register_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css', array(), '1.0.0', 'all');
        wp_register_script('bootstrap-popper', 'https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js', array(), '1.0.0', true);
        wp_register_script('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js', array(), '1.0.0', true);

	    if(!is_admin()){
		    wp_enqueue_style('bootstrap');
		    wp_enqueue_script('bootstrap-popper');
		    wp_enqueue_script('bootstrap');
	    }
    }
}

