<?php
class UserModel {
    private $db;

    public function __construct() {
       $this->db = $this->db = new PDO(
        "mysql:host=".MYSQL_HOST .
        ";dbname=".MYSQL_DB.";charset=utf8", 
        MYSQL_USER, MYSQL_PASS);
        $this->_deploy(); 
    }
 
    public function getUserByUserNsme($user_name) {    
        $query = $this->db->prepare("SELECT * FROM user WHERE user_name = ?");
        $query->execute([$user_name]);
    
        $user = $query->fetch(PDO::FETCH_OBJ);
    
        return $user;
    }
    private function _deploy() {
        $query = $this->db->query("SHOW TABLES LIKE 'user'");
        $tables = $query->fetchAll();
        if (count($tables) == 0) {
            $sql =<<<SQL
            CREATE TABLE `user` (
              `id` int(11) NOT NULL AUTO_INCREMENT,
              `user_name` varchar(250) NOT NULL,
              `password` char(60) NOT NULL,
              PRIMARY KEY (`id`),
              UNIQUE KEY `userName` (`user_name`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
            SQL;
            $this->db->query($sql);
            $insertSql = "INSERT INTO user (user_name, password) VALUES (?, ?)";
            $this->db->prepare($insertSql)->execute(['webadmin', '$2y$10$XIxf3cEkb65J2zsFlL32meabNayi2sqgXgzyiAwPujiSk.0zoMnta']);
        }
    }
    
    
}