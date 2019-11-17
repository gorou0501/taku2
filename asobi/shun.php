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

$tsuki=$_POST['tsuki'];

$yasai[]='';
$yasai[]='ブロッコリー';
$yasai[]='カリフラワー';
$yasai[]='レタス';
$yasai[]='みつば';
$yasai[]='アスパラガス';
$yasai[]='セロリ';
$yasai[]='ナス';
$yasai[]='ピーマン';
$yasai[]='オクラ';
$yasai[]='サツマイモ';
$yasai[]='大根';
$yasai[]='ほうれん草';

print $tsuki;
print '月は';
print $yasai[$tsuki];
print 'が旬です';
?>
</body>
</html>
