<?php
/**
 *
 * Plugin Name: ECharge
 * Plugin URI: https://echarge/
 * Description: displays customers
 * Version: 1.0
 * Author: Muhammad Afeen
 * Author URI: https://Muhammad Afeen
 * Text Domain: hello
 * Domain Path: /i18n/languages/muhammadAfeen
 * Requires at least: 5.8
 * Requires PHP: 7.2
 *
 */

/** Security Purpose */
if(!defined('ABSPATH')){
	die;
}

/** Including Configin */
include_once 'configIn.php';

/** Creating Instance of class echarge */
include_once CLASS_DIR_.'echarge.php';
$ebiz = echarge::instance();
$ebiz->register();


