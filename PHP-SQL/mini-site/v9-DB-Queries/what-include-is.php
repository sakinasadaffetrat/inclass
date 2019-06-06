<?php
/**
 * PHP DATA OBJECTS or PDO
 * Only one instance is allowed !
 * Based on an samples seen at https://phpdelusions.net/pdo
 */


/* DB INFO
------------------------------------------*/
$db_host    = '127.0.0.1';
$db_name    = 'mini-site';
$db_user    = 'root';
$db_pass    = ''; //On WAMP by default is '' → empty string; on XAMPP & MAMP by default is 'root'
$db_charset = 'utf8mb4';


/* DSN - Data Source Name (no spaces !!!)
------------------------------------------*/
$dsn = "mysql:host=$db_host;dbname=$db_name;charset=$db_charset";


/* PDO Options
------------------------------------------*/
$pdo_options = [

  PDO::ATTR_EMULATE_PREPARES    => false,
  PDO::ATTR_DEFAULT_FETCH_MODE  => PDO::FETCH_ASSOC,
  PDO::ATTR_ERRMODE             => PDO::ERRMODE_EXCEPTION
  
];


/* PDO OBJECT INSTANCE
------------------------------------------*/
//INIT
$db = null;

//TRY TO GET THE CONNECTION
try {
  $db = new PDO($dsn, $db_user, $db_pass, $pdo_options);
} catch (PDOException $e) {
  echo $e->getMessage();
}
		
  

/* Shortcut handler to connection
------------------------------------------*/
function db() {

	global $db;
	
	if(is_object($db)) {
    return $db; 
  }
  
  else {
    exit("DB IS NOT AN OBJECT! No database connection.");
  }

}



function query($zone, $params = []) {


  //START SWITCH
  switch($zone) {

    //QUERY THE pages TABLE
    case 'menus' :
      $sql = "SELECT menu, slug FROM pages WHERE visible = ?";

      $params = [1];

      //CLEAN UP YOUR SQL STRING
      $sth = db()->prepare($sql);

      //EXECUTE THE QUERY - With the real values
      $sth->execute($params);

      //Get the results
      $results = $sth->fetchAll();
    break;


    //QUERY PAGE
    case 'page' :
      $sql = "SELECT page_key, title, content FROM pages WHERE slug = ? LIMIT 1";

      $sth = db()->prepare($sql);
      $sth->execute($params);
      $results = $sth->fetch();
    break;


    //QUERY THE settings TABLE
    case 'settings' :
      $sql = "SELECT settings_key, settings_value FROM settings";

      $sth = db()->prepare($sql);
      $sth->execute();
      $results = $sth->fetchAll(PDO::FETCH_KEY_PAIR);
    break;


    //BY DEFAULT (if a case is not defined) DO THIS
    default : 

    break;

  } //END SWITCH


  return $results;


}


ini_set('display_errors', 1);
error_reporting(E_ALL & ~E_NOTICE);


//TEST HOISTING
// if( function_exists('site_info') ) {
//   show("Yes, the function 'site_info' exists!");
// }


/* GLOBALS / INIT
--------------------------------------*/
$get_page   = router(); //show($get_page);
$site_info  = site_info(); //show($site_info);


/* PARAMETERS
--------------------------------------*/
$params = [
  'get_page'    => $get_page,
  'site_data'   => $site_info['site-data'],
  'active_page' => query('page', [$get_page])
];




/* ROUTER
--------------------------------------*/
function router() {

  $self = str_replace('index.php', '', $_SERVER['PHP_SELF']); //show($self);
  $slug = str_replace($self, '', $_SERVER['REQUEST_URI']); //show($slug);

  if( empty($slug) ) {
    $slug = 'index';
  }

  return $slug;
  //$root_arr = explode('/', $root); show($root_arr);
  //$last = end($root_arr); show('Last: '.$last);

}
//show( router() );
 


/* SITE INFO FROM JSON [BAK]
--------------------------------------*/
function site_info() {

  //GET JSON DATA
  $json_file = 'site-data.json';

  if( ! file_exists($json_file) ) {
    //return [];
    //die("You don't have the site data file!");
    exit("You don't have the site data file!");
  }

  $json_content = file_get_contents($json_file);
  $site_data_arr = json_decode($json_content, true);

  return $site_data_arr;

}


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
function title($params = []) {

  $title = $params['active_page']['title'];

  return $title;

}


/* SHOW FUNCTION
--------------------------------------*/
function show($data = '') {

  echo '<pre>';
  print_r($data);
  echo '</pre>';

}

?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title><?php echo title($params); ?></title>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="<?php echo $params['site_data']["description"]; ?>">
  <meta name="keywords" content="<?php echo $params['site_data']["keywords"]; ?>">
  <meta name="author" content="<?php echo $params['site_data']["author"]; ?>">

  <link rel="icon" href="img/favicon.png">

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,700|Roboto:300,400">
  <link rel="stylesheet" href="css/style.css">
</head>

<body>

  <!-- HEADER -->
  <header class="header">

    <!-- Logo -->
    <figure class="logo-figure">
      <a href="./"><img src="img/logo.svg" alt="The heavy metal company"></a>
    </figure>

    <!-- Nav -->
    <nav class="nav">
      <ul class="menu">
        <?php echo menu_items($params); ?>
      </ul>
    </nav>

  </header>


  <!-- CONTENT -->
  <main class="content">

    <!-- Main Title -->
    <h1 class="main-title">
      <?php echo title($params); ?>
    </h1>

    <!-- HTML content -->
    <?php echo content($params); ?>

  </main>


  <!-- FOOTER -->
  <footer class="footer">
    <p>&copy;1998 - <?php echo date('Y'); ?> - Heavy Metal Company</p>
    <p>Last update: <?php echo $site_data['last_update']; ?></p>
  </footer>

</body>

</html>