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
    <title>Update</title>
</head>
<body>
<div class="m-5">
    <div class="img-fluid">
    <a href="update.php"> <img src="./template/task.png" alt="Task" width="15%" ></a>
            </div>
            <h1 class="text-center h" style="font-size: 50px">Modificar Cliente</h1>
        </div>
        <div class="container ">
            <div class="row ">
                <div class="col-lg-6 col-12 mx-auto ">
                    <?php
                    require_once '../REPOSITORY/customerRepository.php';
                    require_once '../MODEL/customer.php';
                    require_once '../DATABASE/dataBase.php';
                        // Recuperar el id del cliente de la URL
                        $customerId = isset($_GET['id']) ? $_GET['id'] : null;

                        if ($customerId) {
                            // Obtener los datos del cliente utilizando el $customerId
                            $db = DataBase::getInstance();
                            $customerRepository = CustomerRepository::getInstance($db);
                            $customer = $customerRepository->getCustomerById($customerId);

                        echo '<form class="row g-3" action="../CONTROLLER/customerController.php" method="POST" onsubmit="return ValidarFormulario()">';
                        echo '<input type="hidden" name="action" value="update">';
                        echo '<input  type="hidden" name="id" value="' . $customerId . '">';
                        echo '<div class="col-12 pt-2">';
                        echo '<label class="form-label pl-2">Nombre</label>';
                        echo '<input type="text" class="form-control input" id="name" name="name" value="' . $customer['name'] . '" required style="color:#F59622;">';
                        echo '</div>';
                        echo '<div class="col-md-6">';
                        echo '<label>Apellido</label>';
                        echo '<input type="text" name="lastName" id="lastName" class="form-control input" value="' . $customer['lastName'] . '" required style="color:#F59622;">';
                        echo '</div>';
                        echo '<div class="col-md-6">';
                        echo '<label>Teléfono</label>';
                        echo '<input type="text" name="phone" id="phone" class="form-control input" onblur="return ValidationPhone()" value="' . $customer['phone'] . '" required style="color:#F59622;">';
                        echo '</div>';
                        echo '<div class="col-md-6">';
                        echo '<label>Correo Electronico</label>';
                        echo '<input type="text" name="email" id="email" class="form-control input" onblur="ValidationEmail()" value="' . $customer['email'] . '" required style="color:#F59622;">';
                        echo '</div>';
                        echo '<div class="col-md-6">';
                        echo '<label>Dirección</label>';
                        echo '<textarea type="text" name="address" id="address" class="form-control input" required style="color:#F59622;">' . $customer['address'] . '</textarea>';
                        echo '</div>';
                        
                        
                        echo '<div class="col-md-12 pt-3">';
                        echo '<button type="submit" class="btn m-2">Guardar datos</button>';
                        echo '<a type="button" class="btn" href="./index.php">Volver</a>';
                        echo '</div>';
                        echo '</form>';
                    } else {
                        echo 'ID de cliente no válido';
                    }
?>
<?php

        session_start();
        // Verificar si existe la variable de sesión 'exito'
        if (isset($_SESSION['exito']) && $_SESSION['exito']) 
        {
            echo '<div class="alert alert-success text-center" role="alert">
                    Los datos se han modificado correctamente.
                </div>';

            // Cerrar la variable de sesión
            unset($_SESSION['exito']);
        }
?>
</body>
</html>

