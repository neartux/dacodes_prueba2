## Acerca del API

El api es diseñado para el consumo de servicios rest, para una aplicacion de cursos.

## Instalaci&oacute;n

- Descargar el zip del proyecto, o clonar desde linea de comandos
- Crear la base de datos con nombre **dacodes_prueba2**
- Entrar al proyecto por linea de comandos y ejecutar **php artisan migrate:refresh --seed** para crear las tablas de los migrates generados en el proyecto. Si no tambien se anexa un sql para importar las tablas directamente en la DB. Ruta del archivo: **storage/db/data.sql**
- Ejecutar comando **php artisan passport:install** para generar el id y el secret el cliente
- Subir el server con el comando **php artisan serve**

## Uso del API

- Registrar usuarios (Posteiormente se pudiera definir quienes son profesores y quienes estudiantes). 
  <p align="center"><img src="https://raw.githubusercontent.com/neartux/dacodes_prueba2/master/public/assets/images/1.png" width="400"></p>
  
- Loguear un usuario registrado en el sistema.
  <p align="center"><img src="https://raw.githubusercontent.com/neartux/dacodes_prueba2/master/public/assets/images/2.png" width="400"></p>

- Del resultado del login, en las siguientes peticiones hay que colocar el Bearer Token para las solicitudes, Tambien agregar en el header **Content-Type - application/json**
  <p align="center"><img src="https://raw.githubusercontent.com/neartux/dacodes_prueba2/master/public/assets/images/3.png" width="400"></p>

- Buscar cursos disponibles
  <p align="center"><img src="https://raw.githubusercontent.com/neartux/dacodes_prueba2/master/public/assets/images/4.png" width="400"></p>

- Crear un curso
  <p align="center"><img src="https://raw.githubusercontent.com/neartux/dacodes_prueba2/master/public/assets/images/5.png" width="400"></p>
  
- Actualizar un curso
  <p align="center"><img src="https://raw.githubusercontent.com/neartux/dacodes_prueba2/master/public/assets/images/6.png" width="400"></p>
  
- Eliminar un curso
  <p align="center"><img src="https://raw.githubusercontent.com/neartux/dacodes_prueba2/master/public/assets/images/7.png" width="400"></p>
  
- Agregar leccion a curso
  <p align="center"><img src="https://raw.githubusercontent.com/neartux/dacodes_prueba2/master/public/assets/images/8.png" width="400"></p>
  
- Busca las lecciones de un curso
  <p align="center"><img src="https://raw.githubusercontent.com/neartux/dacodes_prueba2/master/public/assets/images/9.png" width="400"></p>
  
- Actualiza la info de una leccion
  <p align="center"><img src="https://raw.githubusercontent.com/neartux/dacodes_prueba2/master/public/assets/images/10.png" width="400"></p>
  
- Elimina una leccion
  <p align="center"><img src="https://raw.githubusercontent.com/neartux/dacodes_prueba2/master/public/assets/images/11.png" width="400"></p>
  
- Obtiene la informacion de una leccion junto con sus preguntas y respuestas respectivamente
  <p align="center"><img src="https://raw.githubusercontent.com/neartux/dacodes_prueba2/master/public/assets/images/12.png" width="400"></p>
  
- Busca las preguntas de una leccion
  <p align="center"><img src="https://raw.githubusercontent.com/neartux/dacodes_prueba2/master/public/assets/images/13.png" width="400"></p>
  
- Agrega una pregunta a un leccion
  <p align="center"><img src="https://raw.githubusercontent.com/neartux/dacodes_prueba2/master/public/assets/images/14.png" width="400"></p>
  
- Elimina un pregunta de una leccion
  <p align="center"><img src="https://raw.githubusercontent.com/neartux/dacodes_prueba2/master/public/assets/images/15.png" width="400"></p>