<html>
<head>
  <meta charset="utf-8" />
  <title>����� �������� �����</title>
  <link rel="stylesheet" href="style.css" />
</head>
<body>
<h1>����� �������� �����</h1>
<form action="index.php" method="post">
{if $formError}
{foreach $formErrors as $error}
<p class="error">{$error}</p>
{/foreach}{/if}
 <p class="brown">���: <input type="text" name="name" value="{$name1|escape}" /></p>
 <p class="blue">E-mail: <input type="text" name="email" value="{$email1|escape}" /></p>
 <p id="c1">�������: <input type="text" name="telephone" value="{$telephone1|escape}" /></p>
 <p>�����������: <input type="text" name="comment" value="{$comment1|escape}" /></p>
 <p><input type="submit" name="submit" value="���������" /></p>
</form>
</body>
</html>
