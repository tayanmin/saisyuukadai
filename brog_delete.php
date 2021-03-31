<?PHP



require_once('brog.php');

$brog =new brog();
$result = $brog->delete($_GET['id']);




?>

<br>
<a href="/brog_app/">戻る</a>