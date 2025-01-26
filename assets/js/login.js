
    var togglePassword = document.querySelector(".toggle-password");
    var passwordField = document.querySelector("#password-field");
    
    togglePassword.addEventListener("click", function() {
      if (passwordField.type === "password") {
        passwordField.type = "text";
        togglePassword.classList.remove("fa-eye");
        togglePassword.classList.add("fa-eye-slash");
      } else {
        passwordField.type = "password";
        togglePassword.classList.remove("fa-eye-slash");
        togglePassword.classList.add("fa-eye");
      }
    });