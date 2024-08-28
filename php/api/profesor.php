<?php
header("Content-Type: application/json");
include_once '../db/consultas.php'; // Incluir las consultas de base de datos

$method = $_SERVER['REQUEST_METHOD'];

// GET
if ($method == 'GET') {
    // Obtener profesor por id
    if (isset($_GET['id'])) {
        $id = intval($_GET['id']); // Obtener id
        $profesor = getProfesorById($id);
        if ($profesor) {
            echo json_encode($profesor);
        } else {
            echo json_encode(['message' => 'Profesor no encontrado.']);
        }
    } else {
        // Obtener todos los profesores
        $profesores = getAllProfesores();
        echo json_encode($profesores);
    }
}

// Agregar un nuevo profesor
if ($method == 'POST') {
    $data = json_decode(file_get_contents("php://input"));

    $nombre = $data->nombre;
    $telefono = $data->telefono;
    $correo = $data->correo;

    if (addProfesor($nombre, $telefono, $correo)) {
        echo json_encode(["message" => "Profesor agregado con éxito."]);
    } else {
        echo json_encode(["message" => "Error al agregar profesor."]);
    }
}

// Editar a un profesor
if ($method == 'PUT') {
    if (isset($_GET['id'])) {
        $id = intval($_GET['id']);
        
        // Obtener los datos actuales del profesor
        $currentProfesor = getProfesorById($id);
        
        if ($currentProfesor) {
            // Obtener los datos enviados en la solicitud PUT
            $data = json_decode(file_get_contents("php://input"));
            $nombre = $data->nombre ?? $currentProfesor['NOMBRE'];
            $telefono = $data->telefono ?? $currentProfesor['TELEFONO'];
            $correo = $data->correo ?? $currentProfesor['CORREO'];
            
            // Llamar a la función que actualiza los datos del profesor
            if (updateProfesor($id, $nombre, $telefono, $correo)) {
                echo json_encode(["message" => "Profesor actualizado con éxito."]);
            } else {
                echo json_encode(["message" => "Error al actualizar profesor."]);
            }
        } else {
            echo json_encode(["message" => "Profesor no encontrado."]);
        }
    } else {
        echo json_encode(["message" => "ID del profesor no proporcionado."]);
    }
}
?>
