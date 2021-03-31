<?php


Class Dbc
{
  protected $table_name;
  // protected $table_name = 'brog';
  
    // namespace Brog\Dbc; 
    // データベースに接続
  protected function dbConnect() {
    try {
      $pdh = new \PDO('mysql:dbname=brog_app;charset=utf8;host=localhost','root','',
      [ \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
      ]);
  
    } catch (\PDOException $e) {
      echo 'データベースに接続できませんでした。'.$e->getMessage();
      exit();
    };
    return $pdh;  
    
  }
  
  // SELET文
public function getAll(){
    
  $pdh  = $this->dbConnect();

  $sql = "SELECT * FROM brog";
  $stmt = $pdh->query($sql);
  $result = $stmt->fetchall(\PDO::FETCH_ASSOC);
  // var_dump($result);
  return  $result;
  $pdh = null;
  
}
// 取得したデータを表示
// $blogDate = getAllBlog();




// 関数　getBlog
// 引数 id
  public function getById($id){
      if(empty($id)){
        exit('idが不正です');
      }
      
      $pdh =  $this->dbConnect();
      
      // SQL文準備　プレースホルダ
      $stmt = $pdh->prepare("SELECT * FROM brog where id = :id");
      $stmt->bindValue(':id',(int)$id, \PDO::PARAM_INT);
  // SQL実行
      $stmt->execute();
      // 閣下を取得
      $result = $stmt->fetch(\PDO::FETCH_ASSOC);
      // var_dump($result);
      if(!$result){
        exit ('ブログがありません');
      }
      return $result;
      
    }


  public function delete($id){

    if(empty($id)){
      exit('idが不正です');
    }
    
      $pdh =  $this->dbConnect();
      
      // SQL文準備　プレースホルダ
      $stmt = $pdh->prepare("DELETE FROM brog where id = :id");
      $stmt->bindValue(':id',(int)$id, \PDO::PARAM_INT);
      $result = $stmt->fetch(\PDO::FETCH_ASSOC);

      $stmt->execute();
    echo 'ブログを削除しました';
      return $result;
    
    }

}
?>




