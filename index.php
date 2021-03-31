
<?php



  require_once('brog.php');
  // $id = $_GET['id'];

  $brog =new Brog();
  $brogDate = $brog -> getAll();

  function h ($s){
      return htmlspecialchars($s, ENT_QUOTES, "UTF-8");
  }


?>




<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ブログ一覧</title>
</head>
<body>
<header>




</header>

<h2>ブログ一覧</h2>
<p><a href="/brog_app/form.html">新規作成</a></p>

  <table>
    <tr>

      <th>タイトル</th>
      <th>カテゴリ</th>
      <th>投稿日時</th>
    </tr>
    <?php foreach($brogDate as $column): ?>
    <tr>

      <td><?php echo h($column["title"]) ?></td>
      <td><?php echo h($brog->setCategoryName($column["category"])) ?></td>
      <td><?php echo h($column["indate"]) ?></td>
      <td><a href="/brog_app/detail.php?id=<?php echo h($column["id"]) ?>">詳細</a></td>
      <td><a href="/brog_app/brog_delete.php?id=<?php echo h($column["id"]) ?>">削除</a></td>
    
    </tr>
    <?php endforeach; ?>
  </table>  

</body>
</html>






