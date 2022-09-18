<?php
require "include/Dbh.inc.php";

class Employees extends Dbh
{
    public function readEmployees()
    {
        $sql = "SELECT ID, Emp_Id, FirstName, LastName, DateOfBirth, Age, Address, FORMAT(Created_at, 'dd/MM/yyyy HH:mm:ss') AS Created_at FROM TB_EMPLOYEES ORDER BY Emp_Id DESC";
        try {
            
            $stmt = $this->Connects()->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);

        } catch (\Throwable $th) {
            print_r($th);
           return false;
        }

        return false;
    }
    
    public function readSingleEmployees($Id)
    {
        $sql = "SELECT  ID, Emp_Id, FirstName, LastName, DateOfBirth, Age, Address, FORMAT(Created_at, 'dd/MM/yyyy HH:mm:ss') AS Created_at FROM TB_EMPLOYEES WHERE Id = ? ORDER BY Emp_Id DESC";
        try {
            $stmt = $this->Connects()->prepare($sql);
            $stmt->bindParam(1, htmlspecialchars(strip_tags($Id)));
            $stmt->execute();

            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if( count($result) < 1){
                return "Not Found Data.";
            }
            return $result;

        } catch (\Throwable $th) {
           return false;
        }

        return false;
    }
    
    public function postEmployees($Id, $firstname, $lastname, $datebirth,  $age, $address)
    {
        $sql = "INSERT INTO TB_EMPLOYEES(EMP_ID, FirstName, LASTNAME,DATEOFBIRTH, AGE, [ADDRESS],CREATED_AT) VALUES(?,?,?,?,?,?, GETDATE())";
        
        try {
            $stmt = $this->Connects()->prepare($sql);

            $stmt->bindParam(1, htmlspecialchars(strip_tags($Id)));
            $stmt->bindParam(2, htmlspecialchars(strip_tags($firstname)));
            $stmt->bindParam(3, htmlspecialchars(strip_tags($lastname)));
            $stmt->bindParam(4, htmlspecialchars(strip_tags($datebirth)));
            $stmt->bindParam(5, htmlspecialchars(strip_tags($age)));
            $stmt->bindParam(6, htmlspecialchars(strip_tags($address)));

            if($stmt->execute())
            {
                return true;
            }


        } catch (\Throwable $th) {
        print_r("Err=>".$th);
           return $th;
        }

        return false;
    }
    
    public function putEmployees($Id, $emp_Id, $firstname, $lastname, $datebirth,  $age, $address)
    {
        $sql = "UPDATE TB_EMPLOYEES SET Emp_Id=?, FirstName=?, LASTNAME=?, DATEOFBIRTH= ?, AGE=?, [ADDRESS]=? WHERE ID=?";
        try {
            $stmt = $this->Connects()->prepare($sql);
            $stmt->bindParam(1, htmlspecialchars(strip_tags($emp_Id)));
            $stmt->bindParam(2, htmlspecialchars(strip_tags($firstname)));
            $stmt->bindParam(3, htmlspecialchars(strip_tags($lastname)));
            $stmt->bindParam(4, htmlspecialchars(strip_tags($datebirth)));
            $stmt->bindParam(5, htmlspecialchars(strip_tags($age)));
            $stmt->bindParam(6, htmlspecialchars(strip_tags($address)));
            $stmt->bindParam(7, htmlspecialchars(strip_tags($Id)));
            
            if($stmt->execute())
            {
                return true;
            }

        } catch (\Throwable $th) {
           return $th;
        }

        return false;
    }
    
    public function deleteEmployees($Id)
    {
        $sql = "DELETE FROM TB_EMPLOYEES WHERE ID = ?";
        try {
            $stmt = $this->Connects()->prepare($sql);
            $stmt->bindParam(1, htmlspecialchars(strip_tags($Id)));
            
            if($stmt->execute())
            {
                return true;
            }

        } catch (\Throwable $th) {
           return false;
        }

        return false;
    }
}