<?php
require_once('../Models/Contact.php');
class ContactController {
    private $request;   // リクエストパラメータ(GET,POST)
    private $Contact;    // Dbモデル

    public function __construct() {
        // リクエストパラメータの取得
        $this->request['get'] = $_GET;
        $this->request['post'] = $_POST;

        // モデルオブジェクトの生成
        $this->Contact = new Contact();
        // 別モデルと連携
        $dbh = $this->Contact->get_db_handler();
    }

    public function index() {
      $Contacts= $this->Contact->findAll();
      return $Contacts;
    }

    public function create(){
      $this->Contact->create();
    }

}

