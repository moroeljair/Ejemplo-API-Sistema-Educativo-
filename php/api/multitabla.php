<?php
header("Content-Type: application/json");
include_once '../db/consultas.php'; // Incluir las consultas de base de datos

$method = $_SERVER['REQUEST_METHOD'];

/*
Cada consulta va a tener una clave y va a ser seleccionada por un switch
1. Obtener Estudiantes por id de Curso: a1
2. Obtener Profesor por id del Curso: a2
3. Obtener Cursos que un estudiante esta tomando: a3 
4. Obtener Cursos que un profesor esta impartiendo: a4
5. Buscar estudiantes por correo o teléfono: a5
*/

if($method == 'GET' && isset($_GET['clave_consulta'])){
    $clave_consulta = $_GET['clave_consulta'];    
    switch($clave_consulta){
        case 'a1':
            if(isset($_GET['id_curso'])){
                $id_curso = $_GET['id_curso'];
                $estudiantes = getEstudiantesByIdCurso($id_curso);
                if($estudiantes){
                    echo json_encode($estudiantes);
                }else{
                    echo json_encode(['message'=>'Curso no encontrado.']);
                }
            }
            break;
        case 'a2':
            if(isset($_GET['id_curso'])){
                $id_curso = $_GET['id_curso'];
                $profesor = getProfesorByIdCurso($id_curso);
                if($profesor){
                    echo json_encode($profesor);
                }else{
                    echo json_encode(['message'=>'Curso no encontrado.']);
                }
            }
            break;

        case 'a3':
            if(isset($_GET['id_estudiante'])){
                $id_estudiante = $_GET['id_estudiante'];
                $cursos = getCursosByIdEstudiante($id_estudiante);
                if($cursos){
                    echo json_encode($cursos);
                }else{
                    echo json_encode(['message'=>'Estudiante no encontrado.']);
                }
            }
        break;
        case 'a4':
            if(isset($_GET['id_profesor'])){
                $id_profesor = $_GET['id_profesor'];
                $cursos = getCursosByIdProfesor($id_profesor);
                if($cursos){
                    echo json_encode($cursos);
                }else{
                    echo json_encode(['message'=>'Profesor no encontrado.']);
                }
            }
        break;
        case 'a5':
            if(isset($_GET['correo']) || isset($_GET['telefono']) ){
                $correo = $_GET['correo'] ?? '';
                $telefono = $_GET['telefono'] ?? ''; 
                $estudiantes = buscarEstudiantesPorCorreoOTelefono($correo, $telefono);
                if($estudiantes){
                    echo json_encode($estudiantes);
                }else{
                    echo json_encode(['message'=>'No se encontraron similitudes.']);
                }
            }
        break;
            

    }
}




