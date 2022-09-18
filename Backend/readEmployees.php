<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: GET");


require "classes/Employees.class.php";



$obj = new Employees();

$result = $obj->readEmployees();

if(!$result)
{
    echo json_encode(['Code' => 5000, 'Message' => 'Internal Server Error.']);
    exit();
}

echo json_encode(['Code' => 2000, 'Message' => 'Successfully !', 'Result' => $result]);




