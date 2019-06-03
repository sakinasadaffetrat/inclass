<?php
function query($zone) {


  //START SWITCH
  switch($zone) {

    case 'menus':
      $sql = "SELECT menu, slug FROM pages WHERE visible = ?";

      $params = [1];

      $sth = db()->prepare($sql);
      $sth->execute($params);

      $results = $sth->fetchAll();
    break;

  } //END SWITCH

  return $results;

}

var_dump( query('menus') );
