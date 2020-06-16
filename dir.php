<?php 
//ルートの確認ファイル
//結果C:\xampp\htdocs
echo dirname(__DIR__). "<br />";
//結果C:\xampp\htdocs\php_test
echo dirname(__DIR__.'/class_name'). "<br />";

$path = dirname(__DIR__).'/./class_name/class_name_validation.php'. "<br />";
echo $path;
?>