<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: DELETE");


require "classes/Employees.class.php";

$post = json_decode(file_get_contents('php://input'), true);

if(empty($post))
{
    echo json_encode(['Code' => 5000, 'Message' => 'Json file is invalit']);
    exit();
}

$Id = $post["Id"];

if(empty($Id))
{
    echo json_encode(['Code' => 5000, 'Message' => 'Field Id is not supplied']);
    exit();
}

$obj = new Employees();

$result = $obj->deleteEmployees($Id);

if(!$result)
{
    echo json_encode(['Code' => 5000, 'Message' => 'Internal Server Error.']);
    exit();
}

echo json_encode(['Code' => 2000, 'Message' => 'Delete successfully!']);




