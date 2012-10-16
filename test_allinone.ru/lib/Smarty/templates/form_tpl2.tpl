<html>
<head>
  <meta charset="utf-8" />
  <title>Форма обратной связи</title>
  <link rel="stylesheet" href="style.css" />
</head>
<body>
<h1>Форма обратной связи</h1>
<form action="index.php" method="post">
{if $formError}
{foreach $formErrors as $error}
<p class="error">{$error}</p>
{/foreach}{/if}
 <p class="brown">Имя: <input type="text" name="name" value="{$name1|escape}" /></p>
 <p class="blue">E-mail: <input type="text" name="email" value="{$email1|escape}" /></p>
 <p id="c1">Телефон: <input type="text" name="telephone" value="{$telephone1|escape}" /></p>
 <p>Комментарий: <input type="text" name="comment" value="{$comment1|escape}" /></p>
 <p><input type="submit" name="submit" value="Отправить" /></p>
</form>
</body>
</html>
