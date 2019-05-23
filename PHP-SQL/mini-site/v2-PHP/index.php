<?php
ini_set('display_errors', 1);
error_reporting(E_ALL & ~E_NOTICE);
 
$get_page = $_GET['page'];

if(empty($get_page)) {
  $get_page = 'index';
}

echo $get_page;

$html_page = file_get_contents('html/'.$get_page.'.html');
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>This will be the global TITLE</title>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="How to use PHP to create a dynamic website">
  <meta name="keywords" content="php,dynamic site,cool,raoul">
  <meta name="author" content="Sorin Paun">

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
      </ul>
    </nav>

  </header>


  <!-- CONTENT -->
  <main class="content">

    <!-- Main Title -->
    <h1 class="main-title">This is the PLACEHOLDER for the TITLE</h1>

    <!-- HTML content -->
    <?php echo $html_page; ?>

  </main>


  <!-- FOOTER -- >
  <footer class="footer">
    <p>&copy;1998 - <?php echo date('Y'); ?> - Heavy Metal Company</p>
  </footer>

</body>

</html>