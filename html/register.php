<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../assets/css/register.css">
  <title>Registro</title>
</head>
<body>

<div class="formbold-main-wrapper">
  <div class="formbold-form-wrapper">
    <form action="../php/login-register/register-back.php" method="POST">
      <div class="formbold-steps">
        <ul>
          <li class="formbold-step-menu1 active">
            <span>1</span>
            Sign Up
          </li>
          <li class="formbold-step-menu2">
            <span>2</span>
            Políticas y términos
          </li>
          <li class="formbold-step-menu3">
            <span>3</span>
            Confirm
          </li>
        </ul>
      </div>

      <!-- Paso 1 -->
      <div class="formbold-form-step-1 active">
        <div class="formbold-input-flex">
          <div>
            <label for="firstname" class="formbold-form-label"> Full name </label>
            <input
              type="text"
              name="Nombre"
              placeholder="ej .Carlos"
              id="firstname"
              class="formbold-form-input"
            />
          </div>
          
          <div>
            <label for="lastname" class="formbold-form-label"> Phone </label>
            <input
              type="text"
              name="Telefono"
              placeholder="ej .3174437615"
              id="lastname"
              class="formbold-form-input"
              required
            />
          </div>
        </div>
     
        <div>
            <label for="firstname" class="formbold-form-label"> User Name </label>
            <input
              type="text"
              name="Nombre"
              placeholder="ej .CocacolaDelDesierto"
              id="firstname"
              class="formbold-form-input"
            />
          </div>

        <div>
          <label for="email" class="formbold-form-label"> Email Address </label>
          <input
            type="email"
            name="email"
            placeholder="example@mail.com"
            id="email"
            class="formbold-form-input"
          />
        </div>
      </div>

      <!-- Paso 2 -->
      <div class="formbold-form-step-2">
        <div>
          <label for="terms" class="formbold-form-label"> Términos y Condiciones </label>
          <p>
           <strong> Al aceptar estos términos, confirmas que has leído y aceptas nuestras políticas de uso.</strong>
            1. Aceptación de los Términos
Al acceder a este sitio web, aceptas estos Términos y Condiciones en su totalidad. Si no estás de acuerdo con cualquier parte de estos términos, debes abandonar el sitio inmediatamente. Este sitio está destinado exclusivamente a personas mayores de 18 años o la edad legal en tu jurisdicción.<br>
2. Contenido para Adultos
Este sitio contiene fotografía erótica y material visual explícito que puede no ser apropiado para todos los usuarios. Al ingresar, declaras que:
Eres mayor de edad.
No permitirás el acceso a menores de edad ni a personas que puedan considerarlo ofensivo.<br>
3. Derechos de Propiedad Intelectual
Todo el contenido (imágenes, textos, videos) publicado en el sitio es propiedad exclusiva de sus creadores o ha sido autorizado para su uso.
No está permitido copiar, reproducir, distribuir o utilizar el contenido sin previa autorización escrita.
Cualquier infracción será perseguida legalmente.<br>
4. Responsabilidad del Usuario
Como usuario del sitio:

Aceptas no realizar capturas de pantalla, grabaciones, descargas o cualquier forma de reproducción no autorizada del contenido.
Te comprometes a no distribuir el contenido a terceros ni utilizarlo con fines comerciales.
No usarás el sitio para actividades ilícitas, fraudulentas o inapropiadas.<br>
5. Privacidad y Seguridad

La privacidad de nuestros usuarios es fundamental. Revisa nuestra Política de Privacidad para conocer cómo recolectamos, utilizamos y protegemos tu información personal.
El sitio implementa medidas de seguridad para evitar el acceso no autorizado a la información del usuario.<br>
6. Contenido y Enlaces de Terceros
Este sitio puede contener enlaces a terceros. No nos responsabilizamos del contenido, políticas de privacidad o prácticas de otros sitios externos.<br>

7. Política de Reembolsos y Cancelaciones
En caso de membresías o compras digitales:

No se realizarán reembolsos por el acceso al contenido una vez adquirido.
Puedes cancelar tu membresía en cualquier momento desde tu perfil o escribiéndonos a soporte.<br>
8. Modificaciones de los Términos
Nos reservamos el derecho de modificar estos términos en cualquier momento. Se notificará a los usuarios mediante correo electrónico o anuncio en la página principal.<br>

9. Legislación Aplicable
Estos términos se regirán e interpretarán conforme a las leyes del país donde se encuentre registrado el sitio web.<br>

Política de Privacidad
1. Recolección de Datos
Recopilamos información como nombre, correo electrónico y métodos de pago únicamente cuando el usuario se registra o realiza una compra.<br>

2. Uso de la Información
La información será utilizada para:<br>

Facilitar el acceso al sitio y a los servicios ofrecidos.
Enviar comunicaciones y actualizaciones relacionadas con el contenido del sitio.
Realizar mejoras en la plataforma.<br>
3. Cookies
Utilizamos cookies para mejorar tu experiencia de navegación. Al continuar en el sitio, aceptas el uso de cookies.<br>

4. Seguridad de los Datos
Implementamos medidas técnicas y organizativas para proteger la información de los usuarios. Sin embargo, ningún sistema puede garantizar la seguridad absoluta.<br>

Aviso Importante
Antes de lanzar un sitio con contenido erótico, asegúrate de cumplir con:

Las normativas de contenido para adultos de tu país y de las jurisdicciones a las que acceden tus usuarios.
Leyes de protección de datos personales (como el RGPD en Europa).
Normas de plataformas de pago que prohíben transacciones relacionadas con contenido para adultos.
          </p>
        </div>
      </div>

      <!-- Paso 3 -->
      <div class="formbold-form-step-3">
        <div class="formbold-form-confirm">
          <p>
            ¿Estás seguro de que deseas confirmar tu registro con la información proporcionada?
          </p>
        </div>
      </div>

      <!-- Botones -->
      <div class="formbold-form-btn-wrapper">
        <button type="button" class="formbold-back-btn">
          Atrás
        </button>

        <button type="submit" class="formbold-btn" id="form-action-btn">
          Continuar con el registro
        </button>
      </div>
    </form>
  </div>
</div>

<!-- Estilos -->


<!-- Script -->
<script src="../assets/js/register.js" ></script>
</body>
</html>