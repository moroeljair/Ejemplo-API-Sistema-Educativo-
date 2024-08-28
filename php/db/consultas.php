<?php
include_once 'db.php'; // Incluir la conexión a la base de datos

//--------------------ESTUDIANTE----------------

// Función para obtener todos los estudiantes
function getAllEstudiantes() {
    $conn = getDBConnection();
    $query = "SELECT * FROM ESTUDIANTE";
    
    $stmt = $conn->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Función para obtener un estudiante por ID
function getEstudianteById($id) {
    $conn = getDBConnection();
    $query = "SELECT * FROM ESTUDIANTE WHERE ID_ESTUDIANTE = :id";
    
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

// Función para agregar un nuevo estudiante
function addEstudiante($nombre, $telefono, $correo) {
    $conn = getDBConnection();
    $query = "INSERT INTO ESTUDIANTE (NOMBRE, TELEFONO, CORREO) VALUES (:nombre, :telefono, :correo)";
    
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':nombre', $nombre);
    $stmt->bindParam(':telefono', $telefono);
    $stmt->bindParam(':correo', $correo);
    return $stmt->execute();
}

// Función para actualizar un estudiante por su ID
function updateEstudiante($id, $nombre, $telefono, $correo) {
    $conn = getDBConnection();
    $query = "UPDATE ESTUDIANTE SET NOMBRE = :nombre, TELEFONO = :telefono, CORREO = :correo WHERE ID_ESTUDIANTE = :id";
    
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->bindParam(':nombre', $nombre);
    $stmt->bindParam(':telefono', $telefono);
    $stmt->bindParam(':correo', $correo);
    
    return $stmt->execute();
}

//----------------------PROFESOR----------------------
// Función para obtener todos los profesores
function getAllProfesores() {
    $conn = getDBConnection();
    $query = "SELECT * FROM PROFESOR";
    
    $stmt = $conn->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Función para obtener un profesor por ID
function getProfesorById($id) {
    $conn = getDBConnection();
    $query = "SELECT * FROM PROFESOR WHERE ID_PROFESOR = :id";
    
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

// Función para agregar un nuevo profesor
function addProfesor($nombre, $telefono, $correo) {
    $conn = getDBConnection();
    $query = "INSERT INTO PROFESOR (NOMBRE, TELEFONO, CORREO) VALUES (:nombre, :telefono, :correo)";
    
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':nombre', $nombre);
    $stmt->bindParam(':telefono', $telefono);
    $stmt->bindParam(':correo', $correo);
    return $stmt->execute();
}

// Función para actualizar un profesor por su ID
function updateProfesor($id, $nombre, $telefono, $correo) {
    $conn = getDBConnection();
    $query = "UPDATE PROFESOR SET NOMBRE = :nombre, TELEFONO = :telefono, CORREO = :correo WHERE ID_PROFESOR = :id";
    
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->bindParam(':nombre', $nombre);
    $stmt->bindParam(':telefono', $telefono);
    $stmt->bindParam(':correo', $correo);
    
    return $stmt->execute();
}

//--------------------CURSO----------------

// Función para obtener todos los cursos
function getAllCursos() {
    $conn = getDBConnection();
    $query = "SELECT * FROM CURSO";
    
    $stmt = $conn->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Función para obtener un curso por ID
function getCursoById($id) {
    $conn = getDBConnection();
    $query = "SELECT * FROM CURSO WHERE ID_CURSO = :id";
    
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

// Función para agregar un nuevo curso
function addCurso($nombre, $descripcion) {
    $conn = getDBConnection();
    $query = "INSERT INTO CURSO (NOMBRE, DESCRIPCION) VALUES (:nombre, :descripcion)";
    
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':nombre', $nombre);
    $stmt->bindParam(':descripcion', $descripcion);
    return $stmt->execute();
}

// Función para actualizar un curso por su ID
function updateCurso($id, $nombre, $descripcion) {
    $conn = getDBConnection();
    $query = "UPDATE CURSO SET NOMBRE = :nombre, DESCRIPCION = :descripcion WHERE ID_CURSO = :id";
    
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->bindParam(':nombre', $nombre);
    $stmt->bindParam(':descripcion', $descripcion);
    
    return $stmt->execute();
}

//---------------------CONSULTAS MULTITABLA----------------------

//Obtener los datos de los estudiantes de un cierto curso 
function getEstudiantesByIdCurso($id_curso){
    $conn = getDBConnection();
    $query = 'SELECT e.NOMBRE as NOMBRE_ESTUDIANTE, e.TELEFONO, e.CORREO, c.NOMBRE as NOMBRE_MATERIA FROM estudiante e, curso_estudiante c_e, curso c WHERE e.ID_ESTUDIANTE=c_e.ID_ESTUDIANTE AND c.ID_CURSO = c_e.ID_CURSO AND c.ID_CURSO = :id_curso ;';
    
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':id_curso', $id_curso);
    
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

//Obtener los datos del o los profesores de un cierto curso 
function getProfesorByIdCurso($id_curso){
    $conn = getDBConnection();
    $query = 'SELECT e.NOMBRE as NOMBRE_PROFESOR, e.TELEFONO, e.CORREO, c.NOMBRE as NOMBRE_MATERIA FROM profesor e, curso_profesor c_e, curso c WHERE e.ID_PROFESOR=c_e.ID_PROFESOR AND c.ID_CURSO = c_e.ID_CURSO AND c.ID_CURSO = :id_curso ;';
    
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':id_curso', $id_curso);
    
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

//Obtener los datos de los cursos que un estudiante esta tomando
function getCursosByIdEstudiante($id_estudiante){
    $conn = getDBConnection();
    $query = 'SELECT c.ID_CURSO, c.NOMBRE as NOMBRE_CURSO, c.DESCRIPCION, e.NOMBRE as NOMBRE_ESTUDIANTE FROM estudiante e, curso c, curso_estudiante c_e WHERE e.ID_ESTUDIANTE = c_e.ID_ESTUDIANTE AND c.ID_CURSO = c_e.ID_CURSO AND e.ID_ESTUDIANTE = :id_estudiante ;';
    
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':id_estudiante', $id_estudiante);
    
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

//Obtener los datos de los cursos que un profesor esta dando 
function getCursosByIdProfesor($id_profesor){
    $conn = getDBConnection();
    $query = 'SELECT c.ID_CURSO, c.NOMBRE as NOMBRE_MATERIA, c.DESCRIPCION, p.NOMBRE as NOMBRE_PROFESOR FROM profesor p, curso c, curso_profesor c_p WHERE p.ID_PROFESOR = c_p.ID_PROFESOR AND c.ID_CURSO = c_p.ID_CURSO AND p.ID_PROFESOR = :id_profesor ;';
    
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':id_profesor', $id_profesor);
    
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

//Buscar estudiantes por correo o teléfono
function buscarEstudiantesPorCorreoOTelefono($correo, $telefono) {
    $conn = getDBConnection();
    $query = "SELECT * FROM ESTUDIANTE WHERE CORREO = :correo OR TELEFONO = :telefono";
    
    
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':correo', $correo);
    $stmt->bindParam(':telefono', $telefono);
    $stmt->execute();
    
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


?>