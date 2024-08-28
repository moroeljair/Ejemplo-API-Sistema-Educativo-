<?php
header("Content-Type: application/json");
include_once '../db/consultas.php'; // Incluir las consultas de base de datos

$method = $_SERVER['REQUEST_METHOD'];

// GET
if ($method == 'GET') {
    // Obtener curso por id
    if (isset($_GET['id'])) {
        $id_curso = intval($_GET['id']); // Obtener id
        $curso = getCursoById($id_curso);
        if ($curso) {
            echo json_encode($curso);
        } else {
            echo json_encode(['message' => 'Curso no encontrado.']);
        }
    } else {
        // Obtener todos los cursos
        $cursos = getAllCursos();
        echo json_encode($cursos);
    }
}

// Agregar un nuevo curso
if ($method == 'POST') {
    $data = json_decode(file_get_contents("php://input"));

    $nombre = $data->nombre;
    $descripcion = $data->descripcion;

    if (addCurso($nombre, $descripcion)) {
        echo json_encode(["message" => "Curso agregado con éxito."]);
    } else {
        echo json_encode(["message" => "Error al agregar curso."]);
    }
}

// Editar un curso
if ($method == 'PUT') {
    if (isset($_GET['id'])) {
        $id_curso = intval($_GET['id']);
        
        // Obtener los datos actuales del curso
        $currentCurso = getCursoById($id_curso);
        
        if ($currentCurso) {
            // Obtener los datos enviados en la solicitud PUT
            $data = json_decode(file_get_contents("php://input"));
            $nombre = $data->nombre ?? $currentCurso['NOMBRE'];
            $descripcion = $data->descripcion ?? $currentCurso['DESCRIPCION'];
            
            // Llamar a la función que actualiza los datos del curso
            if (updateCurso($id_curso, $nombre, $descripcion)) {
                echo json_encode(["message" => "Curso actualizado con éxito."]);
            } else {
                echo json_encode(["message" => "Error al actualizar curso."]);
            }
        } else {
            echo json_encode(["message" => "Curso no encontrado."]);
        }
    } else {
        echo json_encode(["message" => "ID del curso no proporcionado."]);
    }
}
?>
