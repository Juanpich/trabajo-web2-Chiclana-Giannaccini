<?php
require_once './config.php';
class ProductsModel
{
    private $db;

    public function __construct(){
        $this->db = new PDO(
            "mysql:host=" . MYSQL_HOST .
                ";dbname=" . MYSQL_DB . ";charset=utf8",
            MYSQL_USER,
            MYSQL_PASS
        );
        //$this->_deploy();    

    }
    public function getProducts() {
        $query = $this->db->prepare("SELECT * FROM product");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }
    
    public function getProduct($id) {
        $query = $this->db->prepare("SELECT * FROM product WHERE id = ?");
        $result = $query->execute([$id]);
        return $query->fetch(PDO::FETCH_OBJ);
    }

    //ESTA FUNCION NO LA USO
    public function checkIDExists($id){
        $query = $this->db->prepare("SELECT * FROM product WHERE id = ?");
        $result = $query->execute([$id]);
        return $query->fetchColumn() > 0;
    }

    public function getOrdersByProductId($id_product){
        $query = $this->db->prepare('SELECT * FROM orders WHERE id_product = ?');
        $query->execute([$id_product]);
        $orders = $query->fetchAll(PDO::FETCH_OBJ);
        return $orders;
    }
    // private function _deploy() {
    //     $query = $this->db->query("SHOW TABLES LIKE 'product'");
    //     $tables = $query->fetchAll();
    //     if(count($tables) == 0) {
    //         $sql =<<<SQL
    //         CREATE TABLE `product` (
    //         `id` int(11) NOT NULL,
    //         `name` varchar(100) DEFAULT NULL,
    //         `price` double DEFAULT NULL,
    //         `description` varchar(150) DEFAULT NULL
    //         ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
    //         ALTER TABLE `product`
    //         ADD PRIMARY KEY (`id`);
    //         SQL;
    //     $this->db->query($sql);
    //     }
}
