<?php

$id = $_POST["id"];

if(empty($id))
{
    echo "NO";
    exit();
}

$opt = array('http' =>
    array(
        'method' => 'DELETE',
        'header' => 'Content-Type: application/json',
        'content' => json_encode(['Id' => $id])
    )
);


$context = stream_context_create($opt);

$result = json_decode(file_get_contents('http://192.168.110.1/phpfullstack/Backend/deleteEmployees.php', true, $context), true);

if(!$result)
{
    echo "NO";
    exit();
}

if($result["Code"] !== 2000)
{
    echo "NO";
    exit();
}

echo "OK";