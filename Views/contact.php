<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>お問い合わせ</title>
  <link rel="stylesheet" href="../public/css/contact.css">
</head>
<body>
  <div><h1 class="company">Company Name</h1></div>
  <div><h2>お問い合わせ</h2></div>
  <div class="main">
    <form action="confirm.php" method="POST" name="form">
      <h1 class="contact-title">お問い合わせ 内容入力</h1>
      <p>お問い合わせ内容ご入力の上,「確認画面へ」ボタンをクリックしてください。</p>
      <div>
        <div>
          <label>お名前<span>必須</span></label>
          <input type="text" name="name" placeholder="例) 水瀬いのり" value="">
        </div>
        <div>
          <label>フリガナ<span>必須</span></label>
          <input type="text" name="name_kana" placeholder="例) ミナセイノリ" value="">
        </div>
        <div>
          <label>電話番号<span>必須</span></label>
          <input type="text" name="tel" placeholder="例) 00000000000" value="">
        </div>
        <div>
          <label>メールアドレス<span>必須</span></label>
          <input type="text" name="email" placeholder="例) sample@sample.com" value="">
        </div>
        <div>
          <label>お問い合わせ内容<span>必須</span></label>
          <textarea name="content" rows="5" placeholder="お問合せ内容を入力"></textarea>
        </div>
      </div>
      <button type="submit">確認画面へ</button>
    </form>
  </div>
</body>
</html>