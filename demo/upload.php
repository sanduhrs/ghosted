<?php

$folder = 'uploads';
if (!empty($_FILES)) {
  $file = $_FILES['file']['tmp_name'];
  $target = dirname(__FILE__) . DIRECTORY_SEPARATOR . $folder . DIRECTORY_SEPARATOR;
  $destination =  $target . preg_replace('/[\s\W]+/', '_', pathinfo($_FILES['file']['name'], PATHINFO_FILENAME)) . '.' . pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
  move_uploaded_file($file, $destination);

  header('Content-type: application/json; charset=utf-8');
  print json_encode([
    'path' => DIRECTORY_SEPARATOR . implode(DIRECTORY_SEPARATOR, [$folder, pathinfo($destination, PATHINFO_BASENAME)]),
  ]);
}
