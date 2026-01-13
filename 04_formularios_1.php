<?php
// Simulación de valores previos y errores de validación
// En una aplicación real, estos vendrían de la validación del backend

// Ejemplo de errores (si la validación falla)
$errors = [
    // 'name' => 'El campo Nombre es obligatorio.',
    // 'email' => 'El formato del correo electrónico no es válido.',
];

// Ejemplo de valores previos (para rellenar el formulario después de un error)
$all_values = [
    'name' => $_POST['name'] ?? '',
    'surname' => $_POST['surname'] ?? '',
    'email' => $_POST['email'] ?? '',
    'message' => $_POST['message'] ?? '',
];

var_dump($all_values);

?>



<form action="04_formularios.php" method="POST">
    <input
        type="text"
        name="name"
        placeholder="Nombre"
        value=""
        style="width: 100%; margin-top: 5px; padding: 8px; border: 1px solid #ccc;"
    >
    <input
        type="text"
        name="surname"
        placeholder="Apellido"
        value=""
        style="width: 100%; margin-top: 5px; padding: 8px; border: 1px solid #ccc;"
    >
    <input
        type="email"
        name="email"
        placeholder="Email"
        value=""
        style="width: 100%; margin-top: 5px; padding: 8px; border: 1px solid #ccc;"
    >

    <textarea
        name="message"
        placeholder="Mensaje"
        style="width: 100%; margin-top: 5px; margin-bottom: 5px; min-height: 100px; padding: 8px; border: 1px solid #ccc;"
    ></textarea>


        <div style="display: flex; justify-content: flex-end;">
            <button
                type="submit"
                style="
                    background-color: green;
                    color: white;
                    padding: 10px 15px;
                    border: none;
                    cursor: pointer;
                    font-weight: bold;
                "
            >
                Enviar
            </button>
        </div>

</form>