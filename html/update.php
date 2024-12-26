<?php
include("../config/db.php");
include("../php/crud/update.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Actualizar Usuario</title>
</head>
<body> 

<script>
        // Función personalizada para mostrar alertas
        function showCustomAlert(message, icon = "warning") {
            Swal.fire({
                title: "¡Atención!",
                text: message,
                icon: icon, // Opciones: success, error, warning, info
                confirmButtonText: "Aceptar",
                confirmButtonColor: "#007bff",
            });
        }
    </script>
    <h2>Actualizar Usuario</h2>
    <form method="POST" action="../php/crud/update.php?htmlspecialchars($id_usuario) ?>" enctype="multipart/form-data">
        <label for="nombre">Nombre:</label><br>
        <input type="text" name="nombre" id="nombre" value="<?= htmlspecialchars($nombre) ?>" required><br>

        <label for="user_name">Nombre de Usuario:</label><br>
        <input type="text" name="user_name" id="user_name" value="<?= htmlspecialchars($user_name) ?>" required><br>

        <label for="email">Email:</label><br>
        <input type="email" name="email" id="email" value="<?= htmlspecialchars($email) ?>" required><br>

        <label for="telefono">Teléfono:</label><br>
        <input type="text" name="telefono" id="telefono" value="<?= htmlspecialchars($telefono) ?>" required><br>

        <label for="imagen_perfil">Foto de Perfil:</label><br>
        <input type="file" name="imagen_perfil" id="imagen_perfil" accept="image/*"><br>
        <?php if ($imagen_perfil): ?>
            <p>Imagen Actual:</p>
            <img src="data:image/jpeg;base64,<?= base64_encode($imagen_perfil) ?>" alt="Imagen Actual" width="150"><br>
        <?php endif; ?>

        <button type="submit">Actualizar</button>
    </form>
</body>
</html>
