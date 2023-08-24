<!-- TRAIGO LA DB -->
<?php include('db.php'); ?>
<!-- REUTILIZO EL CODIGO DEL HEADER EN EL ARCHIVO UTILIZANDO INCLUDE() -->
<?php include('./includes/header.php'); ?>

<main class="flex flex-col items-center align-center md:my-52  justify-center w-full  px-20 text-center">

  <div  class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow  ">
    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 ">TODO</h5>
    <!-- FORMULARIO -->
    <!-- Le decimos que enviara los datos del formualario al archivo save.php por el metodo POST -->
    <form action="save.php" method="POST"
      class="flex flex-col gap-6 items-center py-5 px-20 justify-center w-full flex-1 text-center  [&>div]:w-full">
      <div>

        <input type="text" name="title" autofocus placeholder="Task title" class="px-2 ">
      </div>
      <div>
        <textarea name="description" rows="2" placeholder="Task description" class="px-2 "></textarea>
      </div>
      <!-- Al agregarle el tipo submit le decimos que ejecute el action del formulario -->
      <button type="submit" name="save_task" class="text-gray-900 w-full hover:text-white border border-gray-800 hover:bg-gray-900 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Submit Task</button>
    </form>

  </div>

</main>


<?php include('./includes/footer.php'); ?>