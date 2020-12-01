<?php
require_once "Model/MateriaModel.php";
require_once "libs/smarty/Smarty.class.php";
require_once "Controller/MateriasControlador.php";

class MateriasView
{

  function __construct()
  {
  }
  function MostrarTablaMateria($Titulo, $Asignatura)
  {
    $smarty = new Smarty();
    $smarty->assign("titulo", $Titulo);
    $smarty->assign("asignatura_s", $Asignatura); //Nombre que le damos al array con smarty: "asignatura_s"

    $smarty->display("templates/tablaMaterias.tpl");
  }
  function MostrarEditarTabla($Titulo, $Asignatura, $id_materia)
  {
    $smarty = new Smarty();
    $smarty->assign("titulo", $Titulo);
    $smarty->assign("asignatura_s", $Asignatura); //Nombre que le damos al array con smarty: "asignatura_s"
    $smarty->assign("materia_id", $id_materia);

    $smarty->display("templates/EditarTablaMateria.tpl");
  }

  function MostrarHome()
  {
    //comprobarSiHayUsuario();
    $smarty = new Smarty();
    $smarty->assign("titulo", "Escuelita Virtual de Perón");
    $smarty->display("templates/home.tpl");
  }
  function showDetalles($Asignatura)
  {
    $smarty = new Smarty(); 
    $smarty->assign("titulo", $Asignatura->nombre_materia);
    $smarty->assign("asignatura_s", $Asignatura); 

    $smarty->display("templates/detalles.tpl");
  }
  function showTablaMaterias()
  {
    header("Location:" . BASE_URL . "tablaMaterias");
  }

  ///////////////////////////////////////ALUMNOS/////////////////////////////////////
  function MostrarTablaAlumnos($Titulo, $Alumnos, $Asignatura)
  {
    $smarty = new Smarty();
    $smarty->assign("titulo", $Titulo);
    $smarty->assign("alumnos_s", $Alumnos); //Nombre que le damos al array con smarty: "Alumnos_s"
    $smarty->assign("asignatura_s", $Asignatura);
    $smarty->display("templates/tablaAlumnos.tpl");
  }
  function MostrarEditarTablaAlumnos($Titulo, $Alumnos, $id_alumno,$alumno, $Asignatura)
  {
    $smarty = new Smarty();
    $smarty->assign("titulo", $Titulo);
    $smarty->assign("alumnos_s", $Alumnos); //Nombre que le damos al array con smarty: "alumnos_s"
    $smarty->assign("asignatura_s", $Asignatura);
    $smarty->assign("alumno_s", $alumno);
    $smarty->assign("alumno_id", $id_alumno);
    $smarty->display("templates/EditarTablaAlumno.tpl");
  }

  function showDetallesAlumno($Alumno,$usuario, $cantidad)
  {
    $smarty = new Smarty();  //ESTO ES CUALQUIER COSA
    $smarty->assign("titulo", $Alumno->nombre_alumno);
    $smarty->assign("tituloMateria", $Alumno->materia);
    $smarty->assign("asignatura_s", $Alumno);
    $smarty->assign("alumno_s", $Alumno);
    $smarty->assign("usuario", $usuario);
    $smarty->assign("cantidad", $cantidad);
    
    $smarty->display("templates/detalleAlumno.tpl");
  }
  function showTablaAlumnos()
  {
    header("Location:" . BASE_URL . "tablaAlumnos");
  }


  function ShowComentariosCSR() {
    $smarty = new Smarty();
    $smarty->assign('titulo', "Lista de comentarios del Alumno");
    $smarty->display('templates/comentarios.tpl'); // muestro el template 
}

};
