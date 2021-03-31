<?php


require_once('dbc.php');

Class Brog extends Dbc

{
  protected $table_name = "brog";

// カテゴリーを表示
  public function setCategoryName($category){
    if ($category === '1'){
      return '日常';
    }elseif ($category === '2'){
      return '料理';
    } elseif ($category === '3') {
      return '旅行';
    }else {
      return 'その他';
      
    }
  }


  public function blogCreate($brogs){
    
    $sql = "INSERT INTO 
             brog(title, content, category, publish_status);
            VALUES
             (:title,:content,:category,:publish_status)";



    $pdh = $this->dbConnect();
    $pdh->beginTransaction();

  try {

      $stmt = $pdh->prepare($sql);
      $stmt->bindValue(':title',$brogs['title'], PDO::PARAM_STR);
      $stmt->bindValue(':content',$brogs['content'], PDO::PARAM_STR);
      $stmt->bindValue(':category',$brogs['category'], PDO::PARAM_INT);
      $stmt->bindValue(':publish_status',$brogs['publish_status'], PDO::PARAM_INT);
      $stmt->execute();
      $pdh->commit();
      echo 'ブログを投稿しました';

    } catch (PDOException $e) {
      $pdh->rollBack();
      exit($e);
  }
}

  public function blogUpdate($brogs){
    $sql = "UPDATE brog SET 
             title = :title, content = :content, category = :category, publish_status = :publish_status
            WHERE
              id = :id";



        $pdh = $this->dbConnect();
        $pdh->beginTransaction();
  
      try {

        $stmt = $pdh->prepare($sql);
        $stmt->bindValue(':title',$brogs['title'], PDO::PARAM_STR);
        $stmt->bindValue(':content',$brogs['content'], PDO::PARAM_STR);
        $stmt->bindValue(':category',$brogs['category'], PDO::PARAM_INT);
        $stmt->bindValue(':publish_status',$brogs['publish_status'], PDO::PARAM_INT);
        $stmt->bindValue(':id',$brogs['id'], PDO::PARAM_INT);
        $stmt->execute();
        $pdh->commit();
        echo 'ブログを更新しました';

        } catch (PDOException $e) {
            $pdh->rollBack();
          exit($e);
        }

}

// ブログのバリデーション
public function blogValiate($brogs){

  if(empty($brogs['title'])){
    exit('タイトルを入力してください');
  }
  
  if (mb_strlen($brogs['title']) > 191){
    exit('タイトルは191文字以内で入力してください');
  }
  if(empty($brogs['content'])){
    exit('本文を入力してください');
  }
  if(empty($brogs['category'])){
    exit('カテゴリは必須です');
  }
  if(empty($brogs['publish_status'])){
    exit('公開ステータスは必須です');
  }

}

}



?>
<!-- <a href="/brog_app/">戻る</a> -->