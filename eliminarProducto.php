<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Eliminar Producto</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen flex items-center justify-center">

    <div class="bg-white shadow-xl rounded-xl p-8 text-center max-w-md">

        <h2 class="text-2xl font-bold text-red-600 mb-4">
            Confirmar Eliminación 
        </h2>

        <p class="text-gray-700 mb-6">
            ¿Está seguro que desea eliminar este producto?
        </p>

        <div class="flex justify-center gap-4">
            <button class="bg-red-500 hover:bg-red-600 text-white px-6 py-2 rounded-lg">
                Sí, eliminar
            </button>

            <a href="listaProductos.php" class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-2 rounded-lg">
                Cancelar
            </a>
        </div>

    </div>

</body>
</html>
