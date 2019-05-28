<?php
ini_set('display_errors', 1);
error_reporting(E_ALL & ~E_NOTICE);

//PHP7
$get_page = $_GET['page'] ?? 'index'; //show($get_page);

//SITE DATA ARRAY
$site_data = site_data(); //show($site_data);
$pages = (is_array($site_data)) ? $site_data["pages"] : []; //show($pages);
$active_page = $pages[$get_page]; //show($active_page);


//show($GLOBALS);


/* MENU HTML ITEMS
--------------------------------------*/
function site_data() {

  //GET JSON DATA
  $json_file = 'site-data.json';

  if( ! file_exists($json_file) ) {
    return [];
  }

  $json_content = file_get_contents($json_file);
  $site_data_arr = json_decode($json_content, true);

  return $site_data_arr;

}


/* MENU HTML ITEMS
--------------------------------------*/
function menu_items() {

  global $pages, $get_page;

  $menu_items = '';

  if(!$pages) {
    return 'You have no pages !';
  }

  foreach($pages as $key => $value) {
  
    $menu = $value['menu'];
    $active = ($get_page === $key) ? ' active' : '';
  
    $menu_items .= '<li class="menu-item'.$active.'"><a href="?page='.$key.'">'.$menu.'</a></li>'.PHP_EOL;
  
  }

  return $menu_items;

}


/* CONTENT
--------------------------------------*/
function content() {

  global $get_page;
  //$get_page = $GLOBALS['get_page'];

  $html_file_path = 'html/'.$get_page.'.html';

  if(file_exists($html_file_path)) {
    $html_page = file_get_contents($html_file_path);
  }
  else {
    $html_page = '404. The page you are looking for in not here.';
  }

  return $html_page;

}


/* TITLE
--------------------------------------*/
function title($zone = 'content') {

  global $site_data, $active_page;

  $global_title = $site_data['global_title'];
  $page_title = $active_page['title'];

  if($zone === 'head') {
    return $page_title.' - '.$global_title;
  }
  
  return $page_title;

}


/* SHOW FUNCTION
--------------------------------------*/
function show($data = '') {

  echo '<pre>';
  print_r($data);
  echo '</pre>';

}
