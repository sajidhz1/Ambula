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
        $this->view('foodproducts/new_product');
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
} 