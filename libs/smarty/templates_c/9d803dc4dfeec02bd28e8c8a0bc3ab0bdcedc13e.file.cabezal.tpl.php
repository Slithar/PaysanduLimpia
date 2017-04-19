<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-04-05 21:47:20
         compiled from "vistas\cabezal.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1576358e2f8890b69e2-94810689%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9d803dc4dfeec02bd28e8c8a0bc3ab0bdcedc13e' => 
    array (
      0 => 'vistas\\cabezal.tpl',
      1 => 1491428837,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1576358e2f8890b69e2-94810689',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_58e2f8890c6ea8_47451404',
  'variables' => 
  array (
    'proyecto' => 0,
    'url_volquetas' => 0,
    'url_logout' => 0,
    'url_base' => 0,
    'buscar' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58e2f8890c6ea8_47451404')) {function content_58e2f8890c6ea8_47451404($_smarty_tpl) {?><nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"><?php echo $_smarty_tpl->tpl_vars['proyecto']->value;?>
</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="<?php echo $_smarty_tpl->tpl_vars['url_volquetas']->value;?>
">Volquetas</a></li>
            <li><a href="<?php echo $_smarty_tpl->tpl_vars['url_logout']->value;?>
">Cerrar Sesión</a></li>
          </ul>
          <form class="navbar-form navbar-right" method="post" action="<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
usuario/buscar/">
            <input type="text" id="buscar" name="buscar" class="form-control" placeholder="Buscar..." value='<?php echo $_smarty_tpl->tpl_vars['buscar']->value;?>
'>
            <input type="submit" value="Buscar" class="form-control btn btn-primary">
          </form>
        </div>
      </div>
    </nav><?php }} ?>
