<?php
require_once 'conexion.php';
require_once '04_formularios_logic.php';
// include '04_formularios_logic.php';
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