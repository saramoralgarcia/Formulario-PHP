<?php
    class Customer
    {
        // Atributos
        private $id;
        private $name;
        private $lastName;
        private $address;
        private $phone;
        private $email;
        //Constructor (le pasamos la conexion)
        public function  __Construct($name, $lastName, $address, $phone, $email)
        {
            $this->name = $name;
            $this->lastName = $lastName;
            $this->address = $address;
            $this->phone = $phone;
            $this->email = $email;
        }
        //Getter and Setter
        public function getId() { return $this->id; }

        public function setId($id) { $this->id = $id; }

        public function getName() { return $this->name; }

        public function setName($name) { $this->name = $name; }

        public function getLastName() { return $this->lastName; }
    
        public function setLastName($lastName) { $this->lastName = $lastName; }

        public function getAddress() { return $this->address; }
    
        public function setAddress($address) { $this->address = $address; }

        public function getPhone() { return $this->phone; }
    
        public function setPhone($phone) { $this->phone = $phone; }

        public function getEmail() { return $this->email; }
    
        public function setEmail($email) { $this->email = $email; }
    }

?>