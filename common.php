!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Document</title>
</head>
<body>
  <?php
  function sanitize($before)
  {
    foreach($before as $key=>$value){
      $after[$key]=htmlspecialchars($value,ENT_QUOTES,'UTF-8');
    }
    return $after;
  }
  ?>
</body>
</html>