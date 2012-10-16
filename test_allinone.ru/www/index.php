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

//переменные для подключения и создания базы данных
$hostName = "localhost";        // имя сервера 
$userName = "root";             // пользователь базы данных MySQL  
$passWord = "";                 // пароль для доступа к серверу MySQL  
$dbName = "test";               // название создаваемой базы данных 
$tableName = "Form";			// имя таблицы в базе данных
// массив с данными из формы
$dataForm = array();
// массив с информацией об ошибке
$formErrors = array();
//вспомогательная переменная для вывода ошибки на экран
$formError = NULL;
//переменные для базы
$dataName2 = "";
$dataEmail2 = "";
$dataTelephone2 = "";
$dataComment2 = "";
  
if (isset($_POST['submit'])) {
  $dataForm['telephone1'] = $_POST['telephone'];
  $dataForm['comment1'] = $_POST['comment'];
  $dataForm['email1'] = $_POST['email'];
  $dataForm['name1'] = $_POST['name'];
  $dataName2 = $dataForm['name1'];
  $dataEmail2 = $dataForm['email1'];
  $dataTelephone2 = $dataForm['telephone1'];
  $dataComment2 = $dataForm['comment1'];
  //условие по которому проверяется была ли нажата кнопка "Отправить" в форме
  if ($_POST['submit'] == 'Отправить') {
    // условие по которому проверяется были ли введены данные в поля имя и емэил
    if (empty($_POST['name']) && empty($_POST['email'])) {
      $formError = 1;
      $formErrors[] = "Вы не заполнили поле имя и E-mail";
	  formInput($smarty, $dataForm, $formError, $formErrors);
    // условие по которому определяется были ли внесены данные в поле имя
    } elseif (empty($_POST['name'])) {
      $formError = 1;
      $formErrors[] = "Вы не заполнили поле имя";
	  formInput($smarty, $dataForm, $formError, $formErrors);
    // условие по которому определяется были ли внесены данные в поле емэил
    } elseif (empty($_POST['email'])) {
      $formError = 1;
      $formErrors[] = "Вы не заполнили поле E-mail";
	  formInput($smarty, $dataForm, $formError, $formErrors);
    } elseif (!empty($_POST['name']) && !empty($_POST['email'])) {
      $formInput=0;
      $message = sendMessage($dataForm);
      // сохранение сообщения
      logMessage($message);
	  addData ($hostName, $userName, $passWord, $dbName, $tableName,
               $dataName2, $dataEmail2, $dataTelephone2, $dataComment2);
	}
  }
} else {
  $dataForm['telephone1'] = "";
  $dataForm['comment1'] = "";
  $dataForm['email1'] = "";
  $dataForm['name1'] = "";
  if (isset($_GET['page'])) {
    if ($_GET['page'] == 'Заполнить форму') {
      formInput($smarty, $dataForm, $formError, $formErrors);
    } elseif ($_GET['page'] == 'Список сообщений') {
      listData($smarty, $hostName, $userName, $passWord, $dbName, $tableName,
                	$dataName2, $dataEmail2, $dataTelephone2, $dataComment2);
    } 
  } else {
    mainForm($smarty);
  }
}

/**
 * Функция по выводу на экран шаблона с данными из базы
 * @param string переменная шаблонизатора
*/
function mainForm($smarty) {
  $smarty->display("form_tpl.tpl");
}

/**
 * Функция по вводу данных в форму
 * @param string переменная шаблонизатора
 * @param array массив с данными
 * @param string вспомогательня переменная для вывода ошибки на экран
 * @param array массив с ошибками
 */
function formInput($smarty, $dataForm, $formError, $formErrors) {
  extract($dataForm, EXTR_SKIP);
  $smarty->assign("name1", $name1);
  $smarty->assign("email1", $email1);
  $smarty->assign("telephone1", $telephone1);
  $smarty->assign("comment1", $comment1);
  $smarty->assign('formError', $formError);
  $smarty->assign('formErrors', $formErrors);
  $smarty->display("form_tpl2.tpl");
}

/**
 * Функция по добавлению записей в базу данных
 * @param string переменная шаблонизатора
 * @param string переменная с именем сервера
 * @param string переменная с именем пользователя базы данных
 * @param string переменная с паролем для доступа к серверу
 * @param string переменная с именем базы
 * @param string переменная с именем таблицы в базе
 * @param string переменная с данными из формы
 * @param string переменная с данными из формы
 * @param string переменная с данными из формы
 * @param string переменная с данными из формы
 */
