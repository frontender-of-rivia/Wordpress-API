<?php



add_action('wp_ajax_hello', 'say_hello');


function say_hello() {
    echo 'da';
    wp_die();
}