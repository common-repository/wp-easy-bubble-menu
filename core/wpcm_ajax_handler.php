<?php

/** Ajax */

/** delete bubble menu */
add_action('wp_ajax_wpcm_delete_bm', 'wpcm_delete_bm_callback');

/** save bubble menu */
add_action('wp_ajax_wpcm_save_bm', 'wpcm_save_bm_callback');

/** get menu links */
add_action('wp_ajax_wpcm_get_menu_links', 'wpcm_get_menu_links');

function wpcm_get_menu_links()
{
    $items = wp_get_nav_menu_items($_POST['menu_id']);

    echo wp_send_json($items);
    die();
}

/**
 * Saves bubble menu, new or edit
 *
 * @return boolean
 */
function wpcm_save_bm_callback()
{
    $params = json_decode(json_encode($_POST['save_settings']), FALSE);
    $results = wpcm_save_bubble_menu($params);
    if ($results > 0) {
        echo wp_send_json(Array('success' => true));
    } else {
        echo wp_send_json(Array('success' => false));
    }
    die(); // this is required to return a proper result
}

function wpcm_delete_bm_callback()
{
    wpcm_delete_bubble_menu($_POST['idx']);

    echo wp_send_json(Array('success' => true));
}

function wpcm_delete_bubble_menu($idx)
{
    global $wpdb;
    $table = $wpdb->prefix . "wpcm_menu_props";
    $wpdb->query(
        'DELETE FROM  ' . $table . '
         WHERE idx = "' . $idx . '"'
    );

    $table2 = $wpdb->prefix . 'wpcm_menu_links';
    $wpdb->query(
        'DELETE FROM ' . $table2 . '
         WHERE parent_idx = "' . $idx . '"'
    );

}

function wpcm_save_bubble_menu($params)
{
    global $wpdb;
    $table = $wpdb->prefix . "wpcm_menu_props";
    $myrows = $wpdb->get_results("SELECT idx FROM " . $table . " WHERE name='" . $params->name . "';");
    $now_date_raw = new DateTime();
    $now_date = date_format($now_date_raw, 'y-m-d h:m:s');
    $settings = array(
        'name' => $params->name,
        'last_modified' => $now_date,

        'items_position' => $params->items_position,
        'trigger_type' => $params->trigger,
        'show_effect' => $params->show_effect,
        'radius' => $params->radius,
        'item_diameter' => $params->item_diameter,
        'open_close_speed' => $params->open_close_speed,
        'spread_speed' => $params->spread_speed,
        'collapse_speed' => $params->collapse_speed,
        'link_idx' => 1,
        'closed_img' => $params->closedImg,
        'opened_img' => $params->openedImg,
        'bshadow' => $params->bshadow,
        'link_type'=>$params->link_type,
        'menu_id'=>$params->menu_id
    );
    if (isset($params->show_effect_extra) && $params->show_effect_extra != '') {
        $settings['show_effect_extra'] = $params->show_effect_extra;
    }
    /** No data in table do INSERT **/
    if (!empty($myrows)) {
        $rows_affected = $wpdb->update(
            $table,
            $settings,
            array('idx' => $myrows[0]->idx),
            null, null
        );
        $parent_idx = $myrows[0]->idx;
    } else {
        $rows_affected = $wpdb->insert(
            $table,
            $settings
        );
        $parent_idx = $wpdb->insert_id;
    }
    //add new connections
    $table = $wpdb->prefix . 'wpcm_menu_links';
    //delete all existing links connections
    $wpdb->delete($table, array('parent_idx' => $parent_idx));
    foreach ($params->links as $i => $a_link) {
        $wpdb->insert(
            $table,
            array(
                'link_url' => $a_link->url,
                'link_img_url' => $a_link->img,
                'link_type' => 'url',
                'parent_idx' => $parent_idx
            )
        );
    }
    return $rows_affected;
}


function wpcm_load_for_edit($edit_id)
{
    global $wpdb;
    $ret_arr = Array();
    $table = $wpdb->prefix . "wpcm_menu_props";
    $myrow = $wpdb->get_row("SELECT
        *
        FROM " . $table . "
        WHERE idx = $edit_id");
    $ret_arr['item'] = $myrow;
    if (isset($myrow)) {
        $id2 = ' LIMIT 4';
        $table = $wpdb->prefix . 'wpcm_menu_links';
        $myrows = $wpdb->get_results("SELECT * FROM $table WHERE parent_idx='" . $myrow->idx . "'" . $id2);
        $ret_arr['links'] = $myrows;
    }

    return $ret_arr;
}
