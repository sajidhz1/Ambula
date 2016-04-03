<?php

/**
 * Created by PhpStorm.
 * User: Sajidh
 * Date: 1/6/2015
 * Time: 4:17 AM
 */
class HomeModel
{


    public function __construct(DataBase $db)
    {
        $this->db = $db;
    }


    public function checkLogin()
    {


        if (isset($_SESSION["username"])) {

        }

    }


    /* Categories */
    public function viewCategories($limit = '')
    {

        if ($limit != NULL)
            $array = $this->db->query("SELECT idCategory,title,thumb_url from recipe_category LIMIT " . $limit)->fetchAll(PDO::FETCH_ASSOC);
        else
            $array = $this->db->query("SELECT idCategory,title,thumb_url from recipe_category")->fetchAll(PDO::FETCH_ASSOC);

        return json_encode($array);
    }

    //return subcategory array (get method)
    public function getSubCategoryArray()
    {

        $array = $this->db->query("SELECT idRecipe_sub_category,title,img_url from recipe_sub_category WHERE Recipe_Category_idCategory = " . $_GET['id'])->fetchAll(PDO::FETCH_ASSOC);
        return json_encode($array);

    }

    //return subcategoryByID
    public function getSubCategoriesByID($id = '', $limit = '')
    {

        if ($limit == NULL)
            $array = $this->db->query("SELECT idRecipe_sub_category,title,img_url from recipe_sub_category WHERE Recipe_Category_idCategory =" . $id)->fetchAll(PDO::FETCH_ASSOC);
        else
            $array = $this->db->query("SELECT idRecipe_sub_category,title,img_url from recipe_sub_category WHERE Recipe_Category_idCategory = " . $id . " LIMIT " . $limit)->fetchAll(PDO::FETCH_ASSOC);

        return json_encode($array);

    }

