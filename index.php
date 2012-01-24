<!DOCTYPE html>
<head>
  <meta charset="utf-8">
  <title>Pattern Primer</title>
  <link rel="stylesheet" href="css/global.css">
  <link rel="stylesheet" href="css/inconsolata.css">
  <link rel="stylesheet" href="css/solarized_dark.css">
  <link rel="stylesheet" href="css/patterns.css">
</head>
<body>

<?php
  $files = array();
  $handle=opendir('patterns');
  while (false !== ($file = readdir($handle))) {
    if(stristr($file,'.html')) {
        $files[] = $file;
    }
  }
  
  sort($files);
  $section = '';
  foreach ($files as $file) {
    $thisSection = stristr( $file , '-', true );
    if ($thisSection != $section) {
      $section = $thisSection;
      echo '<h1>'.ucwords(stristr( $file , '-', true )).'</h1>';
    }
    echo '<div class="pattern">';
    echo '<div class="display">';
    include('patterns/'.$file);
    echo '</div>';
    echo '<div class="source">';
    // echo '<textarea rows="6" cols="30" class="html">';
    echo '<pre><code class="html">';
    echo htmlspecialchars(file_get_contents('patterns/'.$file));
    echo '</code></pre>';
    // echo '</textarea>';
    echo '<p><a href="patterns/'.$file.'">'.$file.'</a></p>';
    echo '</div>';
    echo '</div>';
  }
?>

<script src="js/highlight.js"></script>
<script src="js/patterns.js"></script>
</body>
</html>