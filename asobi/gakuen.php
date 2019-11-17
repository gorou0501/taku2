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
    $gakuen = $_POST['gakuen'];

    switch($gakuen)
    {
        case '1':
                $kousha ='あなたの校舎は南校舎です';
                $bukatsu = '部活動にはスポーツ系と文科系があります';
                $mokuhyou = '学校に慣れましょう';
                break;

        case '2':
                $kousha ='あなたの校舎は西校舎です';
                $bukatsu = '学園祭目指して頑張ろう';
                $mokuhyou = '今しかできないこと見つける';
                break;

        case '3':
                $kousha ='あなたの校舎は東校舎です';
                $bukatsu = '後輩への引継ぎ';
                $mokuhyou = '将来への道を作ろう';
                break;

        default:
                $kousha ='あなたの校舎は三年生と同じです';
                $bukatsu = '部活動なし';
                $mokuhyou = '早く卒業しましょう';
                break;
    }

print '校舎  '.$kousha.'<br />';
print '部活  '.$bukatsu.'<br />';
print '目標  '.$mokuhyou.'<br />';
?>
</body>
</html>
