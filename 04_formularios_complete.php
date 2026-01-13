<?php
// Configuración de la base de datos
$host     = 'localhost';
$db_name  = 'contacto_db';
$user     = 'root'; // Cambia según tu config
$password = '';     // Cambia según tu config

$errors = [];
$success_message = "";

// 1. Conexión a la base de datos con PDO
try {
    $pdo = new PDO("mysql:host=$host;dbname=$db_name;charset=utf8", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}

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
?>

<?php if ($success_message): ?>
    <div style="background-color: #d4edda; color: #155724; padding: 10px; margin-bottom: 10px; border: 1px solid #c3e6cb;">
        <?php echo $success_message; ?>
    </div>
<?php endif; ?>

<form action="" method="POST">
    <input
        type="text"
        name="name"
        placeholder="Nombre"
        value="<?php echo htmlspecialchars($name ?? ''); ?>"
        style="width: 100%; margin-top: 5px; padding: 8px; border: 1px solid <?php echo isset($errors['name']) ? 'red' : '#ccc'; ?>;"
    >
    <?php if(isset($errors['name'])): ?> <small style="color:red;"><?php echo $errors['name']; ?></small> <?php endif; ?>

    <input
        type="text"
        name="surname"
        placeholder="Apellido"
        value="<?php echo htmlspecialchars($surname ?? ''); ?>"
        style="width: 100%; margin-top: 5px; padding: 8px; border: 1px solid <?php echo isset($errors['surname']) ? 'red' : '#ccc'; ?>;"
    >
    <?php if(isset($errors['surname'])): ?> <small style="color:red;"><?php echo $errors['surname']; ?></small> <?php endif; ?>

    <input
        type="email"
        name="email"
        placeholder="Email"
        value="<?php echo htmlspecialchars($email ?? ''); ?>"
        style="width: 100%; margin-top: 5px; padding: 8px; border: 1px solid <?php echo isset($errors['email']) ? 'red' : '#ccc'; ?>;"
    >
    <?php if(isset($errors['email'])): ?> <small style="color:red;"><?php echo $errors['email']; ?></small> <?php endif; ?>

    <textarea
        name="message"
        placeholder="Mensaje"
        style="width: 100%; margin-top: 5px; margin-bottom: 5px; min-height: 100px; padding: 8px; border: 1px solid <?php echo isset($errors['message']) ? 'red' : '#ccc'; ?>;"
    ><?php echo htmlspecialchars($message ?? ''); ?></textarea>
    <?php if(isset($errors['message'])): ?> <small style="color:red;"><?php echo $errors['message']; ?></small> <br> <?php endif; ?>

    <div style="display: flex; justify-content: flex-end; margin-top: 10px;">
        <button
            type="submit"
            style="background-color: green; color: white; padding: 10px 15px; border: none; cursor: pointer; font-weight: bold;"
        >
            Enviar
        </button>
    </div>
</form>