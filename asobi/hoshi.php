<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>ぼくのなつやすみ</title>
</head>
<body>
がっぽち農場
</div>
<?php

$mbango=$_POST['mbango'];

$hoshi[]='';
$hoshi['M78']='M78星雲';
$hoshi['M79']='アンドロメダ';
$hoshi['M80']='オリオン大星雲';
$hoshi['M81']='スバル';
$hoshi['M82']='L77';
// $yasai[]='セロリ';
// $yasai[]='ナス';
// $yasai[]='ピーマン';
// $yasai[]='オクラ';
// $yasai[]='サツマイモ';
// $yasai[]='大根';
// $yasai[]='ほうれん草';

// print $mbango;

foreach($hoshi as $key => $val)
{
    print $key.'は'.$val;
    print '<br />';
}

print 'あなたが選んだ星は';
print $hoshi[$mbango];
// print 'が旬です';
?>
</body>
</html>
