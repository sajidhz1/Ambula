<?php

class Home extends Controller
{

    protected $user;
    public $recipe;
    public $search;
    public $category;
    public $user_name;
    protected $foodProducts;

    function __construct()
    {
        parent::__construct();
        $this->user = $this->model('HomeModel');

    }

    public function index($name = '')
    {

        // $this->user->checkLogin();
        $this->view('index', []);

    }
    public function search()
    {
        $this->search = $_GET['q'];
        $this->view('search');
    }

    public function searchRecipes($query = '', $filter = '', $number = '')
    {
        $this->user->searchRecipes($query, $filter, $number);
    }

    //categories without parameters
    public function categories()
    {
        $this->view('home/categories');
    }

    //view for category
    public function category($category = '')
    {
        $this->category = $category;
        if (isset($_GET['id']) && !isset($_GET['sid']))
            $this->view('home/category');

        if (isset($_GET['id']) && isset($_GET['sid']))
            $this->view('home/subcategory');


    }

    //getsubcategory Array
    public function getSubCategoryArray()
    {
        return $this->user->getSubcategoryArray();
    }

    //getsubcategory Arrayby id
    public function getSubCategoriesByID($id = '', $limit = '')
    {
        return $this->user->getSubCategoriesByID($id, $limit);
    }

    public function viewCategories($limit = '')
    {
        return $this->user->viewCategories($limit);
    }

    public function getImageUrl($idrecipe = '')
    {
        return $this->user->getImageUrl($idrecipe);
    }

    public function getRecipesArray($idCategory = '')
    {
        return $this->user->getRecipesArray($idCategory);
    }

    public function viewRecent()
    {
        return $this->user->viewRecent();
    }

    //profile functions

    public function profile($user ='')
    {
        if(isset($_SESSION["user_logged_in"]) && $_SESSION["user_logged_in"]==true && isset($_SESSION["username"]) && $_SESSION["username"] == $user){
            if ($this->user->checkUserExistAndGetType($user) != '') {
                if ($this->user->checkUserExistAndGetType($user)->user_account_type == 1) {
                    $this->user_name = $user;
                    $this->view('user_profile/normal_user_profile');
                }else if($this->user->checkUserExistAndGetType($user)->user_account_type == 3){
                    $this->user_name = $user;
                    $this->view('user_profile/normal_user_profile');
                } else if ($this->user->checkUserExistAndGetType($user)->user_account_type == 2) {
                    $this->user_name = $user;
                    $this->view('user_profile/cooperate_user_updated');
                }
            } else {
                $this->view('_template/error');
            }
        }else{
            Header('Location:/Ambula/login/');
        }

    }

    //profile function
    public function getUser()
    {
        return $this->user->getUser($this->user_name);
    }

    public function getRecipesByUser($userId = '')
    {
        return $this->user->getRecipesByUser($userId);
    }

    //subcategory view
    public function getRecipesByCategory($category = '')
    {
        return $this->user->getRecipesByCategory($category);
    }

    // get added user
    public function getRecipeBy($recipeId = '')
    {
        return $this->user->getRecipeBy($recipeId);
    }

    public function error_page()
    {
        $this->view('_template/error');
    }


    public function contact()
    {
        $this->view('contact');
    }


    public function promotions()
    {
        $this->view('promotions/viewPromotions');
    }

    public function uploadUserPhoto()
    {
        $this->user->uploadUserPhoto();
    }

    public function addUserDescription()
    {
        $this->user->addUserDescription($_POST['val']);
    }

    public function getCooperateUserDetails()
    {
        return $this->user->getCooperateUserDetails($this->user_name);
    }

    public function viewUserProducts($uid = '')
    {
        return $this->user->viewUserProducts($uid);

    }

    public function admin()
    {
        $this->view("administration/adminProfile");
    }

    public function searchResults()
    {
        return $this->user->searchResults();
    }


    //user_profile
    public function getAllPromotionsByUser($user_name =""){
       return  $this->user->getAllPromotionsByUser($user_name);
    }

    public function getAllRecipesByUser($user_name = ""){
        return  $this->user->getAllRecipesByUser($user_name);
    }

    public function getCategoriesByUser($cooperate_user_id = ""){
        return  $this->user->getCategoriesByUser($cooperate_user_id);
    }
}


?>