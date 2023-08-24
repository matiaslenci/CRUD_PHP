<?php

include('db.php');

# Pregunto si recibo datos por POST y save_task no es nulo
if (isset($_POST['save_task'])) {
  # Almaceno los datos en variables
  $title = $_POST['title'];
  $description = $_POST['description'];
 
  
}

?>