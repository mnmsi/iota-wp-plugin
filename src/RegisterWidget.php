<?php
namespace App;
class RegisterWidget{
	public function __construct()
	{
		add_action('widgets_init', array($this, 'iota_init_widgets'));
	}
	public function iota_init_widgets(){
		register_sidebar(array(
			'name' => __('Footer Menus','iota_init'),
			'id' => 'footer_menu',
			'description' => 'Footer Menus',
			'before_widget' => '<div class="col-md-3">',
			'after_widget' => '</div>',
			'before_title' => '<h3>',
			'after_title' => '</h3>',
		));
	
	}
}