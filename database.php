<?php

$dsn = 'mysql:host=localhost;dbname=casteria;charset=utf8';
$user = 'casteria_user';
$pass = 'souwa0110';

try {
  $dbh = new PDO($dsn,$user,$pass);
  $sql = 'SELECT * FROM contacts';
  $stmt = $dbh->query($sql);
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
  echo "接続失敗: " . $e->getMessage();
  exit();
};

?>