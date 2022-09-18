<?php
    class Dbh 
    {
        private $host;
        private $dbname;
        private $username;
        private $pwd;
        private $conn;

        public function Connects()
        {
            $this->host = "?";
            $this->dbname = "?";
            $this->username = "?";
            $this->pwd = "?";

            try 
            {
               $this->conn = new PDO("sqlsrv:Server=". $this->host."; Database=". $this->dbname, $this->username, $this->pwd);
               $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //    var_dump("Connect to database successfully!");
            } 
            catch (\Throwable $th) 
            {
               var_dump(['Code: '=> '5000', 'Message: ' => 'Connection failed! '.$th]);
               die();
               exit();
            }

            return $this->conn;
        }
    }