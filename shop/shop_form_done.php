<?php
  session_start();
  session_regenerate_id(true);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<?php
try
{require_once('../common/common.php');

$post=sanitize($_POST);

$onamae=$post['onamae'];
$email=$post['email'];
$postal1=$post['postal1'];
$postal2=$post['postal2'];
$address=$post['address'];
$tel=$post['tel'];


print $onamae.'様 <br />';
print 'ご注文ありがとうございました';
print $email.'にメールを送りましたのでご確認ください';
print '商品は以下の住所に発送させていただきます';
print $postal1.'-'.$postal2.'<br />';
print $address.'<br />';
print $tel.'<br />';

$honbun='';
$honbun.=$onamae."様\n\nこのたびはご注文いただきありがとうございました。\n";
$honbun.="\n";
$honbun.="ご注文商品\n";
$honbun.="--------------------------\n";

$cart=$_SESSION['cart'];
$kazu=$_SESSION['kazu'];
$max=count($cart);

include '../database.php';

for($i=0;$i<$max;$i++){
    $sql='SELECT name,price,FROM mst_product WHERE code=?';
    $stmt=$dbh->prepare($sql);
    $data[0]=$cart[$i];
    $stmt->execute($data);

    $rec=$stmt->fetch(PDO::FETCH_ASSOC);

    $name=$rec['name'];
    $price=$rec['price'];
    $suryo=$kazu['$i'];
    $shokei=$price*$suryo;

    $honbun.=$name.' ';
    $honbun.=$price.'円 x';
    $honbun.=$suryo.'個 = ';
    $honbun.=$shokei."円 \n";

}
$dbh=null;

$honbun.="送料は無料です";
$honbun.="----------------";
$honbun.="\n";
$honbun.="代金は以下の口座にお振り込みください";
$honbun.="ろくまる銀行 やさい支店 普通口座 1234567\n";
$honbun.="入金確認が取れ次第、梱包、発送させていただきます。\n";
$honbun.="\n";
$honbun.="                   \n";
$honbun.="  安心野菜のろくまる農園  \n";
$honbun.="\n";
$honbun.="  県学園都市 123-4\n";
$honbun.="電話 090-5555-xxxx\n";
$honbun.="メール info@gakuenntoshi.co.jp";
$honbun.="                                \n";

// print '<br />';
// print nl2br($honbun);

$title='ご注文ありがとうございます。';
$header='From:info@gakuenntishi.co.jp';
}

catch{
  print '障害発生中';
  exit();
}
?>
</div>
</body>
</html>