<?php
/* Smarty version 3.1.34-dev-7, created on 2020-12-01 02:18:21
  from 'C:\xampp\htdocs\tpeweb2\templates\comentarios.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5fc599dd2bea38_77465738',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '73712b1c6bce4b1c50c9dcfa4be57a80c2b95d25' => 
    array (
      0 => 'C:\\xampp\\htdocs\\tpeweb2\\templates\\comentarios.tpl',
      1 => 1606785498,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fc599dd2bea38_77465738 (Smarty_Internal_Template $_smarty_tpl) {
?><body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="comments">
                    <div class="comment-box add-comment">
                        <span class="commenter-pic">
                            <!--<img src="../imgs/IconoPeron.jpg" class="img-fluid">-->
                        </span>
                        <div class="commenter-name">
                            <p id="usuario"><?php echo $_smarty_tpl->tpl_vars['usuario']->value;?>
</p>
                            <input id="contenido" type="text" placeholder="Comentá, loro!" name="Add Comment">
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Valoracion del Alumno</label>
                                <select class="form-control" id="select">
                                    <option value="1">⭐</option>
                                    <option value="2">⭐⭐</option>
                                    <option value="3">⭐⭐⭐</option>
                                    <option value="4">⭐⭐⭐⭐</option>
                                    <option value="5">⭐⭐⭐⭐⭐</option>
                                </select>
                            </div>
                            <button id="enviarComentario" type="submit" class="btn btn-success">Publicar</button>
                            <button id="borrarComentario" type="button" class="btn btn-light">Cancelar</button>
                            <!--hacer funcion-->
                        </div>
                    </div>

                    <div id="cajaComentarios" class="comment-box">
                        <!--<span class="commenter-pic">
              <img src="/images/user-icon.jpg" class="img-fluid">
            </span>
            <span class="commenter-name">
              <a href="#">Nombre del loro</a>
            </span>
            <p class="comment-txt more">Comentario</p>
            <div class="comment-meta">
              <button type="button" class="btn btn-outline-warning">Editar</button>
              <button type="button" class="btn btn-outline-danger">Eliminar</button>
            </div>
          </div>-->
                    </div>
                </div>
            </div>
        </div>

        <form action="paginacion" method="POST"  aria-label="Page navigation example">
            <ul class="pagination">
                <li class="page-item"><button id="enviarComentario" type="submit" class="page-link" >Previous</button></li>
                <?php
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? $_smarty_tpl->tpl_vars['cantidad']->value+1 - (1) : 1-($_smarty_tpl->tpl_vars['cantidad']->value)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 1, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration === 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration === $_smarty_tpl->tpl_vars['i']->total;?>
                    <li class="page-item"><button id="enviarComentario" type="submit" class="page-link" ><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</button></li>
                <?php }
}
?>
                <li class="page-item"><button id="enviarComentario" type="submit" class="page-link" >Next</button></li>
            </ul>
        </form>
</body>

<?php echo '<script'; ?>
 src="js/javascript.js"><?php echo '</script'; ?>
><?php }
}
