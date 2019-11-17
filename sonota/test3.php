<?php
    $test = 'hoge';
    $test2[] = 'foo'; //0番目
    $test2[] = 'bar'; //1番目

    print('test');
    print '<br>';
    print($test);
    print '<br>';
    print_r($test2);
    print '<br>';
    print $test;

    //var_dump($test);
    //var_dump($test2);

    $a = 1;
    $b = 3;

    print($a + $b);
    print'<br>';
    print($test.$a); 
    print '<br>';

?>

<br />
<?php print $test ?>
<br />

<?=$test?>
