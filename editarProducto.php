<?php
session_start();

if (!isset($_SESSION['productos'])) {
    $_SESSION['productos'] = [];
}

$id = $_GET['id'] ?? null;
$producto = null;

// Buscar producto
foreach ($_SESSION['productos'] as $p) {
    if ($p['id'] == $id) {
        $producto = $p;
        break;
    }
}

if (!$producto) {
    die("Producto no encontrado");
}

$errores = [];

// Procesar actualización
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nombre = trim($_POST['nombre']);
    $descripcion = trim($_POST['descripcion']);
    $precio = $_POST['precio'];
    $stock = $_POST['stock'];
    $categoria = trim($_POST['categoria']);

    if ($nombre=="" || $descripcion=="" || $categoria=="") {
        $errores[] = "Campos obligatorios";
    }

    if (!is_numeric($precio) || !is_numeric($stock)) {
        $errores[] = "Precio y stock deben ser numéricos";
    }

    if ($precio < 0 || $stock < 0) {
        $errores[] = "No valores negativos";
    }

    if (empty($errores)) {

        foreach ($_SESSION['productos'] as &$p) {
            if ($p['id'] == $id) {
                $p['nombre'] = $nombre;
                $p['descripcion'] = $descripcion;
                $p['precio'] = $precio;
                $p['stock'] = $stock;
                $p['categoria'] = $categoria;
            }
        }

        header("Location: listaProductos.php");
        exit;
    }
}
?>

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

        <?php if ($errores): ?>
            <div class="bg-red-100 text-red-700 p-3 mb-4 rounded">
                <?php foreach ($errores as $e) echo "<div>$e</div>"; ?>
            </div>
        <?php endif; ?>

        <form method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <!-- ID visible -->
            <input type="number" value="<?= htmlspecialchars($producto['id']) ?>" disabled class="border p-3 rounded-lg bg-gray-100">

            <!-- ID oculto -->
            <input type="hidden" name="id" value="<?= $producto['id'] ?>">
            <input name="nombre" type="text" value="<?= htmlspecialchars($producto['nombre']) ?>" class="border p-3 rounded-lg">
            <input name="descripcion" type="text" value="<?= htmlspecialchars($producto['descripcion']) ?>" class="border p-3 rounded-lg md:col-span-2">
            <input name="precio" type="number" step="0.01" value="<?= htmlspecialchars($producto['precio']) ?>" class="border p-3 rounded-lg">
            <input name="stock" type="number" value="<?= htmlspecialchars($producto['stock']) ?>" class="border p-3 rounded-lg">
            <input name="categoria" type="text" value="<?= htmlspecialchars($producto['categoria']) ?>" class="border p-3 rounded-lg md:col-span-2">

            <button type="submit" class="md:col-span-2 bg-purple-500 hover:bg-purple-600 text-white font-semibold p-3 rounded-lg">
                Actualizar Producto
            </button>

            <a href="listaProductos.php" class="md:col-span-2 text-center bg-gray-500 hover:bg-gray-600 text-white p-3 rounded-lg">
                Cancelar
            </a>

        </form>
    </div>
</body>
</html>
