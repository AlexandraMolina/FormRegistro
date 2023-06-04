function validarFormulario() {
    // Obtener referencias a los campos de entrada y las alertas de validación
    var nombre = document.getElementById("nombre");
    var errorNombre = document.getElementById("error-nombre");
    
    var apellido1 = document.getElementById("apellido1");
    var errorApellido1 = document.getElementById("error-apellido1");
    
    var apellido2 = document.getElementById("apellido2");
    var errorApellido2 = document.getElementById("error-apellido2");
    
    var email = document.getElementById("email");
    var errorEmail = document.getElementById("error-email");
    
    var login = document.getElementById("login");
    var errorLogin = document.getElementById("error-login");
    
    var password = document.getElementById("password");
    var errorPassword = document.getElementById("error-password");
  
    // Restablecer las alertas de validación
    errorNombre.style.display = "none";
    errorApellido1.style.display = "none";
    errorApellido2.style.display = "none";
    errorEmail.style.display = "none";
    errorLogin.style.display = "none";
    errorPassword.style.display = "none";
  
    var isValid = true;
  
    // Validar el campo de nombre
    if (nombre.value.trim() === "" || !/^[a-zA-Z]+$/.test(nombre.value.trim())) {
      errorNombre.style.display = "block";
      isValid = false;
    }
  
    // Validar el campo de primer apellido
    if (apellido1.value.trim() === "" || !/^[a-zA-Z]+$/.test(apellido1.value.trim())) {
      errorApellido1.style.display = "block";
      isValid = false;
    }
  
    // Validar el campo de segundo apellido
    if (apellido2.value.trim() === "" || !/^[a-zA-Z]+$/.test(apellido2.value.trim())) {
      errorApellido2.style.display = "block";
      isValid = false;
    }
  
    // Validar el campo de email
    if (email.value.trim() === "" || !/\S+@\S+\.\S+/.test(email.value.trim())) {
      errorEmail.style.display = "block";
      isValid = false;
    }
  
    // Validar el campo de login
    if (login.value.trim() === "") {
      errorLogin.style.display = "block";
      isValid = false;
    }
  
    // Validar el campo de contraseña
    if (password.value.trim() === "" || password.value.trim().length < 4 || password.value.trim().length > 8) {
      errorPassword.style.display = "block";
      isValid = false;
    }
  
    // Si todas las validaciones pasan, enviar el formulario
    if (isValid) {
    document.getElementById("registroExitoso").style.display = "block";
    }
    return isValid;
  }
  function limpiarCampos() {
    document.getElementById("nombre").value = "";
    document.getElementById("apellido1").value = "";
    document.getElementById("apellido2").value = "";
    document.getElementById("email").value = "";
    document.getElementById("login").value = "";
    document.getElementById("password").value = "";
    document.getElementById("registroExitoso").style.display = "none";
    
  }