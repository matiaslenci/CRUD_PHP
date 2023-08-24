<?php
session_start();

# iniciamos una sesión para guardar datos

# usamos la mysqli para conectarnos a la db
# la guardamos en una variable conn
$conn = mysqli_connect(
  'mariadb', # host de nuestra db 
  'root', # usuario de la db
  'root', # password de la db
  'mi_base_de_datos' # nombre de la db
  
);

# Si hay un error en la conexión, mostramos el error
/* if(!$conn){
  echo 'Error en la conexión⚠️';
} */
?>