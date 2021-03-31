<?php


  require_once('brog.php');



  $brogs = $_POST;
  // var_dump($blogs);


  $brog = new Brog();
  $brog -> blogValiate($brogs);
  $brog -> blogUpdate($brogs);
  


?>