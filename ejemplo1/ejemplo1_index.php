<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <div class = inicio>
    <form method="post">
        <h1>Ingresa los valores de la tabla actualizar</h1>

        <div class = "inputs">
            <input type="text" name = "name" placeholder ="Nombre agregar o modificar">
            <i class='bx bx-user-plus'></i>
        </div>

        <div class = "inputs">
            <input type="number" name = "numero" placeholder = "id actualizar o eliminar">
            <i class='bx bx-user-x' ></i>
        </div>
        <input type="submit" class = "btn" name = "register">
    </form>
    </div>
    <?php 
    include("ejemplo1.php");
    ?>
</body>
</html>
