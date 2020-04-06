<?php
/*---------------------------------------------------------------
【機能】:氏名のバリデーションチェックを行う
【引数】:HTMLから送信されてくるname属性をキーにしたuser_name
【戻り値】:入力値がない場合=>エラー
　　　　　 正しい入力値=>入力値を返す
---------------------------------------------------------------*/
//プロパティ設定


//氏名クラスのバリデーション処理
namespace name\name_validation;
class name_validation {
    public function validation($user_name){
        if (empty($user_name)) {
            $error="名前が入力されていません";
            return $error;
        } else {
            return $user_name;
        }
    }  
}
?>