<html>
<head>
  <meta charset="utf-8" />
  <title>�������� ������</title>
  <link rel="stylesheet" href="style.css" />
</head>
<body>
<h1>�������� ������</h1>
<table>
   <tr align="center" bgcolor="#AAAAAACC">
    <td colspan="3" style="font-size: 100%; font-family: sans-serif">���</td>
	<td colspan="3" style="font-size: 100%; font-family: sans-serif">E-mail</td>
	<td colspan="3" style="font-size: 100%; font-family: sans-serif">�������</td>
	<td colspan="3" style="font-size: 100%; font-family: sans-serif">�����������</td>
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
