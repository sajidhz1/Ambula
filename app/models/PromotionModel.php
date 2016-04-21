<?php

/**
 * Created by PhpStorm.
 * User: Dulitha RD
 * Date: 7/31/2015
 * Time: 11:48 PM
 */
class PromotionModel
{


    public function __construct(DataBase $db)
    {
        $this->db = $db;
    }


    public function validateAndInsertNewPromo()
    {

        $idpromo_adder_flag = $promo_type_flag = $promo_name_flag = $description_flag = $startdate_flag = $enddate_flag = $priority_flag = false;
        $idpromo_adderErr = $promo_typeErr = $promo_nameErr = $promo_imageErr = $descriptionErr = $startdateErr = $enddateErr = $priorityErr = $datetime_adderdErr = $visibilityErr = "";
        $idPromotion_Adder = $promotion_type = $promotion_name = $image_url = $description = $start_date = $end_date = $priority = $date_time_added = $visibility = "";


        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            if (isset($_SESSION["user_logged_in"]) && $_SESSION["user_account_type"] == 2) {
                $idPromotion_Adder = $_SESSION["uid"];
                $idpromo_adder_flag = true;
            } else {
                $idpromo_adder_flag = false;
                $idpromo_adderErr = "Not logged in as Coporate user";
            }

            //promo type validation
            if (empty($_POST["promotion_type"])) {
                $promo_typeErr = "Select a promotion type";
                $promo_type_flag = false;
            } else {
                $promo_type_flag = true;
                $promotion_type = $this->test_input($_POST["promotion_type"]);
            }

            //promo name validation
            if (empty($_POST["promotion_name"])) {
                $promo_nameErr = "Promotion name is required";
                $promo_name_flag = false;
            } else {
                $promo_name_flag = true;
                $promotion_name = $this->test_input($_POST["promotion_name"]);
            }


            //promotion description validation
            if (empty($_POST["description"])) {
                $descriptionErr = "Description about the promotion is required";
                $description_flag = false;
            } else {
                $description_flag = true;
                $description = $_POST["description"];
            }

            //start date
            if (empty($_POST["start_date"])) {
                $startdateErr = "Promotion starting date is required";
                $startdate_flag = false;
            } else {
                $startdate_flag = true;
                $stDate = DateTime::createFromFormat("d/m/Y",$_POST["start_date"]);
                $start_date = $stDate->format("Y-m-d");
            }

            //end date
            if (empty($_POST["end_date"])) {
                $enddateErr = "Promotion finishing date is required";
                $enddate_flag = false;
            } else {
                $enddate_flag = true;
                $enDate = DateTime::createFromFormat("d/m/Y",$_POST["end_date"]);
                $end_date = $enDate->format("Y-m-d");
            }

            //promotional image
/*            $sqlForId = "SELECT idPromotion FROM promotion ORDER BY idPromotion DESC LIMIT 1";
            $queryId = $this->db->prepare($sqlForId);
            $queryId->execute();
            $lastPromoId = $queryId->fetchColumn();*/




            //priority
//            if (empty($_POST["priority"])) {
//                $priorityErr = "priority is required to choose";
//                $priority_flag = false;
//            } else {
//                $priority_flag = true;
//                $priority = $this->test_input($_POST["priority"]);
//            }

            $visibility = false;

        }

