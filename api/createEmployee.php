<?php 
//initialization of all services
include('../models/initialize.php');
include('Content-Type: application/json');
include('Accesss-Control-Allow-Methods: POST');
include('Accesss-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Accesss-Control-Allow-Method, Autorization, X-Requested-With');

//instatiation of employee
$employee = new Employee($db);

//get posted data 
$data = json_decode(file_get_contents("php://input"));

$employee->name = $data->name;
$employee->surname = $data->surname;
$employee->username = $data->username;
$employee->gender = $data->gender;
$employee->description = $data->description;
$employee->email = $data->email;
$employee->nif = $data->nif;
$employee->phone = $data->phone;
$employee->profession1 = $data->profession1;
$employee->profession2 = $data->profession2;
$employee->profession3 = $data->profession3;
$employee->country = $data->country;
$employee->location = $data->location;
$employee->cvhref = $data->cvhref;

if ($employee->create_employee()){
    echo json_encode(
        array("message" => "Congrats, you're account was created")
    );
}else{
    echo json_encode(
        array("message" => "Sorry, something went wrong")
    );
}

?>