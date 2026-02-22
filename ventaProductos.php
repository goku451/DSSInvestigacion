<?php
session_start();

if (!isset($_SESSION['productos'])) {
    $_SESSION['productos'] = [];
}

$errores = [];
$mensaje = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id = $_POST['id'];
    $cantidad = $_POST['cantidad'];

    if (!is_numeric($cantidad) || $cantidad <= 0) {
        $errores[] = "Cantidad inválida";
    }

    foreach ($_SESSION['productos'] as &$p) {
        if ($p['id'] == $id) {

            if ($p['stock'] < $cantidad) {
                $errores[] = "Stock insuficiente";
            }

            if (empty($errores)) {
                $p['stock'] -= $cantidad;
                $mensaje = "Venta registrada correctamente";
            }
        }
    }

    foreach ($_SESSION['productos'] as &$p) {
        if ($p['id'] == $id) {

            if ($p['stock'] < $cantidad) {
                $errores[] = "Stock insuficiente";
            } else {
                $p['stock'] -= $cantidad;
                $mensaje = "Venta registrada correctamente";
            }

            break;
        }
    }
    unset($p);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Registrar Venta</title>
<script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="bg-white shadow-xl rounded-xl p-8 w-full max-w-xl">
        <h2 class="text-2xl font-bold text-purple-600 mb-6 text-center">
            Registrar Venta de Producto
        </h2>

        <?php if ($errores): ?>
            <div class="bg-red-100 text-red-700 p-3 mb-4 rounded">
                <?php foreach ($errores as $e) echo "<div>$e</div>"; ?>
            </div>
        <?php endif; ?>

        <?php if ($mensaje): ?>
            <div class="bg-green-100 text-green-700 p-3 mb-4 rounded">
                <?= $mensaje ?>
            </div>
        <?php endif; ?>

        <form method="POST" class="space-y-4">
            <select name="id" class="w-full border p-3 rounded-lg" required>
                <option value="">Seleccione un producto</option>
                <?php foreach ($_SESSION['productos'] as $p): ?>
                    <option value="<?= $p['id'] ?>">
                        <?= htmlspecialchars($p['nombre']) ?> (Stock: <?= $p['stock'] ?>)
                    </option>
                <?php endforeach; ?>
            </select>

            <input name="cantidad" type="number" min="1" placeholder="Cantidad a vender" class="w-full border p-3 rounded-lg" required>
            <button type="submit" class="w-full bg-purple-500 hover:bg-purple-600 text-white font-semibold p-3 rounded-lg">
                Registrar Venta
            </button>

            <a href="listaProductos.php" class="block text-center bg-gray-500 hover:bg-gray-600 text-white p-3 rounded-lg">
                Volver al inicio
            </a>
        </form>
    </div>
</body>
</html>
