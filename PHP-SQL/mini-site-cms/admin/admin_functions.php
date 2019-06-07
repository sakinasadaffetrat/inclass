<?php
/**
 * ERROR REPORTING
 * ----------------------------------------------
 * DONE WITH .htaccess
 * We call this "server level" errors
 */



/**
 * START SESSION - TODO
 * ----------------------------------------------
 * We need this at the very top so we can check
 * admin session before doing something else
 */
$hash = password_hash('bobisgreat!', PASSWORD_DEFAULT); show($hash);


/**
 * GLOBALS
 * ----------------------------------------------
 * Globally available variables & init stuff
 * We store the values to "inject" into our functions 
 */
/*#region GLOBALS*/
//ADMIN PAGES ARR
$admin_pages = [

  //PAGES
  'pages' => [
    'menu'    => 'PAGES',
    'file'    => 'pages.php',
    'actions' => [
      'pages',
      'edit-page',
      'new-page'
    ]
  ],

  //SETTINGS
  'settings' => [
    'menu' => 'SETTINGS',
    'file'  => 'settings.php',
    'actions' => [
      'settings',
      'edit-settings',
      'new-settings',
    ]
  ],

  //LOGIN
  'login' => [
    'menu'    => 'LOGIN',
    'file'    => 'login.php',
    'actions' => [
      'login',
      'check-login',
      'logout'
    ],
  ],

  //CRUD
  'crud-actions' => [
    'new-page',
    'update-page',
    'delete-page',

    'update-settings'
  ]

];


//ADMIN MAIN URI VARS
$params = [
  'admin_pages' => $admin_pages,
  'page'        => req('page'), //$_GET['page']
  'action'      => req('action'), //$_GET['action']
  'crud-action' => req('crud-action') //$_GET['crud-action']
];
/*#endregion*/




//----------------------------- ↓↓↓ FUNCTIONS↓↓↓  -----------------------------//




/**
 * ADMIN PAGE - TODO
 * ----------------------------------------------
 */
/*#region ADMIN PAGE*/
function admin_page($params = []) {


  //1. FORCE LOGIN PAGE IF NOT ADMIN SESSION !
  if(!is_admin()) {

    require_once('login.php');

    return;

  }


  //2. GET PAGE
  


  //3. IF EMPTY PAGE - Redirect to the default admin page
  

  //4. ADMIN FILE SHORTCUT
  

  //5. IF FILE EXISTS - REQUIRE FILE...
  
    
    //5.1 ADMIN VARS - Will be available on admin page we call bellow
    

    //5.2 CHECK IF ACTION IS VALID
    

    //5.3 ELSE... BUFFER THE FILE CONTENT
    
    
  

  //6. FILE DO NOT EXISTS, SHOW A MESSAGE
  

  //7. RETURN ADMIN CONTENT
  


}
/*#endregion*/



/**
 * ADMIN HEADER
 * ----------------------------------------------
 */
/*#region HEADER*/
function admin_header($params = []) {

  $title    = $params['title'];
  $buttons  = $params['buttons'];

  $html = '
  <header class="admin-header uk-flex uk-flex-between uk-flex-top">
    <h1 class="header-left uk-h3">'.$title.'</h1>
    <div class="header-right">'.$buttons.'</div>
  </header>
  ';

  return $html;

}
/*#endregion*/



/**
 * REQUEST
 * ----------------------------------------------
 * MERGE $_GET & $_POST ARRAYS
 */
/*#region REQUEST*/
function req($val) {

  //MERGE POST AND GET METHODS
  $req = [];
  $req = array_merge($_POST, $_GET) ;

  if(!empty($val) && !empty($req)) {
    return $req[$val];
  }

  return false;

}
/*#endregion*/



/**
 * CHECK LOGIN - TODO
 * ----------------------------------------------
 * MERGE $_GET & $_POST ARRAYS
 */
/*#region CHECK LOGIN*/
function check_login($post = []) {


  //CODE...


}
/*#endregion*/


/**
 * LOGOUT - TODO
 * ----------------------------------------------
 * UNSET ADMIN SESSION
 */
/*#region LOGOUT*/
function logout() {

  //CODE...

}
/*#endregion*/



/**
 * ACTION SHORTCUT
 * ----------------------------------------------
 * Admin action
 */
