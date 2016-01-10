<?php
/**
 * Created by PhpStorm.
 * User: sajidhz
 * Date: 12/2/2015
 * Time: 3:16 PM
 */

class FoodProductsModel {

    public function __construct(DataBase $db)
    {
        $this->db = $db;

    }

    public function addProduct(){

        $title = $_POST['product_name'];
        $category = $_POST['category'];
        $description = $_POST['description'];
        $cooperate_user_id = $_SESSION['coporate_user_id'];
        $user_id = $_SESSION['uid'];


        $sql = "INSERT INTO products ( product_name , description , Product_categories_id_product_categories , commercial_user_idcommercial_user , commercial_user_users_user_id)
                VALUES ('".$title."' , '".$description."' , '".$category."' , $cooperate_user_id , $user_id)";
        $result =  $this->db->prepare($sql)->execute();

        $food_product_id = $this->db->lastInsertId();


        $path = "uploads/food_products/" . $food_product_id;
        if(!is_dir($path)){
            mkdir($path);
        }


        if($this->imageUpload('product_thumb',$food_product_id)){
            $url_img = "uploads/food_products/" . $food_product_id. "/".$food_product_id.".jpg";

            $sql_1 = "UPDATE products SET img_url = '".$url_img."' WHERE idproducts = ".$food_product_id;
            $this->db->prepare($sql_1)->execute();

            $json_array =array('product_id' => $food_product_id ,'product_name' => $title ,'category' => $category , 'description' => $description , 'thumb_url' => "uploads/food_products/" . $food_product_id."/".$food_product_id.".jpg");

           echo json_encode($json_array);
        }

    }

    public function imageUpload($name = '', $path = '')
    {

        $target_dir = "uploads/food_products/" . $path . "/";
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
            if (move_uploaded_file($_FILES[$name]["tmp_name"], $target_dir.$path.'.'.$imageFileType)) {

                return true;

            } else {
                return false;
            }
        }
    }

    public function viewUserProducts($cooperate_user_id = ''){

        $result = $this->db->query("SELECT * FROM products , product_categories WHERE id_product_categories = Product_categories_id_product_categories AND commercial_user_idcommercial_user = ".$cooperate_user_id)->fetchAll(PDO::FETCH_ASSOC);

        return json_encode($result);

    }

    public function loadUserCategories(){
        $sql = $this->db->query("SELECT * FROM cooperate_user_has_product_categories , product_categories WHERE Product_categories_id_product_categories = id_product_categories AND  cooperate_user_id = ".Session::get('coporate_user_id'))->fetchAll(PDO::FETCH_ASSOC);
        return json_encode($sql);
    }

    public function editProduct(){
        $result = $this->db->query("SELECT * FROM products , product_categories WHERE idproducts = id_product_categories AND idproducts = ".$_GET['pid'])->fetch();

        echo json_encode($result);
    }

    public function updateProduct(){

        $title = $_POST['product_name'];
        $category = $_POST['category'];
        $description = $_POST['description'];
        $cooperate_user_id = $_SESSION['coporate_user_id'];
        $product_id = $_POST['product_id'];

        if($_FILES['product_thumb']['name']=='')
        {
            $result = $this->db->query("UPDATE products SET product_name = '".$title."' , description ='".$description."' ,Product_categories_id_product_categories = '".$category."'  WHERE idproducts =".$product_id)->execute();

            $json_array =array('product_id' => $product_id ,'product_name' => $title ,'category' => $category , 'description' => $description , 'thumb_url' => "uploads/food_products/" . $product_id."/".$product_id.".jpg");

            echo json_encode($json_array);
        }


    }

    public function deleteProduct(){
        $product_id = $_GET['pid'];
        $cooperate_user_id = $_SESSION['coporate_user_id'];
        if(isset($_SESSION['coporate_user_id'])){
            $result = $this->db->query("DELETE FROM products WHERE idproducts ='".$product_id."' AND commercial_user_idcommercial_user  = ".$cooperate_user_id)->execute();
            echo $result;
        }

    }

    public function viewProducts($limit=''){
        $result = $this->db->query("SELECT * FROM products , product_categories WHERE id_product_categories = Product_categories_id_product_categories LIMIT ".$limit)->fetchAll(PDO::FETCH_ASSOC);

        return json_encode($result);
    }


    public function loadCategories(){
        $result = $this->db->query("SELECT * FROM product_categories")->fetchAll(PDO::FETCH_ASSOC);

        return json_encode($result);

    }


	//To retrieve a single product form DB
    public function viewSingleProduct(){
		$productId = $_GET['productId'];
		$result = $this->db->query("SELECT * FROM products WHERE idproducts = $productId")->fetchAll(PDO::FETCH_ASSOC);
		return json_encode($result);
	}

	//ro retrieve products infor of the co-oporate user whose single product infor was retrieved
	public function singleProductsOwnersOtherProducts(){
		$productId =$_GET['productId'];
		$result = $this->db->query("SELECT * FROM products AS p1, Products AS p2 WHERE p1.idproducts= $productId AND p1.commercial_user_idcommercial_user=p2.commercial_user_idcommercial_user LIMIT 6")->fetchAll(PDO::FETCH_ASSOC);
		return json_encode($result);
	}

	//to retrieve related recipes of a single product from db
	public function relatedRecipesOfSingleProduct(){

	}

	//to retrieve similar products to the single product
	public function similarProductsToSingleProduct()
	{
		$productId = $_GET['productId'];
		$result = $this->db->query("SELECT * FROM products AS p1, (SELECT Product_categories_id_product_categories FROM products WHERE idproducts= $productId) AS p2 WHERE p1.Product_categories_id_product_categories=p2.Product_categories_id_product_categories LIMIT 5")->fetchAll(PDO::FETCH_ASSOC);
		return json_encode($result);
	}
    //grocery main view
    public function getAllCooperateProfiles(){
        $result = $this->db->query("SELECT user_name,company_name FROM commercial_user ,users WHERE user_id = users_user_id ")->fetchAll(PDO::FETCH_ASSOC);
        return json_encode($result);
    }

    //to get the count of products for each product category
    public function getProductCountofCategories(){

        $result = $this->db->query("SELECT mt.product_count, pc.title, pc.id_product_categories FROM (SELECT Product_categories_id_product_categories as category_id, COUNT(Product_categories_id_product_categories) AS product_count FROM products group by Product_categories_id_product_categories) AS mt RIGHT JOIN product_categories AS pc ON mt.category_id=pc.id_product_categories order by pc.id_product_categories")->fetchAll(PDO::FETCH_ASSOC);
        return json_encode($result);

    }
} 