<?php
require_once './config.php';
class OrdersModel{
    private $db;

    public function __construct(){
        $this->db = new PDO(
            "mysql:host=".MYSQL_HOST .
            ";dbname=".MYSQL_DB.";charset=utf8", 
            MYSQL_USER, MYSQL_PASS);
        //$this->_deploy();    
            
    }
    public function getOrders(){
        $query = $this->db->prepare("SELECT * FROM orders");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }
    public function getOrder($id){
        $query = $this->db->prepare("SELECT * FROM orders WHERE id = ?");
        $result = $query->execute([$id]);
        return $query->fetch(PDO::FETCH_OBJ);
    }
    public function checkIDExists($id){
        $query = $this->db->prepare("SELECT * FROM orders WHERE id = ?");
        $result = $query->execute([$id]);
        return $query->fetchColumn() > 0;
    }







    // private function _deploy() {
    //     $query = $this->db->query("SHOW TABLES LIKE 'pedido'");
    //     $tables = $query->fetchAll();
    //     if(count($tables) == 0) {
    //         $sql =<<<SQL
    //         CREATE TABLE `orders` (
    //         `id` int(11) NOT NULL,
    //         `id_product` int(11) DEFAULT NULL,
    //         `cant_products` int(11) DEFAULT NULL,
    //         `total` int(100) NOT NULL,
    //         `date` date DEFAULT NULL
    //         ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
    //         ALTER TABLE `orders`
    //         ADD PRIMARY KEY (`id`),
    //         ADD KEY `id` (`id_product`);
    //         SQL;
            
    //     $this->db->query($sql);
    //     }
    // }
}

