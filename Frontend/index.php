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
    <title>Php Frontend</title>
    <style>
        .dataTables_filter,  .dataTables_length {
            margin-bottom: 1rem !important;
        }

        .dataTables_filter input{
            min-width: 15rem !important;
        }
    </style>
</head>
<body style="background-color: #f0f0f0;">
    <div class="container bg-white mt-3 p-4 rounded shadow">
        <div class="d-flex justify-content-between">
            <h2>Employees Info</h2>
            <a href="postEmployee.php" class="btn btn-success px-4 mb-2 shadow">
               <i class="fa fa-plus pe-2"></i> Add
            </a>
        </div>
        <hr/>
        <table class="table table-bordered table-striped table-hover" id="tbEmp">
            <thead class="bg-secondary text-white">
                <tr>
                    <th>#</th>
                    <th>Employees Name</th>
                    <th width="15%">Date of birth</th>
                    <th>Address</th>
                    <th width="17%">Created_at</th>
                    <th width="17%">Action</th>
                </tr>
            </thead>
            <tbody>

            <?php
                $result = json_decode(file_get_contents('http://192.168.110.1/phpfullstack/Backend/readEmployees.php'), true);

                if($result && count($result) > 0)
                {
                    $indx = 0;

                    foreach ($result["Result"] as $value) {
                        $indx ++;

                        ?>
                    <tr>
                        <td><?php  echo  $indx; ?></td>
                        <td>
                            <p class="px-3 py-0 m-0"><?php  echo $value["FirstName"] ." " . $value["LastName"];?></p>
                            <p class="px-3 py-0 m-0  text-secondary"><i>Id:</i> <?php  echo  $value["Emp_Id"];?></p>
                        </td>
                        <td>
                            <p class="px-3 py-0 m-0"><?php  echo  $value["DateOfBirth"];?></p>
                            <p class="px-3 py-0 m-0 text-secondary"><i>Age:</i> <?php  echo  $value["Age"];?></p>
                        </td>
                        <td><?php  echo  $value["Address"];?></td>
                        <td><?php  echo  $value["Created_at"];?></td>
                        <td>
                            <a href="postEmployee.php?id=<?php echo $value["ID"]; ?>" class="btn btn-primary px-4">Edit</a>
                            <button class="btn btn-danger px-3" onclick="deleteEmp(<?php echo $value['ID']; ?>);">
                                Delete
                            </button>
                        </td>
                    </tr>
                <?php

                    }
                }
            ?>
            </tbody>
        </table>
    </div>

    <script>
        function deleteEmp(id)
        {
            if(id == undefined || id == null)
            {
                alert('Not found information to delete.');
                return;
            }

            let result = confirm('Are you sure to delete ?');

            if(result)
            {
                $.ajax({
                    type: 'POST',
                    url: 'deleteEmployee.php',
                    data: {id: id},

                    success: function(res)
                    {
                        if(res == "OK")
                        {
                            alert('Delete information successfully !');
                        }
                        else
                        {
                            alert('Delete information failed !');
                        }

                        window.location.reload();
                    }
                });
            }
        }

        $(document).ready( function () {
            $('#tbEmp').DataTable({
                pagingType: 'full_numbers',
                "lengthMenu": [[5,10,15,20,50, 100, -1], [5,10,15,20,50,100, "All"]]
            });
        } );
    </script>
</body>
</html>