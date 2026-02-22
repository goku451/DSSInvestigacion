<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Producto</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen flex items-center justify-center">

    <div class="bg-white shadow-xl rounded-xl p-8 w-full max-w-2xl">

        <h2 class="text-2xl font-bold text-purple-600 mb-6 text-center">
            Editar Producto
        </h2>

        <form action="" method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-4">

            <input type="number" value="1" disabled class="border p-3 rounded-lg bg-gray-100">

            <input type="text" value="MEDRANO" class="border p-3 rounded-lg focus:ring-2 focus:ring-purple-400">

            <input type="text" value="PELVICO"
                class="border p-3 rounded-lg focus:ring-2 focus:ring-purple-400 md:col-span-2">

            <input type="number" step="0.01" value="25.00"
                class="border p-3 rounded-lg focus:ring-2 focus:ring-purple-400">

            <input type="number" value="15" class="border p-3 rounded-lg focus:ring-2 focus:ring-purple-400">

            <input type="text" value="Accesorios"
                class="border p-3 rounded-lg focus:ring-2 focus:ring-purple-400 md:col-span-2">

            <button type="submit"
                class="md:col-span-2 bg-purple-500 hover:bg-purple-600 text-white font-semibold p-3 rounded-lg">
                Actualizar Producto
            </button>

            <a href="listaProductos.php"
                class="md:col-span-2 text-center bg-gray-500 hover:bg-gray-600 text-white p-3 rounded-lg">
                Cancelar
            </a>

        </form>
    </div>

</body>
</html>
