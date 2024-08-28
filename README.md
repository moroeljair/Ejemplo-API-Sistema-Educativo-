# API de Gestión de Estudiantes, Profesores y Cursos

Esta API permite gestionar información sobre estudiantes, profesores y cursos. Se ha desarrollado utilizando PHP y XAMPP como servidor local. La API permite realizar operaciones CRUD (Crear, Leer, Actualizar y Eliminar) sobre los recursos de estudiantes, profesores y cursos.

## Estructura de la Base de Datos

La base de datos incluye las siguientes tablas:

1. **ESTUDIANTE**
   - `id_estudiante`: Identificador único del estudiante.
   - `nombre`: Nombre del estudiante.
   - `telefono`: Número de teléfono del estudiante.
   - `correo`: Correo electrónico del estudiante.

2. **PROFESOR**
   - `id_profesor`: Identificador único del profesor.
   - `nombre`: Nombre del profesor.
   - `telefono`: Número de teléfono del profesor.
   - `correo`: Correo electrónico del profesor.

3. **CURSO**
   - `id_curso`: Identificador único del curso.
   - `nombre`: Nombre del curso.
   - `descripcion`: Descripción del curso.

4. **CURSO_ESTUDIANTE**
   - Relación entre cursos y estudiantes.

5. **CURSO_PROFESOR**
   - Relación entre cursos y profesores.

## Endpoints de la API

### Estudiantes

- **GET /php/api/estudiante.php**: Obtiene todos los estudiantes.
- **GET /php/api/estudiante.php?id=id_estudiante**: Obtiene un estudiante por su ID.

### Profesores

- **GET /php/api/profesor.php**: Obtiene todos los profesores.
- **GET /php/api/profesor.php?id=id_profesor**: Obtiene un profesor por su ID.

### Cursos

- **GET /php/api/curso.php**: Obtiene todos los cursos.
- **GET /php/api/curso.php?id=id_curso**: Obtiene un curso por su ID.

### Consultas Multitabla

- **GET /php/api/multitabla.php?clave_consulta=a1&id_curso=numero_del_id_del_curso**: Obtiene todos los estudiantes de un curso.
- **GET /php/api/multitabla.php?clave_consulta=a2&id_curso=numero_del_id_del_curso**: Obtiene los datos del profesor de un curso en específico.
- **GET /php/api/multitabla.php?clave_consulta=a3&id_estudiante=numero_del_id_del_estudiante**: Obtiene la descripción de los cursos que un estudiante está tomando.
- **GET /php/api/multitabla.php?clave_consulta=a4&id_profesor=numero_del_id_del_profesor**: Obtiene los cursos que un profesor dicta.
- **GET /php/api/multitabla.php?clave_consulta=a5&correo=correo_del_estudiante**: Búsqueda de estudiante por correo.
- **GET /php/api/multitabla.php?clave_consulta=a5&telefono=telefono_del_estudiante**: Búsqueda de estudiante por teléfono.

## Pruebas con Postman

Se pueden realizar pruebas a la API utilizando Postman. 

## Instalación

1. Clona el repositorio en tu máquina local.
2. Debes tener XAMPP instalado y en ejecución.
3. Coloca los archivos de la API en la carpeta `htdocs` de XAMPP.
4. Accede a la API a través de `http://localhost/nombre_del_proyecto/php/api/`.


