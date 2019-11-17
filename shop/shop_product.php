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

include '../database.php';
$sql = 'SELECT name,price,gazou FROM mst_product WHERE code=?';
$stmt = $dbh->prepare($sql);
$data[]=$pro_code;
$stmt->execute($data);

$rec=$stmt->fetch(PDO::FETCH_ASSOC);
$pro_name=$rec['name'];
$pro_price=$rec['price'];
$pro_gazou_name=$rec['gazou'];

$dbh = null;

if($pro_gazou_name==''){
    $disp_gazou='';
}
else{
    $disp_gazou='<img src="../product/gazou/'.$pro_gazou_name.'">';
}

print '<a href="shop_cartin.php?procode='.$pro_code.'">カートに入れる</a><br /><br />';

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

商品情報参照 <br />
<br />
商品コード<br />
<?php print $pro_code; ?>
<br />
商品名 <br />
<?php print $pro_name ?>
<br />
価格 <br />
<?php print $pro_price ?>円
<br />
<?php print $disp_gazou; ?>
<br />
<form>
<input type="button" onclick="history.back()" value="戻る">
</form>
</body>
</html>
