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
がっぽち農場
</div>
</body>
ショップ管理メニュー<br />
<br />
<a href="../staff/staff_list.php">スタッフ管理</a> <br />
<br />
<a href="../product/pro_list.php">商品管理</a> <br />
<br />
<a href="staff_logout.php">ログアウト</a><br />
<br />
</html>
