<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Permenant Delete Recipe</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--    <link href="/Ambula/public/css/w3.css" rel="stylesheet">-->
    <link href="/Ambula/public/css/bootstrap.css" rel="stylesheet" media="screen"/>
    <link href="/Ambula/public/css/bootstrap-theme.css" rel="stylesheet" media="screen"/>
    <link href="/Ambula/public/css/custom.css" rel="stylesheet" media="screen"/>
    <link href="/Ambula/public/css/color1.css" rel="stylesheet" media="screen"/>
    <link href="/Ambula/public/css/typeahead.css" rel="stylesheet" media="screen"/>
    <!-- Google Font Link: Choose font you want on google font(http://www.google.com/webfonts) and make sure your replace those fonts in name in custom.css -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Sanchez:400,400italic' rel='stylesheet'
          type='text/css'>

    <script type="text/javascript" src="/Ambula/public/js/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="/Ambula/public/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/Ambula/public/js/typeahead.js"></script>
    <!-- ##### Le HTML5 shim, for IE6-8 support of HTML5 elements ##### -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- fav icon -->
    <link rel="icon" href="/Ambula/public/img/fav_ico.png" type="image/gif" sizes="16x16">


    <style>
        .search-result-heading {
            padding: 0px 0px 0px 10px;
            line-height: 40px;
            border-bottom: 2px solid #000;
            border-color: rgba(0, 0, 0, 0.3);
            text-align: center;
            color: #dc4238;
        }

        .recipeTitle {
            white-space: nowrap;
            width: 268px;
            color: red;
            overflow: hidden;
            text-overflow: ellipsis;
            padding-bottom: 5px;
            border-bottom: 1px solid grey;
        }

        .form-group {
            padding-right: 25px;
        }

        .form-control, .btn {
            border-radius: 0px;
        }

        /* Toast message style */
        #toastMessage {
            width: 400px;;
            height: 70px;
            position: absolute;
            margin-left: 37%;
            margin-right: 37%;
            top: 30%;
            /*margin-left:-15%;*/
            bottom: 10px;
            background-color: #00ffff;
            color: #F0F0F0;
            font-family: Calibri;
            font-size: 20px;
            padding: 10px;
            text-align: center;
            border-radius: 2px;
            -webkit-box-shadow: 0px 0px 24px -1px rgba(56, 56, 56, 1);
            -moz-box-shadow: 0px 0px 24px -1px rgba(56, 56, 56, 1);
            box-shadow: 0px 0px 24px -1px rgba(56, 56, 56, 1);
        }

    </style>

    <script type="text/javascript">
        var onResize = function () {
            // apply dynamic padding at the top of the body according to the fixed navbar height
            $("#recipeSearchForm").css("margin-top", $(".navbar-fixed-top").height());
        };

        // attach the function to the window resize event
        $(window).resize(onResize);

        $(document).ready(function (e) {
            onResize();
            recipeSearch();
        });

        //j query to view delete confirm modal
        $(document).on('click', '.deleteRecipeButton', function (e) {
            var deleteRecipeId = $(this).attr('id');
            $('#recipeDeleteConfirmModal').modal({show: true, keyboard: true});  // put your modal id
            $('#recipeId').attr("value", deleteRecipeId);
        });


        $(document).on('click', '#recipeSearchBtn', function (e) {
            recipeSearch();
        });

        function recipeSearch() {

            var sText = document.getElementById('searchRecipeText').value;
            ///////////////////To get the recipe category///////////////
            var sCateOpt = document.getElementById('recipeCategoryDelete');
            var sCate = sCateOpt.options[sCateOpt.selectedIndex].value;
            ////////////////////////////////////////////////////////////

            /////To get the recipe search parameter type using jquery//////
            var sParam = $('input[name="searchParamRadio"]:checked').val();

            $.ajax({
                type: "POST",
                url: "/Ambula/recipes/adminRecipeSearch",
                data: {searchText: sText, searchCate: sCate, searchParam: sParam},
                success: function (response) {
                    var myVar = JSON.parse(response);
                    var i = 0;
                    var string = "";
                    while (myVar[i]) {
                        string += "<div  class='col-lg-4' style='display: inline-block;'>";
                        string += " <div  class='w3-card-4' style='width:300px;;margin-left: 65px; margin-bottom: 30px' >";
                        string += "   <img src='/Ambula/uploads/" + myVar[i].idRecipe + "/thumb.jpg' alt='Car' style='width:300px; height:250px'>";
                        string += "   <div class='w3-container' style='padding-top: 10px; padding-bottom: 10px'>";
                        string += "       <p class='recipeTitle'>" + myVar[i].title + "</p>";
                        string += "       <a class='w3-btn' href='/Ambula/recipes/viewRecipe/" + myVar[i].idRecipe + "' style='background-color: #5bc0de' target='_blank'>View More</a>";
                        string += "       <a class='w3-btn w3-red deleteRecipeButton' id='" + myVar[i].idRecipe + "' style='float: right; width: 110px'>Delete</a>";
                        string += "   </div>";
                        string += "  </div>";
                        string += "</div>";
                        i++;
                    }
                    //alert(string);
                    $("#search-content").html(string);
                }
            });
        }
    </script>
