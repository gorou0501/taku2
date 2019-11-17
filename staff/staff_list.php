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
<?php
//try{

include '../database.php';
$sql = 'SELECT code,name FROM mst_staff WHERE 1';
$stmt = $dbh->prepare($sql);
$stmt->execute();

$dbh = null;

print 'スタッフ一覧<br /> <br />';

print '<form method="post" action="staff_branch.php">';
while(true)
{
    $rec=$stmt->fetch(PDO::FETCH_ASSOC);
    if($rec==false)
    {
        break;
    }
    print '<input type="radio" name="staffcode" value="'.$rec['code'].'">';
    print $rec['name'];
    print '<br />';
}
/*}
catch(Exception $e)
{
    print 'ただいま障害によりご迷惑をお掛けしております。';
    exit();
}*/

print '<input type="submit" name="disp" value="参照">';
print '<input type="submit" name="add" value="追加">';
print '<input type="submit" name="edit" value="修正">';
print '<input type="submit" name="delete" value="削除">';
print '</form>';
?>

<br />
<a href="../staff_login/staff_top.php">トップメニューへ</a> <br />
</div>
</body>
</html>
