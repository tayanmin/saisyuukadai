<?php


  require_once('brog.php');

  $brog =new brog();
  $result = $brog->getById($_GET['id']);

?>




<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ブログ詳細</title>
</head>
<header>
  
</header>

<body>
<h2>ブログ詳細</h2>
<h3>タイトル：<?php echo $result['title'] ?></h3>
    <p>投稿日時：<?php echo $result['indate'] ?></p>
    <p>カテゴリ：<?php echo $brog->setCategoryName($result["category"]) ?></p>
    <hr>
    <p>本文：<?php echo $result['content'] ?></p>

  <a href="/brog_app/index.php">戻る</a>
</body>
</html>