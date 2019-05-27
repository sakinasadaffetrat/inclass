<?php
ini_set('display_errors', 1);
error_reporting(E_ALL & ~E_NOTICE);

//PHP7
$get_page = $_GET['page'] ?? 'index';

$html_file_path = 'html/'.$get_page.'.html'; 

if(file_exists($html_file_path)) {
  $html_page = file_get_contents($html_file_path);
}
else {
  $html_page = '404. The page you are looking for in not here.';
}


//GET JSON DATA
$json_content = file_get_contents("site-data.json");
$site_data_arr = json_decode($json_content, true); //show($site_data_arr);
//show($site_data_arr['pages']['work']);

// $work_arr = $site_data_arr['pages']['work'];
// $title = $work_arr['title'];
// $menu = $work_arr['menu'];



//SITE DATA ARRAY
$site_data = $site_data_arr["site-data"];
$pages = $site_data_arr["pages"]; //show($pages);
$active_page = $pages[$get_page];


/* LOOPS
--------------------------------------*/
// $num = 10;

//FOR LOOP
// for($i = 1; $i <= $num; $i++) {
//   show($i);
// }

//FOREACH LOOP
// foreach($site_data as $key => $value) {
//   show($key.' => '.$value);
// }
$menu_items = '';
foreach($pages as $keys => $value) {
    $menu_items .= '';
}


//SHOW FUNCTION
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
  <title><?php echo $active_page['title'].' - '.$site_data["global_title"]; ?></title>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="<?php echo $site_data["description"]; ?>">
  <meta name="keywords" content="<?php echo $site_data["keywords"]; ?>">
  <meta name="author" content="<?php echo $site_data["author"]; ?>">

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
        <?php echo $menu_items; ?>
      </ul>
    </nav>

  </header>


  <!-- CONTENT -->
  <main class="content">

    <!-- Main Title -->
    <h1 class="main-title"><?php echo $active_page['title']; ?></h1>

    <!-- HTML content -->
    <?php echo $html_page; ?>

  </main>


  <!-- FOOTER -->
  <footer class="footer">
    <p>&copy;1998 - <?php echo date('Y'); ?> - Heavy Metal Company</p>
    <p>Last update: <?php echo $site_data['last_update']; ?></p>
  </footer>

</body>

</html>