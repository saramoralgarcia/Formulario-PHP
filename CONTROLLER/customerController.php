<?php
require_once '../REPOSITORY/customerRepository.php';
require_once '../MODEL/customer.php';
require_once '../DATABASE/dataBase.php';




if ($_SERVER["REQUEST_METHOD"] === "POST")
{
    $action = $_POST['action'];
    switch($action)
    {
        case 'create':
        {
            session_start();
            $_SESSION['exito'] = true;
            
            $name = $_POST['name'];
            $lastName = $_POST['lastName'];
            $address = $_POST['address'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];

                $customer = new Customer($name, $lastName, $address, $phone, $email);
                $db = DataBase::getInstance(); //se llama a un metodo statico clase :: y el metodo;
                $customerRepository = CustomerRepository::getInstance($db);

                $customerRepository->create($customer);

                header("Location: ../VIEW/index.php");
                exit();
        }

        case 'update':
        {
            session_start();
            $_SESSION['exito'] = true;
            
            $id = $_POST['id']; // Obtén el ID del formulario
            $name = $_POST['name'];
            $lastName = $_POST['lastName'];
            $address = $_POST['address'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
                
                        // Crear una instancia de Customer con los nuevos valores
            $customer = new Customer($name, $lastName, $address, $phone, $email);
            $customer-> setId($id); //  Id del cliente
                
            $db = DataBase::getInstance();
            $customerRepository = CustomerRepository::getInstance($db);
                
            if ($customerRepository->update($customer))
            {
                header("Location: ../VIEW/index.php");
                exit();
            }
        }
    }
}

else if (($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["id"])))
{
    $id = $_GET['id'];
    if(!empty($id))
    {
        $db = DataBase::getInstance(); //se llama a un metodo statico clase :: y el metodo;
        $customerRepository = CustomerRepository::getInstance($db);
        if($customerRepository -> delete($id))
        {
            
            header("Location: ../VIEW/read.php");// to do: mirar $_server["PHP_SELF"]
            exit();
        }
    }
}
?>