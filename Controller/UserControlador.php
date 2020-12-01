<?php
require_once "./RouterAvanzado.php";
require_once "Model/UserModel.php";
require_once "View/UserView.php";
class UserControlador
{

    private $view;
    private $model;

    function __construct()
    {
        $this->view = new UserView();
        $this->model = new UserModel();
    }

    function cerrarSesion()
    {
        session_start();
        session_destroy();
        header("Location: " . LOGIN);
    }



    function login()
    {
        $this->view->ShowLogin();
    }

    function CrearUsuario()
    {
        if (empty($_POST['crear_email'])) {

            $this->view->ShowLogin("nada@nada.com no es un email, no se haga el gracioso y complete los campos con lo que se solicita POR FAVOR!");
        } else if (empty($_POST['crear_nombre'])) {

            $this->view->ShowLogin("...(vacio)... no es un nombre, si sus padres no le pusieron un nombre inventense uno... MUCHAS GRACIAS!");
        } else {
            if ($userFromDB = $this->model->TraerUsuario($_POST['crear_nombre'])) {

                $this->view->ShowLogin("El nombre de usuario ya existe: use la imaginación!");
            } else {

                $hash = password_hash($_POST['crear_password'], PASSWORD_DEFAULT);
                $user = $_POST["crear_email"];
                $userFromDB = $this->model->TraerUsuario($user);
                if ($userFromDB) {
                    $this->view->ShowLogin("Ya usted tiene una cuenta con ese email, no aceptamos cuentas troll!");
                } else {
                    $this->model->CrearUsuario($_POST['crear_nombre'], 0, $_POST['crear_email'], $hash);
                    session_start();
                    $_SESSION['nombre_usuario'] = $_POST['crear_nombre'];
                    $_SESSION['navegando'] = time();

                    header("Location: " . BASE_URL . "Home");
                }
            }
        }
    }
    function VerificarUsuario()
    {
        $user = $_POST["validar_email"];
        $pass = $_POST["validad_password"];

        if (!empty($user)) {
            $userFromDB = $this->model->TraerUsuario($user);

            if (isset($userFromDB) && $userFromDB) {
                // Existe el usuario

                if (password_verify($pass, $userFromDB->password_u)) {

                    session_start();
                    $_SESSION['nombre_usuario'] = $userFromDB->nombre_usuario;
                    $_SESSION['navegando'] = time();

                    header("Location: " . BASE_URL . "Home");
                } else {
                    $this->view->ShowLogin("Contraseña incorrecta: si olvido su contraseña tome la pastillita o anotela");
                }
            } else {
                // No existe el user en la DB
                $this->view->ShowLogin("El usuario no existe");
            }
        } else {
            $this->view->ShowLogin("nada@nada.com no es un email, no se haga el gracioso y complete los campos con lo que se solicita POR FAVOR!");
        }
    }

    function editarUsuario($params = null)
    {
        if ($this->comprobarSiEsAdministrador()) {
            $id_usuario = $params[':ID'];
            $this->model->cambiarPermisos($id_usuario);
            $usuarios = $this->model->getUsuarios();
            $this->view->ShowTablaUsuarios($usuarios);
        }
    }


    function comprobarSiEsAdministrador()
    {
        session_start();
        $user = $_SESSION['nombre_usuario'];
        $userFromDB = $this->model->TraerUsuarioPorNombre($user);
        return $userFromDB->administrador;
    }

    function borrarUsuario($params = null)
    {   
        if ($this->comprobarSiEsAdministrador()) {
            $id_usuario = $params[':ID'];
            $this->model->deleteUser($id_usuario);
            $usuarios = $this->model->getUsuarios();
            $this->view->ShowtablaUsuarios($usuarios);
        }
    }
    function getUsuarios()
    {
        if ($this->comprobarSiEsAdministrador()) {
            $usuarios = $this->model->getUsuarios();
            $this->view->ShowTablaUsuarios($usuarios);
        }
    }



    function entrarSinUsuario()
    {
        session_start();
        $_SESSION['nombre_usuario'] = "admin";
        header("Location: " . BASE_URL . "Home");
    }
}
