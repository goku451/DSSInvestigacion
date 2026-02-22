//ESTA ES LA PARTE DE ANTHONY
//SOLO LE DEJO UN MODELO COMO LO PUEDE HACER
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Productos Paloma</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen p-6">

    <div class="max-w-7xl mx-auto">

        <h1 class="text-3xl text-purple-600 font-bold text-center text-gray-800 mb-6">
            Sistema de Gestión de Productos
        </h1>

        <div class="flex flex-wrap gap-3 mb-6">
            <a href="crearProducto.php" class="bg-purple-500 hover:bg-purple-600 text-white px-4 py-2 rounded-lg shadow">
                Agregar Producto
            </a>
            <a href="ventaProductos.php" class="bg-purple-700 hover:bg-purple-500 text-white px-4 py-2 rounded-lg shadow">
                Registrar Venta
            </a>
        </div>

        <div class="bg-white shadow-xl rounded-xl overflow-hidden">
            <div class="p-4 border-b">
                <h2 class="text-xl font-semibold text-gray-700">Lista de Productos</h2>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-center">
                    <thead class="bg-gray-200 text-gray-700">
                        <tr>
                            <th class="p-3">ID</th>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Precio</th>
                            <th>Stock</th>
                            <th>Categoría</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y">

                        //ESTO ES UN EJEMPLO COMO SE DEBE DE VER
                        <tr class="hover:bg-gray-50">
                            <td class="p-3 font-semibold">1</td>
                            <td>MEDRANO INALAMBRICO</td>
                            <td>ROTACION VELPICA</td>
                            <td class="text-purple-600 font-bold">$25.00</td>
                            <td class="text-purple-600 font-bold">15</td>
                            <td>Accesorios</td>
                            <td class="space-x-2">
                                <a href="editarProducto.php"
                                    class="bg-purple-500 hover:bg-purple-600 text-white px-3 py-1 rounded">
                                    Editar
                                </a>
                                <a href="eliminarProducto.php"
                                    class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded">
                                    Eliminar
                                </a>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>