<?php
// Установки Smarty
require_once('..\lib\Smarty\libs\Smarty.class.php');
$smarty = new Smarty();
$smarty->template_dir = '..\lib\Smarty\templates';
$smarty->compile_dir = '..\lib\Smarty\templates_c';
$smarty->config_dir = '..\lib\Smarty\configs';
$smarty->cache_dir = '..\lib\Smarty\cache';

ini_set('display_errors', 1);
error_reporting(E_ALL);

$formErrors = array();
//вспомогательная переменная для вывода ошибки на экран
$formError = NULL;
$dataForm = array();
if (isset($_POST['submit'])) {
  $dataForm['telephone1'] = $_POST['telephone'];
  $dataForm['comment1'] = $_POST['comment'];
  $dataForm['email1'] = $_POST['email'];
  $dataForm['name1'] = $_POST['name'];
 } else {
  $dataForm['telephone1'] = "";
  $dataForm['comment1'] = "";
  $dataForm['email1'] = "";
  $dataForm['name1'] = "";
 }
form ($smarty, $dataForm, $formError, $formErrors);
function form($smarty, $dataForm, $formError, $formErrors) {
extract($dataForm, EXTR_SKIP);
$smarty->assign("name1", $name1);
  $smarty->assign("email1", $email1);
  $smarty->assign("telephone1", $telephone1);
  $smarty->assign("comment1", $comment1);
  $smarty->assign('formError', $formError);
  $smarty->assign('formErrors', $formErrors);
  $smarty->display("form_tpl2.tpl");
}





?>