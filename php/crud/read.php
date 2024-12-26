<?php
//require("../../config/db.php"); // Incluye el archivo con la conexión a la base de datos
//s3 objet storage 
//ofuscar imagenes
// dibujar la imagen en un canvas html
// ID del usuario que quieres buscar
$id_usuario = 6; // Puedes cambiar este ID o recibirlo como parámetro GET/POST

try {
    // Consulta para obtener los datos del usuario
    $query = "SELECT * FROM users WHERE id_usuario = :id_usuario";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":id_usuario", $id_usuario, PDO::PARAM_INT);
    $stmt->execute();

    // Si el usuario existe, guarda los datos en variables separadas
    if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $id_usuario = $row['id_usuario'];
        $nombre = $row['nombre'];
        $user_name = $row['user_name'];
        $email = $row['email'];
        $password = $row['password'];
        $imagen_perfil = $row['imagen_perfil'];
        $fecha_creacion = $row['fecha_creacion'];
        $tp_user = $row['tp_user'];
        $telefono = $row['telefono'];
        $description = $row['description'];


        // Mostrar los valores guardados
        /*
        echo "ID Usuario: $id_usuario<br>";
        echo "Nombre: $nombre<br>";
        echo "Nombre de usuario: $user_name<br>";
        echo "Email: $email<br>";
        echo "Contraseña: $password<br>";
        echo "Fecha de creación: $fecha_creacion<br>";
        echo "Tipo de usuario: $tp_user<br>";
        echo "Teléfono: $telefono<br>";

        if (!is_null($imagen_perfil)) {
            echo "Imagen de perfil: (Datos binarios de la imagen)<br>";
        } else {
            echo "Imagen de perfil: No disponible<br>";
        }

         */
    } else {
        echo "No se encontró ningún usuario con el ID $id_usuario.";
    }
       
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
