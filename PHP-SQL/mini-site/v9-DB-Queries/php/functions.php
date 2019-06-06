<?php
ini_set('display_errors', 1);
error_reporting(E_ALL & ~E_NOTICE);


//TEST HOISTING
// if( function_exists('site_info') ) {
//   show("Yes, the function 'site_info' exists!");
// }


/* GLOBALS / INIT
--------------------------------------*/
$get_page   = router(); //show($get_page);

//show( query('settings') );

/* PARAMETERS
--------------------------------------*/
$params = [
  'get_page'    => $get_page,
  'settings'   => query('settings'),
  'active_page' => query('page', [$get_page])
];

//show( $params['settings'] );


/* ROUTER
--------------------------------------*/
function router() {

  $self = str_replace('index.php', '', $_SERVER['PHP_SELF']); //show($self);
  $slug = str_replace($self, '', $_SERVER['REQUEST_URI']); //show($slug);

  if( empty($slug) ) {
    $slug = query('home_slug')['slug'];
    //$slug = $home_slug['slug'];
;  }

  return $slug;
  //$root_arr = explode('/', $root); show($root_arr);
  //$last = end($root_arr); show('Last: '.$last);

}
//show( router() );


/* MENU HTML ITEMS
--------------------------------------*/
function menu_items($params = []) {

  $pages = query('menus'); //show($pages);
  $get_page = $params['get_page'];

  $menu_items = '';

  if(!$pages) {
    return 'You have no pages !';
  }

  //START LOOP
  foreach($pages as $page) {
  
    $menu = $page['menu']; //show($menu);
    $slug = $page['slug'];
    
    $active = ($get_page === $slug) ? ' active' : '';
  
    $menu_items .= '<li class="menu-item'.$active.'"><a href="'.$slug.'">'.$menu.'</a></li>'.PHP_EOL;
  
  }

  return $menu_items;

}


/* ACTIVE PAGE
--------------------------------------*/
function content($params = []) {

  $content = $params['active_page']['content'];

  return $content;

}


/* TITLE
--------------------------------------*/
function title($zone = 'content', $params = []) {

  $title = $params['active_page']['title'];
  

  if($zone === 'content') {
    return $title;
  }

  return $title.' | '.$params['settings']['global_title'];
  

}


/* SHOW FUNCTION
--------------------------------------*/
function show($data = '') {

  echo '<pre>';
  print_r($data);
  echo '</pre>';

}
