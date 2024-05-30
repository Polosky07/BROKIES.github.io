// Script de tienda.js

document.addEventListener("DOMContentLoaded", function() {
    // Función para agregar un producto al carrito
    function agregarAlCarrito(productoId) {
        // Aquí puedes realizar las acciones necesarias para agregar el producto al carrito,
        // como enviar una solicitud AJAX al servidor para agregar el producto a la sesión del usuario
        console.log("Producto agregado al carrito: " + productoId);
    }

    // Agregar evento click a los botones "Agregar al carrito"
    var agregarCarritoButtons = document.querySelectorAll(".agregar_carrito");
    agregarCarritoButtons.forEach(function(button) {
        button.addEventListener("click", function() {
            // Obtener el ID del producto desde el atributo data-id
            var productoId = this.getAttribute("data-id");
            // Llamar a la función para agregar el producto al carrito
            agregarAlCarrito(productoId);
        });
    });
});
