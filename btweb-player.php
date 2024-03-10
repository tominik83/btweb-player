<?php

/**
 * Plugin Name: Web Radio Player
 * Plugin URI:        https://github.com/tominik83/WordPress-Plugins/tree/d81f3622208d63befa9e14642954c8763e30b3fb/log-reg
 * Description:       Web Player
 * Version:           1.0
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
        $plugin_path = 'wp-content/plugins/btweb-player/btweb-player.php';
        $version_data = get_file_data($plugin_path, array('Version'));
        $version = $version_data[0];

        wp_enqueue_style('btweb-player-style', plugin_dir_url(__FILE__) . 'dist/btweb-player.css', array(), $version, 'all');

        wp_enqueue_script('btweb-player-script', plugin_dir_url(__FILE__) . 'dist/btweb-player.js', array('jquery'), $version, true);
    }





    public function load_shortcode()
    { ?>

        
<?php get_header('myradio'); ?>


<!-- <div id="ct-widget">
    <?php dynamic_sidebar('ct-widget'); ?>
</div> -->

<div id="radio-stations">
    <div class="radio-station" id="techno">
        <h2>Techno Chronicle</h2>
        <audio id="techno-audio" controls>
            <source src="https://myradio.bibliotehnika.com/listen/techno_chronicle/set.mp3U" type="audio/mpeg">
        </audio>
    </div>

    <div class="radio-station" id="prava">
        <h2>Prava</h2>
        <audio id="prava-audio" controls>
            <source src="https://myradio.bibliotehnika.com/listen/prava/DAP1" type="audio/mpeg">
        </audio>
    </div>

    <div class="radio-station" id="bibliotehnika">
        <h2>Bibliotehnika</h2>
        <audio id="prava-audio" controls>
            <source src="http://casaos:20080/listen/bibliotehnika/set-2.mp3U" type="audio/mpeg">
        </audio>
    </div>

</div>




<?php
    }
}
new BTWEB;
