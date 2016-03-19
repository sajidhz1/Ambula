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
		$singleProdImg = "";

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

    //number of products each product category has
    public function getProductCountofCategories(){

        return $this->products->getProductCountofCategories();

    }

    //get all the products of a category
	public function getAllProductsOfSingleCategory($catType){

		return $this->products->getAllProductsOfSingleCategory($catType);

	}

    //check whether user has a review for a product
    public function checkUserReviewAvailability(){

		$result = json_decode($this->products->checkUserReviewAvailability());
		if(!empty($result)){
			return true;
		}else{
			return false;
		}


    }

	//Inserting the product review for a product by a user
	public function addProductReview(){

		if($this->products->addProductReview()){
			header('Location: /Ambula/FoodProducts/product?productId='.Session::get('productId'));
		}else{
			$this->view('_template/error', "Error");
		}

	}

    //Displaying all the reviews there are for a single product
    public function viewReviewForSingleProduct(){

        return $this->products->viewReviewForSingleProduct();

    }

    //Displaying the review by the logged in user to edit it
    public function viewReviewFromAUserForProduct(){

        return $this->products->viewReviewFromAUserForProduct();

    }

    //Updating the product review by the logged in user
    public function updateUserReview($reviewId=""){

        if($this->products->updateUserReview($reviewId)){
            header('Location: /Ambula/FoodProducts/product?productId='.Session::get('productId'));
        }else{
            $this->view('_template/error', "Error");
        }
    }
} 


