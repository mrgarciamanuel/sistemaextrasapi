<?php 
    class Employee{
        //database info.
        private $conn;
        private $table = "employee";

        //model property
        public $id;
        public $name;
        public $surname;
        public $username;
        public $gender;
        public $description;
        public $email;
        public $nif;
        public $phone;
        public $profession1;
        public $profession2;
        public $profession3;
        public $country;
        public $location;
        public $cvhref;
        public $linkedcompany;
        public $tsdia;
        public $accountstate; 
        
        public function __construct($db){
            $this->conn = $db;
        }

        //method to get all employees
        public function get_all(){
            $query = "SELECT 
            e.id, e.name, e.surname, e.username, g.name as gender, e.description, e.tsdia
            FROM $this->table e
            INNER JOIN gender g on g.id = e.gender
            ORDER BY e.id
            ";
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            return $stmt;
        }

        public function get_single(){
            $query = "SELECT 
            e.id, e.name, e.surname, e.username, g.name as gender, e.description, e.tsdia
            FROM $this->table e
            INNER JOIN gender g on g.id = e.gender
            WHERE e.id = ?
            LIMIT 1
            ";

            //prepare statement 
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(1, $this->id);

            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            $this->id = $row['id'];
            $this->name = $row['name'];
            $this->surname = $row['surname'];
            $this->username = $row['username'];
            $this->gender = $row['gender'];
            $this->description = $row['description'];
            $this->tsdia = $row['tsdia'];

            return $stmt;          
        }        
    }
?>