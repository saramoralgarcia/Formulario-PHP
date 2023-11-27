<?php
class CustomerRepository
{
    private $db;
    private static $instance;

    public function __construct(Database $db)
    {
        $this->db = $db;
    }
    public static function getInstance(Database $db)
    {
        if (self::$instance === null) {
            self::$instance = new self($db);
        }
        return self::$instance;
    }
    
    public function create(Customer $customer)
    {
        $name = $customer->getName();
        $lastName = $customer ->getLastName();
        $address = $customer ->getAddress();
        $phone = $customer ->getPhone();
        $email = $customer ->getEmail();

        $sql = "INSERT INTO customer(name, lastName, address, phone, email) VALUES (?,?,?,?,?)";
        $stmt = mysqli_prepare($this->db->getConnection(), $sql);
        mysqli_stmt_bind_param($stmt, "sssss", $name, $lastName, $address, $phone, $email);

        if(mysqli_stmt_execute($stmt))
        {
            return true;
        }else
        {
            return false;
        }
    }

    public function read()
    {
        $sql = "SELECT * FROM customer";
    if ($result = mysqli_query($this->db->getConnection(), $sql)) {
        $customers = array(); // Inicializa el array de clientes
        while ($row = mysqli_fetch_assoc($result)) {
            $customers[] = $row;
        }
        mysqli_free_result($result);
        return $customers; // Devuelve el array de clientes
    }
    return array();
    }
    public function update(Customer $customer)
    {
        $id = $customer->getId();
        $name = $customer->getName();
        $lastName = $customer ->getLastName();
        $address = $customer ->getAddress();
        $phone = $customer ->getPhone();
        $email = $customer ->getEmail();

        $sql = "UPDATE customer SET name=?, lastName=?, address=?, phone=?, email=? WHERE id=?";
        $stmt = mysqli_prepare($this->db->getConnection(), $sql);
        mysqli_stmt_bind_param($stmt, "sssssi", $name, $lastName, $address, $phone, $email, $id);
        if(mysqli_stmt_execute($stmt))
        {
            return true;
        }else
        {
            return false;
        }
    }

    public function delete($id)
    {
        $sql = "DELETE FROM customer WHERE id = ?";
        $stmt = mysqli_prepare($this->db->getConnection(), $sql);
        mysqli_stmt_bind_param($stmt, "i", $id);
        if (mysqli_stmt_execute($stmt))
        {
            return true;
        } else
        {
            return false;
        }
    }

    public function getCustomerById($id)
    {
        $sql = "SELECT * FROM customer WHERE id = ?";
        $stmt = mysqli_prepare($this->db->getConnection(), $sql);
        mysqli_stmt_bind_param($stmt, "i", $id);
        
        if (mysqli_stmt_execute($stmt)) {
            $result = mysqli_stmt_get_result($stmt);
            $customer = mysqli_fetch_assoc($result);
            mysqli_free_result($result);
            return $customer;
        } else {
            return null;
        }
    }
}

?>