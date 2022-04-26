<?php
if( ! function_exists('h') ) {
  function h($s) {
    echo htmlspecialchars($s, ENT_COMPAT, "UTF-8");
  }
}

// フォームボタン押されたら
if($_SERVER["REQUEST_METHOD"] === "POST") {
  // フォームから送信されたデータを各変数に格納
  $name       = $_POST["name"];
  $kana       = $_POST["kana"];
  $tel        = $_POST["tel"];
  $email      = $_POST["email"];
  $content    = $_POST["content"];
}

?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>お問い合わせフォーム</title>
  <link rel="stylesheet" href="./css/confirm.css">
  <link rel="stylesheet" href="./css/css/bootstrap.min.css">
</head>
<body>
<div class="container">
  <h1 class="company">Company Name</h1>
  <div class="row">
    <div class="col-10">
      <h2>お問い合わせ</h2>
    </div>
  </div>
  <div class="row">
    <div class="col-8">
      <form action="thanks.php" method="post">
        <input type="hidden" name="name" value="<?php echo $name; ?>">
        <input type="hidden" name="kana" value="<?php echo $kana; ?>">
        <input type="hidden" name="tel" value="<?php echo $tel; ?>">
        <input type="hidden" name="email" value="<?php echo $email; ?>">
        <input type="hidden" name="content" value="<?php echo $content; ?>">
        <h1 class="contact_title">お問い合わせ　内容確認</h1>
        <p>お問い合わせ内容はこちらで宜しいでしょうか？<br>
          宜しければ「送信する」ボタンを押してください
        </p>
        <div class="form">
          <table class="table table-bordered">
            <tr>
              <th>お名前</th>
              <th><?php echo h($_POST['name']); ?></th>
            </tr>
            <tr>
              <th>フリガナ</th>
              <th><?php echo h($_POST['kana']); ?></th>
            </tr>
            <tr>
              <th>電話番号</th>
              <th><?php echo h($_POST['tel']); ?></th>
            </tr>
            <tr>
              <th>メールアドレス</th>
              <th><?php echo h($_POST['email']); ?></th>
            </tr>
            <tr>
              <th>お問い合わせ</th>
              <th><?php echo nl2br(htmlspecialchars($content)); ?></th>
            </tr>
          </table>
        </div>
        <input type="button" class="btn btn-primary" value="内容を修正する" onclick="history.back(-1)">
        <button type="submit" name="submit" class="btn btn-success">送信する</button>
      </form>
    </div>
  </div>
<!-- container終了 -->
</div>
</body>
</html>