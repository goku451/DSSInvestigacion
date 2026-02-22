<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Registrar Venta</title>
<script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">

<div class="bg-white shadow-xl rounded-xl p-8 w-full max-w-xl">
//ESTO ES ANTHONY IGUAL
    <h2 class="text-2xl font-bold text-purple-600 mb-6 text-center">
        Registrar Venta de Producto
    </h2>

    <form action="" method="POST" id="formVenta" class="space-y-4">
        
        <select class="w-full border p-3 rounded-lg focus:ring-2 focus:ring-purple-400" requipurple>
            <option value="">Seleccione un producto</option>
            <option>MEDRANO (Stock: 15)</option>
            <option>GISSELLE (Stock: 8)</option>
        </select>

        <input type="number" placeholder="Cantidad a vender"
        class="w-full border p-3 rounded-lg focus:ring-2 focus:ring-purple-400" min="1" requipurple>

        <button type="submit"
        class="w-full bg-purple-500 hover:bg-purple-600 text-white font-semibold p-3 rounded-lg transition">
            Registrar Venta
        </button>

        <a href="listaProductos.php"
        class="block text-center bg-gray-500 hover:bg-gray-600 text-white p-3 rounded-lg">
            Volver al inicio
        </a>

    </form>

</div>

<script>
//Limpiar los registros
document.getElementById("formVenta").addEventListener("submit", function(e){
    e.preventDefault();
    this.reset();
    alert("Venta registrada (vista frontend)");
});
</script>

</body>
</html>