    //recently added recipes
    public function viewRecent()
    {
        $array = $this->db->query("SELECT  ri.* , r.*
                                    FROM recipes r JOIN recipe_img ri
                                      ON r.idRecipe = ri.Recipe_idRecipe GROUP BY r.idRecipe ORDER BY r.idRecipe DESC LIMIT 11")->fetchAll(PDO::FETCH_ASSOC);
        return json_encode($array);
    }

    //getrecipe thumbnailUrl
    public function getImageUrl($idrecipe = '')
    {
        $dat = $this->db->query("SELECT image_url FROM recipe_img WHERE Recipe_idRecipe = 23 LIMIT 1")->fetch(PDO::FETCH_ASSOC);
        return $dat['image_url'];
    }

    //get recipe array
    public function getRecipesArray($idCategory = '')
    {

        $array = $this->db->query("SELECT idRecipe,title FROM recipes WHERE category_id=" . $idCategory . " AND verified = 1 ORDER BY idRecipe DESC LIMIT 5")->fetchAll(PDO::FETCH_ASSOC);
        return json_encode($array);
    }

    //search for recipes
    public function searchRecipes($q = '', $f = '')
    {

        $items_per_page = 9;
        $page_number = 1;
        $f = '';
        $recipe = array();
        $count = 0;

        $div = '<div class="col-lg-4 recipe-item" style="height:250px;" >';
        $br = '<br>';
        $img = $time = $title = $tags = $pagination = '';
        $result_html = '';

        if (isset($_POST['page']))
            $page_number = $_POST['page'];

        if (isset($_POST['filter'])) {
            $f = $_POST['filter'];
        }

        $pageposition = ($page_number - 1) * $items_per_page;

        if ($f == NULL) {
            $sql = "SELECT idRecipe,title,tags,users_user_id FROM recipes WHERE title LIKE :title LIMIT $pageposition ,$items_per_page ";

            $query = $this->db->prepare($sql);
            $query->execute(array(':title' => '%' . $q . '%'));

            //get the count for pagination
            $countq = $this->db->prepare("SELECT idRecipe FROM recipes WHERE title LIKE :title");
            $countq->execute(array(':title' => '%' . $q . '%'));
            $count = $countq->rowCount();

        } else {
            $sql = "SELECT idRecipe,title,tags,users_user_id FROM recipes WHERE title LIKE :title AND filters LIKE :filter LIMIT $pageposition ,$items_per_page";

            $query = $this->db->prepare($sql);
            $query->execute(array(':title' => '%' . $q . '%',
                ':filter' => '%' . $f . '%'));
            //count for pagination
            $countq = $this->db->prepare("SELECT idRecipe FROM recipes WHERE title LIKE :title AND filters LIKE :filter");
            $countq->execute(array(':title' => '%' . $q . '%',
                ':filter' => '%' . $f . '%'));
            $count = $countq->rowCount();
        }

        while ($recipeRow = $query->fetch(PDO::FETCH_ASSOC)) {

            $sth = "SELECT image_url,Recipe_idRecipe FROM recipe_img WHERE Recipe_idRecipe = :Recipe_idRecipe LIMIT 1";

            $result = $this->db->prepare($sth);
            $result->execute(array(':Recipe_idRecipe' => $recipeRow['idRecipe']));

            $r = $result->fetch();
            $img = ' <img class="center-block" src="/Ambula/uploads/' . $recipeRow['idRecipe'] . '/thumb.jpg" height="125" width="125">';
            $title = '<a href="/Ambula/recipes/viewRecipe/' . $recipeRow['idRecipe'] . '">' . $img . '<h4 style ="text-align:center;">' . $recipeRow['title'] . '</h4></a>';

            $result_html .= $div . $br . '<div class="tile tile-wide" style="height: 150px;">' . $br . $title . $br . $br . '</div></div>';


        }

        $pagination = '<div class=" col-lg-12">
                        <div class=" col-lg-offset-4">
                    <ul class="pagination pagination-lg">';

        $offset = 0;
        if (($count % $items_per_page) > 0) {
            $offset = ($count / $items_per_page) + 1;
        } else {
            $offset = ($count / $items_per_page);
        }

        for ($i = 1; $i <= $offset; $i++) {
            if ($i == $page_number)
                $pagination .= '<li><a href="#" class="active">' . $i . '</a></li>';
            else
                $pagination .= '<li><a href="#" >' . $i . '</a></li>';
        }
        $pagination .= '</ul></div></div>';
        $result_html .= $pagination;

        echo $result_html;
    }

    //user profile
    public function getRecipesByUser($user_name = '')
    {
        $array = $this->db->query("SELECT idRecipe,title,views,rating
                                    FROM recipes ,users  WHERE users_user_id = user_id AND user_name = '$user_name'")->fetchAll(PDO::FETCH_ASSOC);
        return json_encode($array);
    }

    //subcategory view
    public function getRecipesByCategory($category = '')
    {

        $array = $this->db->query("SELECT  ri.* , r.*
                                    FROM recipes r JOIN recipe_img ri
                                      ON r.idRecipe = ri.Recipe_idRecipe AND r.category_id =" . $category . " AND r.verified = 1 GROUP BY r.idRecipe")->fetchAll(PDO::FETCH_ASSOC);
        return json_encode($array);
    }

    //categories user
    public function getRecipeBy($recipeId = '')
    {
        $sql = "SELECT user_personal.first_name, user_personal.last_name,user_personal.users_user_id
                                   FROM user_personal INNER JOIN  recipes
                                   WHERE recipes.idRecipe =" . $recipeId . "
                                   AND user_personal.users_user_id = recipes.users_user_id";
        $sth = $this->db->prepare($sql);
        $sth->execute();
        $result = $sth->fetch();
        return $result;
    }

    public function getUser($user_name = '')
    {


        $sth_a = $this->db->query("SELECT * FROM users ,user_personal WHERE users_user_id = user_id AND user_name = '$user_name'")->fetch(PDO::FETCH_ASSOC);


        return json_encode($sth_a);

    }

    //upload user photo
    public function uploadUserPhoto()
    {

        $target_dir = "uploads/profile/";
        $target_file = $target_dir . basename($_FILES["profile"]["name"]);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
        if (isset($_POST["submit"])) {
            $check = getimagesize($_FILES["profile"]["tmp_name"]);
            if ($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        }
// Check if file already exists
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }
// Check file size
        if ($_FILES["profile"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }
// Allow certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif"
        ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
// Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            return false;
// if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["profile"]["tmp_name"], $target_dir . $_GET['username'] . '.' . $imageFileType)) {

                $sql = "UPDATE users SET user_avatar = 1 WHERE user_id =" . $_GET['user_id'];
                $sth = $this->db->prepare($sql);

                $sth->execute();
                Session::set('user_avatar', 1);

                return true;
            } else {
                return false;
            }
        }
    }

    public function addUserDescription($val = '')
    {

        $sql = "UPDATE user_personal SET  description = '$val' WHERE users_user_id = " . $_POST['uid'];
        $sth = $this->db->prepare($sql);

        $sth->execute();

        echo "okay" . $val . $_POST['uid'];
    }

    public function  getCooperateUserDetails($user_name = '')
    {
        $array = $this->db->query("SELECT commercial_user.*  FROM users, commercial_user WHERE users.user_id = commercial_user.users_user_id AND users.user_name = '$user_name'")->fetch();
        return json_encode($array);
    }

    public function viewUserProducts($cooperate_user_id = '')
    {

        $result = $this->db->query("SELECT * FROM products , product_categories WHERE Product_categories_id_product_categories = id_product_categories AND commercial_user_idcommercial_user = " . $cooperate_user_id)->fetchAll(PDO::FETCH_ASSOC);

        return json_encode($result);

    }

    public function checkUserExistAndGetType($user_name = '')
    {
        $result = $this->db->query("SELECT user_account_type FROM users WHERE user_name = '$user_name'")->fetch();
        return $result;
    }

    public function searchResults()
    {
        $q = $_GET['q'];
        $sql = "SELECT * ";

        if (isset($_GET['type'])) {


            if ($_GET['type'] == 'recipes') {

                $sql .= 'FROM recipes ';

                if (isset($_GET['category'])) {
                    $category = $_GET['category'];
                    $sql .= ", recipe_category WHERE idCategory = category_id AND recipe_category.title ='$category' AND recipes.title LIKE '%$q%'";
                } else {

                    $sql .= "WHERE recipes.title LIKE '%$q%'";
                }

            } else if ($_GET['type'] == 'recipes') {

            }
        } else {
            $sql .= " FROM recipes WHERE recipes.title LIKE '%$q%'";
        }


        $result = $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);

        return json_encode($result);
    }


    public function getAllPromotionsByUser($user_name = "")
    {

        $sql = $this->db->query("SELECT promotion.*,users.user_name  FROM users,promotion WHERE users_user_id = users.user_id AND user_name ='$user_name'")->fetchAll(PDO::FETCH_ASSOC);

        return json_encode($sql);
    }

    public function getAllRecipesByUser($user_name = "")
    {

        $sql = $this->db->query("SELECT recipes.*,users.user_name  FROM users,recipes WHERE users_user_id = users.user_id AND user_name ='$user_name'")->fetchAll(PDO::FETCH_ASSOC);

        return json_encode($sql);
    }

    public function getCategoriesByUser($cooperate_user_id = "")
    {
        $sql = $this->db->query("SELECT title from cooperate_user_has_product_categories , product_categories
                                WHERE cooperate_user_has_product_categories.Product_categories_id_product_categories = product_categories.id_product_categories
                                   AND cooperate_user_has_product_categories.cooperate_user_id = $cooperate_user_id")->fetchAll(PDO::FETCH_ASSOC);


        return json_encode($sql);
    }


} 