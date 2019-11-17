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
$pro_code = $_POST['code'];
$pro_name = $_POST['name'];
$pro_price = $_POST['price'];
$pro_gazou_name_old = $_POST['gazou_name_old'];
$pro_gazou_name = $_POST['gazou_name'];

$pro_code = htmlspecialchars($pro_code,ENT_QUOTES,'UTF-8');
$pro_name = htmlspecialchars($pro_name,ENT_QUOTES,'UTF-8');
$pro_price = htmlspecialchars($pro_price,ENT_QUOTES,'UTF-8');

include '../database.php';
$sql = 'UPDATE mst_product SET name=?,price=?,gazou=? WHERE code=?';
$stmt = $dbh->prepare($sql);
$data[] = $pro_name;
$data[] = $pro_price;
$data[] = $pro_gazou_name;
$data[] = $pro_code;
$stmt->execute($data);

$dbh = null;

if($pro_gazou_name_old != $pro_gazou_name){
    if($pro_gazou_name_old !=''){
        unlink('./gazou/'.$pro_gazou_name_old);
    }
}
//print $pro_name;
print '修正しました。 <br />';

// }
// catch(Exception $e)
// {
//     print 'ただいま障害によりご迷惑をお掛けしております。';
//     exit();
// }

?>

<a href="pro_list.php">戻る</a>
</div>
</body>
</html>
