<?php
/**
 * Plugin Name:       Iota Init
 * Plugin URI:        https://iotait.tech
 * Description:       Install Necessary Assets
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Iota
 * Author URI:        https://iotait.tech
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        https://example.com/my-plugin/
 * Text Domain:       iota-init
 * Domain Path:       /iota-init
 */

/**
 * Load Style And Script
 */

//load assets class

require 'vendor/autoload.php';

//require_once 'src/Assets.php';

use App\Assets;
use App\RegisterWidget;
use App\ThemeSupport;

if ( class_exists( 'App\Assets' ) ) {
	$assets = new Assets();
	register_activation_hook( __FILE__, array( $assets, 'activate' ) );
	register_deactivation_hook( __FILE__, array( $assets, 'deactivate' ) );

}

if ( class_exists( 'App\RegisterWidget' ) ) {
	$widgets = new RegisterWidget();
	register_activation_hook( __FILE__, array( $widgets, 'activate' ) );
	register_deactivation_hook( __FILE__, array( $widgets, 'deactivate' ) );
}

if ( class_exists( 'App\ThemeSupport' ) ) {
	$themeSupport = new ThemeSupport();
	register_activation_hook( __FILE__, array( $themeSupport, 'activate' ) );
	register_deactivation_hook( __FILE__, array( $themeSupport, 'deactivate' ) );
}


/**
 * initialize code star framework
 */

require_once "src/cs-framework/codestar-framework.php";
// Control core classes for avoid errors
if ( class_exists( 'CSF' ) ) {

	//
	// Set a unique slug-like ID
	$prefix = 'iota_init';
	//
	/**
	 * Primary Theme Options
	 */
	CSF::createOptions( $prefix, array(
		'menu_title'         => 'Theme Options',
		'menu_slug'          => 'theme-options',
		'menu_position'      => 3,
		'menu_icon'          => 'dashicons-admin-generic',
		'framework_title'    => 'IOTA THEME  <small>by Iota</small>',
		'footer_credit'      => 'IOTA Theme  <small>by Iota</small>',
		'show_bar_menu'      => false,
		'footer_text'        => 'Thank you for using IOTA Theme',
		'ajax_save'          => true,
		'show_reset_all'     => false,
		'show_search'        => false,
		'show_all_options'   => false,
		'show_reset_section' => false,
		'show_footer'        => false,
		'theme'              => 'dark',
		'class'              => 'iota-init',
		'sticky_header'      => false,
		'output_css'         => false,
	) );

	/**
	 * Home Page
	 * @package iota init
	 */
	CSF::createSection( $prefix, array(
		'id'    => 'home_page',
		'title' => 'Home Page',
	) );
	/**
	 * Hero Section
	 * @package iota init
	 * @subpackage home page
	 */
	CSF::createSection( $prefix, array(
		'parent' => 'home_page',
		'title'  => 'Hero Section',
		'fields' => array(
			array(
				'id'      => 'hero_title',
				'type'    => 'text',
				'title'   => 'Hero Title',
				'default' => 'IOTA',
			),
			array(
				'id'      => 'hero_subtitle',
				'type'    => 'text',
				'title'   => 'Hero Subtitle',
				'default' => 'IOTA',
			),
			array(
				'id'           => 'bg_image',
				'type'         => 'media',
				'title'        => 'Background Image',
				'library'      => 'image',
				'button_title' => 'Upload Image',
			),
		),
	) );

	/**
	 * Company Section
	 * @package iota init
	 * @subpackage home page
	 */

	CSF::createSection( $prefix, array(
		'parent' => 'home_page',
		'title'  => 'Company Section',
		'fields' => array(
			array(
				'id'    => 'content',
				'type'  => 'textarea',
				'title' => 'Company Content',
			)
		)
	) );

	/**
	 * Comapny information
	 * @package iota init
	 * @subpackage home page
	 */

	CSF::createSection( $prefix, array(
		'parent' => 'home_page',
		'title'  => 'Company Information',
		'fields' => array(
			array(
				'id'      => 'year',
				'type'    => 'text',
				'title'   => 'Year of Established',
				'default' => '2013',
			),
			array(
				'id'      => 'size',
				'type'    => 'text',
				'title'   => 'Factory Size',
				'default' => '23,000',
			),
			array(
				'id'      => 'employee',
				'type'    => 'text',
				'title'   => 'Employees',
				'default' => '100',
			),
			array(
				'id'      => 'capacity',
				'type'    => 'text',
				'title'   => 'Annual Capacity',
				'default' => '24,000',
			),
			array(
				'id'      => 'sales',
				'type'    => 'text',
				'title'   => 'Annual Sales',
				'default' => '80',
			),
			array(
				'id'      => 'press',
				'type'    => 'text',
				'title'   => 'Press Lines',
				'default' => '7',
			),
		)
	) );

	/**
	 * Footer
	 * @package iota init
	 */

	CSF::createSection( $prefix, array(
		'id'    => 'footer',
		'title' => 'Footer',
	) );
	CSF::createSection( $prefix, array(
		'parent' => 'footer',
		'title'  => 'Office Address',
		'fields' => array(
			array(
				'id'      => 'address1',
				'type'    => 'textarea',
				'title'   => 'Address',
				'default' => 'House: 1/C 1/D, Road: 16, Nikunja02 
                Dhaka 1229, Bangladesh',
			),
			array(
				'id'      => 'phone1',
				'type'    => 'text',
				'title'   => 'Phone',
				'default' => '+880 1713 289480',
			),
			array(
				'id'       => 'email1',
				'type'     => 'text',
				'title'    => 'Email',
				'validate' => 'csf_validate_email',
				'default'  => 'starthaialuminium@gmail.com',
			)
		)
	) );
	CSF::createSection( $prefix, array(
		'parent' => 'footer',
		'title'  => 'Factory  Address',
		'fields' => array(
			array(
				'id'      => 'address2',
				'type'    => 'textarea',
				'title'   => 'Address',
				'default' => 'Plot No: C-13, SIPCOT Industrial
                Park,Narayangong, Bangladesh',
			),
			array(
				'id'      => 'phone2',
				'type'    => 'text',
				'title'   => 'Phone',
				'default' => '+880 1713 289480',
			),
			array(
				'id'       => 'email2',
				'type'     => 'text',
				'title'    => 'Email',
				'validate' => 'csf_validate_email',
				'default'  => 'starthaialuminium@gmail.com',
			)
		)
	) );
	//	repeater field
	CSF::createSection( $prefix, array(
		'parent' => 'footer',
		'title'  => 'Social Media',
		'fields' => array(
			array(
				'id'     => 'social_media',
				'type'   => 'repeater',
				'title'  => 'Social Media',
				'fields' => array(
					array(
						'id'    => 'social_icon',
						'type'  => 'media',
						'title' => 'Social Icon',
					),
					array(
						'id'    => 'social_link',
						'type'  => 'text',
						'title' => 'Social Link',
					),
				)
			)
		)
	) );

	/**
	 * About Page
	 * @package iota init
	 */

	CSF::createSection( $prefix, array(
		'id'    => 'about_page',
		'title' => 'About Page',
	) );
	CSF::createSection( $prefix, array(
		'parent' => 'about_page',
		'title'  => 'About Section',
		'fields' => array(
			array(
				'id'      => 'about_title',
				'type'    => 'text',
				'title'   => 'About Title',
				'default' => 'IOTA',
			),
			array(
				'id'      => 'about_subtitle',
				'type'    => 'text',
				'title'   => 'About Subtitle',
				'default' => 'IOTA',
			),
		),
	) );
}