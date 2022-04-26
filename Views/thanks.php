<?php
require_once('../database.php');
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>お問い合わせフォーム</title>
</head>
<body>
  <?php
    $name = $_POST['name'];
    $kana = $_POST['kana'];
    $tel = $_POST['tel'];
    $email = $_POST['email'];
    $content = $_POST['content'];
    $sql = "INSERT INTO contacts(name, kana, tel,email,body,created_at) VALUES (:name, :kana, :tel, :email, :body, now())";
    $stmt = $dbh->prepare($sql);
    $params = array(":name" => $name, ':kana' => $kana, ':tel' => $tel, ':email' => $email, ':body' => $content);
    $stmt->execute($params);
    //データベース切断
    $dbh = null;

  ?>
  <div>
    <div>
      <h1>お問い合わせ 送信完了</h1>
      <p>お問い合わせありがとうございました。<br>
         内容を確認の上、回答させていただきます。<br>
        しばらくお待ちください。
      </p>
      <a href="contact.php">
        <button type="button">お問い合わせに戻る</button>
      </a>
    </div>
  </div>
</body>
</html>