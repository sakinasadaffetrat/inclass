<?php
ini_set('display_errors', 1);
error_reporting(E_ALL & ~E_NOTICE);

//PHP7
$get_page = $_GET['page'] ?? 'index'; //show($get_page);

$html_file_path = 'html/'.$get_page.'.html'; 

if(file_exists($html_file_path)) {
  $html_page = file_get_contents($html_file_path);
}
else {
  $html_page = '404. The page you are looking for in not here.';
}


//GET JSON DATA
$json_content = file_get_contents("site-data.json");
$site_data_arr = json_decode($json_content, true); //


//SITE DATA ARRAY
$site_data = $site_data_arr["site-data"];
$pages = $site_data_arr["pages"]; //show($pages);
$active_page = $pages[$get_page];



/* MENU HTML ITEMS
--------------------------------------*/
function menu_items() {

  global $pages, $get_page;

  $menu_items = '';

  foreach($pages as $key => $value) {
  
    $menu = $value['menu'];
    $active = ($get_page === $key) ? ' active' : '';
  
    $menu_items .= '<li class="menu-item'.$active.'"><a href="?page='.$key.'">'.$menu.'</a></li>'.PHP_EOL;
  
  }

  return $menu_items;

}

/* SHOW FUNCTION
--------------------------------------*/
function show($data = '') {

  echo '<pre>';
  print_r($data);
  echo '</pre>';

}
