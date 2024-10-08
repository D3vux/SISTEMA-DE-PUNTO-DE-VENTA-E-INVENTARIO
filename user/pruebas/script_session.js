 // Elementos
 const logoutBtn = document.getElementById("logoutBtn");
 const modal = document.getElementById("logoutModal");
 const closeModalBtn = document.querySelector(".close");
 const confirmLogoutBtn = document.querySelector(".confirm");

 // Mostrar modal
 logoutBtn.onclick = function() {
     modal.style.display = "block";
 };

 // Cerrar modal al hacer clic en "Cancelar"
 closeModalBtn.onclick = function() {
     modal.style.display = "none";
 };

 // Acción de cerrar sesión al confirmar
 confirmLogoutBtn.onclick = function() {
     // Aquí iría la lógica para cerrar la sesión
     window.location.href = "logout.php"; // Redirige a la página de cerrar sesión
 };

 // Cerrar modal si se hace clic fuera del contenido
 window.onclick = function(event) {
     if (event.target === modal) {
         modal.style.display = "none";
     }
 };