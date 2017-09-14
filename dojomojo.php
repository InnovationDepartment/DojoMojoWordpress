<?php
/*
Plugin Name: DojoMojo Partnerships
Plugin URI: https://dojomojo.ninja
Description: Easily host your DojoMojo giveaways on your WordPress website.
Author: DojoMojo
Version: 1.0.0
Author URI: https://dojomojo.ninja/
Network: True
*/

// Copyright (c) 2017 Innovative Brands. All rights reserved.

function dojomojo_require_files() {
  $abspath = dirname( __FILE__ );
  require_once $abspath . '/classes/dojo-options.php';
}

// Load the files we'll be using
dojomojo_require_files();

// Add a hook to load the giveaway page whenever the giveaway url is matched
add_filter('template_include', 'load_hosting_template');
function load_hosting_template($original_template) {
  $current_url = $_SERVER['REQUEST_URI']; 
  $giveaway_slug = str_replace('/', '\/', get_option('giveaway_slug'));

  $current_url_params = array();
  preg_match('/\?(.*)/', $current_url, $current_url_params);

  if (preg_match("/^\/?" . $giveaway_slug . "\/?$/", str_replace($current_url_params[0], '', $current_url))) {
    return dirname( __FILE__ ) . '/views/hosting.php';
  } else {
    return $original_template;
  }
}

// Load our options in the admin section
$dojoOptions = new DojoOptions();
$dojoOptions->initialize_plugin_menu();