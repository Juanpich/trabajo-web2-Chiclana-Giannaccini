<?php
require_once './app/model/products.model.php';
require_once './app/view/products.view.php';
require_once './app/controller/error.controller.php';

class ProductsController
{
    private $view;
    private $model;
    private $error;

    public function __construct()
    {
        $this->view = new ProductsView();
        $this->model = new ProductsModel();
        $this->error = new ErrorControler();
    }

    public function showCategories()
    {
        $products = $this->model->getProducts();
        $this->view->showProducts($products);
    }

    public function viewItemByCategories($id_product)
    {
        $productExists = $this->model->checkIDExists($id_product);
        if (!$productExists) {
            $error = "Esta categoría no existe";
            $redir = 'categorias';
            $this->error->showError($error, $redir);
        } else {
            $orders = $this->model->getOrdersByProductId($id_product);
            $product = $this->model->getProduct($id_product);
            if (count($orders) === 0) {
                $error = "No hay órdenes para este producto";
                $redir = "categorias";
                $this->error->showError($error, $redir);
            } else {
                $this->view->showOrdersById($orders, $product);
            }
        }
    }
    //ABM //CREAR CAMPO image_product en la bd (varchar 120)
    public function ProductsABM()
    {
        $products = $this->model->getProducts();
        $this->view->seeABMProducts($products);
    }

    public function addProduct()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') { //si se envia el formulario se procesa
            $productData = $this->getValidatedProductData();
            if (!$productData) {
                $error = "Error: completar todos los campos";
                $redir = "nuevoProducto";
                $this->error->showError($error, $redir);
            } else {
                 // Procesar la imagen
            $image_name = $_FILES['image_product']['name'];
            $temporal = $_FILES['image_product']['tmp_name'];  
            $file = './img';  // Directorio donde guardar las imágenes
            $image_product = $file . '/' . $image_name;  // Ruta completa de la imagen

            // Mover la imagen al directorio de destino
            if (move_uploaded_file($temporal, $image_product)) {
                // Si la imagen se sube correctamente, inserto el producto con la imagen
                $id = $this->model->insertProduct($productData['name'], $productData['price'], $productData['description'],$image_product);
                header("Location: " . BASE_URL . "controlarProductos");
                exit();
            } else {
                $error = "Error al subir la imagen";
                $redir = "nuevoProducto";
                $this->error->showError($error, $redir);
            }
        }
    } else {
        $this->view->addProduct();
    }
}


    public function deleteProduct($id)
    {
        $product = $this->model->getProduct($id);
        if (!$product) {
            $error = "No existe el rpoducto con el id=$id";
            $redir = "controlarProductos";
            $this->error->showError($error, $redir);
        }
        $this->model->eraseProduct($id); //agregar mensaje de info. eliminado con exito
        header("Location: " . BASE_URL . "controlarProductos");
    }

    //funcion para reutlizar el fomrulario
    public function updateProduct($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $product = $this->model->getProduct($id);
            if (!$product) {
                $error = "No existe el producto con el id=$id";
                $redir = "controlarProductos";
                $this->error->showError($error, $redir);
                return;
            }
            $this->view->showProductForm($product, true);

            //si envio el formulario
        } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $productData = $this->getValidatedProductData();
            if (!$productData) {
                $error = "Error: completar todos los campos";
                $redir = "controlarProductos";
                $this->error->showError($error, $redir);
            } else {
                // Obtener el producto existente
                $product = $this->model->getProduct($id);
    
                // Procesar la imagen solo si se ha subido una nueva
                if (!empty($_FILES['image_product']['name'])) {
                    $image_name = $_FILES['image_product']['name'];
                    $temporal = $_FILES['image_product']['tmp_name'];
                    $file = './img';  
                    $image_product = $file . '/' . $image_name;  // Ruta completa de la imagen
    
                    // Mover el archivo subido al directorio de imágenes
                    if (move_uploaded_file($temporal, $image_product)) {
                        // Si la imagen fue subida correctamente, actualizar la base de datos con la nueva ruta
                        $productData['image_product'] = $image_product;
                    } else {
                        // Si hubo un error al mover el archivo, mostrar un mensaje de error
                        $error = "Error al subir la nueva imagen.";
                        $redir = "controlarProductos";
                        $this->error->showError($error, $redir);
                        return;
                    }
                } else {
                    // Mantener la imagen anterior si no se sube una nueva
                    $productData['image_product'] = $product->image_product;
                }
    
                // Actualizar el producto en la base de datos (incluyendo la imagen)
                $this->model->updateProduct($id, $productData['name'], $productData['price'], $productData['description'], $productData['image_product']);
    
                // Redirigir a la página de control de productos
                header("Location: " . BASE_URL . "controlarProductos");
                exit();
            }
        }
    }
    
        

    private function getValidatedProductData()
    {
        if (
            !isset($_POST['name']) || empty($_POST['name']) ||
            !isset($_POST['price']) || empty($_POST['price']) ||
            !isset($_POST['description']) || empty($_POST['description'])
        ) {
            return false;
        }
        return [
            'name' => $_POST['name'],
            'price' => $_POST['price'],
            'description' => $_POST['description']
        ];
    }
    /*
    public function showSelectABMProducts() {
        // Verifica si se ha enviado la operación
        if (!isset($_POST['operation']) || empty($_POST['operation'])) {
            $error = "Seleccione una opción";
            $redir = "controlarProducto";
            $controller = new ErrorControler();
            $controller->showError($error, $redir);
            return;
        }
$action = $_POST['operation'];
    switch ($action) {
        case 'nuevoProducto':
            $this->addProduct(); 
            break;

        case 'modificarProducto':
            $this->updateProduct(); 
            break;

        case 'delete':
            $this->eliminarProduct(); 
            break;

        default:
            $error = "Operación no válida";
            $redir = "controlarProducto";
            $controller = new ErrorControler();
            $controller->showError($error, $redir);
            break;    
    }  
    }*/
}
