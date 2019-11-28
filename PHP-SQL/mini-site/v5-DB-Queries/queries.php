<?php
/* QUERIES FUNCTION
 * Call this function with the proper argument to execute a query
------------------------------------------------*/
function query($zone, $params = []) {


  //START SWITCH
  switch($zone) {

    case 'settings' :
      $sql = "SELECT settings_key, settings_value FROM settings";

      $sth = db()->prepare($sql);
      $sth->execute();
      $results = $sth->fetchAll(PDO::FETCH_KEY_PAIR);

    break;

    case 'pages' :
      $sql = "SELECT 
              pages.id, 
              pages.is_home, 
              pages_langs.title, 
              pages_langs.menu, 
              pages_langs.content 
    FROM pages 
    INNER JOIN pages_langs ON pages.id = pages_langs.id
    WHERE pages.is_visible = 1";

      $sth = db()->prepare($sql);
      $sth->execute();
      $results = $sth->fetchAll();
    break;

  } //End Switch

  return $results;

} //End Function


//CALL THIS WHEN LOADING THE PAGE
$settings = query('settings'); //debug($settings);

$pages = query('pages'); debug($pages);