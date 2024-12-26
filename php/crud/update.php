<?php
//require("../../config/db.php"); // Incluye la conexión a la base de datos

// Variable para almacenar el ID del usuario (puede venir por GET)
$id_usuario = $_GET['id_usuario'] ?? null;

// Variables para almacenar la información actual
$nombre = $user_name = $email = $telefono = $imagen_perfil = null;

if ($id_usuario) {
    try {
        // Consulta para obtener los datos actuales del usuario
        $query = "SELECT * FROM users WHERE id_usuario = :id_usuario";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(":id_usuario", $id_usuario, PDO::PARAM_INT);
        $stmt->execute();

        // Obtener los datos del usuario
        if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $nombre = $row['nombre'];
            $user_name = $row['user_name'];
            $email = $row['email'];
            $telefono = $row['telefono'];
            $imagen_perfil = $row['imagen_perfil'];
        } else {
            echo "<script>showCustomAlert('Usuario no encontrado.', 'error');</script>";
            exit;
        }
    } catch (PDOException $e) {
        echo "<script>showCustomAlert('Error al recuperar los datos: " . $e->getMessage() . "', 'error');</script>";
        exit;
    }
}

// Procesar la actualización si se envía el formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $user_name = $_POST['user_name'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];

    // Manejar la imagen de perfil
    if (isset($_FILES['imagen_perfil']) && $_FILES['imagen_perfil']['error'] === UPLOAD_ERR_OK) {
        $imagen = file_get_contents($_FILES['imagen_perfil']['tmp_name']); // Imagen en formato binario
    } else {
        $imagen = null; // No se subió imagen
    }

    try {
        // Preparar la consulta SQL
        if ($imagen) {
            $query = "UPDATE users SET 
                        nombre = :nombre,
                        user_name = :user_name,
                        email = :email,
                        telefono = :telefono,
                        imagen_perfil = :imagen_perfil
                      WHERE id_usuario = :id_usuario";
        } else {
            $query = "UPDATE users SET 
                        nombre = :nombre,
                        user_name = :user_name,
                        email = :email,
                        telefono = :telefono
                      WHERE id_usuario = :id_usuario";
        }

        $stmt = $pdo->prepare($query);
        $stmt->bindParam(":id_usuario", $id_usuario, PDO::PARAM_INT);
        $stmt->bindParam(":nombre", $nombre, PDO::PARAM_STR);
        $stmt->bindParam(":user_name", $user_name, PDO::PARAM_STR);
        $stmt->bindParam(":email", $email, PDO::PARAM_STR);
        $stmt->bindParam(":telefono", $telefono, PDO::PARAM_STR);
        if ($imagen) {
            $stmt->bindParam(":imagen_perfil", $imagen, PDO::PARAM_LOB);
        }

        $stmt->execute();
        echo "<script>showCustomAlert('El usuario fue actualizado correctamente.', 'success');</script>";
        header("Refresh:2; url=update.php?id_usuario=$id_usuario"); // Refrescar la página después de 2 segundos
        exit;
    } catch (PDOException $e) {
        echo "<script>showCustomAlert('Error al actualizar el registro: " . $e->getMessage() . "', 'error');</script>";
    }
}
?>

