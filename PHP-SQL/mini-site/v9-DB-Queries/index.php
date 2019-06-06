<?php
require_once('php/pdo.php');
require_once('php/queries.php');
require_once('php/functions.php');
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title><?php echo title('head', $params); ?></title>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="<?php echo $params['settings']["description"]; ?>">
  <meta name="keywords" content="<?php echo $params['settings']["keywords"]; ?>">
  <meta name="author" content="<?php echo $params['settings']["author"]; ?>">

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
      <?php echo title('content', $params); ?>
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