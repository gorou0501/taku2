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

スタッフ修正 <br />
<br />
スタッフコード<br />
<?php print $staff_code; ?>
<br />
<br />
<form method="post" action="staff_edit_check.php">
<input type="hidden" name="code" value="<?php print $staff_code;?>">
スタッフ名 <br />
<input type="text" name="name" style="width:200px" value="<?php print $staff_name;?>"><br />

パスワードを入力してください。 <br />
<input type="password" name="pass" style="width:100px"><br />
パスワードをもう一度入力してください。 <br />
<input type="password" name="pass2" style="width:100px"><br />
<br />
<input type="button" onclick="history.back()" value="戻る">
<input type="submit" value="OK">
</form>
</body>
</html>
