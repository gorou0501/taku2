<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Document</title>
</head>
<body>
  <?php

  require_once('../common/common.php');

  $seireki = $_POST['seireki'];

  $wareki = gengo($seireki);
  print $wareki;

  function gengo($seireki)
  {
    if(1868<=$seireki && $seireki<=1911){
      $gengo='–¾Ž¡';
    }
    if(1912<=$seireki && $seireki<=1925){
      $gengo='‘å³';
    }
    if(1926<=$seireki && $seireki<=1988){
      $gengo='º˜a';
    }
    if(1989<=$seireki){
      $gengo='•½¬';
    }

    return($gengo);
  }
  ?>
</body>
</html>