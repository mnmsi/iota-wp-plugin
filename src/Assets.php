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

        wp_register_script('iota',plugin_dir_url(__FILE__).'../js/script.js',array('jquery'), '1.0.0', true);
		wp_register_style('magnific-popup','https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css',array(),'1.0.0','all');
        wp_register_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css', array(), '1.0.0', 'all');
        wp_register_script('bootstrap-popper', 'https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js', array(), '1.0.0', true);
        wp_register_script('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js', array(), '1.0.0', true);
        // wp_register_script('masonry','https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js',array('jquery'), '1.0.0', true);
		wp_register_script('magnific-popup','https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js',array('jquery'), '1.0.0', true);
	    if(!is_admin()){
            wp_enqueue_script('jquery');
		    wp_enqueue_style('bootstrap');
			wp_enqueue_style('magnific-popup');
		    wp_enqueue_script('bootstrap-popper');
		    wp_enqueue_script('bootstrap');
            wp_enqueue_script('iota');
			wp_enqueue_script('magnific-popup');
            // wp_enqueue_script('masonry');
	    }
    }
}

