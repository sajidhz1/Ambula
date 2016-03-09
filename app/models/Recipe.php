<?php


class Recipe
{

    public $recipename;
    public $recipeId;
    public $time;
    public $tag;
    public $view;
    public $ratings;
    public $lang;

    public $file_name = 1;

    public function __construct(DataBase $db)
    {
        $this->db = $db;
    }

    public function getNames($name = '')
    {

        $array = $this->db->query("SELECT title FROM recipes WHERE verified = 1")->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($array);

    }

    public function addNewRecipe()
    {

        // generate integer-timestamp for saving of account-creating date
        $user_creation_timestamp = time();

        //tags
        $tags = '';
        for ($i = 0; $i < count($_POST['tags']); $i++)
            if (isset($_POST['tags'][$i])) $tags .= $_POST['tags'][$i] . ',';

        if(!isset($_GET['lang'])) {
            $sql = "INSERT INTO recipes (title,  category_id, users_user_id, prep_time, cook_time, tags )
                VALUES (:title,  :recipe_category_idcategory, :users_user_id, :prep_time ,:cook_time, :tags)";

            $query = $this->db->prepare($sql);

            $query->execute(array(':title' => $_POST['recipetitle'],
                ':recipe_category_idcategory' => $_POST['category'],
                ':users_user_id' => Session::get('uid'),
                ':prep_time' => $_POST['prep_time'],
                ':cook_time' => $_POST['cook_time'],
                ':tags' => $_POST['tags']));

        }else{

            $sql = "INSERT INTO recipes (title,  category_id, users_user_id, prep_time, cook_time, tags ,lang )
                VALUES (:title,  :recipe_category_idcategory, :users_user_id, :prep_time ,:cook_time, :tags , :lang)";

            $query = $this->db->prepare($sql);

            $query->execute(array(':title' => $_POST['recipetitle'],
                ':recipe_category_idcategory' => $_POST['category'],
                ':users_user_id' => Session::get('uid'),
                ':prep_time' => $_POST['prep_time'],
                ':cook_time' => $_POST['cook_time'],
                ':tags' => $_POST['tags'],
                ':lang'=> 'si'));
        }

        $recipeid = $this->db->lastInsertId();

        mkdir("uploads/" . $recipeid);

        $src = "uploads/recipes/temp/".Session::get('username');
        $dst = "uploads/".$recipeid;


        if(is_dir($src))
        $this->rcopy($src, $dst);

        //store recipe img url to db
        $handle = opendir('uploads/' . $recipeid);
        while ($file = readdir($handle)) {
            if ($file !== '.' && $file !== '..' && !preg_match('/thumb/', $file)) {
                $sql = "INSERT INTO recipe_img (image_url, Recipe_idRecipe)
                VALUES (:image_url, :Recipe_idRecipe)";

                $query = $this->db->prepare($sql);
                $query->execute(array(':image_url' => 'uploads/' . $recipeid . '/' . $file,
                    ':Recipe_idRecipe' => $recipeid));
            }
        }


        //query for recipe has ingredients
        $sql2 = "INSERT INTO recipe_has_ingredients (Recipe_idRecipe, Ingredients_idIngredients, units, qty)
                VALUES (:Recipe_idRecipe, :Ingredients_idIngredients, :units, :qty)";

        //recipe compulsory image
        $this->imageUpload('recipephoto1', $recipeid, 1);
        //loop through ingredients fields
        $count = count($_POST['ingname']);

        for ($i = 0; $i < $count; $i++) {

            $ingredient = $_POST['ingname'][$i];
            $qty = $_POST['amount'][$i];
            $units = $_POST['metrics'][$i];

            if ($ingredient != null) {
                //insert to ingredient if does not exists check for language
                if(!isset($_GET['lang'])) {
                    $sql4 = "INSERT IGNORE INTO ingredients (title) VALUES ( :ingredient )";
                    $sth = $this->db->prepare($sql4);
                    $sth->execute(array(':ingredient' => $ingredient));

                    //search from ingredients to get the id
                    $ingredientSql = "SELECT idIngredients FROM ingredients WHERE title = :ingredient";
                    $sth = $this->db->prepare($ingredientSql);
                    $sth->execute(array(':ingredient' => $ingredient));

                }else{

                    $sql4 = "INSERT IGNORE INTO ingredients (ing_si) VALUES ( :ingredient )";
                    $sth = $this->db->prepare($sql4);
                    $sth->execute(array(':ingredient' => $ingredient));

                    //search from ingredients to get the id
                    $ingredientSql = "SELECT idIngredients FROM ingredients WHERE ing_si = :ingredient";
                    $sth = $this->db->prepare($ingredientSql);
                    $sth->execute(array(':ingredient' => $ingredient));
                }

                //fetch ingredient id
                $result = $sth->fetch()->idIngredients;

                //insert into recipe_has_ingredient
                $sth = $this->db->prepare($sql2);
                $sth->execute(array(':Recipe_idRecipe' => $recipeid,
                    ':Ingredients_idIngredients' => $result,
                    ':units' => $units,
                    ':qty' => $qty
                ));

            }

        }

        $sql5 = "INSERT INTO recipe_description (description_en,Recipe_idRecipe,image_url) VALUES (:description_en , :recipe_id, :dir)";


        foreach ($_POST['steps'] as $key => $tmp_name) {

            $sth = $this->db->prepare($sql5);
            $sth->execute(array(
                ':description_en' => $_POST['steps'][$key],
                ':recipe_id' => $recipeid,
                ':dir' => $_POST['des_img'][$key]
            ));
        }


        echo ":" . $recipeid . ";";
    }