/*#region ACTION*/
function action() {

	return req('action');

}
/*#endregion*/



/**
 * IS ADMIN SHORTCUT - TODO
 * ----------------------------------------------
 * Check admin session
 */
/*#region ADMIN*/
function is_admin() {

  if( isset($_SESSION['is_admin']) &&  $_SESSION['is_admin'] === true) {
    return true;
  }

  return false;

}
/*#endregion*/



/**
 * REDIRECT SHORCCUT
 * ----------------------------------------------
 */
/*#region REDIRECT*/
function redirect($url) {
	
	if (!headers_sent()) {
		header('Location:'.$url);
		exit();
	}

}
/*#endregion*/



/**
 * FIND STRING
 * ----------------------------------------------
 */
/*#region FIND STRING*/
function findstr($find, $str) {
	
	if(is_array($str)) {
		return false;
	}
	
	$pos = ($str != '') ? strpos($str, $find) : false;
	
	if($pos !== false) {
    return true;
  }

  return false;
	
}
/*#endregion*/



/**
 * MENU (HTML)
 * ----------------------------------------------
 * An example of a dynamic menu
 * Check the active page and add a CSS class
 */
/*#region MENU*/
function admin_menu($params = []) {

  if(!is_admin()) {
    return false;
  }

  //PARAMS
  $admin_pages = $params['admin_pages'];


  if(empty($admin_pages)) {
    return 'Admin pages array is empty!';
  }


  //START LIST
  $html = '<ul id="admin-menu" class="menu">'.PHP_EOL;


  //START LOOP
  foreach($admin_pages as $key => $page) {

    //SKIP CRUD MENU
    if($key === 'crud-actions') {
      continue;
    }

    //MENU STRING AND LINK
    if($key === 'login') {
      $menu = (is_admin()) ? 'LOGOUT' : $page['menu'];
      $uri_extra = '&action=logout';
    }
    else {
      $menu = $page['menu'];
      $uri_extra = '';
    }

    $active = $key === req('page') ? ' active' : '';

    $html .= '<li class="menu-item'.$active.'"><a href="?page='.$key.$uri_extra.'">'.$menu.'</a></li>';

  } //END LOOP


  $html .= '</ul>'.PHP_EOL; //END LIST


  return $html;


}
/*#endregion*/



/**
 * SLUGIFY A STRING
 * ----------------------------------------------
 * Thanks to: https://stackoverflow.com/a/10152907
 */
/*#region SLUGIFY*/
function slugify($text, $strict = true) {
	
	$text = html_entity_decode($text, ENT_QUOTES, 'UTF-8');
	
	//replace dots by -
	if($strict) {
		$text = str_replace(".", "-", $text);
	}
	
	//replace non letter or digits by -
	$text = preg_replace('~[^\\pL\d.]+~u', '-', $text);

	//trim
	$text = trim($text, '-');
	setlocale(LC_CTYPE, 'en_GB.utf8');
	
	//transliterate
	if(function_exists('iconv')) {
		$text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
	}

	//lowercase
	$text = strtolower($text);
	
	//remove unwanted characters
	$text = preg_replace('~[^-\w.]+~', '', $text);
  
  //return something weird if the text is empty so we can see a result
	if(empty($text)) {
		return 'empty_$';
	}

	
	return $text;
	
}
/*#endregion*/


/**
 * PDO NUM ROWS
 * ----------------------------------------------
 * Count SQL table items
 */
/*#region PDO NUM ROWS*/
function pdo_num_rows($endquery, $params = []) {
	
	$sql = "SELECT COUNT(*) FROM ".$endquery;
	
	try {
		
		$sth = db()->prepare($sql);
		$sth->execute($params);
		$tot = $sth->fetchColumn();
		
	} catch(PDOException $e) {
		show($e->getMessage());
	}
	
	return (int)$tot;

}
/*#endregion*/



/**
 * SIMPLE SHOW CODE
 * ----------------------------------------------
 * A simple code display with <pre> formatting
 */
/*#region SHOW*/
function show($data = '', $do_exit = false) {
	
	echo '<pre>';
	print_r($data);
  echo '<pre>';
  
  if($do_exit) {
    exit();
  }
	
}
/*#endregion*/