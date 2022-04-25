<?php
require_once('../Models/Contact.php');
$name    = $_POST['name'];
$kana    = $_POST['kana'];
$tel     = $_POST['tel'];
$email   = $_POST['email'];
$content = $_POST['content'];
$id      = $_POST["id"];
$sql     = "UPDATE contacts SET name = :name, kana = :kana, tel = :tel, email = :email, body = :body, created_at = now() WHERE id = :id";
$stmt    = $dbh->prepare($sql);
$params  = array(":name" => $name, ':kana' => $kana, ':tel' => $tel, ':email' => $email, ':body' => $content, ':id' => $id);
$stmt->execute($params);
//データベース切断
$dbh = null;
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>更新完了</title>
</head>
<body>
<h1>更新完了です</h1>
  <p><a href="../views/contact.php">問い合わせ入力に戻る</a></p>
</body>
</html>