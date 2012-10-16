<?php /* Smarty version Smarty-3.1.11, created on 2012-10-10 16:19:08
         compiled from "..\lib\Smarty\templates\data_tpl.tpl" */ ?>
<?php /*%%SmartyHeaderCode:37535073fe95cdd792-51862349%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8fceef22de4240bfbda79ee7f960f658d155e954' => 
    array (
      0 => '..\\lib\\Smarty\\templates\\data_tpl.tpl',
      1 => 1349871544,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '37535073fe95cdd792-51862349',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5073fe95d40e34_89372822',
  'variables' => 
  array (
    'name' => 0,
    'key' => 0,
    'mail' => 0,
    'telephone' => 0,
    'comment' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5073fe95d40e34_89372822')) {function content_5073fe95d40e34_89372822($_smarty_tpl) {?><html>
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
    <td colspan="3" style="font-size: 100%; font-family: sans-serif"><?php  $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['key']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['name']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['key']->key => $_smarty_tpl->tpl_vars['key']->value){
$_smarty_tpl->tpl_vars['key']->_loop = true;
?>
	<p><?php echo $_smarty_tpl->tpl_vars['key']->value;?>
</p>
    <?php } ?></td>
    <td colspan="3" style="font-size: 100%; font-family: sans-serif"><?php  $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['key']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['mail']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['key']->key => $_smarty_tpl->tpl_vars['key']->value){
$_smarty_tpl->tpl_vars['key']->_loop = true;
?>
	<p><?php echo $_smarty_tpl->tpl_vars['key']->value;?>
</p>
	<?php } ?></td>
    <td colspan="3" style="font-size: 100%; font-family: sans-serif"><?php  $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['key']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['telephone']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['key']->key => $_smarty_tpl->tpl_vars['key']->value){
$_smarty_tpl->tpl_vars['key']->_loop = true;
?>
<p><?php echo $_smarty_tpl->tpl_vars['key']->value;?>
</p>
<?php } ?></td>
	<td colspan="3" style="font-size: 100%; font-family: sans-serif"><?php  $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['key']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['comment']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['key']->key => $_smarty_tpl->tpl_vars['key']->value){
$_smarty_tpl->tpl_vars['key']->_loop = true;
?>
<p><?php echo $_smarty_tpl->tpl_vars['key']->value;?>
</p>
<?php } ?></td>
   </tr>
   
  </table>

</body>
</html>
<?php }} ?>