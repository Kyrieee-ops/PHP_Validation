<?php
/*---------------------------------------------------------------
【機能】:氏名のバリデーションチェックを行う
【引数】:HTMLから送信されてくるname属性をキーにしたuser_name
【戻り値】:入力値がない場合=>エラー
　　　　　 正しい入力値=>入力値を返す
---------------------------------------------------------------*/
//プロパティ設定

//test.phpと同じ階層に見立てたnamespaceを記述
//非修飾形式
namespace vendor\php_validation\class_name\validation;
//declare(strict_types=1);

class name_validation {
    /* カプセル化 */
    //プロパティ
    protected $user_data;
    //protected $txt_data;
    //int型を想定
    private $count = 0;

    public function __construct($array_user) {
        /*
        constructはインスタンス生成時に自動でここがコールされるのでクラスをnewした時の
        引数がこのconstructに渡ってくる為、setterの役割であるsetuser_nameメソッドに
        引数である$user_name_valを渡す必要がある。
        */
        $this->setUser_name($array_user);
    }

    public function setUser_name($array_user) {
        /*
        constructで自動コールされて、もらった引数をプロパティに値をセットする。
        この処理でカプセル化は実現できる。
        filter_var_array⇒複数の変数を受け取り、指定したフィルタで値をフィルタリングする
        if (!isset($_POST['name']) || !is_string($_POST['name'])
        上記と同じ処理の記述が(string)filter_var()で実装できる。
        postで送られた値を、文字列を強制する
        */
        $this->user_data = (array)filter_var_array($array_user);
        //$this->txt_data = (array)filter_var_array($array_txt);
    }
    /**  
    *値がempty(空)であった場合はerrorフラグ-1を立てる
    *!emmptyではない場合にはプロパティの値をreturn返す
    */
    public function validation(){
        $error = "";
        //値が空でないかのチェックは共通している処理なので、name_vaidationで処理するが、
        //例えば文字数制限のvalidationをする場合にはテキストの文字数は多いので、
        //親クラスを継承して、独自の子クラスのメソッドを作成する必要がある。
            foreach (['name','age'] as $i) {
                if (empty($this->user_data[$i])) {
                    $error = "-1";
                    return $error;
                }
            }
        return $this->user_data;
    }
    
    public function add($intval) {
       $intval = $this->count += $intval;
       return $intval;
    }
}
?>