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
        if(isset($_GET['cat']))
            $this->view('foodproducts/product_category');
        else
            $this->view('foodproducts/grocery_main');
    }

    public function allProducts(){
        $this->view('foodproducts/all_products');
    }

    //shows single product
    public function product(){
        $this->view('foodproducts/view_single_product');
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

    public function viewProducts($limit =''){
        return $this->products->viewProducts($limit);
    }


    public function viewAllProducts(){
        return $this->products->viewAllProducts();
    }

    //show filter category list
    public function loadCategories(){
        return $this->products->loadCategories();
    }

    //grocery main view
    public function  getAllCooperateProfiles(){
        return  $this->products->getAllCooperateProfiles();
    }
} 