    //add sinhala description
    public function addRecipeSi()
    {

        $title = $_POST['title'];
        $ingredients = '';
        $description = $_POST['description'];
        $idrecipe = $_POST['idrecipe'];

        $count = count($_POST['ingname']);

        for ($i = 0; $i < $count; $i++) {
            $ingredients .= $_POST['ingname'][$i] . "<br>";
        }


        $sql = "INSERT INTO recipe_si ( title, ingredients, description, Recipes_idRecipe ) VALUES ( :title , :ingredients , :description , :idrecipe )";
        $query = $this->db->prepare($sql);

        $query->execute(array(':title' => $title, ':ingredients' => $ingredients, ':description' => $description, ':idrecipe' => $idrecipe));
    }

    //get sinhala description from the database
    public function getRecipe_si()
    {
        $sql2 = "SELECT * FROM recipe_si WHERE Recipes_idRecipe = " . $_GET['r'];
        $array = $this->db->query($sql2)->fetchAll(PDO::FETCH_ASSOC);
        return json_encode($array);

    }

    //check sinhala recipe availability
    public function checkRecipe_si($r = '')
    {

        $sql2 = "SELECT * FROM recipe_si WHERE Recipes_idRecipe = $r";
        $array = $this->db->query($sql2)->fetchAll(PDO::FETCH_ASSOC);
        if (count($array) == 1)
            return 1;
        else
            return 0;

    }

    public function checkRecipeTitle()
    {

        $sql = "SELECT title FROM recipes WHERE title ='" . $_POST['title'] . "' ";
        $sth = $this->db->prepare($sql);

        $sth->execute();
        $result = $sth->rowCount();


        echo $result;
    }

