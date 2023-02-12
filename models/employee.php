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
        public function create_employee(){
            $query = "INSERT INTO $this->table SET name =:name, surname =:surname, username =:username, gender =:gender, description =:description, email =:email, nif =:nif, phone =:phone, profession1 =:profession1, profession2 =:profession2, profession3 =:profession3, country =:country, location =:location, cvhref =:cvhref";

            //prepare statement
            $stmt = $this->conn->prepare($query);

            //clean data
            $this->name = htmlspecialchars(strip_tags($this->name));
            $this->surname = htmlspecialchars(strip_tags($this->surname));
            $this->username = htmlspecialchars(strip_tags($this->username));
            $this->gender = htmlspecialchars(strip_tags($this->gender));
            $this->description = htmlspecialchars(strip_tags($this->description));
            $this->email = htmlspecialchars(strip_tags($this->email));
            $this->nif = htmlspecialchars(strip_tags($this->nif));
            $this->phone = htmlspecialchars(strip_tags($this->phone));
            $this->profession1 = htmlspecialchars(strip_tags($this->profession1));
            $this->profession2 = htmlspecialchars(strip_tags($this->profession2));
            $this->profession3 = htmlspecialchars(strip_tags($this->profession3));
            $this->country = htmlspecialchars(strip_tags($this->country));
            $this->location = htmlspecialchars(strip_tags($this->location));
            $this->cvhref = htmlspecialchars(strip_tags($this->cvhref));

            //binding of parameters
            $stmt->bindParam('name', $this->name);
            $stmt->bindParam('surname', $this->surname);
            $stmt->bindParam('username', $this->username);
            $stmt->bindParam('gender', $this->gender);
            $stmt->bindParam('description', $this->description);
            $stmt->bindParam('email', $this->email);
            $stmt->bindParam('nif', $this->nif);
            $stmt->bindParam('phone', $this->phone);
            $stmt->bindParam('profession1', $this->profession1);
            $stmt->bindParam('profession2', $this->profession2);
            $stmt->bindParam('profession3', $this->profession3);
            $stmt->bindParam('country', $this->country);
            $stmt->bindParam('location', $this->location);
            $stmt->bindParam('cvhref', $this->cvhref);

            if($stmt->execute()){
                return true;
            }            
        }
    }
?>