<?php
/**
 * Fuel is a fast, lightweight, community driven PHP5 framework.
 *
 * @package    Fuel
 * @version    1.5
 * @author     Fuel Development Team
 * @license    MIT License
 * @copyright  2010 - 2013 Fuel Development Team
 * @link       http://fuelphp.com
 */

/**
 * If you want to override the default configuration, add the keys you
 * want to change here, and assign new values to them.
 */

return array(
	'url_suffix'  => '.html',
	'caching' => true,
	'module_paths' => array(
		APPPATH.'modules'.DS,		// path to application modules
		APPPATH.'..'.DS.'globalmods'.DS	// path to our global modules
	),
	'profiling'  => true,
	'always_load'  => array(
			'packages'  => array(
				'orm',
				'auth',
			),
	
			'modules'  => array(),
			'classes'  => array(),
			'config'  => array(
				'settings',
			),
    ),

    /**
     * Localization & internationalization settings
     */
    'language'           => 'en', // Default language
    'locale'             => 'en_US', // PHP set_locale() setting, null to not set
    'encoding'  => 'UTF-8',
);
