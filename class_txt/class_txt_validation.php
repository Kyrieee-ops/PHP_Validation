<?php


namespace vendor\php_validation\class_name\validation;

//name_validationクラスを継承したtxt_validationクラス
//ここに記述するプロパティやメソッドはname_validationにない
//新たな機能追加や修正を加えるクラスになるので、nameで使用できる
//nameやageの値を受け取り後、親クラスにアクセスしたい場合には
//parent::__construct($array_user);などとすればアクセスすることが可能。
class txt_validation extends name_validation{
    //プロパティ
    protected $txt_data;

    //$array_user親クラスで使用する
     public function __construct ($array_user,$array_txt) {
        //parent::__construct()で親クラスのプロパティへセット
        parent::__construct($array_user);
        $this->setTxt($array_txt);
    }

    public function setTxt ($array_txt) {
        //文字数制限のバリデーション処理を実施後、プロパティに代入する。
        $this->txt_data = $array_txt;
    }
}

?>
