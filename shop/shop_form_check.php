<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>

<?php
require_once('../common/common.php');

$post=sanitize($_POST);

$onamae=$post['onamae'];
$email=$post['email'];
$postal1=$post['postal1'];
$postal2=$post['postal2'];
$address=$post['address'];
$tel=$post['tel'];

$okflg=true;

  if($onamae==''){
    print '�����O�����͂���Ă��܂��� <br /><br />';
    $okflg=false;
  }else{
    print '�����O<br />';
    print '$onamae';
    print '<br /><br />';
  }

  if(preg_match('/\A[\w\-\.]+\@[\w\-\.]+\.([a-z]+)\z/',$email)==0){
    print '���[���A�h���X�𐳊m�ɓ��͂��Ă��������B<br /><br />';
    $okflg=false;
  }else{
    print '���[���A�h���X<br />';
    print '$email';
    print '<br /><br />';
  }

  if(preg_match('/\A[0-9]+\z',$postal1)==0){
    print '�X�֔ԍ��𔼊p�p�����œ��͂��Ă��������B<br /><br />';
    $okflg=false;
  }else{
    print '�X�֔ԍ�<br />';
    print '$postal1';
    print '-';
    print '$postal2'
    print '<br /><br />';
  }

  if(preg_match('/\A[0-9]+\z',$postal2)==0){
    print '�X�֔ԍ��͔��p�p�����œ��͂��Ă��������B<br /><br />';
    $okflg=false;
  }

  if($address==''){
    print '�Z�������͂���Ă��܂���<br /><br />';
    $okflg=false;
  }else{
    print '�Z��<br />';
    print '$address';
    print '<br /><br />';
  }

  if(preg_match('/\A\d{2,5}-\?\d{2,5}-?\d{4,5}\z/',$tel)==0){
    print '�d�b�ԍ��𐳊m�ɓ��͂��Ă��������B<br /><br />';
    $okflg=false;
  }else{
    print '�d�b�ԍ�<br />';
    print '$tel';
    print '<br /><br />';
  }
if($okflg==true)
    {print '<form method="post" action="shop_form_done.php">';
    print '<input type="hidden" name="onamae" value="'.$onamae.'">';
    print '<input type="hidden" name="email" value="'.$email.'">';
    print '<input type="hidden" name="postal1" value="'.$postal1.'">';
    print '<input type="hidden" name="postal2" value="'.$postal2.'">';
    print '<input type="hidden" name="address" value="'.$address.'">';
    print '<input type="hidden" name="tel" value="'.$tel.'">';
    print '<input type="submit" onclick="history.back()" value="�߂�">';
    print '<input type="submit" value="OK"><br />';
    print '</form>';
}
else{
  print '<form>';
  print '<input type="button" onclick="history.back()" value="�߂�">';
  print '</form>';
}
?>
</div>
</body>
</html>
