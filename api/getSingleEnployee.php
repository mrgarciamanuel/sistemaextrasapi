<?php 
//initialization of all services
include('../models/initialize.php');

echo "dfsfklds";
//instatiation of employee
$employee = new Employee($db);

$employee->id = isset($_GET["id"]) ? $_GET["id"] : die();
$employee->get_single();

$employee_arr = array(
    'id' => $employee->id,
    'name' => $employee->name,
    'surname' => $employee->surname,
    'username' => $employee->username,
    'gender' => $employee->gender,
    'description' => $employee->description,
    'tsdia' => $employee->tsdia,
);

print_r(json_encode($employee_arr));



?>