<?php


require_once('brog.php');



$brogs = $_POST;
// var_dump($blogs);


  $brog = new Brog();
  $brog -> blogValiate($brogs);
  $brog -> blogCreate($brogs);
  


?>

<a href="/brog_app/index.php">戻る</a>