function addData($hostName, $userName, $passWord, $dbName, $tableName, 
                 $dataName2, $dataEmail2, $dataTelephone2, $dataComment2) {
  // подключение к базе
  try {
    $DBH = new PDO("mysql:host=$hostName;dbname=$dbName", $userName, $passWord);
    $DBH->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    } catch (PDOException $e) {
      // Создание новой базы(вызов функции), если попытка подключения не удалась
      $e->createBase = newBase($hostName, $userName, $passWord, $dbName, $tableName);
      $DBH = new PDO("mysql:host=$hostName;dbname=$dbName", $userName, $passWord);
      $DBH->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    }
  // операция вставки данных в таблицу
  $sql = "INSERT INTO $tableName VALUES (:name, :email, :telephone, :comment)";
  //подготовка шаблона для вставки в таблицу
  $STH = $DBH->prepare($sql);
  // вставка данных в таблицу
  $STH->execute(array(':name'=>$dataName2,
                      ':email'=>$dataEmail2,
					  ':telephone'=>$dataTelephone2,
					  ':comment'=>$dataComment2));
  //отключииться от базы
  $DBH = NULL;
}

/**
 * Функция по выводу данных на экран из базы
 * @param string переменная шаблонизатора
 * @param string переменная с именем сервера
 * @param string переменная с именем пользователя базы данных
 * @param string переменная с паролем для доступа к серверу
 * @param string переменная с именем базы
 * @param string переменная с именем таблицы в базе
 * @param string переменная с данными из формы
 * @param string переменная с данными из формы
 * @param string переменная с данными из формы
 * @param string переменная с данными из формы
 */
function listData($smarty, $hostName, $userName, $passWord, $dbName, $tableName,
                         $dataName2, $dataEmail2, $dataTelephone2, $dataComment2) {
  $rows = array();
  //подключение к базе
  try {
    $DBH = new PDO("mysql:host=$hostName;dbname=$dbName", $userName, $passWord);
    $DBH->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
  } catch (PDOException $e) {
    //вывод ошибки при исключении
	die("DB ERROR: ". $e->getMessage());
  }
  // выборка данных из таблицы
  $STH = $DBH->query("SELECT * FROM $tableName");  
  // устанавливаем режим выборки
  $STH->setFetchMode(PDO::FETCH_ASSOC);  
  // Вывод данных из таблицы на экран
  $dataName [] = "";
  $dataMail [] = "";
  $dataTelephone [] = "";
  $dataComment [] = "";
  while($row = $STH->fetch()) {  
    $dataName [] = $row['Name'];
	$dataMail [] = $row['E-mail'];
	if ($row['Telephone'] == NULL) {
	  $dataTelephone [] = "---";
	} else{
	  $dataTelephone [] = $row['Telephone'];
	}
	if ($row['Comment'] == NULL) {
	  $dataComment [] = "---";
	} else {
	  $dataComment [] = $row['Comment'];
	}
  }
  //отключииться от базы
  $DBH = NULL;
 #$r = mysql_query ("DROP DATABASE $dbName");
  $smarty->assign("name", $dataName);
  $smarty->assign("mail", $dataMail);
  $smarty->assign("telephone", $dataTelephone);
  $smarty->assign("comment", $dataComment);
  $smarty->display("data_tpl.tpl");
}  
 
/**
 * Функция для отправки сообщения
 * @param array массив с данными
 * @return string переменная с данными из массива
 */
function sendMessage($dataForm) {
  extract($dataForm, EXTR_SKIP);
  $message = "\r\n"."Имя:".$name1."\r\n".
             "Email:".$email1."\r\n".
             "Телефон:".$telephone1."\r\n".
		     "Комментарий:".$comment1."\r\n";
  $headers = 'From: ' . $name1 . $email1 . "\r\n";
  $result = mail ('buravtsev_aa@ro78.fss.ru' , "Letter" , $message , $headers);
  if ($result) {
    echo $name1; 
    echo ", данные успешно отправлены.";
  } else {
    echo "Данные не отправлены.";
  }
  return $message;
}

/**
 * Функция по отправке логов
 * @param string переменная с данными из массива
 */
function logMessage($message) {
  $file = 'log.txt';
  if (file_exists($file)) {
    $fp = fopen($file, 'a+');
    fwrite($fp, $message);
    fclose($fp);
  } else {
    $fp = fopen($file, 'w');
    fwrite($fp, $message);
    fclose($fp);
  }
}

/**
 * Функция по созданию новой базы данных
 * @param string переменная с именем сервера
 * @param string переменная с именем пользователя базы данных
 * @param string переменная с паролем для доступа к серверу
 * @param string переменная с именем создаваемой базы
 * @param string переменная с именем таблицы в базе
 */
function newBase($hostName, $userName, $passWord, $dbName, $tableName) {
  //создание базы
  try {
    $DBH = new PDO("mysql:host=$hostName", $userName, $passWord);
    $DBH->exec("CREATE DATABASE `$dbName`;
			USE `$dbName`;
            CREATE table $tableName (`Name` text, `E-mail` text,
			`Telephone` text, `Comment` text);");
  } catch (PDOException $e) {
    //вывод ошибки при исключении
    die("DB ERROR: ". $e->getMessage());
  }
}
?>
