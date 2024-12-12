const stepMenuOne = document.querySelector('.formbold-step-menu1');
const stepMenuTwo = document.querySelector('.formbold-step-menu2');
const stepMenuThree = document.querySelector('.formbold-step-menu3');

const stepOne = document.querySelector('.formbold-form-step-1');
const stepTwo = document.querySelector('.formbold-form-step-2');
const stepThree = document.querySelector('.formbold-form-step-3');

const formActionBtn = document.getElementById('form-action-btn');
const backBtn = document.querySelector('.formbold-back-btn');

let currentStep = 1;

// Función para validar los campos del Paso 1
function validateStepOne() {
  const fullName = document.querySelector('[name="Nombre"]').value.trim();
  const phone = document.querySelector('[name="Telefono"]').value.trim();
  const email = document.querySelector('[name="email"]').value.trim();

  if (!fullName || !phone || !email) {
    alert("Por favor, completa todos los campos requeridos antes de continuar.");
    return false;
  }
  return true;
}

// Manejador del botón principal (Siguiente/Enviar)
formActionBtn.addEventListener("click", function (event) {
  event.preventDefault();

  if (currentStep === 1) {
    // Validar el Paso 1 antes de continuar
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
