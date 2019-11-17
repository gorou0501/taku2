<!DOCTYPE html>
<?php
session_start();
session_regenerate_id(true);
if(isset($_SESSION['login'])==false)
{
    print 'ログインされていません。<br />';
    print '<a href="../staff_login/staff?login.html">ログイン画面へ</a>';
    exit();
}
else
{
    print $_SESSION['staff_name'];
    print 'さんログイン中 <br />';
    print '<br />';
}
?>
<html>
<head>
    <meta charset="UTF-8">
    <title>ぼくのなつやすみ</title>
</head>
<body>
<?php
//try{

$pro_code=$_GET['procode'];    

include '../database.php';
$sql = 'SELECT name,gazou FROM mst_product WHERE code=?';
$stmt = $dbh->prepare($sql);
$data[]=$pro_code;
$stmt->execute($data);

$rec=$stmt->fetch(PDO::FETCH_ASSOC);
$pro_name=$rec['name'];
$pro_gazou_name=$rec['gazou'];

$dbh = null;

if($pro_gazou_name==''){
    $disp_gazou='';
}
else{
    $disp_gazou ='<img src="./gazou/'.$pro_gazou_name.'">';
}

//print 'スタッフ一覧<br /> <br />';

/*print '<form method="post" action="pro_edit.php">';
while(true)
{
    $rec = $stmt->fetch(PDO::FETCH_ASSOC);
    if($rec == false)
    {
        break;
    }
    print '<input type="radio" name="procode" value="'.$rec['code'].'">';
    print $rec['name'];
    print '<br />';
}
/*}
catch(Exception $e)
{
    print 'ただいま障害によりご迷惑をお掛けしております。';
    exit();
}*/

//print '<input type="submit" value="修正">';
//print '</form>';
?>

商品削除 <br />
<br />
商品コード<br />
<?php print $pro_code; ?>
<br />
商品名 <br />
<?php print $pro_name; ?>
<br />
<?php print $disp_gazou; ?>
<br />
この商品を削除してよろしいですか？　<br />
<br />
<form method="post" action="pro_delete_done.php">
<input type="hidden" name="code" value="<?php print $pro_code;?>">
<input type="hidden" name="gazou_name" value="<?php print $pro_gazou_name;?>">
<input type="button" onclick="history.back()" value="戻る">
<input type="submit" value="OK">
</form>
</body>
</html>
