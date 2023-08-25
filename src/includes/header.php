
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <style type="text/tailwindcss">
    @layer utilities {
      .content-auto {
        content-visibility: auto;
      }
      
    }
  </style>
  <title>PHP CRUD</title>
</head>

<body class="bg-gray-100">

<nav class="bg-gray-200 border-gray-200 ">
  <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
    <a href="../index.php" class="flex items-center">
        <span class="self-center text-2xl font-semibold whitespace-nowrap ">CRUD PHP</span>
    </a>
 
    <div class="hidden w-full md:block md:w-auto" id="navbar-default">
      <ul class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-gray-200 hover:text-black">
        <li>
          <a href="../index.php" class="block py-2 pl-3 pr-4 text-white bg-gray-700 rounded md:bg-transparent md:text-gray-700 md:p-0 " aria-current="page">Inicio</a>
        </li>
        <li>
          <a href="https://github.com/matiaslenci/CRUD_PHP" target="_blank" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-black md:p-0   ">Repositorio</a>
        </li>
        
      </ul>
    </div>
  </div>
</nav>
