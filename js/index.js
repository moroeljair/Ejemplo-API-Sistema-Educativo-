document.addEventListener('DOMContentLoaded', () => {
    obtenerEstudiantes();
    obtenerProfesores();
    obtenerCursos();
});

// Función para obtener estudiantes
function obtenerEstudiantes() {
    fetch('php/api/estudiante.php')
        .then(response => response.json())
        .then(data => {
            const lista = document.getElementById('lista-estudiantes');
            let tr='';
            data.forEach(estudiante => {
                tr += `
                <tr>
                    <th scope="row"> ${estudiante.ID_ESTUDIANTE} </th>
                        <td> ${estudiante.NOMBRE} </td>
                        <td> ${estudiante.TELEFONO} </td>
                        <td> ${estudiante.CORREO} </td>
                </tr>
                        `;
            });
            lista.innerHTML=tr;
        });
}

// Función para obtener profesores
function obtenerProfesores() {
    fetch('php/api/profesor.php')
        .then(response => response.json())
        .then(data => {
            const lista = document.getElementById('lista-profesores');
            let tr="";
            data.forEach(profesor => {
                tr += `
                <tr>
                    <th scope="row"> ${profesor.ID_PROFESOR} </th>
                    <td>${profesor.NOMBRE}</td>  
                    <td>${profesor.TELEFONO}</td>  
                    <td>${profesor.CORREO}</td>
                </tr>
                `;
            });
            lista.innerHTML=tr;
        });
}

// Función para obtener cursos
function obtenerCursos() {
    fetch('php/api/curso.php')
        .then(response => response.json())
        .then(data => {
            const lista = document.getElementById('lista-cursos');
            let div = "";
            data.forEach(curso => {
                div += `
                <tr>
                    <th scope="row"> ${curso.ID_CURSO} </th>
                    <td>${curso.NOMBRE}</td> 
                    <td>${curso.DESCRIPCION ?? "No hay"}</td>
                </tr>
                `;
            });
            lista.innerHTML=div;
        });
}


