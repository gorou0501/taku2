<!DOCTYPE html>
<?php
session_start();
session_regenerate_id(true);
if(isset($_SESSION['member_login'])==false)
{
    print 'ようこそゲスト様<br />';
    print '<a href="../member_login/member_login.html">会員ログインへへ</a>';
    exit();
}
else
{
    print $_SESSION['member_name'];
    print '様 <br />';
    print '<a href="member_logout.php">ログアウト</a><br />';
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

include '../database.php';
$sql = 'SELECT code,name,price FROM mst_product WHERE 1';
$stmt = $dbh->prepare($sql);
$stmt->execute();

$dbh = null;

print '商品一覧<br /> <br />';

//print '<form method="post" action="pro_branch.php">';
while(true)
{
    $rec=$stmt->fetch(PDO::FETCH_ASSOC);
    if($rec==false)
    {
        break;
    }
    print '<a href="shop_product.php?procode='.$rec['code'].'">';
    print $rec['name'].'___';
    print $rec['price'].'円';
    print '</a>';
    print '<br />';
}
/*}
catch(Exception $e)
{
    print 'ただいま障害によりご迷惑をお掛けしております。';
    exit();
}*/


?>
</div>
</body>
</html>
