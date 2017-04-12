<?php

if(stristr($_SERVER['REQUEST_URI'], 'config.inc.php')){
    die("Wait a minute... who are you? You're not allowed to come here.");
}
//
///* Database Credentials */
//$DatabaseHost = "145.129.251.239"; //Database host (ex. localhost or 127.0.0.1)
//$DatabaseUser = "codefest"; //Database username login (ex. root)
//$DatabasePassword = "codefest2017"; //Database password
//$DatabaseName = "Codefest"; //The database name (use "test" for test proposal, because test is always in a standard MySQL Database)
//
///* Database Connection (PDO) */
//try {
//    $DatabaseConnection = new PDO("mysql:host=$DatabaseHost;dbname=$DatabaseName", $DatabaseUser, $DatabasePassword);
//    $DatabaseConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//    //echo "Connectie succesvol gemaakt!"; //For test proposals, remove comment to see if connection is succesfull
//} catch(PDOexception $error) {
//    echo "Connectie mislukt zie foutmelding: " . $error->getMessage();
//    die();
//}

class Database
{
    private $host = "localhost";
    private $db_name = "codefest";
    private $username = "root";
    private $password = "";
    public $conn;

    public function dbConnection()
    {

        $this->conn = null;
        try
        {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $exception)
        {
            echo "Connection error: " . $exception->getMessage();
        }

        return $this->conn;
    }
}
?>


