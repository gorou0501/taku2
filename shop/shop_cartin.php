<!DOCTYPE html>
<?php
session_start();
session_regenerate_id(true);
if(isset($_SESSION['member_login'])==false)
{
    print 'ようこそゲスト様<br />';
    print '<a href="member.login.html">会員ログイン</a>';
    print '</a>';
}
else
{
    print 'ようこそ';
    print $_SESSION['member_name'];
    print '様';
    print '<a href="member_login.php">ログアウト</a>'<br />;
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

$cart[]=$pro_code;
$_SESSION['cart']=$cart;

foreach($cart as $key => $val)
{
  print $val;
  print '<br />';

}

}
catch(Exception $e)
{
    print 'ただいま障害によりご迷惑をお掛けしております。';
    exit();
}

?>

カートに追加しました。<br />
<br />
<a href="shop_list.php">商品一覧に戻る</a>
</body>
</html>
