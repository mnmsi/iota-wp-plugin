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
	use App\DisableUpdate;

	if ( class_exists( 'App\DisableUpdate' ) ) {
		$disableUpdate = new DisableUpdate();
		$disableUpdate->activate();
		register_activation_hook( __FILE__, array( $disableUpdate, 'activate' ) );
		register_deactivation_hook( __FILE__, array( $disableUpdate, 'deactivate' ) );
	}

	if ( class_exists( 'App\Assets' ) ) {
		$assets = new Assets();
		$assets->activate();
		register_activation_hook( __FILE__, array( $assets, 'activate' ) );
		register_deactivation_hook( __FILE__, array( $assets, 'deactivate' ) );

	}

	if ( class_exists( 'App\RegisterWidget' ) ) {
		$widgets = new RegisterWidget();
		$widgets->activate();
		register_activation_hook( __FILE__, array( $widgets, 'activate' ) );
		register_deactivation_hook( __FILE__, array( $widgets, 'deactivate' ) );
	}

	if ( class_exists( 'App\ThemeSupport' ) ) {
		$themeSupport = new ThemeSupport();
		$themeSupport->activate();
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
		 * Company information
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
		 * Choice Us Section
		 * @package iota init
		 * @subpackage home page
		 */

		CSF::createSection( $prefix, array(
			'parent' => 'home_page',
			'id'     => 'choice_us',
			'title'  => 'Choice Us Section',
			'fields' => array(
				array(
					'id'      => 'quality_maintenance_title',
					'type'    => 'text',
					'title'   => 'Quality Maintenance Title',
					'default' => 'Quality Maintenance',
				),
				array(
					'id'      => 'quality_maintenance_content',
					'type'    => 'textarea',
					'title'   => 'Quality Maintenance Content',
					'default' => 'Providing quality products is one of the three key pillars that we pride ourselves upon at Aluminium. We only believe in one key check point and that is the final "OKAY" and thumbs up given by our customers.',
				),
				array(
					'id'    => 'quality_maintenance_image',
					'type'  => 'media',
					'title' => 'Quality Maintenance Image',
				),
				array(
					'id'      => 'social_maintenance_title',
					'type'    => 'text',
					'title'   => 'Social Responsibility Title',
					'default' => 'Quality Maintenance',
				),
				array(
					'id'      => 'social_maintenance_content',
					'type'    => 'textarea',
					'title'   => 'Social Responsibility Content',
					'default' => 'Providing quality products is one of the three key pillars that we pride ourselves upon at Aluminium. We only believe in one key check point and that is the final "OKAY" and thumbs up given by our customers.',
				),
				array(
					'id'    => 'social_maintenance_image',
					'type'  => 'media',
					'title' => 'Social Responsibility Image',
				),
			),
		) );
		/**
		 * download pdf Section
		 * @package iota init
		 * @subpackage home page
		 */

		CSF::createSection( $prefix, array(
			'parent' => 'home_page',
			'title'  => 'Download PDF Section',
			'fields' => array(
				array(
					'id'      => 'pdf_title',
					'type'    => 'text',
					'title'   => 'PDF Title',
					'default' => 'Together, Innovating Aluminium to Make Modern Life Possible.',
				),
				array(
					'id'           => 'pdf_image',
					'type'         => 'media',
					'title'        => 'PDF Image',
					'library'      => 'image',
					'button_title' => 'Upload Image',
				),
				array(
					'id'      => 'pdf_content',
					'type'    => 'text',
					'title'   => 'PDF Link',
					'default' => 'http://experiment.test/wp-content/uploads/2023/01/Legable-Wordpress.pdf',
				),
			)
		) );


		/**
		 * Certificate Section
		 * @package iota init
		 * @subpackage home page
		 */

		CSF::createSection( $prefix, array(
			'parent' => 'home_page',
			'title'  => 'Certificate Section',
			'fields' => array(
				array(
					'id'      => 'certificate_image',
					'type'    => 'media',
					'library' => 'image',
					'title'   => 'Certificate Image',
				),
			)
		) );
		/**
		 * Gallery Section
		 * @package iota init
		 * @subpackage home page
		 */
		CSF::createSection( $prefix, array(
			'parent' => 'home_page',
			'title'  => 'Gallery Section',
			'fields' => array(
				array(
					'id'    => 'gallery_image',
					'type'  => 'gallery',
					'title' => 'Gallery Image',
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
		 * Products
		 * @package iota init
		 */

//		CSF::createSection( $prefix, array(
//			'id'    => 'products',
//			'title' => 'Products',
//		) );
//
//		CSF::createSection( $prefix, array(
//			'parent' => 'products',
//			'title'  => 'Products',
//			'fields' => array(
//				array(
//					'id'           => 'products',
//					'type'         => 'repeater',
//					'title'        => '',
//					'button_title' => 'Add New Category',
//					'max'          => 5,
//					'fields'       => array(
//						array(
//							'id'    => 'category',
//							'type'  => 'text',
//							'title' => 'Category',
//						),
//						array(
//							'id'           => 'category_products',
//							'type'         => 'repeater',
//							'title'        => 'Products',
//							'button_title' => 'Add New Product',
//							'fields'       => array(
//								array(
//									'id'    => 'product_image',
//									'type'  => 'media',
//									'title' => 'Product Image',
//								),
//								array(
//									'id'    => 'product_name',
//									'type'  => 'text',
//									'title' => 'Product Name',
//								),
//								array(
//									'id'    => 'product_description',
//									'type'  => 'textarea',
//									'title' => 'Product Description',
//								),
//							)
//						)
//					)
//				)
//			)
//		) );

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
			'title'  => 'Breadcrumb',
			'fields' => array(
				array(
					'id'      => 'about_breadcrumb_banner_image',
					'type'    => 'media',
					'library' => 'image',
					'title'   => 'Breadcrumb Banner Image',
				),
			),
		) );

		// brief history
		CSF::createSection( $prefix, array(
			'parent' => 'about_page',
			'title'  => 'Brief History',
			'fields' => array(
				array(
					'id'    => 'brief_history_title',
					'type'  => 'text',
					'title' => 'Title',
				),
				array(
					'id'    => 'brief_history_description',
					'type'  => 'textarea',
					'title' => 'Description',
				),
				array(
					'id'    => 'brief_history_year',
					'type'  => 'text',
					'title' => 'Years of experience',
				),
				array(
					'id'      => 'brief_history_image',
					'type'    => 'media',
					'library' => 'image',
					'title'   => 'Image',
				),
			)
		) );

//	mission
		CSF::createSection( $prefix, array(
			'parent' => 'about_page',
			'title'  => 'Mission',
			'fields' => array(
				array(
					'id'    => 'mission_content',
					'type'  => 'textarea',
					'title' => 'Content',
				)
			)
		) );
//	vision
		CSF::createSection( $prefix, array(
			'parent' => 'about_page',
			'title'  => 'Vision',
			'fields' => array(
				array(
					'id'    => 'vision_content',
					'type'  => 'textarea',
					'title' => 'Content',
				)
			)
		) );
//	values
		CSF::createSection( $prefix, array(
			'parent' => 'about_page',
			'title'  => 'Values',
			'fields' => array(
				array(
					'id'    => 'values_content',
					'type'  => 'textarea',
					'title' => 'Content',
				)
			)
		) );

//	industry tour gallery
		CSF::createSection( $prefix, array(
			'parent' => 'about_page',
			'title'  => 'Industry Tour Gallery',
			'fields' => array(
				array(
					'id'    => 'industry_tour_gallery',
					'type'  => 'gallery',
					'title' => 'Images',
				)
			)
		) );

		/**
		 * Products Page
		 * @package iota init
		 */

		CSF::createSection( $prefix, array(
			'id'    => 'products_page',
			'title' => 'Products Page',
		) );

//	products page banner
		CSF::createSection( $prefix, array(
			'parent' => 'products_page',
			'title'  => 'Banner',
			'fields' => array(
				array(
					'id'      => 'products_page_banner_image',
					'type'    => 'media',
					'library' => 'image',
					'title'   => 'Banner Image',
				),
			),
		) );
		/**
		 * Event Page
		 * @package iota init
		 */

//event page banner
		CSF::createSection( $prefix, array(
			'id'    => 'events_page',
			'title' => 'Event Page',
		) );
//	event page banner
		CSF::createSection( $prefix, array(
			'parent' => 'events_page',
			'title'  => 'Banner',
			'fields' => array(
				array(
					'id'      => 'events_page_banner_image',
					'type'    => 'media',
					'library' => 'image',
					'title'   => 'Banner Image',
				),
			),
		) );

		/**
		 * Services Page
		 * @package iota init
		 */

		CSF::createSection( $prefix, array(
			'id'    => 'services_page',
			'title' => 'Services Page',
		) );

//	services page banner
		CSF::createSection( $prefix, array(
			'parent' => 'services_page',
			'title'  => 'Banner',
			'fields' => array(
				array(
					'id'      => 'services_page_banner_image',
					'type'    => 'media',
					'library' => 'image',
					'title'   => 'Banner Image',
				),
			),
		) );
//	our goal
		CSF::createSection( $prefix, array(
			'parent' => 'services_page',
			'title'  => 'Our Goal',
			'fields' => array(
				array(
					'id'       => 'our_goal_title',
					'type'     => 'text',
					'title'    => 'Title',
					'validate' => 'required',

				),
				array(
					'id'       => 'our_goal_description',
					'type'     => 'textarea',
					'title'    => 'Description',
					'validate' => 'required',
				),
				array(
					'id'       => 'our_goal_image',
					'type'     => 'media',
					'library'  => 'image',
					'title'    => 'Image',
					'validate' => '',
				),
			)
		) );

		/**
		 * Contact Page
		 * @package iota init
		 */

		CSF::createSection( $prefix, array(
			'id'    => 'contact_page',
			'title' => 'Contact Page',
		) );

		CSF::createSection( $prefix, array(
			'parent' => 'contact_page',
			'title'  => 'Banner',
			'fields' => array(
				array(
					'id'      => 'contact_page_banner_image',
					'type'    => 'media',
					'library' => 'image',
					'title'   => 'Banner Image',
				),
			),
		) );


	}