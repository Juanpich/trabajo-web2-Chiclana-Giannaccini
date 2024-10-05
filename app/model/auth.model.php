<?php
class UserModel {
    private $db;

    public function __construct() {
       $this->db = $this->db = new PDO(
        "mysql:host=".MYSQL_HOST .
        ";dbname=".MYSQL_DB.";charset=utf8", 
        MYSQL_USER, MYSQL_PASS);
    }
 
    public function getUserByUserNsme($userName) {    
        $query = $this->db->prepare("SELECT * FROM user WHERE userName = ?");
        $query->execute([$userName]);
    
        $user = $query->fetch(PDO::FETCH_OBJ);
    
        return $user;
    }
}