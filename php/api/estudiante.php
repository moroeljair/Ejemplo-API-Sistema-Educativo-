<?php
header("Content-Type: application/json");
include_once '../db/consultas.php'; // Incluir las consultas de base de datos

$method = $_SERVER['REQUEST_METHOD'];


// GET
if($method == 'GET'){
    // Obtener estudiante por id
    if(isset($_GET['id'])){
        $id = intval($_GET['id']); //obtener id
        $estudiante = getEstudianteById($id);
        if($estudiante){
            echo json_encode($estudiante);
        }else{
            echo json_encode(['message'=>'Estudiante no encontrado.']);
        }    
    }else{
        // obtener todos los estudiantes
        $estudiantes = getAllEstudiantes();
        echo json_encode($estudiantes);
    }
}

// Agregar un nuevo estudiante
if ($method == 'POST') {
    $data = json_decode(file_get_contents("php://input"));

    $nombre = $data->nombre;
    $telefono = $data->telefono;
    $correo = $data->correo;

    if (addEstudiante($nombre, $telefono, $correo)) {
        echo json_encode(["message" => "Estudiante agregado con éxito."]);
    } else {
        echo json_encode(["message" => "Error al agregar estudiante."]);
    }
}

// Editar a un estudiante
if ($method == 'PUT') {
    if (isset($_GET['id'])) {
        $id = intval($_GET['id']);
        
        // Obtener los datos actuales del estudiante
        $currentEstudiante = getEstudianteById($id);
        
        if ($currentEstudiante) {
            // Obtener los datos enviados en la solicitud PUT
            $data = json_decode(file_get_contents("php://input"));
            $nombre = $data->nombre ?? $currentEstudiante['NOMBRE'];
            $telefono = $data->telefono ?? $currentEstudiante['TELEFONO'];
            $correo = $data->correo ?? $currentEstudiante['CORREO'];
            
            // Llamar a la función que actualiza los datos del estudiante
            if (updateEstudiante($id, $nombre, $telefono, $correo)) {
                echo json_encode(["message" => "Estudiante actualizado con éxito."]);
            } else {
                echo json_encode(["message" => "Error al actualizar estudiante."]);
            }
        } else {
            echo json_encode(["message" => "Estudiante no encontrado."]);
        }
    } else {
        echo json_encode(["message" => "ID del estudiante no proporcionado."]);
    }
}
?>