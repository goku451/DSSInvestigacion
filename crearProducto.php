<?php
session_start();

if (!isset($_SESSION['productos'])) {
    $_SESSION['productos'] = [];
}

$errores = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id = trim($_POST['id']);
    $nombre = trim($_POST['nombre']);
    $descripcion = trim($_POST['descripcion']);
    $precio = $_POST['precio'];
    $stock = $_POST['stock'];
    $categoria = trim($_POST['categoria']);

    if ($id=="" || $nombre=="" || $descripcion=="" || $categoria=="") {
        $errores[] = "Todos los campos son obligatorios";
    }

    if (!is_numeric($precio) || !is_numeric($stock)) {
        $errores[] = "Precio y stock deben ser numéricos";
    }

    if ($precio < 0 || $stock < 0) {
        $errores[] = "No se permiten valores negativos";
    }

    foreach ($_SESSION['productos'] as $p) {
        if ($p['id'] == $id) {
            $errores[] = "El ID ya existe";
            break;
        }
    }

    if (empty($errores)) {
        $_SESSION['productos'][] = [
            "id"=>$id,
            "nombre"=>$nombre,
            "descripcion"=>$descripcion,
            "precio"=>$precio,
            "stock"=>$stock,
            "categoria"=>$categoria
        ];

        header("Location: listaProductos.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Agregar Producto</title>
<script src="https://cdn.tailwindcss.com"></script>
</head>

    <body class="bg-gray-100 min-h-screen flex items-center justify-center">

        <div class="bg-white shadow-xl rounded-xl p-8 w-full max-w-2xl">

            <h2 class="text-2xl font-bold text-purple-600 mb-6 text-center">
                Registrar Nuevo Producto
            </h2>

            <?php if (!empty($errores)): ?>
                <div class="bg-red-100 text-red-700 p-3 mb-4 rounded">
                    <ul>
                        <?php foreach ($errores as $e): ?>
                        <li><?= htmlspecialchars($e) ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <form method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <input name="id" type="number" placeholder="ID" class="border p-3 rounded-lg" required>
                <input name="nombre" type="text" placeholder="Nombre" class="border p-3 rounded-lg" required>
                <input name="descripcion" type="text" placeholder="Descripcion" class="border p-3 rounded-lg md:col-span-2" required>
                <input name="precio" type="number" step="0.01" placeholder="Precio" class="border p-3 rounded-lg" required>
                <input name="stock" type="number" placeholder="Stock" class="border p-3 rounded-lg" required>
                <input name="categoria" type="text" placeholder="Categoría" class="border p-3 rounded-lg md:col-span-2" required>
            
                <button type="submit" class="md:col-span-2 bg-purple-500 hover:bg-purple-600 text-white font-semibold p-3 rounded-lg">
                    Guardar Producto
                </button>

                <a href="listaProductos.php" class="md:col-span-2 text-center bg-gray-500 hover:bg-gray-600 text-white p-3 rounded-lg">
                    Volver al inicio
                </a>
            </form>
        </div>
    </body>
</html>
