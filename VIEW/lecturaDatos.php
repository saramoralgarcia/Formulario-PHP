<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./css/Style.css">
  <title>lectura de Datos</title>
</head>
<body>
<?php
        require_once '../REPOSITORY/customerRepository.php';
        require_once '../MODEL/customer.php';
        require_once '../DATABASE/dataBase.php';

        $db = DataBase::getInstance(); //se llama a un metodo statico clase :: y el metodo;
        $customerRepository = CustomerRepository::getInstance($db);
        $customers = $customerRepository->read();

        echo '<div class="row vh-50 justify-content-center align-items-center ">';
        echo '<div>';
    
        echo'<a type="button" class="btn m-2 flex-column-reverse" href="./index.php">Atrás</a>';
        
        if (!empty($customers))
        {
          echo "<div class='row '>";
          echo "<div class='col-lg-6 col-sm-12 mx-auto '>";
          echo "<div class='text-nowrap '>";
          echo "<table class='table table-bordered border-3 border-dark table-striped '>";
          echo "<thead  class='table-striped border-3 border-dark table-success'>";
          echo "<th>#</th>";
          echo "<th>Nombre</th>";
          echo "<th>Apellido</th>";
          echo "<th>Dirección</th>";
          echo "<th>Teléfono</th>";
          echo "<th>Email</th>";
          echo "<th>Acciones</th>";
          echo "</thead>";
          echo "<tbody '>";  
      
          foreach ($customers as $customer)
          {
              echo "<tr class='table-success'>";
              echo "<td >" . $customer['id'] . "</td>";
              echo "<td>" . $customer['name'] . "</td>";
              echo "<td>" . $customer['lastName'] . "</td>";
              echo "<td>" . $customer['address'] . "</td>";
              echo "<td>" . $customer['phone'] . "</td>";
              echo "<td>" . $customer['email'] . "</td>";
              echo '<td>';
              echo '<a href="..\VIEW\update.php?id=' . $customer['id'] . '" title="Editar" data-toggle="tooltip"><span class="fa fa-pencil mx-3" style="color: #008080;"></span></a>';
              echo '<a id="click" href="javascript:void(0);" data-toggle="modal" data-target="#confirmarModal" data-id="' . $customer['id'] . '" title="Eliminar" data-toggle="tooltip"><span class="fa fa-trash" style="color: tomato;"></span></a>';
              echo '</td>';
              echo "</tr>";
          }
        // echo'<a type="button" class="btn m-2  flex-column-reverse" href="./index.php">Volver</a>';
      
          echo "</tbody>";
          echo "</table>";
          echo "</div>";
          echo "</div>";
          echo "</div>";
        // echo'<a type="button" class="btn m-2  flex-column-reverse" href="./index.php">Volver</a>';
    
        } else
        {
            echo "<h5 style='color:black;'>No existen datos</h5>";
        }
        echo'</div>
</div>';
?>
</body>
</html>