<?php
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
      $sql = "SELECT page_key, title, content FROM pages WHERE slug = ?";

      $sth = db()->prepare($sql);
      $sth->execute($params);
      $results = $sth->fetchAll();
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