</head>

<body style="">
<div class="container-fluid">
    <!--Header START -->
    <div class="row">
        <?php $this->view('_template/navigation_menu', "newRecipe") ?>
    </div>

    <div class="row" id="recipeSearchForm">
        <nav class="navbar navbar-default" style="background: #ff960e; color: #fff">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                            data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <span class="navbar-toggle collapsed" data-toggle="collapse"
                          data-target="#bs-example-navbar-collapse-1" aria-expanded="false"
                          style="float: left; margin-left: 30px; cursor: pointer">Tap to Search Recipes for Deletion</span>
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <form class="navbar-form" id="searchform" onsubmit="recipeSearch(); return false;">
                        <div class="form-group">
                            <label for="sel1">Select Recipe Category</label>
                            <select class="form-control" id="recipeCategoryDelete" name="recipeCategoryDelete">
                                <option value="" selected hidden disabled>Select Category..</option>
                                <?php
                                $recipeCates = json_decode($this->getCategoriesArray(), true);
                                foreach ($recipeCates as $catecory) {
                                    ?>
                                    <option value="<?= $catecory['idCategory'] ?>"><?= $catecory['title'] ?></option>
                                <?php } ?>

                            </select>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" name="searchRecipeText" id="searchRecipeText"
                                   placeholder="Search" style="width: 290px; display: inline">
                            <a id="recipeSearchBtn" class="btn btn-default">Search <i
                                    class="glyphicon glyphicon-search"></i></a>
                        </div>

                        <div class="form-group">
                            <label class="radio-inline"><input type="radio" name="searchParamRadio" value="title"
                                                               checked="checked">Recipe Title</label>
                            <label class="radio-inline"><input type="radio" name="searchParamRadio" value="id">Recipe Id</label>
                            <!--<label class="radio-inline"><input type="radio" name="searchParamRadio" value="username">Owner UserName</label> -->
                            <!-- to be implemented later -->
                        </div>

                    </form>
                </div>
            </div>
        </nav>
    </div>

    <!-- Modal Dialog for confirming delete of a recipe -->

    <div class="modal fade" id="recipeDeleteConfirmModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="false" data-backdrop="true">
        <div class="modal-dialog modal-dialog-center" id="modalBody" style="height:500px;">

            <div class="modal-content row">
                <div class="col-lg-12">
                    <div class="modal-header row w3-orange">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Confirm Recipe Delete</h4>
                    </div>
                    <div class="modal-body row">
                        <div class="col-sm-12">
                            <div class="alert w3-red row">
                                Are you sure you want to premenently delete this recipe from Ambula&trade; ?
                                This action cannot be undone !
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer row">
                        <div class="col-sm-12">
                            <div class="row">
                                <form role="form" method="post" action="/Ambula/recipes/adminRecipeDelete"
                                      enctype="application/x-www-form-urlencoded">
                                    <button type="submit" class="w3-btn w3-red" role="button" style="min-width: 100px">
                                        Yes
                                    </button>
                                    <button class="w3-btn w3-blue" role="button" data-dismiss="modal"
                                            style="min-width: 100px">No
                                    </button>
                                    <input type="hidden" id="recipeId" name="deleteRecipeId" value="">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- recipe search content displaying div tag -->
    <div class="row">
        <div class="col-lg-12">
            <h3 class="search-result-heading">Recipes To Permanently Delete</h3>

            <div id="search-content" style="padding-left: 5%; padding-right: 5%">

            </div>
        </div>
    </div>
</div>

<div class='' id='toastMessage' style='display:none'>Selected Recipe was Successfully deleted from
    Ambula&trade;</div>

<?php if (isset($_SESSION['recipeDeleted']) && $_SESSION['recipeDeleted'] == true) {
    echo "
        <script type='text/javascript'>
            $('#toastMessage').fadeIn(400).delay(3000).fadeOut(400);
            $('#toastMessage').attr('class', 'w3-container w3-green');
            $('#toastMessage').html('Selected Recipe Was Successfully Deleted From Ambula&trade;');
        </script>";
} else if (isset($_SESSION['recipeDeleted']) && $_SESSION['recipeDeleted'] == false) {
    echo "
        <script type='text/javascript'>
            $('#toastMessage').fadeIn(400).delay(3000).fadeOut(400);
            $('#toastMessage').attr('class', 'w3-container w3-red');
            $('#toastMessage').html('An Error Occurred While Deleting The Recipe From Ambula&trade;');
        </script>";
}
unset($_SESSION['recipeDeleted']);
?>
</body>
</html>