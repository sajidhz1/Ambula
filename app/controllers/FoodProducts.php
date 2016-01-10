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
        if($_GET["productId"] != null){
			$this->view('foodproducts/view_single_product');
		}else{
			Header("Location:/");
		}

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


	//To Display the details about single product
	public function viewSingleProduct()
	{
		return $this->products->viewSingleProduct();
	}

	//To Display other products by the owner of single product
	public function singleProductsOwnersOtherProducts()
	{
		return $this->products->singleProductsOwnersOtherProducts();
	}

	//to display related recipes of a single product
	public function relatedRecipesOfSingleProduct()
	{
		return $this->products->relatedRecipesOfSingleProduct();
	}

	//to display similar products to the single product
	public function similarProductsToSingleProduct()
	{
		return $this->products->similarProductsToSingleProduct();
	}
    
    //grocery main view
    public function  getAllCooperateProfiles(){
        return  $this->products->getAllCooperateProfiles();
    }
} 

