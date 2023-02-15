<?php 
//initialization of all services
include('../models/initialize.php');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: X-Request-With, content-Type, Origin, Cache-Control, Progma, Autorization, Accept, Accept-Encoding");
header("Cache-Control: no-cache, must-revalidate");
header("Expires: Sat, 26 jul 1997 05:00:00 GMT");

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