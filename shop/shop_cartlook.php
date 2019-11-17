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

$cart=$_SESSION['cart'];
$max=count($cart);    
// var_dump($cart);
// exit();

include '../database.php';

foreach($cart as $key =>$val)
{
  $sql='SELECT code,name,price,gazou FROM mst_product WHERE code=?';
  $stmt=$dbh->prepare($sql);
  $data[0]=$val;
  $stmt->execute($data);

  $rec=$stmt->fetch(PDO::FETCH_ASSOC);

  $pro_name[]=$rec['name'];
  $pro_price[]=$rec['price'];
  if($rec['gazou']==''){
    $pro_gazou[]='';
  }
  else
  {
    $pro_gazou[]='<img src="../product/gazou/'.$rec['gazou'].'">';
  }
}
$dbh=null;
/*}
catch(Exception $e)
{
    print 'ただいま障害によりご迷惑をお掛けしております。';
    exit();
}*/

//print '<input type="submit" value="修正">';
//print '</form>';
?>
カートの中身<br />
<br />
<?php for($i=0;$i<$max;$i++){
?>
 <?php print '$pro_name[$i]'; ?>
 <?php print '$pro_gazou[$i]'; ?>
 <?php print '$pro_price[$i].円';?>
 <?php print '<br />'; ?>
 <br />
<?php 
}
?>
<form>
<input type="button" onclick="history.back()" value="戻る">
</form>
</body>
</html>
