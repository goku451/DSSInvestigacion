<!--//ESTA ES LA PARTE DE ANTHONY
//SOLO LE DEJO UN MODELO COMO LO PUEDE HACER, EL PUEDE HACERLO COMO QUIERA, PERO LE DEJO UN MODELO PARA QUE SE GUIE-->

<?php
session_start();

if (!isset($_SESSION['productos'])) {
    $_SESSION['productos'] = [];
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Productos</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen p-6">

    <div class="max-w-7xl mx-auto">
        <h1 class="text-3xl text-purple-600 font-bold text-center mb-6">
            Sistema de Gestión de Productos
        </h1>

    <div class="flex flex-wrap gap-3 mb-6">
        <a href="crearProducto.php" class="bg-purple-700 hover:bg-purple-600 text-white px-4 py-2 rounded-lg shadow">
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
                <?php if (empty($_SESSION['productos'])): ?>
                    <tr>
                        <td colspan="7" class="p-4 text-gray-500">
                            No hay productos registrados...
                        </td>
                    </tr>
                    
                    <?php else: ?>

                    <?php foreach ($_SESSION['productos'] as $p): ?>
                        <tr class="hover:bg-gray-50">
                            <td class="p-3 font-semibold"><?= htmlspecialchars($p['id']) ?></td>
                            <td><?= htmlspecialchars($p['nombre']) ?></td>
                            <td><?= htmlspecialchars($p['descripcion']) ?></td>
                            <td class="text-purple-600 font-bold">$<?= htmlspecialchars($p['precio']) ?></td>
                            <td class="text-purple-600 font-bold"><?= htmlspecialchars($p['stock']) ?></td>
                            <td><?= htmlspecialchars($p['categoria']) ?></td>

                            <td class="space-x-2">
                                <a href="editarProducto.php?id=<?= $p['id'] ?>" class="bg-purple-500 hover:bg-purple-600 text-white px-3 py-1 rounded">
                                    Editar
                                </a>

                                <a href="eliminarProducto.php?id=<?= $p['id'] ?>" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded">
                                    Eliminar
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>

                </tbody>
            </table>
        </div>
    </div>
    </div>
</body>
</html>
