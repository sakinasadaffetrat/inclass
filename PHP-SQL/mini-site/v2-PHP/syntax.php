<?php

$num = 43;
$str1 = "I'm Bob. I'm $num"; //echo($str1);
$str2 = 'I Bob.$num'; //echo $str2;

$page = $_GET['page'];

if(!empty($page)) {
  echo 'I have the page!';
}

$birth = 1966;
$current_year = (int)date('Y'); //var_dump($current_year);
$age = $current_year - $birth; //var_dump($age);

$float = (54.9); //var_dump($float);

$calculation = (3 - 2 + 2) * (4 / 2); //echo $calculation;

$nonsense = 'Bob' - 'is great';  //echo $nonsense;

$concatenate  = '';
$concatenate .= 'dada';
$concatenate .= ' trucs';
show($concatenate);

$concatenate = 'Bob is '.$age.' years old';

show($concatenate);


function show($data = '') {
  echo '<br>';
  print_r($data);
  echo '<br>';
} 