<?php
    /*
        PDO Database Class
        Connect to database
        Create prepared statements
        Bind Values
        Return rows and results
    */
    class Database {
        private $host = DB_HOST;
        private $user = DB_USER;
        private $pass = DB_PASS;
        private $dbname = DB_NAME;

        private $dbh;//Database Handler for Prepared statement
        private $stmt;//For Prepared statement
        private $error;//For possible errors

        public function __construct() {
            //Set DSN - Data Source Name
            $dsn = 'mysql:host='. $this->host .';dbname='. $this->dbname;
            $options = [
                PDO::ATTR_PERSISTENT => true,//Persistent connection increase performacnce check established connection
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION//SILENT,WARNING,EXCEPTION
            ]; //PDO options

            //Create PDO instance
            try {
                $this->dbh = new PDO($dsn, $this->user, $this->pass, $options);
            } catch(PDOexception $e) {
                $this->error = $e->getMessage();
                echo $this->error;
            }
        }

        //Prepare statement with query
        public function query($sql) {
            $this->stmt = $this->dbh->prepare($sql);
        }

        //Bind Values
        public function bind($param, $value, $type = null) {
            if(is_null($type)){
                switch(true){

                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
                }
            }
            $this->stmt->bindValue($param, $value, $type);
        }
        //Execute prepared statement
        public function execute() {
            return $this->stmt->execute();
        }

        //Fetch all results in an array
        public function resultSet() {
            $this->execute();
            return $this->stmt->fetchAll(PDO::FETCH_OBJ);
        }
        //Fetch single result in an array
        public function single() {
            $this->execute();
            return $this->stmt->fetch(PDO::FETCH_OBJ);
        }

        //Get the row count of the result
        public function rowCount() {
            return $this->stmt->rowCount();
        }
    }   