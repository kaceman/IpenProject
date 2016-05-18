<?php
namespace Connexion;

define('SERVERNAME', 'localhost');
define('USERNAME', 'root');
define('PASSWORD', '');
define('DBNAME', 'ipsendb');

class Connexion
{
    private $conn;

    public function connectToDB()
    {
        $this->conn = new \mysqli(SERVERNAME, USERNAME, PASSWORD, DBNAME);

        if($this->conn->connect_error) {
            die('Connexion échoué : ' . $this->conn->connect_error);
        }

        return $this->conn;
    }

    public function closeConnection()
    {
        mysqli_close($this->conn);
    }

}