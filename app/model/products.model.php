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
        $this->_deploy();    
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

    public function checkIDExists($id_product){
        $query = $this->db->prepare("SELECT * FROM product WHERE id = ?");
        $result = $query->execute([$id_product]);
        return $query->fetchColumn() > 0;
    }

    public function getOrdersByProductId($id_product){
        $query = $this->db->prepare('SELECT * FROM orders WHERE id_product = ?');
        $query->execute([$id_product]);
        $orders = $query->fetchAll(PDO::FETCH_OBJ);
        return $orders;
    }

    //CRUD
    public function insertProduct($name, $price, $description,$image_product){
        $query = $this->db->prepare('INSERT INTO product(name,price,description,image_product) VALUES (?, ?, ?, ?)');
        $query->execute([$name,$price, $description, $image_product]);
        $id = $this->db->lastInsertId();
        return $id;
    }

    public function eraseProduct($id){
        $query = $this->db->prepare('DELETE FROM product WHERE id = ?');
        $result = $query->execute([$id]);
        return $result;
    }

    public function updateProduct($id, $name, $price, $description, $image_product) {
        $query = $this->db->prepare('UPDATE product SET name = ?, price = ?, description = ?, image_product = ? WHERE id = ?');
        $query->execute([$name, $price, $description,$image_product,$id]);
                return true; 
     } 


    private function _deploy() {
        $query = $this->db->query("SHOW TABLES LIKE 'product'");
        $tables = $query->fetchAll();
        if (count($tables) == 0) {
            $sql =<<<SQL
             CREATE TABLE `product` (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `name` varchar(100) DEFAULT NULL,
            `price` double DEFAULT NULL,
            `description` varchar(150) DEFAULT NULL,
            `image_product` varchar(120) DEFAULT NULL,
            PRIMARY KEY (`id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
            SQL;
        $this->db->query($sql);
        $insertSql = "INSERT INTO `product` (`id`, `name`, `price`, `description`, `image_product`) VALUES
                    (1, 'Hamburguesa doble con chedar', 3000, 'Hamburguesa doble carne, con chedar, huevo, tomate, lechuga.', 'https://www.carniceriademadrid.es/wp-content/uploads/2022/09/smash-burger-que-es.jpg'),
                    (2, 'Pizza mozzarella', 3000, 'Pizza con salsa de tomate y mucha mozzarella', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTI2hdQeNVlyu20ReOpJcNwdgW0ER5hwxnauQ&amp;s'),
                    (5, 'Papas', 500, 'Papas artesanalmente recolectadas, cortadas y fritas', NULL),
                    (6, 'Picada', 6000, 'Salamin, quesos y aceitunas', NULL),
                    (7, 'Limonada', 1000, 'Jugo fresco de limones exprimidos, genjibre y azucar', 'https://cdn0.celebritax.com/sites/default/files/styles/amp/public/recetas/limonada.jpg');";
            $this->db->prepare($insertSql)->execute();
        
        }
    }
}

