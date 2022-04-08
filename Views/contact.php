<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>お問い合わせ</title>
  <link rel="stylesheet" href="../public/css/contact.css">
  <link rel="stylesheet" href="../public/css/css/bootstrap.min.css">
</head>
<body>
<div class="container">
  <h1 class="company">Company Name</h1>
  <div class="row">
    <div><h2>お問い合わせ</h2></div>
  </div>
  <div class="row mt-5">
  <form action="confirm.php" method="POST" name="form">
    <h1 class="contact-title">お問い合わせ 内容入力</h1>
    <p>お問い合わせ内容ご入力の上,「確認画面へ」ボタンをクリックしてください。</p>
  </div>
  <div class="col-10">
    <div class="form-row">
      <div class="form-group col-md-7">
        <label>名前<span class="btn btn-danger btn-sm">必須</span></label>
        <input type="text" name="name"class = "form-control" placeholder="例) 水瀬いのり" value="">
      </div>
      <div class="form-group col-md-7">
        <label>フリガナ<span class="btn btn-danger btn-sm">必須</span></label>
        <input type="text" name="name_kana" class = "form-control" placeholder="例) ミナセイノリ" value="">
      </div>
      <div class="form-group col-md-7">
        <label>電話番号<span class="btn btn-danger btn-sm">必須</span></label>
        <input type="text" name="tel" class = "form-control" placeholder="例) 00000000000" value="">
      </div>
      <div class="form-group col-md-7">
        <label>メールアドレス<span class="btn btn-danger btn-sm">必須</span></label>
        <input type="text" name="email" class = "form-control" placeholder="例) sample@sample.com" value="">
      </div>
      <div class="form-group col-7">
        <label>お問い合わせ<span class="btn btn-danger btn-sm">必須</span></label>
        <textarea name="content" class = "form-control" placeholder="お問合せ内容を入力"></textarea>
      </div>
    </div>
    <button type="submit">確認画面へ</button>
  </form>
  <div>
</div>
</div>
</body>
</html>