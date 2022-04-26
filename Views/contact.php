<?php
// require_once('../database.php');
require_once('../Models/Contact.php');
require_once('../Controllers/Contact.Controller.php');
try {
  $sql = "DELETE FROM contacts WHERE id = :id";
  $stmt = $dbh->prepare($sql);
  $params = array(':id'=>$_GET["id"]);
  $stmt->execute($params);

} catch (Exception $e) {
        echo 'エラーが発生しました。:' . $e->getMessage();
}




$error_message = array();
  if( isset($_POST["btn"] ) && $_POST["btn"] ){
    //エラー項目の確認
    //ニックネームが空の場合
    if( !$_POST['name'] ) {
	    $error_message[] = "名前を入力してください";
    } else if( mb_strlen($_POST['name']) > 100 ){
	    $error_message[] = "名前は10文字以内にしてください";
    }

    if(!$_POST['kana']) {
      $error_message[] = "フリガナを入力してください";
    } else if( mb_strlen($_POST['kana']) > 100 ) {
      $error_message[] = "カナは10文字以内にしてください";
    }
    if(! preg_match("/^[0-9]+$/", $tel)){
      $error_message[] = "数字を見直してください";
    }
    if(!$_POST['email']) {
      $error_message[] = "メールアドレスを入力してください";
    } else if(! filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)) {
      $error_message[] = "正しく入力してください";
    }
    if(!$_POST['content']) {
      $error_message[] = "問い合わせ内容を記述してください";
    }
  }
  if (!empty($_POST['name']) && ($_POST['kana']) && ($_POST['email']) && ($_POST['content'])){
    header("Location: confirm.php", true, 307);
  }
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>お問い合わせ</title>
  <link rel="stylesheet" href="./css/contact.css">
  <link rel="stylesheet" href="./css/css/bootstrap.min.css">
  <script type="text/javascript" src="contact.js"></script>
</head>
<body>
<div class="container">
  <h1 class="company">Company Name</h1>
  <div class="row">
    <div><h2>お問い合わせ</h2></div>
  </div>
  <?php
    if( $error_message ){
      echo '<div style="color:red;">';
      echo implode('<br>', $error_message );
      echo '</div>';
    }
  ?>
  <div class="row mt-5">
  <form action="contact.php" method="POST" name="form" onsubmit="return validate()" >
    <h1 class="contact-title">お問い合わせ 内容入力</h1>
    <p>お問い合わせ内容ご入力の上,「確認画面へ」ボタンをクリックしてください。</p>
  </div>
  <div class="col-10">
    <div class="form-row">
      <div class="form-group col-md-7">
        <label>名前<span class="btn btn-danger btn-sm">必須</span></label>
        <input type="text" name="name"  class = "form-control" placeholder="例) 水瀬いのり" value="">
      </div>
      <div class="form-group col-md-7">
        <label>フリガナ<span class="btn btn-danger btn-sm">必須</span></label>
        <input type="text" name="kana"  class = "form-control" placeholder="例) ミナセイノリ" value="">
      </div>
      <div class="form-group col-md-7">
        <label>電話番号<span class="btn btn-danger btn-sm">必須</span></label>
        <input type="text" name="tel"  class = "form-control" placeholder="例) 00000000000" value="">
      </div>
      <div class="form-group col-md-7">
        <label>メールアドレス<span class="btn btn-danger btn-sm">必須</span></label>
        <input type="text" name="email"  class = "form-control" placeholder="例) sample@sample.com" value="">
      </div>
      <div class="form-group col-7">
        <label>お問い合わせ<span class="btn btn-danger btn-sm">必須</span></label>
        <textarea name="content"  class = "form-control" placeholder="お問合せ内容を入力"></textarea>
      </div>
    </div>
    <input type="submit" name="btn" class="btn btn-success"value="確認画面へ">
  </form>
  <div>
  <table class="table table-bordered">
    <tr>
      <th>id</th>
      <th>名前</th>
      <th>フリガナ</th>
      <th>電話番号</th>
      <th>メールアドレス</th>
      <th>お問い合わせ内容</th>
      <th></th>
      <th></th>
    </tr>
    <?php foreach($result as $column) : ?>
    <tr>
      <th><?php echo $column['id'] ?></th>
      <th><?php echo $column['name'] ?></th>
      <th><?php echo $column['kana'] ?></th>
      <th><?php echo $column['tel'] ?></th>
      <th><?php echo $column['email'] ?></th>
      <th><?php echo $column['body'] ?></th>
      <td><a href="./edit_form.php?id=<?php echo $column['id'] ?>">編集</td>
      <td><a href="./contact.php?id=<?php echo $column['id'] ?>" onclick="submitChk();">削除</a></td>
    </tr>
    <?php endforeach; ?>
  </table>
  <script>
    /**
     * 確認ダイアログの返り値によりフォーム送信
    */
    function submitChk () {
        /* 確認ダイアログ表示 */
        var flag = confirm ( "削除してもよろしいですか？\n\n削除したくない場合は[キャンセル]ボタンを押して下さい");
        /* send_flg が TRUEなら送信、FALSEなら送信しない */
        return flag;
    }
</script>
</div>
</body>
</html>