<?php
namespace App;
class ThemeSupport{
	public function __construct()
	{
		add_action('after_setup_theme', array($this, 'iota_init_theme_support'));
	}
	public function iota_init_theme_support(){
		add_theme_support('title-tag');
		add_theme_support('post-thumbnails');
		add_theme_support('custom-logo');
		add_theme_support('custom-header');
		add_theme_support('custom-background');
		add_theme_support('automatic-feed-links');
		add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));
		add_theme_support('post-formats', array('aside', 'image', 'video', 'quote', 'link', 'gallery', 'audio'));
		add_theme_support('woocommerce');
		add_theme_support('wc-product-gallery-zoom');
		add_theme_support('wc-product-gallery-lightbox');
		add_theme_support('wc-product-gallery-slider');
	}
}