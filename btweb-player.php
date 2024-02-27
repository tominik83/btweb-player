<?php

/**
 * Plugin Name: Web Radio Player
 * Plugin URI:        https://github.com/tominik83/WordPress-Plugins/tree/d81f3622208d63befa9e14642954c8763e30b3fb/log-reg
 * Description:       Web Player
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2 and ...
 * Author:            Mihajlo Tomic
 * Author URI:        https://dev.bibliotehnika.tk/about/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       btweb-player
 * Domain Path:       /languages
 */

// if( !defined('ABSPATH')) {
//     echo 'Sta pokusavas Brate?';
//     exit;
// }


error_reporting(E_ALL);
ini_set('display_errors', 1);


if (!defined('ABSPATH')) {
    wp_die(__('You can\'t access this page', 'UPOZORENJE'));
}



class BTWEB
{

    public function __construct()
    {


        // Add assets (js, css, etc)
        add_action('wp_enqueue_scripts', array($this, 'load_assets'));


        // Add shortcode
        add_shortcode('btwp-form', array($this, 'load_shortcode'));
    }

    public function load_assets()
    {
        wp_enqueue_style('btweb-player-style', plugin_dir_url(__FILE__) . 'dist/btweb-player.css', array(), 1, 'all');

        wp_enqueue_script('btweb-player-script', plugin_dir_url(__FILE__) . 'dist/btweb-player.js', array('jquery'), 1, true);
    }





    public function load_shortcode()
    { ?>

        Test

<?php
    }
}
new BTWEB;
