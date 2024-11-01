<?php
/*
  Plugin Name: WP Easy Bubble Menu
  Plugin URI: http://wpbubblemenu.com/
  Description: Powerful jQuery Supplementary Menu Builder
  Author: Enmanuel Corvo
  Version: 1.4
  Author URI: http://webtricksandtreats.com
 */

/*  Copyright 2015  Enmanuel Corvo  (email : enmanuelcorvo@gmail.com)
*/

register_activation_hook(__FILE__, 'wpcm_install');

function wpcm_install()
{
    //create tables
    global $wpdb;
    $table_prefix = $wpdb->prefix . "wpcm";
    if ($wpdb->get_var("SHOW TABLES LIKE " . $table_prefix . "_menu_props") != $table_prefix . "_menu_props") {
        $sql = "
          -- properties
          CREATE TABLE " . $table_prefix . "_menu_props (
          idx int(11) NOT NULL AUTO_INCREMENT,
          name varchar(255) DEFAULT NULL,
          date_created timestamp DEFAULT current_timestamp,
          last_modified datetime DEFAULT NULL,
          -- item properties
          bshadow varchar(145) DEFAULT NULL,
          items_position varchar(145) DEFAULT NULL,
          trigger_type varchar(145) DEFAULT NULL,
          show_effect varchar(145) DEFAULT NULL,
          show_effect_extra varchar(145) DEFAULT NULL,
          radius varchar(145) DEFAULT NULL,
          item_diameter varchar(145) DEFAULT 30,
          open_close_speed varchar(145) DEFAULT NULL,
          spread_speed varchar(145) DEFAULT NULL,
          collapse_speed varchar(145) DEFAULT NULL,
          closed_img longtext DEFAULT NULL,
          opened_img longtext DEFAULT NULL,
          link_type varchar(45) DEFAULT NULL,
          menu_id varchar(45) DEFAULT NULL,
          link_idx int(11) DEFAULT NULL,
            PRIMARY KEY (`idx`)
        ) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;
        -- links
        CREATE TABLE " . $table_prefix . "_menu_links (
          idx int(11) NOT NULL AUTO_INCREMENT,
          link_url varchar(255) DEFAULT NULL,
          link_callback varchar(255) DEFAULT NULL,
          link_type enum('url','callback') DEFAULT NULL,
          link_img_url varchar(255) DEFAULT NULL,
          parent_idx int(11) DEFAULT NULL,
            PRIMARY KEY (`idx`)
        ) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;";

    } else {
        $sql = "ALTER TABLE wp_wpcm_menu_props ADD COLUMN item_diameter VARCHAR(145) DEFAULT 30";

    }
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);

}

require_once('core/wpcm_ajax_handler.php');

add_action('wp_enqueue_scripts', 'wpcm_prod_load');


function wpcm_prod_load()
{
    wp_register_style('wpcm_animate_css', plugins_url('/css/animate.css', __FILE__));
    wp_register_style('wpcm_main_css', plugins_url('/css/main.css', __FILE__));
    //enqueue
    wp_enqueue_style('wpcm_animate_css');
    wp_enqueue_style('wpcm_main_css');

    wp_register_script('circlemen_js', plugins_url('/js/circlemen.js', __FILE__), array('jquery'));
    wp_register_script('wpcm_prod_js', plugins_url('/js/wpcmProd.js', __FILE__), array('jquery'));
    //enqueue
    wp_enqueue_script('circlemen_js');
    wp_enqueue_script('wpcm_prod_js');

}

if (is_admin()) { // admin actions
    add_action('admin_menu', 'wpcm_actions');
} else {
    // non-admin enqueues, actions, and filters
}


function wpcm_actions()
{
    add_menu_page('Bubble Menu', 'Bubble Menu', 'manage_options', 'wp_bubble_menu', 'wpcm_admin', plugin_dir_url(__FILE__) . '/css/images/icon_small.png');
    add_submenu_page('wp_bubble_menu', 'History', 'History', 'manage_options', 'wpcm_history', 'wpcm_history');
}

function wpcm_history()
{
    if (isset($_GET['page']) && $_GET['page'] == 'wpcm_history') {
        include('history.php');
    }
}

function wpcm_admin()
{
    if (isset($_GET['page']) && $_GET['page'] == 'wp_bubble_menu') {
        include('wpcm_admin_edit.php');
    }
}

if ((isset($_GET['page']) && $_GET['page'] == 'wp_bubble_menu') || (isset($_GET['page']) && $_GET['page'] == 'wpcm_history')) {
    add_action('admin_enqueue_scripts', 'load_wp_bubble_menu_styles');
    add_action('admin_enqueue_scripts', 'load_wp_bubble_menu_scripts');
}

function load_wp_bubble_menu_styles()
{
    /** START STYLES */
    //register
    wp_register_style('wpcm_animate_css', plugins_url('/css/animate.css', __FILE__));
    wp_register_style('wpcm_main_css', plugins_url('/css/main.css', __FILE__));
    //enqueue
    wp_enqueue_style('wpcm_animate_css');
    wp_enqueue_style('wpcm_main_css');
    wp_enqueue_style('thickbox');
    /** END STYLES */
}

function load_wp_bubble_menu_scripts()
{
    /** START SCRIPTS */
    //register
    wp_register_script('circlemen_js', plugins_url('/js/circlemen.js', __FILE__), array('jquery'));
    wp_register_script('main_js', plugins_url('/js/main.js', __FILE__), array('jquery'));
    //enqueue
    wp_enqueue_script('media-upload');
    wp_enqueue_script('thickbox');
    wp_enqueue_script('my-upload');
    wp_enqueue_script('circlemen_js');
    wp_enqueue_script('main_js');
    /** END SCRIPTS */


    $wnm_custom = array('url' => get_bloginfo('url'));
    wp_localize_script('main_js', 'wpcm_wnm_custom', $wnm_custom);
}

function get_wpcm_list()
{
    global $wpdb;
    $table = $wpdb->prefix . "wpcm_menu_props";
    $myrows = $wpdb->get_results("SELECT * FROM " . $table . ";");
    return $myrows;
}

add_shortcode('wp_easy_bubble_menu', 'wp_easy_bubble_menu_shortcode');

function wp_easy_bubble_menu_shortcode($atts)
{
    extract(shortcode_atts(array(
        'id' => '',
        'pos' => 'free-form'
    ), $atts));
    $wpcm_data_edit = wpcm_load_for_edit($id);
    $wpcm_edit_item = $wpcm_data_edit['item'];
    $wpcm_edit_links = $wpcm_data_edit['links'];
    ob_start();
    include('core/template.tpl');
    $file = ob_get_clean();
    return $file;
}


?>