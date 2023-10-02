<?php

/*
 * Plugin Name:       Fulltime League Table
 * Description:       Show league table from FullTime
 * Version:           0.1
 * Author:            John Hobson
 * Author URI:        https://damselflycreative.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
*/

function show_fulltime_league_table($atts) {
    $atts = shortcode_atts([
        'lr' => '',
        'ds' => '',
    ], $atts);

    if (empty($atts['lr'])) {
        $atts['lr'] = get_field('lr_code');
    }

    if (empty($atts['ds'])) {
        $atts['ds'] = get_field('division_season');
    }

    $output = '<div id="lrep' . esc_attr($atts['lr']) . '" style="width: 600px;">Data loading....<a href="https://fulltime.thefa.com/index.html?divisionseason=' . esc_attr($atts['ds']) . '">View league table on FA site</a></div>';
    $output .= '<script language="javascript" type="text/javascript">';
    $output .= 'var lrcode = \'' . esc_js($atts['lr']) . '\';';
    $output .= '</script>';
    $output .= '<script language="Javascript" type="text/javascript" src="https://fulltime.thefa.com/client/api/cs1.js"></script>';

    return $output;
}

add_shortcode('league_table', 'show_fulltime_league_table');