    public function imageUpload($name = '', $path = '', $type = '')
    {

        $target_dir = "uploads/" . $path . "/";
        $target_file = $target_dir . basename($_FILES[$name]["name"]);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
        if (isset($_POST["submit"])) {
            $check = getimagesize($_FILES[$name]["tmp_name"]);
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
        if ($_FILES[$name]["size"] > 2000000) {
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
            if (move_uploaded_file($_FILES[$name]["tmp_name"], $target_dir . '/0.' . $imageFileType)) {

                $this->make_thumb($target_dir . '/0.' . $imageFileType, $target_dir . '/thumb.jpg', 200);

                $sql = "INSERT INTO recipe_img (image_url, Recipe_idRecipe)
                VALUES (:image_url, :Recipe_idRecipe)";

                $query = $this->db->prepare($sql);
                $query->execute(array(':image_url' => 'uploads/' . $path . '/0.' . $imageFileType,
                    ':Recipe_idRecipe' => $path));

                return true;
            } else {
                return false;
            }
        }
    }

    public function multipleImageUpload($recipeId = '')
    {
        $errors = array();
        foreach ($_POST['steps'] as $key => $tmp_name) {


            //$key  = $_FILES['stepsimg']['tmp_name'];
            $file_name = 'step_' . $key . $_FILES['stepsimg']['name'][$key];
            $file_size = $_FILES['stepsimg']['size'][$key];
            $file_tmp = $_FILES['stepsimg']['tmp_name'][$key];
            $file_type = $_FILES['stepsimg']['type'][$key];
            if ($file_size > 2097152) {
                $errors[] = 'File size must be less than 2 MB';
            }

            $sql5 = "";
            $dir = "uploads/" . $recipeId . "/" . $file_name;

            if ($_POST['steps'][$key] != null) {
                $sql5 = "INSERT INTO recipe_description (description_en,Recipe_idRecipe,image_url) VALUES (:description_en , :recipe_id, :dir)";
            }

            $desired_dir = "uploads";
            if (empty($errors) == true) {
                if (is_dir($desired_dir) == false) {
                    mkdir("$desired_dir", 0700);        // Create directory if it does not exist
                }
                if (is_dir("$desired_dir/" . $recipeId . "/" . $file_name) == false) {
                    move_uploaded_file($file_tmp, "uploads/" . $recipeId . "/" . $file_name);
                } else {                                    //rename the file if another one exist
                    $new_dir = "uploads/" . $recipeId . "/" . $file_name . time();
                    rename($file_tmp, $new_dir);
                }
                $sth = $this->db->prepare($sql5);
                $sth->execute(array(
                    ':description_en' => $_POST['steps'][$key],
                    ':recipe_id' => $recipeId,
                    ':dir' => $dir
                ));
            } else {
                print_r($errors);
                return false;
            }


        }

        if (empty($error)) {
            return true;
        }
    }

    public function viewRecipe($recipeid = '')
    {

        $this->recipeId = $recipeid;

        $ingredients = array();
        $sql = "SELECT idRecipe,title,tags,users_user_id,prep_time ,cook_time ,views,rating,lang FROM recipes WHERE idRecipe = :idRecipe";

        $query = $this->db->prepare($sql);
        $query->execute(array(':idRecipe' => $recipeid));
        $count = $query->rowCount();

        if ($count == 1) {
            $results = $query->fetch();
            $this->recipename = $results->title;
            $this->time = $results->cook_time;
            $this->tag = $results->tags;
            $this->view = $results->views;
            $this->ratings = $results->rating;
            $this->lang = $results->lang;

            $sql = "SELECT Ingredients_idIngredients FROM recipe_has_ingredients WHERE Recipe_idRecipe = :Recipe_idRecipe";

            $query = $this->db->prepare($sql);
            $query->execute(array(':Recipe_idRecipe' => $recipeid));

            while ($r = $query->fetch(PDO::FETCH_ASSOC)) {
                $sql2 = "SELECT idIngredients,title,ing_si FROM ingredients WHERE idIngredients = :idIngredients";

                $result = $this->db->prepare($sql2);
                $result->execute(array(':idIngredients' => $r['Ingredients_idIngredients']));

                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                    $ingredients[] = $row['title'];
                }
            }
            $this->ingredients = $ingredients;

        }

        //update views
        if (!isset($_SESSION['hasVisited$this->recipeId'])) {
            $_SESSION['hasVisited$this->recipeId'] = "yes";

            $sql = "UPDATE recipes SET views = 1+views WHERE idRecipe = :Recipe_idRecipe";

            $query = $this->db->prepare($sql);
            $query->execute(array(':Recipe_idRecipe' => $recipeid));
        }

    }

