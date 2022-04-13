<?php
if( ! function_exists('h') ) {
  function h($s) {
    echo htmlspecialchars($s, ENT_COMPAT, "UTF-8");
  }
}

// フォームボタン押されたら
if($_SERVER["REQUEST_METHOD"] === "POST") {
  // フォームから送信されたデータを各変数に格納
  $name = $_POST["name"];
  $name_kana =$_POST["name_kana"];
  $tel = $_POST["tel"];
  $email = $_POST["email"];
  $content  =$_POST["content"];
}

// 送信ボタン押されたら
if(isset($_POST["submit"])) {
  // 送信ボタンが押された時に動作する処理をここに記述する
  // 日本語をメールで送る場合のおまじない

   mb_language("ja");
  mb_internal_encoding("UTF-8");

  $subject = "［自動送信］お問い合わせ内容の確認";

  $body = <<< EOM
{$name} 様
お問い合わせありがとうございます。
以下のお問い合わせ内容を、メールにて確認させていただきました。

===================================================
【お名前】
{$name}

【フリガナ】
[$name_kana]

【電話番号】
[$tel]

【メールアドレス】
[$email]

【内容】
[$content]
===================================================

内容ご確認の上、回答させていただきます。
しばらくお待ちください。.
EOM;

// 送信元のメールアドレスを変数fromEmailに格納
$fromEmail = "sorasouwa@yahoo.co.jp";

// 送信元の名前を変数fromNameに格納
$fromName = "お問い合わせテスト";

 // ヘッダ情報を変数headerに格納する
 $header = "From: " .mb_encode_mimeheader($fromName) ."<{$fromEmail}>";


 // メール送信を行う
 mb_send_mail($email, $subject, $body, $header);
 header("Location: thanks.php");
 exit;
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>お問い合わせフォーム</title>
  <link rel="stylesheet" href="../public/css/confirm.css">
  <link rel="stylesheet" href="../public/css/css/bootstrap.min.css">
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
      <form action="confirm.php" method="post">
        <input type="hidden" name="name" value="<?php echo $name; ?>">
        <input type="hidden" name="name_kana" value="<?php echo $name_kana; ?>">
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
              <th><?php echo h($_POST['name_kana']); ?></th>
            </tr>
            <tr>
              <th>電話番号</th>
              <th><?php echo h($_POST['tel']); ?></th>
            </tr>
            <tr>
              <th>メールアドレス</th>
              <th><?php echo h($_POST['name_kana']); ?></th>
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