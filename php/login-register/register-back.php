<?php
// Incluir la conexión a la base de datos
require_once '../../config/db.php';

// Incluir Bootstrap CSS
echo '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">';
echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>'; // SweetAlert

$alert = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Recuperar y validar los datos del formulario
    $nombre = filter_input(INPUT_POST, 'Nombre', FILTER_SANITIZE_STRING);
    $telefono = filter_input(INPUT_POST, 'Telefono', FILTER_SANITIZE_STRING);
    $user_name = filter_input(INPUT_POST, 'Nombre_user', FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

    // Validar campos obligatorios
    if (!$nombre || !$telefono || !$user_name || !$email || !$password) {
        $alert = "Todos los campos son obligatorios y deben ser válidos.";
        $icon = "warning";
        $redirect = "../../html/register.php";
    } else {
        try {
            // Validar si el user_name ya existe
            $stmt = $pdo->prepare("SELECT COUNT(*) FROM users WHERE user_name = :user_name");
            $stmt->bindParam(':user_name', $user_name, PDO::PARAM_STR);
            $stmt->execute();
            if ($stmt->fetchColumn() > 0) {
                $alert = "Oh no, el nombre de usuario ya está en uso.";
                $icon = "warning";
                $redirect = "../../html/register.php";
            } else {
                // Validar si el email ya existe
                $stmt = $pdo->prepare("SELECT COUNT(*) FROM users WHERE email = :email");
                $stmt->bindParam(':email', $email, PDO::PARAM_STR);
                $stmt->execute();
                if ($stmt->fetchColumn() > 0) {
                    $alert = "El correo electrónico ya está registrado.";
                    $icon = "warning";
                    $redirect = "../../html/register.php";
                } else {
                    // Validar si el teléfono ya existe
                    $stmt = $pdo->prepare("SELECT COUNT(*) FROM users WHERE telefono = :telefono");
                    $stmt->bindParam(':telefono', $telefono, PDO::PARAM_STR);
                    $stmt->execute();
                    if ($stmt->fetchColumn() > 0) {
                        $alert = "El número de teléfono ya está registrado o no es válido.";
                        $icon = "warning";
                        $redirect = "../../html/register.php";
                    } else {
                        // Preparar la consulta SQL para la inserción
                        $sql = "INSERT INTO users (nombre, telefono, user_name, email, tp_user, password) 
                                VALUES (:nombre, :telefono, :user_name, :email, 2, :password)";

                        $stmt = $pdo->prepare($sql);
                        $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
                        $stmt->bindParam(':telefono', $telefono, PDO::PARAM_STR);
                        $stmt->bindParam(':user_name', $user_name, PDO::PARAM_STR);
                        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
                        $stmt->bindParam(':password', $password, PDO::PARAM_STR);

                        if ($stmt->execute()) {
                            $alert = "Registro exitoso. Redirigiendo a la página principal...";
                            $icon = "success";
                            $redirect = "../../index.php";
                        } else {
                            $alert = "Ocurrió un error al registrar los datos.";
                            $icon = "error";
                            $redirect = "../../html/register.php";
                        }
                    }
                }
            }
        } catch (PDOException $e) {
            $alert = "Error: " . $e->getMessage();
            $icon = "error";
            $redirect = "../../html/register.php";
        }
    }

    // Generar alerta de SweetAlert
    echo "<script>
    document.addEventListener('DOMContentLoaded', function () {
        Swal.fire({
            title: '¡Atención!',
            text: '$alert',
            icon: '$icon',
            confirmButtonText: 'Aceptar',
            confirmButtonColor: '#007bff',
            target: 'body' // Cambiar si tienes un contenedor específico
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = '$redirect';
            }
        });
    });
</script>";

}
?>
