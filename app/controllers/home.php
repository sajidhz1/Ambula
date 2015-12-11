<?php 

class Home extends Controller{

	protected $user;
    public $recipe;
    public $search;
    public $category;

    function __construct(){
        parent::__construct();
        $this->user = $this->model('HomeModel');

    }

  public function index($name =''){

     // $this->user->checkLogin();
	$this->view('index',[]);

  }
  public function search(){

      $this->search = $_GET['query'];
     $this->view('search');

  }

  public function searchRecipes($query='',$filter ='',$number=''){

       $this->user->searchRecipes($query,$filter,$number);
  }
    //categories without parameters
  public function categories(){
      $this->view('home/categories');
  }
    //view for category
  public function category($category=''){
      $this->category = $category;
      if(isset($_GET['id']) && !isset($_GET['sid']))
      $this->view('home/category');

      if(isset($_GET['id']) && isset($_GET['sid']))
      $this->view('home/subcategory');


  }

    //getsubcategory Array
  public function getSubCategoryArray(){
        return $this->user->getSubcategoryArray();
  }

  //getsubcategory Arrayby id
  public function getSubCategoriesByID($id='',$limit=''){
        return $this->user->getSubCategoriesByID($id,$limit);
  }

    public function viewCategories($limit='')
    {
      return  $this->user->viewCategories($limit);
    }

  public function getImageUrl($idrecipe='')
  {
        return $this->user->getImageUrl($idrecipe);
  }

    public function getRecipesArray($idCategory =''){
        return $this->user->getRecipesArray($idCategory);
    }

    public function viewRecent(){
        return $this->user->viewRecent();
    }

    //profile functions
    public function profile(){
        if($_GET['id']!=null)
        $this->view('profile');
        else
            Header('Location:/');
    }

    //profile function
    public function getUser(){
        return $this->user->getUser($_GET['id']);
    }

    public function getRecipesByUser($userId=''){
        return $this->user->getRecipesByUser($userId);
    }
        //subcategory view
    public function getRecipesByCategory($category=''){
        return $this->user->getRecipesByCategory($category);
    }

    // get added user
    public function getRecipeBy($recipeId=''){
        return $this->user->getRecipeBy($recipeId);
    }

    public function error_page(){
        $this->view('_template/error');
    }
    
    
    public function contact(){
        $this->view('contact');
    }


    public function promotions(){
        $this->view('promotions/viewPromotions');
    }
    
     public function uploadUserPhoto(){
        $this->user->uploadUserPhoto();
    }
    
     public function addUserDescription(){
        $this->user->addUserDescription($_POST['val']);
    }

}


?>