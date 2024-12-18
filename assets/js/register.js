// Cargar SweetAlert2 en el DOM
document.addEventListener("DOMContentLoaded", () => {
  // Elementos del flujo de pasos
  const stepMenuOne = document.querySelector('.formbold-step-menu1');
  const stepMenuTwo = document.querySelector('.formbold-step-menu2');
  const stepMenuThree = document.querySelector('.formbold-step-menu3');

  const stepOne = document.querySelector('.formbold-form-step-1');
  const stepTwo = document.querySelector('.formbold-form-step-2');
  const stepThree = document.querySelector('.formbold-form-step-3');

  const formActionBtn = document.getElementById('form-action-btn');
  const backBtn = document.querySelector('.formbold-back-btn');

  let currentStep = 1;

  // Inicialización de validación de contraseña
  initializePasswordValidation();

  // Función para mostrar alertas personalizadas con SweetAlert2
  function showCustomAlert(message, icon = "warning") {
    Swal.fire({
      title: "¡Atención!",
      text: message,
      icon: icon, // Opciones: success, error, warning, info
      confirmButtonText: "Aceptar",
      confirmButtonColor: "#007bff",
    });
  }

  // Manejador del botón principal (Siguiente/Enviar)
  formActionBtn.addEventListener("click", function (event) {
    event.preventDefault();

    if (currentStep === 1) {
      if (!validateStepOne()) return;

      stepMenuOne.classList.remove('active');
      stepMenuTwo.classList.add('active');
      stepOne.classList.remove('active');
      stepTwo.classList.add('active');
      formActionBtn.textContent = "Acepto términos y condiciones";
      backBtn.style.display = "block";
      currentStep++;
    } else if (currentStep === 2) {
      stepMenuTwo.classList.remove('active');
      stepMenuThree.classList.add('active');
      stepTwo.classList.remove('active');
      stepThree.classList.add('active');
      formActionBtn.textContent = "Confirmar registro";
      currentStep++;
    } else if (currentStep === 3) {
      document.querySelector('form').submit();
    }
  });

  // Manejador del botón Atrás
  backBtn.addEventListener("click", function (event) {
    event.preventDefault();
    if (currentStep === 2) {
      stepMenuTwo.classList.remove('active');
      stepMenuOne.classList.add('active');
      stepTwo.classList.remove('active');
      stepOne.classList.add('active');
      formActionBtn.textContent = "Continuar con el registro";
      backBtn.style.display = "none";
      currentStep--;
    } else if (currentStep === 3) {
      stepMenuThree.classList.remove('active');
      stepMenuTwo.classList.add('active');
      stepThree.classList.remove('active');
      stepTwo.classList.add('active');
      formActionBtn.textContent = "Acepto términos y condiciones";
      currentStep--;
    }
  });

  // Función para validar campos del Paso 1
  function validateStepOne() {
    const fullName = document.querySelector('[name="Nombre"]').value.trim();
    const phone = document.querySelector('[name="Telefono"]').value.trim();
    const email = document.querySelector('[name="email"]').value.trim();

    if (!fullName || !phone || !email) {
      showCustomAlert("Por favor, completa todos los campos requeridos antes de continuar.", "warning");
      return false;
    }

    if (!window.validatePassword()) {
      showCustomAlert("La contraseña no cumple con los requisitos.", "error");
      return false;
    }
    return true;
  }
});

// Función para inicializar la validación de contraseña
function initializePasswordValidation() {
  const passwordInput = document.getElementById('password');
  const passwordFeedback = document.getElementById('passwordFeedback');
  const passwordStatus = document.getElementById('passwordStatus');
  const togglePassword = document.getElementById('togglePassword');

  const passwordRules = {
    length: /(?=.{8,})/,
    uppercase: /(?=.*[A-Z])/,
    number: /(?=.*\d)/,
    specialChar: /(?=.*[@$!%*?&])/,
  };

  // Validar contraseña
  window.validatePassword = function () {
    const password = passwordInput.value;
    let feedback = "";
    let valid = true;

    if (!passwordRules.length.test(password)) {
      feedback += "<p class='invalid-feedback'>Debe tener al menos 8 caracteres.</p>";
      valid = false;
    }
    if (!passwordRules.uppercase.test(password)) {
      feedback += "<p class='invalid-feedback'>Debe tener al menos 1 mayúscula.</p>";
      valid = false;
    }
    if (!passwordRules.number.test(password)) {
      feedback += "<p class='invalid-feedback'>Debe tener al menos 1 número.</p>";
      valid = false;
    }
    if (!passwordRules.specialChar.test(password)) {
      feedback += "<p class='invalid-feedback'>Debe tener al menos 1 carácter especial (@$!%*?&).</p>";
      valid = false;
    }

    passwordFeedback.innerHTML = feedback;
    passwordStatus.textContent = valid ? "Contraseña segura" : "Contraseña no segura";
    passwordStatus.className = valid ? "secure" : "not-secure";

    return valid;
  };

  // Evento para validar en tiempo real
  passwordInput.addEventListener("input", window.validatePassword);

  // Mostrar / Ocultar contraseña
  togglePassword.addEventListener("click", () => {
    const isPassword = passwordInput.type === "password";
    passwordInput.type = isPassword ? "text" : "password";
    togglePassword.textContent = isPassword ? "🙈" : "🙉"; // Cambiar el ícono
  });
}
