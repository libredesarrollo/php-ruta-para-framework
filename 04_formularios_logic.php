<?php

$errors = [];
$success_message = "";

// 2. Procesar el formulario cuando se envía (POST)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // Recoger y limpiar valores previos
    $name    = trim($_POST['name'] ?? '');
    $surname = trim($_POST['surname'] ?? '');
    $email   = trim($_POST['email'] ?? '');
    $message = trim($_POST['message'] ?? '');

    // 3. Validaciones
    if (empty($name))    $errors['name'] = "El nombre es obligatorio.";
    if (empty($surname)) $errors['surname'] = "El apellido es obligatorio.";
    if (empty($email)) {
        $errors['email'] = "El email es obligatorio.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "El formato de email no es válido.";
    }
    if (empty($message)) $errors['message'] = "El mensaje no puede estar vacío.";

    // 4. Si no hay errores, insertar en la BD
    if (empty($errors)) {
        try {
            $sql = "INSERT INTO mensajes (nombre, apellido, email, mensaje) VALUES (:n, :s, :e, :m)";
            // $pdo viene de conexion.php
            $stmt = $pdo->prepare($sql);
            
            $stmt->execute([
                ':n' => $name,
                ':s' => $surname,
                ':e' => $email,
                ':m' => $message
            ]);

            $success_message = "¡Mensaje enviado y guardado correctamente!";
            
            // Limpiar campos después de éxito
            $name = $surname = $email = $message = "";
            
        } catch (PDOException $e) {
            $errors['db'] = "Error al guardar en la base de datos: " . $e->getMessage();
        }
    }
}