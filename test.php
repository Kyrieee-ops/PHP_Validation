<?php
//htmlspecialchars関数
function h($str) {
    return htmlspecialchars($str,ENT_QUOTES);
}

//氏名バリデーションクラスを読み込む
include('class_name_validation.php');
$user_name = $_POST['user_name'];

//useの使い方を学ぶ必要あり
use name\class_name_validation;
 $class_name_vaidate = new class_name_validation();
 //namespace nameのvalidationメソッドに接続
 $result = $class_name_vaidate->validation($user_name);

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
    <dl>
        <!--エラー変数に値が入っている場合-->
        <!--エラーメッセージを表示する-->
        <?php if ($error):?>
        <dt>入力値：</dt>
        <dd>名前:<?php echo h($error);?></dd>

        <!--入力値がある場合、-->
        <?php else :?>
        <dt>送信された値は</dt>
        <dd>名前:<?php echo h($user_name)."です";?></dd>
        <?php endif ;?>
    </dl>
</form>
    
</body>
</html>