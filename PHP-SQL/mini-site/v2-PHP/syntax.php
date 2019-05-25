<?php
ini_set("display_errors", 1);
error_reporting(E_ALL & ~E_NOTICE);

// $num = 43;
// $str1 = "I'm Bob. I'm $num"; //echo($str1);
// $str2 = 'I Bob.$num'; //echo $str2;

// $page = $_GET['page'];

// if(!empty($page)) {
//   echo 'I have the page!';
// }

// $birth_year = 1966;
// $birth_month = 5; //<6
// $current_month = date('n');
// $current_year = (int)date('Y'); //casting string into int

// if($birth_month > $current_month) {
//   $age_adjustment = 1;
// }
// else {
//   $age_adjustment = 0;
// }

//TERNARY OPERATOR
// $age_adjustment = ($birth_month >= $current_month) ? 1 : 0; 

// show($age_adjustment);

// $age = $current_year - $birth_year - $age_adjustment; show($age);

// $float = (54.9); //var_dump($float);

// $calculation = (3 - 2 + 2) * (4 / 2); //echo $calculation;

// $nonsense = 'Bob' - 'is great';  //echo $nonsense;

// $concatenate  = '';
// $concatenate .= 'dada';
// $concatenate .= ' trucs';
// //show($concatenate);

// $concatenate = 'Bob is '.$age.' years old';

//show($concatenate);
//show($_GET);


// $zip_code = 1800;

// //1600 1700

// //IF BOTH CONDITIONS ARE TRUE - Run the code!
// if($zip_code > 1600 && $zip_code < 1700) {
//   show("Yes, we are in the Fribourg Canton");
// }
// else {
//   show("Outside Fribourg");
// }



// $zip_code1 = 1800;
// $zip_code2 = 1700;

// $zip_code_mine = 1700;

// if($zip_code1 === $zip_code_mine || $zip_code2 === $zip_code_mine) {
//   show("Yes my zip code is valid");
// }


// $arr = array();
// $arr = [];
// $arr = array(3, "String", true, 43.5);
$arr = [3, "String", true, 43.5]; // PHP >= 5.6
//show( $arr[0] );

//JS VARIANTE
// var arr_with_keys = {
//   'Sorin': 52,
//   'Bob': 97
// }
//arr_with_keys.length;
  
$arr_with_keys = [
  'Sorin' => 52,
  'Bob' => 97,
  'Agnes' => 'dead'
];


//SHOW THE ARRAY
show( $arr_with_keys );

//SHOW JUST THE ARRAY KEYS
show( array_keys($arr_with_keys) );

//SHOW JUST THE ARRAY VALUES
show( array_values($arr_with_keys) );

//COUNT THE ITEMS INSIDE THE ARRAY
show( count($arr_with_keys) );


function show($data = '') {

  echo '<pre>';
  print_r($data);
  echo '</pre>';

}