<?php
// include();
// require();

// include_once();
require_once('pdo.php');
require_once('queries.php');

// GRAB THE KEY FROM THE URL
$explode_url = explode('/', $_SERVER['REQUEST_URI']); // an array
$page = array_pop($explode_url); //echo $page;

// Default page key
if(!$page) {
  $page = $home_slug['slug'];
}


/* SITE DATA
-----------------------------------*/
function site_data() {

  $data_content = file_get_contents('data.json'); //debug($data_content);
  $data_arr = json_decode($data_content, true); //debug($data_arr);

  return $data_arr;

}
// site_data();


/* MENUS
-----------------------------------*/
function pages( $page = '', $location = '') {

  global $pages; //debug($pages);


  if($location === 'title') {
    $title = $pages[$page]['title']; // echo($title);
    return $title;
  }

  elseif($location === 'content') {
    $content = $pages[$page]['content']; // echo($content);
    return $content;
  }


  //DISPLAY MENUS - Loop inside the array
  foreach($pages as $slug => $item) {
    // var_dump($key);

    $active = ($page === $slug) ? ' active' : '';

    echo '<li class="menu-item'.$active.'"><a href="'.$slug.'">'.$item['menu'].'</a></li>';

  }

}


//CUSTOM DEBUG FUNCTION
function debug($value) {

  echo '<pre>';
  print_r($value);
  echo '</pre>';

}