<?php
/** 
 * @package ThePlug
 */

 /* 
  Plugin Name: Demo Plugin
  Plugin URI: 'http://alecadd.com/plugin
  Description: Custom plugin
  Author: Martin 
  Author URI: https://emkayint.com
  License: GPLv2 or later
  Text Domain: Demo-Plugin
  Version: 1.0.0
 */

//  if (! define( 'ABSPATH', true) ) {
//   die;
//  }

 if( ! function_exists('add_action')) {
  exit;
 }

 class SamplePlugin 
 {
    // Methods

    function __construct(){
      add_action('init', array($this, "custom_post_type"));
    }
   

    function sayHello($arg){
      echo  $arg; 
    }

    function activate() {
      // echo "<p>Hello world</p>";
      $this -> custom_post_type();
      flush_rewrite_rules();
    }


    function deactivate() {

    }

    function uninstall() {

    }

    function custom_post_type () {
      register_post_type('book', ['public' => true, "label" => "Book"]);
    }
 }

 if (class_exists("SamplePlugin")) {
  $init1 = new SamplePlugin();
  // $init1 -> sayHello("Emkay");
 }

// activate plugin by calling class method activate
 register_activation_hook(__FILE__, array($init1, "activate"));

// deactivate plugin by calling class method deactivate

 register_deactivation_hook(__FILE__, array($init1, "deactivate"));

