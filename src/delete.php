<?php
include('db.php');


# Si existe el id, eliminar la tarea de la db
if (isset($_GET['id'])) {

  $id = $_GET['id'];

  $query = "DELETE FROM task WHERE id = $id";
  # Ejecuta la consulta
  $result = mysqli_query($conn, $query);

  # Si no existe el id, terminar el proceso
  if (!$result) {
    die("Query Failed");
  }

  # Si se elimina la tarea, redirigir a la página principal
  $_SESSION['message'] = 'Task Removed Successfully';

  header("Location: index.php");
}


?>