<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./css/Style.css">
    <!-- <link rel="stylesheet" href="./css/estilo.css"> -->


    <title>CRUD</title>

</head>

<body>
    <div class="m-5">
        <div class="img-fluid">
            <a href="index.php"> <img src="./template/task.png" alt="Task" width="15%"></a>

        </div>
        <h1 class="text-center h" style="font-size: 50px;">Registrar Cliente</h1>
    </div>


    <div class="container ">
        <div class="row ">
            <div class="col-lg-6 col-12 mx-auto ">
                <form id="formulario" class="row g-3 " action="../CONTROLLER/customerController.php" method="POST"
                    onsubmit="return ValidarFormulario()">
                    <input type="hidden" name="action" value="create" />
                    <div class="col-12 pt-2">
                        <label class="form-label pl-2">Nombre</label>
                        <input type="text" class="form-control input" id="name" name="name"
                            onchange="return ValidationName()" required>
                        <div id="nameError" class="form-text text-danger textError">El nombre debe tener más de 4
                            caracteres y no puede ser número.</div>

                    </div>
                    <div class="col-md-6">
                        <label>Apellidos</label>
                        <input type="text" name="lastName" id="lastName" class="form-control input" required>
                    </div>

                    <div class="col-md-6">
                        <label>Teléfono</label>
                        <input type="text" name="phone" id="phone" class="form-control input"
                            onchange="return ValidationPhone()" required>
                        <div id="errorPhone" class="form-text text-danger textError">El telefono debe tener más de 9
                            numero.</div>
                    </div>

                    <div class="col-md-6">
                        <label>Correo Electronico</label>
                        <input type="email" name="email" id="email" class="form-control input" required>
                        <div id="errorEmail" class="form-text text-danger textError">Introduce un email válido.</div>
                    </div>
                    <div class="col-md-6">
                        <label>Dirección</label>
                        <textarea type="text" name="address" id="address" class="form-control input"
                            required></textarea>
                    </div>
                    <div class="col-md-12 pt-3">
                        <button id="btnSubmit" type="submit" class="btn">Guardar datos</button>
                        <a type="button" class="btn " href="./read.php">Ver todos los datos </a>
                    </div>
                    <?php
                    require_once '../CONTROLLER/customerController.php';
                    session_start();
                    // Verificar si existe la variable de sesión 'exito'
                    if (isset($_SESSION['exito']) && $_SESSION['exito']) {
                        echo '<div class="alert alert-success text-center" role="alert">
                    Los datos se han enviado correctamente.
                </div>';

                        // Cerrar la variable de sesión
                        unset($_SESSION['exito']);
                    }
                    ?>
                </form> <br><br><br><br>
            </div>
        </div>
    </div>
    </div>

    <br><br><br><br>

    <script src="../validation.js"></script>
</body>

</html>