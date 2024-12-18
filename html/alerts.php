<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Script para redirección -->
    <script>
        setTimeout(function(){
            window.location.href = "<?php echo $redirect; ?>";
        }, 3000); // Redirige en 3 segundos
    </script>
</head>
<body style="background-image: url('../assets/img/blog/blog-6.jpg'); background-size: cover; background-repeat: no-repeat;">
    <div class="container mt-5">
        <?php echo $alert; ?>
    </div>
</body>
</html>
