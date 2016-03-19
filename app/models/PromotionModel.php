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
        $this->idPromotion_Adder = "";
        $this->idpromo_adderErr = "";
        $this->idpromo_adder_flag = false;
    }


    public function validateAndInsertNewPromo()
    {

        $this->idpromo_adder_flag = $promo_type_flag = $promo_name_flag = $description_flag = $startdate_flag = $enddate_flag = $priority_flag = false;
        $this->idpromo_adderErr = $promo_typeErr = $promo_nameErr = $promo_imageErr = $descriptionErr = $startdateErr = $enddateErr = $priorityErr = $datetime_adderdErr = $visibilityErr = "";
        $this->idPromotion_Adder = $promotion_type = $promotion_name = $image_url = $description = $start_date = $end_date = $priority = $date_time_added = $visibility = "";


        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            if (isset($_SESSION["user_logged_in"]) && $_SESSION["user_account_type"] == 2) {
                $this->idPromotion_Adder = $_SESSION["uid"];
                $this->idpromo_adder_flag = true;
            } else {
                $this->idpromo_adder_flag = false;
                $this->idpromo_adderErr = "Not logged in as Coporate user";
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
                // check if promo name only contains letters and whitespace
                if (!preg_match("/^[a-zA-Z0-9 ]*$/", $promotion_name)) {
                    $promo_name_flag = false;
                    $promo_nameErr = "Only letters,digits and white spaces allowed";
                }
            }


            //promotion description validation
            if (empty($_POST["description"])) {
                ECHO "Description about the promotion is required";
                $description_flag = false;
            } else {
                $description_flag = true;
                $description = $this->test_input($_POST["description"]);
            }

            //start date
            if (empty($_POST["start_date"])) {
                $startdateErr = "Promotion starting date is required";
                $startdate_flag = false;
            } else {
                $startdate_flag = true;
                $start_date = date('Y-m-d', strtotime($this->test_input($_POST["start_date"])));
            }

            //end date
            if (empty($_POST["end_date"])) {
                $enddateErr = "Promotion finishing date is required";
                $enddate_flag = false;
            } else {
                $enddate_flag = true;
                $end_date = date('Y-m-d', strtotime($this->test_input($_POST["end_date"])));
            }

            //promotional image
            $sqlForId = "SELECT idPromotion FROM promotion ORDER BY idPromotion DESC LIMIT 1";
            $queryId = $this->db->prepare($sqlForId);
            $queryId->execute();
            $lastPromoId = $queryId->fetchColumn();

            if (!$lastPromoId) {
                $lastPromoId = 1;
                if (!is_dir("uploads/promotions/" . $lastPromoId)) {
                    mkdir("uploads/promotions/" . $lastPromoId);
                }
                $image_url = $this->imageUpload("promo_image", $lastPromoId, 1);
                $lastPromoId = null;
            } else {
                $lastPromoId++;
                if (!is_dir("uploads/promotions/" . $lastPromoId)) {
                    mkdir("uploads/promotions/" . $lastPromoId);
                }
                $image_url = $this->imageUpload("promo_image", $lastPromoId, 1);
                $lastPromoId = null;
            }


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

        //$hash_cost_factor = (defined('HASH_COST_FACTOR') ? HASH_COST_FACTOR : null);

        //    echo $promo_type_flag ." ".$promo_name_flag." ".$company_name_flag." ".$email_flag." ".$image_url." ".$description_flag." ".$startdate_flag." ".$enddate_flag." ".$priority_flag;

        if (!$promo_type_flag || !$promo_name_flag || !$description_flag || !$startdate_flag || !$enddate_flag) {
            echo $promo_type_flag.'#'.$promo_name_flag.'#'.$description_flag.'#'.$startdate_flag.'#'.$enddate_flag;
        }
        //insert into promotion_adder table

        $sql = "INSERT INTO promotion (users_user_id, promotion_type, promotion_name, image_url, description, start_date, end_date,  visibility) VALUES
                  (:user_id ,:promotion_type ,:promotion_name ,:image_url ,:description ,:start_date ,:end_date ,:visibility)";
        $query = $this->db->prepare($sql);
        $query->execute(array(':user_id' => $this->idPromotion_Adder,
            ':promotion_type' => $promotion_type,
            ':promotion_name' => $promotion_name,
            ':image_url' => $image_url,
            ':description' => $description,
            ':start_date' => $start_date,
            ':end_date' => $end_date,
            ':visibility' => $visibility));

        echo '#1';

    }

    public function viewPromotions($promotion_type)
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

    //==================================================Now implemented=======================================//
    public function viewPromotionsTest($promotion_type)
    {

        $result = $this->db->query("SELECT pr.*, usr.idcommercial_user, usr.company_name, usr.web_url, usr.logo_url, usr.telephone_1, usr.address_1 FROM (SELECT * FROM promotion WHERE promotion_type='$promotion_type') AS pr INNER JOIN commercial_user AS usr ON pr.users_user_id=usr.users_user_id")->fetchAll(PDO::FETCH_ASSOC);
        return json_encode($result);

    }

    //=================================================================================================//

    //function to retrieve a information about a single promotion
    public function viewSinglePromotion($promoId)
    {

        $result = $this->db->query("SELECT * FROM promotion WHERE idPromotion = '$promoId'")->fetchAll(PDO::FETCH_ASSOC);
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

    public function imageUpload($name, $path, $type)
    {

        $target_dir = "uploads/promotions/" . $path . "/";
        $target_file = $target_dir . basename($_FILES[$name]["name"]);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
        // Check if image file is a actual image or fake image
        if (isset($_POST["promo_image"])) {
            echo "testing upload";
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
            echo $target_file;
            $uploadOk = 0;
        }
        // Check file size
        if ($_FILES[$name]["size"] > 1000000) {
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
            if (move_uploaded_file($_FILES[$name]["tmp_name"], $target_file)) {
                return $target_file;
            } else {
                return false;
            }
        }
    }


}

?>