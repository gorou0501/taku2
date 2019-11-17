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
$pro_name = $_POST['name'];
$pro_price = $_POST['price'];
$pro_gazou_name = $_POST['gazou_name'];

$pro_name = htmlspecialchars($pro_name,ENT_QUOTES,'UTF-8');
$pro_price = htmlspecialchars($pro_price,ENT_QUOTES,'UTF-8');

include '../database.php';
$sql = 'INSERT INTO mst_product(name,price,gazou) VALUES (?,?,?)';
$stmt = $dbh->prepare($sql);
$data[] = $pro_name;
$data[] = $pro_price;
$data[] = $pro_gazou_name;
$stmt->execute($data);

$dbh = null;

print $pro_name;
print 'を追加しました。 <br />';

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
