<?php

class Database
{
    var $conn = null;
    var $config = array(
        'username' => 'root',
        'password' => 'Root@123',
        'hostname' => 'localhost',
        'database' => 'zoom-db'
    );

    public function __construct() {
        $this->connect();
    }

    public function connect() {
        if (is_null($this->conn)) {
            $db = $this->config;
            $this->conn = mysqli_connect($db['hostname'], $db['username'], $db['password'],$db['database']);
            if(!$this->conn) {
                die("Cannot connect to database server"); 
            }
        }
        return $this->conn;
    }

    public function is_table_empty() {
        $query = "SELECT id FROM zoom_oauth WHERE provider = 'zoom'";
        $result = mysqli_query($this->conn,$query);
        if($result->num_rows) {
            return false;
        }
  
        return true;
    }
  
    public function get_access_token() {
        $query = "SELECT provider_value FROM zoom_oauth WHERE provider = 'zoom'";
        $sql = mysqli_query($this->conn,$query);
        $result = $sql->fetch_assoc();
        return json_decode($result['provider_value']);
    }
  
    public function get_refersh_token() {
        $result = $this->get_access_token();
        return $result->refresh_token;
    }
  
    public function update_access_token($token) {
        if($this->is_table_empty()) {
            mysqli_query($this->conn,"INSERT INTO zoom_oauth(provider, provider_value) VALUES('zoom', '$token')");
        } else {
            mysqli_query($this->conn,"UPDATE zoom_oauth SET provider_value = '$token' WHERE provider = 'zoom'");
        }
    }
}