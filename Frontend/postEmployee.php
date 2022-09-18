<?php

$Id = "";
$Emp_id = "";
$Firstname = "";
$Lastname = "";
$dob = "";
$Age = "";
$Address = "";
$msg = "";


if(isset($_POST["submit"]))
{
    $Emp_id = $_POST["empid"];
    $Firstname =  $_POST["firstname"];
    $Lastname =  $_POST["lastname"];
    $dob =  $_POST["dateofbirth"];
    $Age =  $_POST["age"];
    $Address =  $_POST["address"];

    $url = "http://".$_SERVER["HTTP_HOST"]. "/"."phpfullstack/Frontend/";

    if(empty($Emp_id))
    {
        echo "<script>alert('Enter Emp_Id.');</script>";
        exit();
    }
    if(empty($Firstname))
    {
        echo "<script>alert('Enter First Name.');</script>";
        exit();
    }
    if(empty($Lastname))
    {
        echo "<script>alert('Enter Last Name.');</script>";
        exit();
    }
    if(empty($dob))
    {
        echo "<script>alert('Select Date of birth.');</script>";
        exit();
    }
    if(empty($Address))
    {
        echo "<script>alert('Enter Address.');</script>";
        exit();
    }

    $dob = strtotime($dob);
    $dob = date('Y-m-d', $dob);
    $diff = abs(strtotime($dob) - strtotime(date('Y-m-d')));
    $Age = floor($diff / (365 * 60 * 60 * 24));
    
    if(isset($_GET["id"]))
    {
        $Id = $_GET["id"];

        if(empty($Id))
        {
            echo "<script>alert('Not found information to update.');</script>";
            exit();
        }
        

        $payload = [
            "Id" => $Id,
            "Emp_Id" => $Emp_id,
            "FirstName" => $Firstname,
            "LastName" => $Lastname,
            "DateOfBirth" => $dob,
            "Age" => $Age,
            "Address" => $Address
        ];

        $opt = array('http' =>
        array(
            'method' => 'PUT',
            'header' => 'Content-Type: application/json',
            'content' => json_encode($payload)
        )
        );


        $context = stream_context_create($opt);

        $result = json_decode(file_get_contents('http://192.168.110.1/phpfullstack/Backend/putEmployees.php', true, $context), true);

        if($result)
        {
            $msg = "Update data successfully !";
            header("Refresh: 2, $url");
        }
        else
        {
            $msg = "Update data failed !";
        }
    }
    else
    {
        $payload = [
            "Emp_Id" => $Emp_id,
            "FirstName" => $Firstname,
            "LastName" => $Lastname,
            "DateOfBirth" => $dob,
            "Age" => $Age,
            "Address" => $Address
        ];

        $opt = array('http' =>
        array(
            'method' => 'POST',
            'header' => 'Content-Type: application/json',
            'content' => json_encode($payload)
        )
        );


        $context = stream_context_create($opt);

        $result = json_decode(file_get_contents('http://192.168.110.1/phpfullstack/Backend/postEmployees.php', true, $context), true);

        
        if($result && $result["Code"] == 2000)
        {
            $msg = "Insert data successfully !";
            header("Refresh: 2, $url");
        }
        else
        {
            $msg = "Insert data failed !";
        }
    }
}
else
{
    if(isset($_GET["id"]))
    {
        
        $opt = array('http' =>
        array(
            'method' => 'GET',
            'header' => 'Content-Type: application/json',
            'content' => json_encode(['Id' => $_GET["id"]])
        )
        );


        $context = stream_context_create($opt);

        $result = json_decode(file_get_contents('http://192.168.110.1/phpfullstack/Backend/readSingleEmployees.php', true, $context), true);

        if($result)
        {
            $Id = "";
            $Emp_id = $result["Result"][0]["Emp_Id"];
            $Firstname = $result["Result"][0]["FirstName"];
            $Lastname =  $result["Result"][0]["LastName"];
            $dob = $result["Result"][0]["DateOfBirth"];
            $Age = $result["Result"][0]["Age"];
            $Address = $result["Result"][0]["Address"];
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <title>Post | Php Frontend</title>
</head>
<body style="background-color: #f0f0f0;">
    <div class="container bg-white mt-3 p-4 rounded shadow">
        <div class="d-flex justify-content-between">
            <h2>Employees Info</h2>
            <button onclick="history.go(-1);" class="btn btn-secondary px-4 mb-2 shadow-sm">
               Back
            </button>
        </div>
        <hr/>
        <form class="form-control p-3" method="POST">
            <div class="row">
                <div class="col-12 col-md-6 mb-3">
                    <label for="empid" class="form-label">Employee Id</label>
                    <input type="text" name="empid" id="empid" class="form-control" placeholder="Enter Employee Id" required
                    value="<?php
                     if(!empty($Emp_id))
                     {
                        echo $Emp_id;
                     }
                    ?>">
                </div>
                <div class="col-12 col-md-6 mb-3">
                    <label for="firstname" class="form-label">Employee Name</label>
                    <input type="text" name="firstname" id="firstname" class="form-control" placeholder="Enter Employee Name" required
                    value="<?php
                     if(!empty($Firstname))
                     {
                        echo $Firstname;
                     }
                    ?>">
                </div>
                <div class="col-12 col-md-6 mb-3">
                    <label for="lastname" class="form-label">Employee Surname</label>
                    <input type="text" name="lastname" id="lastname" class="form-control" placeholder="Enter Employee Surname" required
                    value="<?php
                     if(!empty($Lastname))
                     {
                        echo $Lastname;
                     }
                    ?>">
                </div>
                <div class="col-12 col-md-3 mb-3">
                    <label for="dateofbirth" class="form-label">Select Date of birth</label>
                    <input type="date" name="dateofbirth" id="dateofbirth" class="form-control" placeholder="dd/mm/yyyy" required
                    value="<?php  
                        if(empty($dob))
                        {
                            echo date('Y-m-d');
                        }
                        else
                        {
                            echo $dob;
                        }
                    ?>">
                </div>
                <div class="col-6 col-md-2 mb-3">
                    <label for="age" class="form-label">Age</label>
                    <input disabled type="text" name="age" id="age" class="form-control" placeholder="0" required
                    value="<?php
                     if(!empty($Age))
                     {
                        echo $Age;
                     }
                    ?>">
                </div>
                <div class="col-12 mb-3">
                    <label for="address" class="form-label">Address</label>
                    <textarea type="text" name="address" id="address" rows="4" class="form-control" placeholder="Enter employee address" required><?php  
                        echo $Address;
                    ?></textarea>
                </div>
            </div>
            <div class="row mt-3 mb-3 px-4">
                <input type="submit" id="submit" name="submit" value="Save" class="btn btn-primary px-5 col-12 col-md-2">
                <p class="col-12 col-md-5 ps-5 fs-4"><?php 
                    if(!empty($msg))
                    {
                        echo $msg;
                    }
                ?></p>
            </div>
        </form>
    </div>
</body>
</html>