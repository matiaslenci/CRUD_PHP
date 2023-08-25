<?php

# traemos la conexion a la base de datos
include('db.php');

# Pregunto si recibo datos por POST y save_task no es nulo
if (isset($_POST['save_task'])) {
  # Almaceno los datos en variables
  $title = $_POST['title'];
  $description = $_POST['description'];
 
  # Creo la consulta para guardar los datos 
  ## Insertamos en la tabla task los datos que recibimos
  $query = "INSERT INTO task(title, description) VALUES ('$title', '$description')";

  # Ejecuto la consulta 
  ## Pasamps la conexion y la consulta
  $result = mysqli_query($conn, $query);

  if (!$result) {
    die('Query Failed.');
  }

  # Mensaje de confirmacion
  $_SESSION['message'] = 'Task Saved Successfully';

  

  header('Location: index.php');
}

?>