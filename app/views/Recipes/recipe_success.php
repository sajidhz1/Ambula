<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>The Ambula</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="/public/css/bootstrap.css" rel="stylesheet" media="screen"/>
    <link href="/public/css/custom.css" rel="stylesheet" media="screen"/>
    <link href="/public/css/color1.css" rel="stylesheet" media="screen"/>

    <!-- fav icon -->
    <link rel="icon" href="/public/img/fav_ico.png" type="image/gif" sizes="16x16">

    <script type="text/javascript" src="/public/js/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="/public/js/typeahead.js"></script>

    <script src="/public/js/bootstrap.min.js"></script>

    <!--[if lt IE 9]>
    <script src="css/font-awesome-ie7.min.css"></script>
    <![endif]-->

    <!-- Google Font Link: Choose font you want on google font(http://www.google.com/webfonts) and make sure your replace those fonts in name in custom.css -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Sanchez:400,400italic' rel='stylesheet'
          type='text/css'>

    <!-- ##### Le HTML5 shim, for IE6-8 support of HTML5 elements ##### -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <script>
        $(document).on('click', '#btn-collapse', function (e) {
            e.preventDefault();
            $("html, body").animate({ scrollTop: 400 }, 500);
        });

    </script>
    <style>
        body{text-align: center;}
        h5{color: brown;}
        th,td{
            padding: 8px;
        }
        table{
            margin-left: auto;
            margin-right: auto;
            margin-top: 20px;
            margin-bottom: 20px;
        }
        table, th, td {
            border: 1px solid #B2B2B2;
            border-collapse: collapse;
        }
    </style>
</head>

<body>

<!--Header START -->
<?php $this->view('_template/navigation_menu', "newRecipe") ?>
<div class="container-fluid pages">
<h1>Recipe Added Successfully</h1>

<h3>Tell Us More About Your Recipe</h3>
<h5>help people more easier to find their grocery</h5>
 <form action="/recipes/updateRecipeBrands?recipe=<?=$_GET['id'] ?>" method="post" >
 <table >
     <tr>
         <th>Item</th>
         <th>Product Brand</th>
     </tr>

     <?php $arrsub = json_decode($this->getRecipeIngredients($_GET['id']), true);

     foreach ($arrsub as $ingredient) {
     ?>

    <tr>
        <td><?=$ingredient['title'] ?></td>
        <td>
            <select name="brand[]">
                <option value="0" >choose</option>
                <?php $brands =  json_decode($this->getIngredientBrands($ingredient['idIngredients']),true);

                if(count($brands) >0){
                    foreach($brands as $b){
                        ?>
                        <option value="<?=$b['idproduct_brand']; ?>"><?=$b['title']; ?></option>
                <?php 
                    }
                }

                ?>
            </select>
        </td>
        <td>
            <input type="text" name="other[]" placeholder="other"  />
            <input type="hidden" name="rid[]" value="<?=$ingredient['id_recipe_has_ingredients'] ?>"
        </td>
      
    </tr>

     <?php }?>
 </table>
    <input class="btn btn-success btn-lg" value="save" type="submit" />
 </form>
    <br>
    <br>
    <a href="" style="margin-bottom: 25px;" >Continue to Recipe >> </a>
</div>
</body>
</html>

