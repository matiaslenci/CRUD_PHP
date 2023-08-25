<?php
include('db.php');
if (isset($_GET['id'])) {
  $id = $_GET['id'];

  # Devuelve todas las filas de la tabla tareas que tengan el id recuperado por params
  $query = "SELECT * FROM task WHERE id = $id";

  # Ejecuta la consulta
  $result = mysqli_query($conn, $query);

  # Si devuelve una fila guardamos la respuesta en el array $row
  if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_array($result);
    $title = $row['title'];
    $description = $row['description'];
  
  }
}

if(isset($_POST['update'])){
  # Almaceno los datos en variables
  $id = $_GET['id'];
  $title = $_POST['title'];
  $description = $_POST['description'];
 
  $query = "UPDATE task set title = '$title', description = '$description' WHERE id = $id";
  mysqli_query($conn,$query);

   if(!$result){
    die('Query Failed.');
  }

  $_SESSION['message'] = 'Task Updated Successfully'; 


  header('Location: index.php');
}
?>

<?php include('includes/header.php'); ?>

<main
  class="flex md:flex-row flex-col  justify-center  gap-10 items-center align-center md:my-40  justify-center w-full  px-20 text-center">

  <div class="block max-w-sm p-6 bg-yellow-100 border border-gray-200 rounded-lg shadow  ">
    <h5 class="mb-2 text-2xl font-bold tracking-tight text-center text-gray-900 ">TODO</h5>
    <!-- FORMULARIO -->
    <!-- Actualizamos los datos con el action pasandole el id por parametros -->
    <form action="edit.php?id=<?php echo $id?>" method="POST"
      class="flex flex-col gap-6 items-center py-5 px-20 justify-center w-full flex-1 text-center  [&>div]:w-full">
      <div>

        <input type="text" name="title" value="<?php echo $title; ?>" autofocus placeholder="Update title" class="px-2 w-full bg-yellow-100">
      </div>
      <div>
        <textarea name="description" rows="2"  placeholder="Update description" class="px-2 w-full bg-yellow-100"><?php echo $description; ?></textarea>
      </div>
      <!-- Al agregarle el tipo submit le decimos que ejecute el action del formulario -->
      <button type="submit" name="update"
        class="text-gray-900 w-full hover:text-white border border-gray-800 hover:bg-gray-900 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Update
        Task</button>
    </form>

  </div>
</main>


<?php include('includes/footer.php'); ?>