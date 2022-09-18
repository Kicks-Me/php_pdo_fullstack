<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: POST");


require "classes/Employees.class.php";

$post = json_decode(file_get_contents('php://input'), true);

if(empty($post))
{
    echo json_encode(['Code' => 5000, 'Message' => 'Json file is invalit']);
    exit();
}

$Emp_Id = $post["Emp_Id"];
$firstname = $post["FirstName"];
$lastname = $post["LastName"];
$datebirth = $post["DateOfBirth"];
$age = $post["Age"];
$address = $post["Address"];

if(empty($Emp_Id))
{
    echo json_encode(['Code' => 5000, 'Message' => 'Field Emp_Id is not supplied']);
    exit();
}
else if(empty($firstname))
{
    echo json_encode(['Code' => 5000, 'Message' => 'Field FirstName is not supplied']);
    exit();
}
else if(empty($lastname))
{
    echo json_encode(['Code' => 5000, 'Message' => 'Field LastName is not supplied']);
    exit();
}

$obj = new Employees();

$result = $obj->postEmployees($Emp_Id, $firstname, $lastname, $datebirth,  $age, $address);

if(!$result)
{
    echo json_encode(['Code' => 5000, 'Message' => 'Internal Server Error.']);
    exit();
}

echo json_encode(['Code' => 2000, 'Message' => 'Insert Succcessfully !']);




