<?php
/**
 * Created by PhpStorm.
 * User: sajidhz
 * Date: 12/2/2015
 * Time: 3:15 PM
 */

class FoodProducts extends Controller{

    protected $products;

    function __construct()
    {
        parent::__construct();
        $this->products = $this->model('FoodProductsModel');

    }

    public function index()
    {
        $this->view('foodproducts/products_view');
    }

    public function addNewProduct(){
     if(isset($_SESSION['user_account_type']) && $_SESSION['user_account_type']==2) {
         $this->view('foodproducts/new_product');
     }else{
         header('location:http:/Ambula/login');
     }
    }

    public function addProduct(){
        $this->products->addProduct();
    }

    public function viewUserProducts($cooperate_user_id = ''){
      return  $this->products->viewUserProducts($cooperate_user_id);
    }

    public function loadUserCategories(){
        return $this->products->loadUserCategories();
    }

    public function editProduct(){
         return $this->products->editProduct();
    }

    public function updateProduct(){
        return $this->products->updateProduct();
    }

    public function deleteProduct(){
        return $this->products->deleteProduct();
    }

    public function viewAllProducts($limit =''){
        return $this->products->viewAllProducts($limit);
    }
} 