    public function getRecipeIngredients($recipeId = '')
    {

        $array = $this->db->query("SELECT ingredients.idIngredients,ingredients.title , ingredients.ing_si ,recipe_has_ingredients.units ,recipe_has_ingredients.qty , recipe_has_ingredients.id_recipe_has_ingredients
                                   FROM ingredients INNER JOIN  recipe_has_ingredients
                                   WHERE recipe_has_ingredients.Recipe_idRecipe =" . $recipeId . "
                                   AND recipe_has_ingredients.Ingredients_idIngredients = ingredients.idIngredients")->fetchAll(PDO::FETCH_ASSOC);

        return json_encode($array);
    }

    //returnImage for recipe gallery
    public function getRecipeImages($recipeId = '')
    {

        $array = $this->db->query("SELECT image_url
                                   FROM recipe_img
                                   WHERE Recipe_idRecipe =" . $recipeId . "
                                   UNION
                                   SELECT image_url
                                   FROM recipe_description
                                   WHERE Recipe_idRecipe =" . $recipeId . " LIMIT 5")->fetchAll(PDO::FETCH_ASSOC);
        return json_encode($array);
    }

    public function getRecipeDescription($recipeId = '')
    {
        $array = $this->db->query("SELECT description_en,image_url from recipe_description WHERE Recipe_idRecipe=" . $recipeId)->fetchAll(PDO::FETCH_ASSOC);
        return json_encode($array);
    }

    //check add recipe fields
    public function validateFields()
    {
        $title_Err = $category_Err = $image_Err_1 = $image_Err_2 = $image_Err_3 = "";
        $title = $image_1 = $image_2 = $image_3 = $category = "";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            //recipe title validation
            if (empty($_POST["title"])) {
                $title_Err = "title required";
            } else {
                $first_name = $this->test_input($_POST["first_name"]);
                // check if name only contains letters and whitespace
                if (!preg_match("/^[a-zA-Z ]*$/", $title)) {
                    $nameErr = " Title only letters and white space allowed";
                }
            }

            //recipe category validation
            if (empty($_POST["category"])) {
                $title_Err = "category required";
            } else {
                $first_name = $this->test_input($_POST["category"]);
            }


        }
    }

    //get categories array
    public function getCategoriesArray()
    {
        $array = $this->db->query("SELECT idCategory,title, title_si ,thumb_url from recipe_category")->fetchAll(PDO::FETCH_ASSOC);
        return json_encode($array);
    }

    //get subcategories array
    public function getSubCategoriesArray($id = '')
    {
        $array = $this->db->query("SELECT idRecipe_sub_category,title,img_url from recipe_sub_category WHERE Recipe_Category_idCategory = " . $id)->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($array);
    }

    public function getRecipeAddedBy($recipeId = '')
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

    public function checkRecipeAvailability($recipeId = '')
    {

        $sql = "SELECT verified,users_user_id FROM recipes WHERE idRecipe =" . $recipeId;
        $sth = $this->db->prepare($sql);
        $sth->execute();
        if ($sth->rowCount() == 1) {
            $result = $sth->fetch();
            if ($result->verified == 1) {
                return true;
            } else if (isset($_SESSION['uid'])) {
                if ($_SESSION['uid'] == $result->users_user_id)
                    return true;
                else
                    return false;
            }
        } else
            return false;

    }


    public function getRecipe($id = '')
    {

        $array = $this->db->query("SELECT * FROM recipes WHERE idRecipe =" . $id)->fetchAll(PDO::FETCH_ASSOC);
        return $array;

    }

    public function getIngredientBrands($ingId = '')
    {

        $array = $this->db->query("SELECT * FROM ingredients i
                                              JOIN ingredients_has_product_brand ib ON i.idIngredients =ib.Ingredients_idIngredients
                                              JOIN product_brand p ON  ib.product_brand_idproduct_brand = p.idproduct_brand
                                            WHERE i.idIngredients = " . $ingId)->fetchAll(PDO::FETCH_ASSOC);
        return json_encode($array);
    }

    //updating recipe has ingredients table
    public function updateRecipeBrands()
    {

        //loop through ingredients fields
        $count = count($_POST['brand']);
        for ($i = 0; $i < $count; $i++) {

            $brand = $_POST['brand'][$i];
            $other = $_POST['other'][$i];
            $rid = $_POST['rid'][$i];

            if ($other != null) {

                $sql0 = "INSERT INTO product_brand (title) VALUES ('$other')";
                $sth = $this->db->prepare($sql0)->execute();

                $brandid = $this->db->lastInsertId();

                $sql = "UPDATE recipe_has_ingredients SET brand_id = $brandid WHERE id_recipe_has_ingredients = $rid ";
                $sth = $this->db->prepare($sql);
                $result = $sth->execute();


            } else if ($brand != 0) {
                $sql = "UPDATE recipe_has_ingredients SET brand_id = $brand WHERE id_recipe_has_ingredients = $rid ";
                $sth = $this->db->prepare($sql);
                $result = $sth->execute();

            }
        }
        return true;
    }

    public function getUserComments($recipeId = '')
    {
        $array = $this->db->query("SELECT * FROM comments WHERE Recipes_idRecipe =" . $recipeId)->fetchAll(PDO::FETCH_ASSOC);
        return json_encode($array);
    }

    public function addComment($uid, $text, $rid)
    {

        $sql = "INSERT INTO comments (text , Recipes_idRecipe , users_user_id)
                VALUES (:text , :Recipe_idRecipe , :users_user_id)";

        $query = $this->db->prepare($sql);
        $result = $query->execute(array(':text' => $text,
            ':Recipe_idRecipe' => $rid,
            ':users_user_id' => $uid));
        echo $result;
    }

    //create thumbnail
    function make_thumb($src, $dest, $desired_width)
    {

        /* read the source image */
        $what = getimagesize($src);

        switch (strtolower($what['mime'])) {
            case 'image/png':
                $img = imagecreatefrompng($src);
                break;
            case 'image/jpeg':
                $img = imagecreatefromjpeg($src);
                break;
            case 'image/gif':
                $img = imagecreatefromgif($src);
                break;
            default:
                die();
        }

        $width = imagesx($img);
        $height = imagesy($img);

        /* find the "desired height" of this thumbnail, relative to the desired width  */
        $desired_height = floor($height * ($desired_width / $width));

        /* create a new, "virtual" image */
        $virtual_image = imagecreatetruecolor($desired_width, $desired_height);

        /* copy source image at a resized size */
        imagecopyresampled($virtual_image, $img, 0, 0, 0, 0, $desired_width, $desired_height, $width, $height);

        /* create the physical thumbnail image to its destination */
        imagejpeg($virtual_image, $dest);
    }

    //add recipe rating
    public function addRating($uid, $val, $rid)
    {

        //get already rated user count
        $sql = "SELECT rating from ratings WHERE Recipes_idRecipe = $rid";
        $array = $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        $count = count($array);

        //select the current user rating
        $sql = "SELECT rating from recipes WHERE idRecipe = $rid";
        $value = $this->db->query($sql)->fetch();

        // calculation for the new rating
        $rating = (($value->rating * $count) + $val) / (1 + $count);

        //update the current rating
        $sql = "UPDATE recipes SET rating= $rating WHERE idRecipe = $rid ";
        $sth = $this->db->prepare($sql);
        $result1 = $sth->execute();


        // add value to the rating table
        $sql = "INSERT INTO ratings (rating , Recipes_idRecipe , users_user_id)
                VALUES (:rating , :Recipe_idRecipe , :users_user_id)";

        $query = $this->db->prepare($sql);
        $result = $query->execute(array(':rating' => $val,
            ':Recipe_idRecipe' => $rid,
            ':users_user_id' => $uid));


        echo $result . $result1 . $count . $rating;
    }

    /* recipe update functions*/
    public function updateRecipeTitle()
    {

        if (isset($_POST['recipeId']) && isset($_POST['title'])) {
            $sql = "UPDATE recipes SET title = '" . $_POST['title'] . "' WHERE idRecipe = " . $_POST['recipeId'];
            $sth = $this->db->prepare($sql);
            $result = $sth->execute();
            echo $result;

        }
    }


    public function updateRecipeTime()
    {

        if (isset($_POST['recipeId']) && isset($_POST['time'])) {
            $sql = "UPDATE recipes SET est_time = '" . $_POST['time'] . "' WHERE idRecipe = " . $_POST['recipeId'];
            $sth = $this->db->prepare($sql);
            $result = $sth->execute();
            echo $result;

        }
    }

    public function updateRecipeTags()
    {

        if (isset($_POST['recipeId']) && isset($_POST['tags'])) {
            $sql = "UPDATE recipes SET tags = '" . $_POST['tags'] . "' WHERE idRecipe = " . $_POST['recipeId'];
            $sth = $this->db->prepare($sql);
            $result = $sth->execute();
            echo $result;

        }
    }

    public function updateRecipeCategory()
    {

        if (isset($_POST['recipeId']) && isset($_POST['category'])) {
            $sql = "UPDATE recipes SET category_id = " . $_POST['category'] . " WHERE idRecipe = " . $_POST['recipeId'];
            $sth = $this->db->prepare($sql);
            $result = $sth->execute();
            echo $result;

        }
    }

    public function deleteRecipeIngredient()
    {


        $sql = "DELETE FROM recipe_has_ingredients WHERE id_recipe_has_ingredients = " . $_POST['rh_ingredient_id'];

        $sth = $this->db->prepare($sql);
        $result = $sth->execute();

        echo $result;

    }

    public function addNewIngredients()
    {

        $count = count($_POST['ingname']);
        $recipeId = $_POST['recipeId'];

        //query for recipe has ingredients
        $sql2 = "INSERT INTO recipe_has_ingredients (Recipe_idRecipe, Ingredients_idIngredients, units, qty)
                VALUES (:Recipe_idRecipe, :Ingredients_idIngredients, :units, :qty)";


        for ($i = 0; $i < $count; $i++) {

            $ingredient = $_POST['ingname'][$i];
            $qty = $_POST['amount'][$i];
            $metrics = $_POST['metrics'][$i];

            if ($ingredient != null) {
                //insert to ingredient if does not exists
                $sql4 = "INSERT IGNORE INTO ingredients (title) VALUES ('" . $ingredient . "')";
                $sth = $this->db->prepare($sql4);
                $sth->execute();

                //search from ingredients to get the id
                $ingredientSql = "SELECT idIngredients FROM ingredients WHERE title = '" . $ingredient . "'";
                $sth = $this->db->prepare($ingredientSql);
                $sth->execute();

                //fetch ingredient id
                $result = $sth->fetch()->idIngredients;


                //insert into recipe_has_ingredient
                $sth = $this->db->prepare($sql2);
                $sth->execute(array(':Recipe_idRecipe' => $recipeId,
                    ':Ingredients_idIngredients' => $result,
                    ':units' => $metrics,
                    ':qty' => $qty));

            }

        }


    }

    public function addNewDescription()
    {

        //echo $_POST['steps'];


        if ($this->multipleImageUpload(45)) {
            echo 1;

        } else {
            echo 0;
        };

    }

    //delete recipe Description
    public function deleteRecipeDescription()
    {

        $sql = "DELETE FROM recipe_description WHERE idDescription = " . $_POST['description_id'];

        $sth = $this->db->prepare($sql);
        $result = $sth->execute();

        echo $result;

    }

    //get recipe type
    public function getRecipeType($recipeId =''){
        $sql = "SELECT lang from recipes WHERE idRecipe = $recipeId";
        $sth = $this->db->prepare($sql);
        $result = $sth->execute();

        return $sth->fetch()->lang;
    }

    //testing for dropzone js
    public function testDropZone()
    {

        /*
             $target_dir = "uploads/" . $path . "/";
             $target_file = $target_dir . basename($_FILES[$name]["name"]);
             $uploadOk = 1;
             $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

        */
        if (!file_exists('uploads/recipes/temp/' . Session::get('username'))) {
            mkdir('uploads/recipes/temp/' . Session::get('username'), 0777, true);
        }
        $ds = '/';  //1

        $storeFolder = 'uploads/recipes/temp/' . Session::get('username');

        if (!empty($_FILES)) {


            $tempFile = $_FILES['file']['tmp_name'];          //3

            $targetPath = $storeFolder . $ds;  //4

            $targetFile = $targetPath . basename($_FILES['file']['name']);  //5
            $imageFileType = pathinfo($targetFile, PATHINFO_EXTENSION);
            move_uploaded_file($tempFile, $storeFolder . '/' . $_GET['name'] . "." . $imageFileType); //6

            $this->make_thumb($storeFolder . '/' . $_GET['name'] . '.' . $imageFileType, $storeFolder . '/' . $_GET['name'] . '_thumb.' . $imageFileType, 200);

            echo $_GET['name'] . "." . $imageFileType;
        }


    }


    public function showImages()
    {
        $urls[] = array();
        $i = 0;

        $handle = opendir('uploads/recipes/temp/' . Session::get('username'));
        while ($file = readdir($handle)) {
            if ($file !== '.' && $file !== '..' && preg_match('/thumb/', $file)) {
                $urls[$i] = $file;
                $i++;

            }
        }

        echo json_encode($urls);
    }

    public function deleteRecipeImage($name = '')
    {
        unlink("uploads/recipes/temp/" . Session::get('username') . "/" . $_POST['name']);

        unlink("uploads/recipes/temp/" . Session::get('username') . "/" . explode(".", $_POST['name'])[0] . "_thumb." . explode(".", $_POST['name'])[1]);
    }

    public function getIngredientSuggestions()
    {
        $array = $this->db->query("SELECT title FROM ingredients")->fetchAll(PDO::FETCH_ASSOC);
        return json_encode($array);
    }



    // Call function
// Function to Copy folders and files
    function rcopy($src, $dst)
    {
        if (file_exists($dst))
            $this->rrmdir($dst);
        if (is_dir($src)) {
            mkdir($dst);
            $files = scandir($src);
            foreach ($files as $file)
                if ($file != "." && $file != "..")
                    $this->rcopy("$src/$file", "$dst/$file");

        } else if (file_exists($src))
            copy($src, $dst);
        $this->rrmdir($src);
    }

// Function to remove folders and files
    function rrmdir($dir)
    {
        if (is_dir($dir)) {
            $files = scandir($dir);
            foreach ($files as $file)
                if ($file != "." && $file != "..") rrmdir("$dir/$file");

            rmdir($dir);
        } else if (file_exists($dir)) unlink($dir);
    }

    public function adminRecipeSearch($searchText="", $searchCate="", $searchParam="")
    {

        $sql = "SELECT idRecipe, title FROM recipes WHERE";

        if(!empty($searchParam)){
            switch($searchParam){
                case "title":
                    $sql .= " title LIKE '%$searchText%'";
                    break;
                case "id":
                    $sql .= " idRecipe = '".trim($searchText)."'";
                    break;
                /*case "username":
                    $sql .= " users";*///to be implemented in future
            }
        }else{
            $sql = "SELECT idRecipe, title FROM recipes WHERE title LIKE '%$searchText%'";
        }

        if(!empty($searchCate)){
            $sql .= "AND category_id='$searchCate'";
        }

        $result = $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);

        return json_encode($result);
    }

    public function adminRecipeDelete($recipeIdToDelete)
    {
        $sqlRecipeIngredients = "DELETE FROM recipe_has_ingredients WHERE Recipe_idRecipe = '$recipeIdToDelete'";
        $query1 = $this->db->prepare($sqlRecipeIngredients);
        $test1 = $query1->execute();

        $sqlRecipeDescription = "DELETE FROM recipe_description WHERE Recipe_idRecipe = '$recipeIdToDelete'";
        $query2 = $this->db->prepare($sqlRecipeDescription);
        $test2 = $query2->execute();

        $sqlRecipeImage = "DELETE FROM recipe_img WHERE Recipe_idRecipe = '$recipeIdToDelete'";
        $query3 = $this->db->prepare($sqlRecipeImage);
        $test3 = $query3->execute();


        $sqlRecipeRatings = "DELETE FROM ratings WHERE Recipes_idRecipe = '$recipeIdToDelete'";
        $query4 = $this->db->prepare($sqlRecipeRatings);
        $test4 = $query4->execute();

        $sqlRecipeSinhala = "DELETE FROM recipe_si WHERE Recipes_idRecipe = '$recipeIdToDelete'";
        $query5 = $this->db->prepare($sqlRecipeSinhala);
        $test5 = $query5->execute();

        $recipeOriginal = "DELETE FROM recipes WHERE idRecipe = '$recipeIdToDelete'";
        $query6 = $this->db->prepare($recipeOriginal);
        $test6 = $query6->execute();

        ///////////////////////////////////////////////////////////////////////////////////////////
        $recipeImgDir = "../Ambula/uploads/".$recipeIdToDelete;
        if(file_exists($recipeImgDir)){
            $test7 = $this->delTree($recipeImgDir);
        }else{
            $test7 = false;
        }
        ///////////////////////////////////////////////////////////////////////////////////////////

        if($test1 && $test2 && $test3 && $test4 && $test5 && $test6 && $test7 ){
            return true;
        }else{
            return false;
        }

    }

    /////////////////////Function to delete a directory with its files//////////////////////////////////////
    public function delTree($dir) {
        if (empty($dir)) {
            return false;
        }
        $files = array_diff(scandir($dir), array('.','..'));
        foreach ($files as $file) {
            (is_dir("$dir/$file")) ? delTree("$dir/$file") : unlink("$dir/$file");
        }
        return rmdir($dir);
    }

} 