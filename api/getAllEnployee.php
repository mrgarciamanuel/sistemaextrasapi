<?php 
header("Acess-control-Allow-Origin: *");
header("Content-Type: application/json");

//initialization of all services
include('../models/initialize.php');

//instatiation of employee
$employee = new Employee($db);
$result = $employee->get_all();

if($result->rowCount() > 0){
    $employee_arr = array();
    $employee_arr['data'] = array();
    while($row = $result->fetch(PDO::FETCH_ASSOC)){
        extract($row);

        $employee_item = array(
            'id' => $id,
            'name' => $name,
            'surname' => $surname,
            'username' => $username,
            'gender' => $gender,
            'description' => $description,
            'tsdia' => $tsdia         
        );
        array_push($employee_arr['data'], $employee_item);
    }
    echo json_encode($employee_arr);
}else{
    echo json_encode(array('mensage'=>'Non information was found'));
}

?>