<?php



class MateriaModel
{

    private $db;


    public function __construct()
    {

        $this->db = new PDO('mysql:host=localhost;' . 'dbname=escuela;charset=utf8', 'root', '');
    }

    function getTodasLasMaterias()
    {

        $sentencia = $this->db->prepare('SELECT * FROM materia ORDER BY nombre_materia ASC');
        $sentencia->execute();
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }

    function getMateriasPorAsig($Asignatura)
    {
        $sentencia = $this->db->prepare('SELECT * FROM materia WHERE nombre_materia=? ORDER BY nombre_materia ASC');
        $sentencia->execute([$Asignatura]);
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }

    function InsertarMateria($materia, $profesor, $curso)
    {

        $sentencia = $this->db->prepare('INSERT INTO materia(nombre_materia,profesor,curso) VALUES(?,?,?) ');
        $sentencia->execute(array($materia, $profesor, $curso));
    }
    function deleteMateria($id_materia = null)
    {

        $sentencia = $this->db->prepare('DELETE FROM materia WHERE id_materia=?');
        $sentencia->execute(array($id_materia));
    }
    function editMateria($id_materia, $materia, $profesor, $curso)
    {

        $sentencia = $this->db->prepare('UPDATE materia  SET nombre_materia=?, profesor=?, curso=? WHERE id_materia=?');
        $sentencia->execute(array($materia, $profesor, $curso, $id_materia));
    }

    function MostrarMateria($id_materia)
    { 
        $sentencia = $this->db->prepare('SELECT * FROM alumno INNER JOIN materia ON alumno.materia=materia.nombre_materia WHERE id_materia=?');
        $sentencia->execute([$id_materia]);
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }
    function getMateriaPorNombre($nombre_materia)
    {
        $sentencia = $this->db->prepare('SELECT FROM materia WHERE nombre_materia=?');
        $sentencia->execute([$nombre_materia]);
        return $sentencia->fetch(PDO::FETCH_OBJ);
    }


    //////////ALUMNO///////////////////////
    
    
    function getTodosLosAlumnos()
    {

        $sentencia = $this->db->prepare('SELECT * FROM alumno ORDER BY nombre_alumno ASC');
        $sentencia->execute();
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }

    function getAlumnosporAsig($Asignatura)
    {
        $sentencia = $this->db->prepare('SELECT * FROM alumno WHERE materia=? ORDER BY nombre_alumno ASC');
        $sentencia->execute([$Asignatura]);
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }
    function getAlumnosPorId($idAlumno)
    {       
        $sentencia = $this->db->prepare('SELECT * FROM alumno WHERE id_alumno=?');
        $sentencia->execute([$idAlumno]);
        return $sentencia->fetch(PDO::FETCH_OBJ);
    }

    function insertarAlumno($alumno, $email, $conducta,$calificacion,$materia,$filePath=null)
    { 
     
        $direccion = null;
       if ($filePath!=null){
           $direccion = $this->subirImagen($filePath);
    }
        $sentencia = $this->db->prepare('INSERT INTO alumno (nombre_alumno,email,conducta,calificacion, materia, imagen) VALUES(?,?,?,?,?,?) ');
        $sentencia->execute(array($alumno, $email, $conducta,$calificacion,$materia, $direccion));
    }
    function deleteAlumno($id_alumno = null)
    {
        $sentencia = $this->db->prepare('DELETE FROM alumno WHERE id_alumno=?');
        $sentencia->execute(array($id_alumno));
        return $sentencia->rowCount();
    }
    function editAlumno($id_alumno, $alumno, $email,$conducta,$calificacion, $materia,$filePath=null)
    {
    
        $direccion = null;
       if ($filePath!=null){
           $direccion = $this->subirImagen($filePath);
    }
        $sentencia = $this->db->prepare('UPDATE alumno  SET nombre_alumno=?, email=?, conducta=?, calificacion=?, materia=?, imagen=? WHERE id_alumno=?');
        $sentencia->execute(array($alumno, $email,$conducta,$calificacion, $materia,$direccion,$id_alumno));
        return $sentencia->rowCount();
    }

    function MostrarAlumno($id_alumno)//decia idmateria
    {
        $sentencia = $this->db->prepare('SELECT * FROM alumno INNER JOIN materia ON alumno.materia=materia.nombre_materia WHERE id_alumno=?');
        $sentencia->execute([$id_alumno]);
        return $sentencia->fetch(PDO::FETCH_OBJ);

    }

    private function subirImagen($imagen){
        $lugar = "imgs/" . uniqid() . '.jpeg';
        move_uploaded_file($imagen, $lugar);
        return $lugar;
    }
    public function deleteImagen($id_alumno){

        $sentencia = $this->db->prepare("UPDATE alumno SET imagen = null WHERE id_alumno=?");
        $sentencia->execute([$id_alumno]);
        return $sentencia->rowCount();
    }

////////////////////////////////////COMENTARIO////////////////////////////////////////////////////
    function deleteComentario($id_comentario = null)
    {
        $sentencia = $this->db->prepare('DELETE FROM comentario WHERE id_comentario=?');
        $sentencia->execute(array($id_comentario));
        return $sentencia->rowCount();
    }
    function editComentario($id_comentario, $nombre_alumno, $contenido,$usuario_nombre)
    {

        $sentencia = $this->db->prepare('UPDATE comentario  SET nombre_alumno=?, contenido=?, usuario_nombre=? WHERE id_comentario=?');
        $sentencia->execute(array($nombre_alumno, $contenido,$usuario_nombre,$id_comentario));
        return $sentencia->rowCount();
    }
    function getComentarios($nombre_alumno)
    {

        $sentencia = $this->db->prepare('SELECT * FROM comentario WHERE nombre_alumno=? ORDER by id_comentario DESC LIMIT 10 /*LIMIT {someLimit} OFFSET {someOffset}*/');
        $sentencia->execute([$nombre_alumno]);
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }
    function getComentariosPorId($id_comentario)
    {
        $sentencia = $this->db->prepare('SELECT * FROM comentario WHERE id_comentario=?');
        $sentencia->execute([$id_comentario]);
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }
    function insertarComentario($nombre_alumno, $contenido,$usuario_nombre, $valoracion_alumno)
    {
        $sentencia = $this->db->prepare('INSERT INTO comentario (nombre_alumno,contenido,usuario_nombre,valoracion_alumno) VALUES(?,?,?,?) ');
        $sentencia->execute(array($nombre_alumno, $contenido,$usuario_nombre, $valoracion_alumno));
    }

};

