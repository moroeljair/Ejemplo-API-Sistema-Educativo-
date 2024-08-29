document.getElementById('course-form-1').addEventListener('submit', function(event) {
    event.preventDefault(); // Evitar el envío del formulario

    const courseId = document.getElementById('course-id').value;
    const url = `php/api/multitabla.php?clave_consulta=a1&id_curso=${courseId}`;

    fetch(url)
        .then(response => {
            if (!response.ok) {
                throw new Error('Error en la red');
            }
            return response.json();
        })
        .then(data => {
            const resultDiv = document.getElementById('result-1');
            resultDiv.innerHTML = ''; // Limpiar resultados anteriores

            if (data.length > 0) {
                const list = document.createElement('ul');
                data.forEach(estudiante => {
                    const listItem = document.createElement('li');
                    listItem.textContent = `${estudiante.NOMBRE_ESTUDIANTE}, - ${estudiante.TELEFONO}, - ${estudiante.CORREO}`;
                    list.appendChild(listItem);
                });
                resultDiv.appendChild(list);
            } else {
                resultDiv.textContent = 'No se encontraron estudiantes para este curso.';
            }
        })
        .catch(error => {
            console.error('Error:', error);
            document.getElementById('result-1').textContent = 'Hubo un problema con la consulta.';
        });
});



document.getElementById('course-form-2').addEventListener('submit', function(event) {
    event.preventDefault(); // Evitar el envío del formulario

    const courseId = document.getElementById('course-id-2').value;
    const url = `php/api/multitabla.php?clave_consulta=a2&id_curso=${courseId}`;

    fetch(url)
        .then(response => {
            if (!response.ok) {
                throw new Error('Error en la red');
            }
            return response.json();
        })
        .then(data => {
            const resultDiv = document.getElementById('result-2');
            resultDiv.innerHTML = ''; // Limpiar resultados anteriores

            if (data.length > 0) {
                const list = document.createElement('ul');
                data.forEach(profesor => {
                    const listItem = document.createElement('li');
                    listItem.textContent = `${profesor.NOMBRE_PROFESOR}, - ${profesor.TELEFONO}, - ${profesor.CORREO}`;
                    list.appendChild(listItem);
                });
                resultDiv.appendChild(list);
            } else {
                resultDiv.textContent = 'No se encontraron profesores para este curso.';
            }
        })
        .catch(error => {
            console.error('Error:', error);
            document.getElementById('result-2').textContent = 'Hubo un problema con la consulta.';
        });
});



document.getElementById('student-form-3').addEventListener('submit', function(event) {
    event.preventDefault(); // Evitar el envío del formulario

    const studentId = document.getElementById('student-id').value;
    const url = `php/api/multitabla.php?clave_consulta=a3&id_estudiante=${studentId}`;

    fetch(url)
        .then(response => {
            if (!response.ok) {
                throw new Error('Error en la red');
            }
            return response.json();
        })
        .then(data => {
            const resultDiv = document.getElementById('result-3');
            resultDiv.innerHTML = ''; // Limpiar resultados anteriores

            if (data.length > 0) {
                const list = document.createElement('ul');
                data.forEach(curso => {
                    const listItem = document.createElement('li');
                    listItem.textContent = `Id Curso: ${curso.ID_CURSO}, Nombre: ${curso.NOMBRE_CURSO}, Descripción: ${curso.DESCRIPCION}`;
                    list.appendChild(listItem);
                });
                resultDiv.appendChild(list);
            } else {
                resultDiv.textContent = 'No se encontraron cursos para este estudiante.';
            }
        })
        .catch(error => {
            console.error('Error:', error);
            document.getElementById('result-3').textContent = 'Hubo un problema con la consulta.';
        });
});




document.getElementById('consultaForm-4').addEventListener('submit', function(event) {
    event.preventDefault(); // Evitar que el formulario se envíe de forma tradicional

    const idProfesor = document.getElementById('id_profesor').value;
    const url = `php/api/multitabla.php?clave_consulta=a4&id_profesor=${idProfesor}`;

    fetch(url)
        .then(response => response.json())
        .then(data => {
            console.log(data);
            const resultadosDiv = document.getElementById('result-4');
            resultadosDiv.innerHTML = ''; // Limpiar resultados previos

            if (data.length > 0) {
                const lista = document.createElement('ul');
                data.forEach(curso => {
                    const item = document.createElement('li');
                    item.textContent = `Curso: ${curso.NOMBRE_MATERIA}, Descripción: ${curso.DESCRIPCION}`;
                    lista.appendChild(item);
                });
                resultadosDiv.appendChild(lista);
            } else {
                resultadosDiv.textContent = 'No se encontraron cursos para este profesor.';
            }
        })
        .catch(error => {
            console.error('Error al realizar la consulta:', error);
            document.getElementById('result-4').textContent = 'Ocurrió un error al realizar la consulta.';
        });
});






document.getElementById('consultaForm-5').addEventListener('submit', function(event) {
    event.preventDefault(); // Evitar que el formulario se envíe de forma tradicional

    const correo = document.getElementById('correo').value;
    const url = `php/api/multitabla.php?clave_consulta=a5&correo=${correo}`;

    fetch(url)
        .then(response => response.json())
        .then(data => {
            const resultadosDiv = document.getElementById('result-5');
            resultadosDiv.innerHTML = ''; // Limpiar resultados previos

            if (data.length > 0) {
                const lista = document.createElement('ul');
                data.forEach(estudiante => {
                    const item = document.createElement('li');
                    item.textContent = `Id: ${estudiante.ID_ESTUDIANTE} ,Nombre: ${estudiante.NOMBRE}, Teléfono: ${estudiante.TELEFONO}, Correo: ${estudiante.CORREO}`;
                    lista.appendChild(item);
                });
                resultadosDiv.appendChild(lista);
            } else {
                resultadosDiv.textContent = 'No se encontró ningún estudiante con ese correo.';
            }
        })
        .catch(error => {
            console.error('Error al realizar la consulta:', error);
            document.getElementById('result-5').textContent = 'Ocurrió un error al realizar la consulta.';
        });
});




document.getElementById('consultaForm-6').addEventListener('submit', function(event) {
    event.preventDefault(); // Evitar que el formulario se envíe de forma tradicional

    const telefono = document.getElementById('telefono').value;
    const url = `php/api/multitabla.php?clave_consulta=a5&telefono=${telefono}`;

    fetch(url)
        .then(response => response.json())
        .then(data => {
            const resultadosDiv = document.getElementById('result-6');
            resultadosDiv.innerHTML = ''; // Limpiar resultados previos

            if (data.length > 0) {
                const lista = document.createElement('ul');
                data.forEach(estudiante => {
                    const item = document.createElement('li');
                    item.textContent = `Id: ${estudiante.ID_ESTUDIANTE} ,Nombre: ${estudiante.NOMBRE}, Teléfono: ${estudiante.TELEFONO}, Correo: ${estudiante.CORREO}`;
                    lista.appendChild(item);
                });
                resultadosDiv.appendChild(lista);
            } else {
                resultadosDiv.textContent = 'No se encontró ningún estudiante con ese teléfono.';
            }
        })
        .catch(error => {
            console.error('Error al realizar la consulta:', error);
            document.getElementById('result-6').textContent = 'Ocurrió un error al realizar la consulta.';
        });
});