        if ($idpromo_adder_flag  && $promo_type_flag && $promo_name_flag && $description_flag && $startdate_flag && $enddate_flag) {
            $sql = "INSERT INTO promotion (users_user_id, promotion_type, promotion_name, description, start_date, end_date,  visibility) VALUES
                  (:user_id ,:promotion_type ,:promotion_name,:description ,:start_date ,:end_date ,:visibility)";
            $query = $this->db->prepare($sql);
            $query->execute(array(':user_id' => $idPromotion_Adder,
                ':promotion_type' => $promotion_type,
                ':promotion_name' => $promotion_name,
                ':description' => $description,
                ':start_date' => $start_date,
                ':end_date' => $end_date,
                ':visibility' => $visibility));

            $insertedPromoId = $this->db->lastInsertId();

            if ($insertedPromoId) {
                if($this->imageUpload("promo_image", $insertedPromoId)){
                    return $insertedPromoId;
                }else{
                    return false;
                }
            }else{
                return false;
            }
        }else{
            return $promo_type_flag . '#' . $promo_name_flag . '#' . $description_flag . '#' . $startdate_flag . '#' . $enddate_flag;
        }

    }

    public function checkPromotionAvailability($promotion_type)
    {
        $sql = "SELECT * FROM promotion WHERE promotion_type = ?";
        $query = $this->db->prepare($sql);
        $query->bindParam(1, $promotion_type, PDO::PARAM_STR);
        $query->execute();

        if ($query->rowCount() == 0) {
            return false;
        } else {
            return $query;
        }
    }

    public function viewPromotionCompany($uId)
    {
        $sql = "SELECT company_name FROM commercial_user WHERE users_user_id = ?";
        $query = $this->db->prepare($sql);
        $query->bindParam(1, $uId, PDO::PARAM_STR);
        $query->execute();

        if ($query->rowCount() == 0) {
            return false;
        } else {
            return $query;
        }
    }

    //================================================================================================//
    public function viewAllPromotions($promotion_type)
    {
        $sql= "SELECT pr.*, usr.idcommercial_user , usr.company_name, usr.web_url, usr.logo_url, usr.telephone_1, usr.address_1 FROM (SELECT * FROM promotion WHERE promotion_type=:promotion_type) AS pr INNER JOIN commercial_user AS usr ON pr.users_user_id=usr.users_user_id";
        $result = $this->db->prepare($sql);
        $result->execute(array(':promotion_type'=>$promotion_type));
        return json_encode($result->fetchAll(PDO::FETCH_ASSOC));
    }

    //=================================================================================================//

    //function to retrieve a information about a single promotion
    public function viewSinglePromotion($promoId)
    {
        $result = $this->db->query("SELECT * FROM promotion WHERE idPromotion = '$promoId'")->fetchAll(PDO::FETCH_ASSOC);
        //add new image url to the database result array
        $target_file = 'uploads/promotions/'.$promoId.'/'.$promoId;
        $matching = glob($target_file . '.*');

        $result['img_url'] = $matching[1];
        return json_encode($result);
    }

    //=================================================================================================//

    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    public function imageUpload($fileInputName , $promotionId)
    {
        if (isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in'] == true && isset($_SESSION['username'])) {


            $target_dir = "uploads/promotions/" . $promotionId . "/";


            //To create the directory if its not created already
            $uploadOk = mkdir($target_dir);

            $target_file = $target_dir . basename($_FILES[$fileInputName]["name"]);
            $uploadOk = 1;

            $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

            // Check if image file is a actual image or fake image
            $check = getimagesize($_FILES[$fileInputName]["tmp_name"]);
            if ($check !== false) {
                //echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }

            // Check if file already exists
            if (file_exists($target_file)) {
                echo "Sorry, file already exists.";
                $uploadOk = 0;
            }

            // Check file size
            if ($_FILES[$fileInputName]["size"] > 3000000) {
                echo "Sorry, your file is too large.";
                $uploadOk = 0;
            }

            // Allow certain file formats
            if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
                echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                $uploadOk = 0;
            }

            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                return false;
                // if everything is ok, try to upload file
            } else {
                if (move_uploaded_file($_FILES[$fileInputName]["tmp_name"], $target_dir . $promotionId . '.' . $imageFileType)) {

                    $this->make_thumb($target_dir . $promotionId . '.' . $imageFileType, $target_dir . $promotionId . '.card.jpg', 500);
                    $this->make_thumb($target_dir . $promotionId . '.' . $imageFileType, $target_dir . $promotionId . '.thumb.jpg', 200);

                    //Data base update query for updating the column of user avatar availability//
                    $sql = "UPDATE promotion SET image_url = :image_url WHERE idPromotion = :idPromotion";
                    $result = $this->db->prepare($sql);
                    $result->execute(array(':image_url' => $target_dir . $promotionId . '.' . $imageFileType, ':idPromotion' => $promotionId));
                    return true;
                } else {
                    return false;
                }
            }

        } else {
            return false;
        }
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


}

?>