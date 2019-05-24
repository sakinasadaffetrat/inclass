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
$site_data_arr = json_decode($json_content, true);

//SITE DATA ARRAY
$site_data = $site_data_arr["site-data"];
$pages = $site_data_arr["pages"];
$active_page = $pages[$get_page];


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
  <title><?php echo $site_data["global_title"]; ?></title>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="author" content="">

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
        <li class="menu-item active"><a href="?page=index">HOME</a></li>
        <li class="menu-item"><a href="?page=work">WORK</a></li>
        <li class="menu-item"><a href="?page=contact">CONTACT</a></li>
        <li class="menu-item"><a href="?page=bob">BOB</a></li>
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


  <!-- FOOTER -- >
  <footer class="footer">
    <p>&copy;1998 - <?php echo date('Y'); ?> - Heavy Metal Company</p>
  </footer>

</body>

</html>