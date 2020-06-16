<?php
//namespaceは必ず先頭に記述する
//namespace php_validation\class_name\name_validation;

//htmlspecialchars関数
//エスケープ処理
function h($str) {
    return htmlspecialchars($str,ENT_QUOTES);
}
//$path_2の結果➡C:\xampp\htdocs\php_validation\class_name
//$path = dirname(__DIR__).'/php_validation/class_name/class_name_validation.php';
$path = dirname(__DIR__).'/php_validation/class_name/class_name_validation.php';
echo $path;

$path2 = dirname(__DIR__).'/php_validation/class_txt/class_txt_validation.php';
//$file_valid_path = dirname(__DIR__).'/php_validation/class_exeption/class_exeption_validation.php';
// 企業名\フォルダ\クラスフォルダ as 別名
use vendor\php_validation\class_name as n_validate;
use vendor\php_validation\class_txt as t_validate;
//use vendor\php_validation\class_exeption as e_validate;
//氏名バリデーションクラスを読み込む
//テキストクラスを読み込む(氏名クラスを継承)
include($path);
include($path2);
//name属性の配列の値を受け取る
//$_POSTで送られた値が本当にPOSTであるかの確認と、string型かどうかのチェック
/* $user_info = [];
$user_info = (string)filter_input(INPUT_POST, 'name');
$user_info = (string)filter_input(INPUT_POST, 'age'); */


/* foreach (['name','age'] as $v) {
    $user_info[$v] = (string)filter_input(INPUT_POST, $v);
} */
//配列変数初期化
//以下の処理はfunctionで後ほどまとめる
$user_info[] = '';
foreach (['name','age'] as $i) {
    if (!empty($_POST['array_user'][$i] ) && is_string($_POST['array_user'][$i])) {
        $user_info[$i] = $_POST['array_user'][$i];
    }
}

$txt_info[] = '';
foreach (['txt1','txt2'] as $i) {
    if (!empty($_POST['array_txt'][$i] ) && is_string($_POST['array_txt'][$i])) {
        $txt_info[$i] = $_POST['array_txt'][$i];
    }
}
var_dump($user_info);
var_dump($txt_info);


//useを使用したクラスの呼び方は、別名\クラスフォルダ\クラス名かっこはなしでnewする。
 $name_vaidate = new n_validate\validation\name_validation($user_info);
 $txt_vaidate = new n_validate\validation\txt_validation($user_info,$txt_info);
 //namespace nameのvalidationメソッドに接続
 $name_result = $name_vaidate->validation();
 $count_result = $name_vaidate->add(10);
 //親クラスのメソッドにアクセス
 //txt_validationは親クラスを継承しているので、親のメソッド
 //を使用することが可能。同じ処理を行いたい場合に、親クラスの
 //メソッドに定義することで、冗長化を防ぐことが可能。
 $txt_result = $txt_vaidate->add(50);
 
 $sum = $count_result + $txt_result;
 var_dump($sum);
 //$exeption_vaidate = new e_validate\validation\exeption_validation;
 
 /*---------------issetを使用した場合---------------*/
 //issetはNullも空白が入っているものとして判断するため
 /* 
 if (!isset($_GET['user_name'])){
    $error = "名前が入力されていません";
 }
 else{
    $user_name = $_GET['user_name'];
 }
 */

/*-----------------------------------------------*/

/*---------------emptyを使用した場合---------------*/
 //input項目がNullの場合には空白としても判断せず、入力値が空であると判断し、エラーメッセージを$errorに代入する
 /*
 if (empty($_GET['user_name'])){
    $error = "名前が入力されていません";
 }
 else{
    
    $user_name = $_GET['user_name'];
 }
*/
/*-----------------------------------------------*/
?>


<!--HTMLファイル-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>php_test</title>
</head>
<body>
    <h2>testPHP</h2>
    <form action="" method="POST" enctype="multipart/form-data">
        <dl>
            <!--エラー変数に値が入っている場合-->
            <!--エラーメッセージを表示する-->
            <?php if ($name_result !== "-1"):?>
                <p>送信された値:<?php echo h($name_result['name']); ?></p>
                <p>送信された値:<?php echo h($name_result['age']); ?></p>
                <p>入力回数:<?php echo h($count_result); ?></p>
            <?php else : ?>
                <p>入力されていません。</p>
            <?php endif ;?>

            <dt>入力値：</dt>
            <dd>名前:<input id="lblname1" type="text"  maxlength="10" name="array_user[name]" placeholder="例：山田太郎" value=""></dd>
            <dt>入力値：</dt>
            <dd>年齢:<input id="lblname2" type="text"  maxlength="3" name="array_user[age]" value=""></dd>
            <dd>テキスト1：<input type="text" name="array_txt[txt1]" value=""></dd>
            <dd>テキスト2：<input type="text" name="array_txt[txt2]" value=""></dd>
            <dd><input type="file" name="file" size="35"></dd>
            
        </dl>
        <section class="form-button"><input type="submit" value="送信する">
        </section>
    </form>
    
</body>
</html>