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

$staff_code=$_GET['staffcode'];    

include '../database.php';
$sql = 'SELECT name FROM mst_staff WHERE code=?';
$stmt = $dbh->prepare($sql);
$data[]=$staff_code;
$stmt->execute($data);

$rec=$stmt->fetch(PDO::FETCH_ASSOC);
$staff_name=$rec['name'];

$dbh = null;

//print 'スタッフ一覧<br /> <br />';

/*print '<form method="post" action="staff_edit.php">';
while(true)
{
    $rec = $stmt->fetch(PDO::FETCH_ASSOC);
    if($rec == false)
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

//print '<input type="submit" value="修正">';
//print '</form>';
?>

スタッフ削除 <br />
<br />
スタッフコード<br />
<?php print $staff_code; ?>
<br />
スタッフ名 <br />
<?php print $staff_name; ?>
<br />
このスタッフを削除してよろしいですか？　<br />
<br />
<form method="post" action="staff_delete_done.php">
<input type="hidden" name="code" value="<?php print $staff_code;?>">
<input type="button" onclick="history.back()" value="戻る">
<input type="submit" value="OK">
</form>
</body>
</html>
