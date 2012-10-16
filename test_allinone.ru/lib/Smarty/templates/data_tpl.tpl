<html>
<head>
  <meta charset="utf-8" />
  <title>Просмотр данных</title>
  <link rel="stylesheet" href="style.css" />
</head>
<body>
<h1>Просмотр данных</h1>
<table>
   <tr align="center" bgcolor="#AAAAAACC">
    <td colspan="3" style="font-size: 100%; font-family: sans-serif">Имя</td>
	<td colspan="3" style="font-size: 100%; font-family: sans-serif">E-mail</td>
	<td colspan="3" style="font-size: 100%; font-family: sans-serif">Телефон</td>
	<td colspan="3" style="font-size: 100%; font-family: sans-serif">Комментарии</td>
   </tr>
   <tr>
    <td colspan="3" style="font-size: 100%; font-family: sans-serif">{foreach $name as $key}
	<p>{$key}</p>
    {/foreach}</td>
    <td colspan="3" style="font-size: 100%; font-family: sans-serif">{foreach $mail as $key}
	<p>{$key}</p>
	{/foreach}</td>
    <td colspan="3" style="font-size: 100%; font-family: sans-serif">{foreach $telephone as $key}
<p>{$key}</p>
{/foreach}</td>
	<td colspan="3" style="font-size: 100%; font-family: sans-serif">{foreach $comment as $key}
<p>{$key}</p>
{/foreach}</td>
   </tr>
   
  </table>

</body>
</html>
