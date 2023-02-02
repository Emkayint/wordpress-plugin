<?php

if(! define("WP_UNISTALL_PLUGIN", true)){
 die;
}

$books = get_posts(array( "post_type" => "book", "numberposts" => -1));

foreach( $books as $book){
  wp_delete_post( $book -> ID, true);
}