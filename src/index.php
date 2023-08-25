<?php include('db.php'); ?><!-- TRAIGO LA DB -->

<!-- REUTILIZO EL CODIGO DEL HEADER EN EL ARCHIVO UTILIZANDO INCLUDE() -->
<?php include('./includes/header.php'); ?>

<main
  class="flex md:flex-row flex-col  justify-center  gap-10 items-center align-center md:my-40  justify-center w-full  px-20 text-center">



  <div class="block max-w-sm p-6 bg-yellow-100 border border-gray-200 rounded-lg shadow  ">
    <h5 class="mb-2 text-2xl font-bold tracking-tight text-center text-gray-900 ">TODO</h5>
    <!-- FORMULARIO -->
    <!-- Le decimos que enviara los datos del formualario al archivo save.php por el metodo POST -->
    <form action="save.php" method="POST"
      class="flex flex-col gap-6 items-center py-5 px-20 justify-center w-full flex-1 text-center  [&>div]:w-full">
      <div>

        <input type="text" name="title" autofocus placeholder="Task title" class="px-2 w-full bg-yellow-100">
      </div>
      <div>
        <textarea name="description" rows="2" placeholder="Task description" class="px-2 w-full bg-yellow-100"></textarea>
      </div>
      <!-- Al agregarle el tipo submit le decimos que ejecute el action del formulario -->
      <button type="submit" name="save_task"
        class="text-gray-900 w-full hover:text-white border border-gray-800 hover:bg-gray-900 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Submit
        Task</button>
    </form>

  </div>

  <!-- ALERT DE TAREA CREADA -->

  <!-- Si existe la variable message en la sesion muestro el mensaje   -->
  <?php if (isset($_SESSION['message'])) { ?>
    <div id="alert-4" class="p-4 m-10 text-sm text-green-800 rounded-lg absolute bottom-0 right-0 bg-green-200"
      role="alert">
      <span class="font-medium">
        <!-- Pinto el mensaje que la tarea se creo correctamente -->
        <?= $_SESSION['message'] ?>
      </span>

      <!-- BOTON PARA CERRAR EL ALERT -->
      <button type="button" id="close-alert-btn"
        class="ml-2 -mx-1.5 -my-1.5 bg-green-200 text-green-800 rounded-lg focus:ring-2 focus:ring-green-200 p-1.5 hover:bg-green-100 inline-flex items-center justify-center h-8 w-8 "
        data-dismiss-target="#alert-4" aria-label="Close">
        <span class="sr-only">Close</span>
        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
        </svg>
      </button>
    </div>
    <!-- Luego de mostrar el mensaje la borro de la sesion para que no siga apareciendo-->
    <?php session_unset();
  } ?>




  <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500 ">
      <thead class="text-xs text-gray-700 uppercase bg-gray-50  ">
        <tr>
          <th scope="col" class="px-6 py-3">
            Title
          </th>
          <th scope="col" class="px-6 py-3">
            Description
          </th>
          <th scope="col" class="px-6 py-3">
            Created At
          </th>

          <th scope="col" class="px-6 py-3">
            Action
          </th>
        </tr>
      </thead>
      <tbody>
        <?php
        # CONSULTA SQL PARA TRAER TODAS LAS TAREAS
        $query = "SELECT * FROM task";
        $result_task = mysqli_query($conn, $query);

        # MIENTRAS HAYA RESULTADOS GUARDA LOS RESULTADOS EN UN ARRAY
        while ($row = mysqli_fetch_array($result_task)) { ?>

          <tr class="border-b bg-gray-50  ">
            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
              <!-- MUESTRA EL TITULO DE LA TAREA  -->
              <?php echo $row['title']; ?>
            </td>
            <td class="px-6 py-4">
              <!-- MUESTRA LA DESCRIPCION DE LA TAREA   -->
              <?php echo $row['description']; ?>
            </td>
            <td class="px-6 py-4">
              <!-- MUESTRA LA FECHA DE CREACION DE LA TAREA   -->
              <?php echo $row['created_at']; ?>
            </td>
            <td class="px-6 py-4">
              <!-- BOTON PARA EDITAR LA TAREA   -->
              <!-- LE PASO EL ID DE LA TAREA PARA QUE SEA EDITABLE  -->
              <a href="edit.php?id=<?php echo $row['id']; ?>" class="font-medium text-blue-600 hover:underline mr-3">Edit</a>

              <!-- BOTON PARA ELIMINAR LA TAREA -->
              <!-- IGUALMENTE LE PASO AL ID PARA SABER CUAL ELIMINAR -->
              <a href="delete.php?id=<?php echo $row['id']; ?>"
                class="font-medium text-red-600 hover:underline">Delete</a>
            </td>
          </tr>


        <?php } ?>




      </tbody>
    </table>
  </div>






</main>


<?php include('./includes/footer.php'); ?>

<!-- SCRIPT DE JS PARA CERRAR EL ALERT -->
<script>
  document.addEventListener('DOMContentLoaded', function () {
    const closeAlertBtn = document.getElementById('close-alert-btn');
    const alertDiv = document.getElementById('alert-4');

    if (closeAlertBtn && alertDiv) {
      closeAlertBtn.addEventListener('click', function () {
        alertDiv.style.display = 'none';
      });
    }
  });
</script>