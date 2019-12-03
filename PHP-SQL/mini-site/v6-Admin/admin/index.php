<?php
session_start();

//$_SESSION['is_logged'] = false;

$is_logged = $_SESSION['is_logged']; //var_dump($is_logged);

//CHECK THE PASSWORD
$pass = 'bobisgreat!';
$pass_hash = password_hash($pass, PASSWORD_DEFAULT); echo $pass_hash;
echo '<hr>';
$pass_verify = password_verify($pass, $pass_hash); echo $pass_verify;

if($pass_verify) {
  $_SESSION['is_logged'] = true;
  $is_logged = $_SESSION['is_logged'];
}

if($is_logged) {
  echo "Now you can see the admin pages !";
}
else {
  //echo "You have to login first !";
}

