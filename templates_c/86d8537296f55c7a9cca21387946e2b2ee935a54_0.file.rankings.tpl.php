<?php
/* Smarty version 3.1.39, created on 2021-11-20 12:24:58
  from 'C:\xampp\htdocs\Web2\TpePernia\templates\rankings.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_6198db0a664739_78496872',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '86d8537296f55c7a9cca21387946e2b2ee935a54' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Web2\\TpePernia\\templates\\rankings.tpl',
      1 => 1637407046,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_6198db0a664739_78496872 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class= "weightclassWraper">
    
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['weightclasses']->value, 'weightclass');
$_smarty_tpl->tpl_vars['weightclass']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['weightclass']->value) {
$_smarty_tpl->tpl_vars['weightclass']->do_else = false;
?>
    <div class= "tableWeightclass"> 
    <h3><?php echo $_smarty_tpl->tpl_vars['weightclass']->value->weightClassName;?>
</h3>      
        <table>
            <tbody>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['fighters']->value, 'fighter');
$_smarty_tpl->tpl_vars['fighter']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['fighter']->value) {
$_smarty_tpl->tpl_vars['fighter']->do_else = false;
?> 
                <?php if ($_smarty_tpl->tpl_vars['fighter']->value->weightClassName == $_smarty_tpl->tpl_vars['weightclass']->value->weightClassName) {?>   
                    <tr>
                    <td><?php echo $_smarty_tpl->tpl_vars['fighter']->value->name;?>
 - Nº<?php echo $_smarty_tpl->tpl_vars['fighter']->value->weightClassRank;?>
</td>
                    <td>"<?php echo $_smarty_tpl->tpl_vars['fighter']->value->nickname;?>
"</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['fighter']->value->record;?>
</td>
                    
                </tr> 
                <?php }?>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>            
            </tbody>
    
        </table>
    </div> 
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</div>

<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
