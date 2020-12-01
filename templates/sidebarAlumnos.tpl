<nav class="col-3">
    <div class="container">

        <!-- Modal Ordenar -->
        <h4>Filtrar por Materia</h4>
        <form action="SelectAlumno" method="POST">
            <label for="validationCustom04">Seleccione la Materia a filtrar:</label>
            <select class="custom-select" id="validationCustom04" name="select_materia">
                <option>Todas</option>
                {foreach from=$asignatura_s item= materia}
    
                    <option>{$materia->nombre_materia}</option>
    
                {/foreach}
            </select>
            <div class="invalid-feedback">
                <h4>Ingrese una materia</h4>
            </div>
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-primary">Mostrar</button>
            </div>
        </form>
        {if isset($smarty.session.nombre_usuario)}
            <div class="d-flex justify-content-center">
                <button type=" button" class="btn btn-info" data-toggle="modal" data-target="#myModa66">Busqueda Avanzada</button>
            </div>
        {/if}
        <label for="validationCustom04">Seleccione la Materia a filtrar:</label>
        <select class="custom-select" id="validationCustom04" name="select_materia">
            <option>Todas</option>
            {foreach from=$asignatura_s item= materia}
    
                <option>{$materia->nombre_materia}</option>
    
            {/foreach}
        </select>
        <div class="modal" id="myModa66">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <!-- Modal Título -->
                    <div class="modal-header">
                        <h4 class="modal-title">Busqueda Avanzada</h4>
                    </div>
                    <!-- Modal Cuerpo -->
                    <div class="modal-body">
                        <div class="form-group">
                            <form action="busquedaAvanzada" method="POST">
                                <div class="form-group">
                                    <label for="title">Alumno</label>
                                    <input class="form-control" id="materia" name="input_alumno" aria-describedby="emailHelp" placeholder="Nombre del Angelito">
                                </div>
                                <div class="form-group">
                                    <label for="description">Email</label>
                                    <input class="form-control" id="email" name="input_email" placeholder="Direccion de email">
                                </div>
                                <div class="form-group">
                                    <label for="description">Conducta</label>
                                    <input class="form-control" id="conducta" name="input_conducta" placeholder="Conducta">
                                </div>
                                <div class="form-group">
                                    <label for="description">Calificación</label>
                                    <input type="number" class="form-control" id="Calificación" name="input_calificacion" placeholder="Calificación">
                                </div>
                                <label for="validationCustom04">Seleccione la Materia:</label>
                                <select class="custom-select" id="validationCustom04" name="select_materia">
                                    {foreach from=$asignatura_s item= materia}
    
                                        <option>{$materia->nombre_materia}</option>
    
                                    {/foreach}
                                </select>
                                <div class="invalid-feedback">
                                    <h4>Ingrese una materia</h4>
                                </div>
                                <!-- Modal botón Editar -->
                                <div>
                                    <button type="submit" class="btn btn-info">Buscar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div style="height: 15px;">
    </div>
    <!-- Modal Ingresar Fila Materia-->
    {if isset($smarty.session.nombre_usuario)}
        <div class="d-flex justify-content-center">
            <button type=" button" class="btn btn-info" data-toggle="modal" data-target="#myModal3">Ingresar Alumno</button>
        </div>
    {/if}
    <div class="modal" id="myModal3">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <!-- Modal Título -->
                <div class="modal-header">
                    <h4 class="modal-title">Ingresar Nuevo Alumno</h4>
                </div>
                <!-- Modal Cuerpo -->
                <div class="modal-body">
                    <div class="form-group">
                        <form action="InsertarAlumno" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="title">Alumno</label>
                                <input class="form-control" id="materia" name="input_alumno" aria-describedby="emailHelp" placeholder="Nombre del Angelito">
                            </div>
                            <div class="form-group">
                                <label for="description">Email</label>
                                <input class="form-control" id="email" name="input_email" placeholder="Direccion de email">
                            </div>
                            <div class="form-group">
                                <label for="description">Conducta</label>
                                <input class="form-control" id="conducta" name="input_conducta" placeholder="Conducta">
                            </div>
                            <div class="form-group">
                                <label for="description">Calificación</label>
                                <input type="number" class="form-control" id="Calificación" name="input_calificacion" placeholder="Calificación">
                            </div>
                            <div class="form-group">
                                <label for="description">Imagen</label>
                                <input type="file" id="subirImagen" name="input_imagen" class="form-control">
                            </div>
                            <label for="validationCustom04">Seleccione la Materia a concurrir:</label>
                            <select class="custom-select" id="validationCustom04" name="select_materia">
                                {foreach from=$asignatura_s item= materia}
    
                                    <option>{$materia->nombre_materia}</option>
    
                                {/foreach}
                            </select>
                            <div class="invalid-feedback">
                                <h4>Ingrese una materia</h4>
                            </div>
                            <!-- Modal botón Editar -->
                            <div>
                                <button type="submit" class="btn btn-info">Ingresar Alumno</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>