<?php
namespace App;
class RegisterWidget{
	public function __construct()
	{
		add_action('widgets_init', array($this, 'iota_init_widgets'));
	}
	public function iota_init_widgets(){
		register_sidebar(array(
			'name' => 'Footer Widget',
			'id' => 'footer_widget',
			'description' => 'Footer Widget',
			'before_widget' => '<div class="col-md-3">',
			'after_widget' => '</div>',
			'before_title' => '<h3>',
			'after_title' => '</h3>',
		));
	}
}