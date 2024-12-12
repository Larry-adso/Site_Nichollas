<?php
session_start();
require_once '../../config/db.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Captura de los datos del formulario
    $email = $_POST['Email'];
    $password = $_POST['Password'];
    $password = hash('sha512', $password);

    try {
        // Buscar el usuario por su email
        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Verificar si el usuario existe y la contraseña es correcta
        if ($user && password_verify($password, $user['password'])) {
            // Iniciar sesión
            $_SESSION['id_usuario'] = $user['id_usuario'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['tp_user'] = $user['tp_user'];

            // Redirigir según el tipo de usuario
            if ($user['tp_user'] == 1) {
                header("Location: ../admin.php");
                exit();
            } elseif ($user['tp_user'] == 2) {
                header("Location: ../views.php");
                exit();
            } else {
                echo "Tipo de usuario no válido.";
            }
        } else {
            echo "<script>alert('Correo o contraseña incorrectos'); window.location.href='../../html/login.php';</script>";
        }
    } catch (PDOException $e) {
        die("Error en la autenticación: " . $e->getMessage());
    }
} else {
    echo "Acceso no permitido.";
}
?>
