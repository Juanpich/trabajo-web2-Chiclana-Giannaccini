<?php
class UserModel {
    private $db;

    public function __construct() {
       $this->db = $this->db = new PDO(
        "mysql:host=".MYSQL_HOST .
        ";dbname=".MYSQL_DB.";charset=utf8", 
        MYSQL_USER, MYSQL_PASS);
    }
 
    public function getUserByUserNsme($user_name) {    
        $query = $this->db->prepare("SELECT * FROM user WHERE user_name = ?");
        $query->execute([$user_name]);
    
        $user = $query->fetch(PDO::FETCH_OBJ);
    
        return $user;
    }
}