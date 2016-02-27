<?php

/**
 * Created by PhpStorm.
 * User: sajidhz
 * Date: 1/16/2015
 * Time: 7:54 PM
 */
class recipes extends Controller
{

    protected $recipes;

    public function __construct()
    {
        parent::__construct();
        $this->recipes = $this->model('Recipe');

    }

    public function index($name = '')
    {

    }

    public function newRecipe()
    {
        if (isset($_SESSION["uid"]) || isset($_SESSION["fbid"])) {
            if (isset($_GET['lang']) == 'si' && isset($_GET['r']))
                $this->view('Recipes/newrecipe_si');
            else
                $this->view('Recipes/new_recipe_updated');
        } else {
            Header('Location:Ambula/login/');
        }
    }

    //add sinhala translation
    public function addRecipeSi()
    {
        $this->recipes->addRecipeSi();
        //Header('Location:/Ambula/recipes/viewRecipe/'.$_POST['idrecipe']);
    }

    //view sinhala view
    public function viewRecipe_si()
    {
        if (isset($_GET['r']))
            $this->view('Recipes/viewrecipe_si');

    }

    //get sinhala translation from the database
    public function getRecipe_si()
    {
        return $this->recipes->getRecipe_si();
    }

    //check sinhala recipe available in database
    public function checkRecipe_si($r = '')
    {
        return $this->recipes->checkRecipe_si($r);
    }


    public function getName($name = '')
    {
        $this->recipes->getNames($name);
    }

    public function addNewRecipe()
    {

        echo $this->recipes->addNewRecipe();

    }

    public function viewRecipe($recipeId = '')
    {

        if (!$this->recipes->checkRecipeAvailability($recipeId))
            header('location: /');

        $this->recipes->viewRecipe($recipeId);
        $this->view('Recipes/recipe');

    }

    public function checkRecipeTitle()
    {
        $this->recipes->checkRecipeTitle();
    }

    public function getCategoriesArray()
    {
        return $this->recipes->getCategoriesArray();
    }

    public function getSubCategoriesArray($i = '')
    {
        $this->recipes->getSubCategoriesArray($i);
    }

    public function getRecipeIngredients($recipeId = '')
    {
        return $this->recipes->getRecipeIngredients($recipeId);
    }

    public function getRecipeImages($recipeId = '')
    {
        return $this->recipes->getRecipeImages($recipeId);
    }

    public function getRecipeDescription($recipeId = '')
    {
        return $this->recipes->getRecipeDescription($recipeId);
    }

    public function getRecipeAddedBy($recipeId = '')
    {
        return $this->recipes->getRecipeAddedBy($recipeId);
    }

    //adding new rating
    public function addRating($rid)
    {
        $this->recipes->addRating(Session::get('uid'), intval($_POST['val']), $rid);
    }

    public function updateRecipe()
    {
        $this->view('Recipes/updateRecipe');
    }

    public function getRecipe($recipeId = '')
    {
        return $this->recipes->getRecipe($recipeId);
    }

    public function recipeSuccess()
    {
        if (isset($_GET['id']))
            $this->view('Recipes/recipe_success');
    }

    public function newRecipeupdated()
    {
        if(isset($_GET['lang']) && $_GET['lang']='si')
        $this->view('Recipes/new_recipe_updated_si');
        else
        $this->view('Recipes/new_recipe_updated');
    }

    public function getIngredientBrands($ingId = '')
    {
        return $this->recipes->getIngredientBrands($ingId);
    }

    public function updateRecipeBrands()
    {

        if ($this->recipes->updateRecipeBrands() && isset($_GET['recipe'])) {

            Header('Location:/recipes/viewRecipe/' . $_GET['recipe']);
        }
    }

    public function getUserComments($rid)
    {
        return $this->recipes->getUserComments($rid);
    }

    public function addComment($rid)
    {
        $this->recipes->addComment(Session::get('uid'), $_POST['text'], $rid);
    }

    public function updateRecipeTitle()
    {
        $this->recipes->updateRecipeTitle();
    }

    public function updateRecipeTime()
    {
        $this->recipes->updateRecipeTime();
    }

    public function updateRecipeTags()
    {
        $this->recipes->updateRecipeTags();
    }

    public function updateRecipeCategory()
    {
        $this->recipes->updateRecipeCategory();
    }

    public function addNewIngredients()
    {
        $this->recipes->addNewIngredients();
    }

    public function  deleteRecipeIngredient()
    {
        $this->recipes->deleteRecipeIngredient();
    }

    public function  addNewDescription()
    {
        $this->recipes->addNewDescription();
    }

    public function deleteRecipeDescription()
    {
        $this->recipes->deleteRecipeDescription();
    }

    //updated view

    public function testDropZone()
    {
        return $this->recipes->testDropZone();
    }

    public function showImages()
    {
        return $this->recipes->showImages();
    }

    public function deleteRecipeImage($name = '')
    {
        echo $this->recipes->deleteRecipeImage($name = '');
    }

    public function getIngredientSuggestions()
    {

        $this->recipes->getIngredientSuggestions();
    }

    /////////////////////////////////////////////////////////////////////////////////////////////////////////
    ///////////////The Admin Only method for permanently deleting a recipe from the database/////////////////

    public function viewRecipeDelete()
    {
        $this->view("Recipes/recipeTotalDelete");
    }

    /////////////////////////////The method for searching recipes to delete//////////////////////////////////
    public function adminRecipeSearch()
    {
        $searchText = $_POST["searchText"];
        $searchCate = $_POST["searchCate"];
        $searchParam= $_POST["searchParam"];
        echo $this->recipes->adminRecipeSearch($searchText, $searchCate, $searchParam);
    }

    ///////////////////////////////The method to delete a recipe record from db///////////////////////////////
    public function adminRecipeDelete()
    {
        if(isset($_SESSION['user_logged_in'])){
            if(isset($_SESSION['user_account_type']) && $_SESSION['user_account_type']== 3){
                if($_SESSION['user_email']=="sajidhzazahir@gmail.com" || $_SESSION['user_email']== "dulitha.ruvin@gmail.com"){
                    $id = $_POST['deleteRecipeId'];
                    if($this->recipes->adminRecipeDelete($id)){
                        Session::set('recipeDeleted',true);
                        Header('Location:/Ambula/recipes/viewRecipeDelete');
                    }else{
                        Session::set('recipeDeleted',false);
                        Header('Location:/Ambula/recipes/viewRecipeDelete');
                    }
                }
            }
        }else{
            Header('Location:/Ambula/login/');
        }

    }

}
