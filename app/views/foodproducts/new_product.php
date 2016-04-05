<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>The Ambula</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="http://localhost/Ambula/public/css/bootstrap.css" rel="stylesheet" media="screen"/>
    <link href="http://localhost/Ambula/public/css/custom.css" rel="stylesheet" media="screen"/>
    <link href="http://localhost/Ambula/public/css/color1.css" rel="stylesheet" media="screen"/>
    <link href="http://localhost/Ambula/public/css/markitup-style.css" rel="stylesheet" media="screen"/>
    <link href="http://localhost/Ambula/public/css/markit-up-2.css" rel="stylesheet" media="screen"/>

    <script src="http://localhost/Ambula/public/js/bootstrap.min.js"></script>
    <!-- fav icon -->
    <link rel="icon" href="http://localhost/Ambula/public/img/fav_ico.png" type="image/gif" sizes="16x16">

    <script type="text/javascript" src="http://localhost/Ambula/public/js/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="http://localhost/Ambula/public/js/typeahead.js"></script>
    <script type="text/javascript" src="http://localhost/Ambula/public/js/food_products/jquery.markitup.js"></script>
    <script type="text/javascript" src="http://localhost/Ambula/public/js/food_products/set.js"></script>

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

    <style>
        .registration-container {
            background: rgb(255, 255, 255); /* for IE */

            /* Rounded Corners */
            border-radius: 5px;
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;

            border: 1px solid #E0D6CC;
            float: right;
            padding-bottom: 20px;

        }

        label.valid {
            width: 24px;
            height: 24px;
            background: url(http://localhost/Ambula/public/img/valid.png) center center no-repeat;
            display: inline-block;
            text-indent: -9999px;
        }

        label.error {
            font-weight: bold;
            color: red;
            padding: 2px 8px;
            margin-top: 2px;
        }

        #image {
            float: right;
            width: 200px;
            height: 150px;
            border: groove;
        }

        .uploader {
            position: relative;
            overflow: hidden;
            background: #f3f3f3;
            border: 2px dashed #e8e8e8;
        }

        #filePhoto1, #filePhoto2 {
            position: absolute;
            width: 150px;
            height: 150px;
            top: -50px;
            left: 0;
            z-index: 3;
            opacity: 0;
            cursor: pointer;
        }

        .uploader img {
            position: relative;
            left: -14px;
        }
    </style>
</head>

<body>

<!--Header START -->
<?php $this->view('_template/navigation_menu', "newRecipe") ?>
<div class="container-fluid pages">
    <form action="/Ambula/FoodProducts/addProduct" method="POST" enctype="multipart/form-data" id="form1">
        <div class="col-lg-12 ingredients-control">
            <div class="col-lg-12 col-sm-12" id="fields">
                <label class="control-label" for="field1"><h3>Add New Product</h3></label>
                <br>
                <span id="ing_error" style="color: red;"></span>
                <br>

                <div class="col-xs-5 col-sm-3" style="background: red;color: #fff; border: 1px solid #fff;"><label
                        for="">Name</label></div>
                <div class="col-xs-5 col-sm-2" style="background: red;color: #fff; border: 1px solid #fff;"><label
                        for="">Category</label></div>
                <div class="col-xs-2 col-sm-3" style="background: red;color: #fff; border: 1px solid #fff;"><label
                        for="">Short Description</label></div>
                <div class="col-xs-2 col-sm-2" style="background: red;color: #fff; border: 1px solid #fff;"><label
                        for="">Thumbnail Image</label></div>
                <br>
                <br>

                <div class="entry">
                    <div class="row" style="margin-bottom: 25px;background: #f2f2f2;padding:10px 5px;">
                        <div class="col-xs-5 col-sm-5 col-lg-3">
                            <input class="form-control" id="product_name" name="product_name" type="text"
                                   placeholder="Example : sugar , salt"/>
                        </div>
                        <div class="dropdown col-xs-3 col-sm-3 col-lg-2">
                            <select class="form-control" name="category" id="categories">
                                <option value="">select</option>
                                <?php
                                $array = json_decode($this->loadUserCategories(), true);
                                foreach ($array as $category) {
                                    ?>

                                    <option
                                        value="<?= $category['id_product_categories']; ?>"><?= $category['title']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-xs-2 col-sm-2 col-lg-4">
                            <textarea class="form-control" id="textarea-1" name="description"
                                      placeholder="short description" type="text"></textarea>
                        </div>
                        <div class="col-xs-1 col-sm-2 col-lg-3">
                            <div class="col-lg-8">
                                <div class="uploader col-lg-6">

                                    <img width="110" height="110" class="thumb"
                                         src="/Ambula/public/img/no_preview_available.jpg"/>
                                    <input type="file" name="product_thumb"
                                           onchange="$(this).siblings('img').attr('src' ,window.URL.createObjectURL(this.files[0]));"
                                           id="filePhoto1"/>

                                </div>

                                <div class=" col-lg-6">
                                    <span style="font-size: 0.9em;color: #000000;"><- click or drop image here</span>

                                </div>

                            </div>
                            <div class="col-lg-4" style="display: inline-block;vertical-align: middle;">
                                <button class="btn btn-success btn-add" style="margin-top: 30%;">
                                    Add <span class="glyphicon glyphicon-plus"></span>
                                </button>

                            </div>

                        </div>
                        <br>

                    </div>
                </div>

            </div>
        </div>
    </form>

    <div class="col-lg-12" style="margin-bottom: 50px">
        <?php
        $arr = json_decode($this->viewUserProducts(Session::get('coporate_user_id')), true);
        echo '<span style="color: red">Showing (' . count($arr) . ') Products</span>'
        ?>
        <table border="1" style="margin-top: 15px;">
            <tbody>
            <?php
            foreach ($arr as $product) {
                ?>
                <tr style="">
                    <td class="col-lg-3"><label style="font-size: 1.1em;"><?= $product['product_name'] ?></label></td>
                    <td class="col-lg-3"><p><?= $product['description'] ?></p></td>
                    <td class="col-lg-1"><img style="padding: 2px;" src="/Ambula/<?= $product['img_url'] ?>"
                                              height="100" width="100" alt=""/></td>
                    <td class="col-lg-2"><?= $product['title'] ?></td>

                    <td class="col-lg-2"><a href="/Ambula/FoodProducts/editProduct/?pid=<?= $product['idproducts'] ?>"
                                            class="btn btn-default btn-edit">edit <span
                                class="glyphicon glyphicon-pencil"></span></a>
                        <a href="/Ambula/FoodProducts/deleteProduct/?pid=<?= $product['idproducts'] ?>"
                           class="btn btn-danger btn-remove">remove <span class="glyphicon glyphicon-trash"></span></a>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<footer class="footer">
    <div class="container" style="text-align:center;">
        <p class="text-muted">

        <p>&copy; 2015 The Ambula

        <p></p>
    </div>
</footer>
<script>


    $(function () {

        $('#textarea-1').markItUp(mySettings);

        //Delete button
        $('.btn-edit').on('click', function () {

            $.ajax({ // Send the username val to another checker.php using Ajax in POST menthod
                type: 'GET',
                url: $(this).attr('href'),
                success: function (responseText) {
                    var data = $.parseJSON(responseText);

                    $('#product_name').val(data.product_name);
                    $('#description').val(data.description);
                    $('#categories').val(data.Product_categories_id_product_categories);
                    $('.thumb').attr('src', '/Ambula/' + data.img_url);
                    $(".btn-add").html('Update');
                    $("#form1").attr('action', "/Ambula/FoodProducts/updateProduct");

                    $('<input>').attr({
                        type: 'hidden',
                        id: 'product_id',
                        name: 'product_id',
                        value: data.idproducts
                    }).appendTo('#form1');
                }
            });

            return false;
        });

        //Delete button
        $('.btn-remove').on('click', function () {
            $.ajax({ // Send the username val to another checker.php using Ajax in POST menthod
                type: 'GET',
                url: $(this).attr('href'),
                success: function (responseText) {
                    if (responseText == '1')
                        $(this).closest('tr').remove();
                }
            });

            return false;
        });

        //form submit
        $('#form1').on('submit', function () {
            alert("aad");
            $.ajax({
                url: $(this).attr('action'),
                type: $(this).attr('method'),
                data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                contentType: false,       // The content type used when sending data to the server.
                cache: false,             // To unable request pages to be cached
                processData: false,        // To send DOMDocument or non processed data file it is set to false
                success: function (json) {
                    var data = $.parseJSON(json);
                    alert(data);

                    $('<tr>' +
                    '<td class="col-lg-3" ><label style="font-size: 1.1em;">' + data.product_name + '</label></td>' +
                    '<td class="col-lg-3">' + data.description + '</td>' +
                    '<td class="col-lg-2"><img src="/Ambula/' + data.thumb_url + '" style="padding: 2px;" height="100" width="100"  alt=""/></td>' +
                    '<td class="col-lg-2">' + $("select[name='category'] option:selected").text() + '</td>' +
                    '<td class="col-lg-2"><a class="btn btn-default btn-edit" href="/Ambula/FoodProducts/editProduct/?pid=' + data.product_id + '" >edit <span class="glyphicon glyphicon-pencil"></span></a>' +
                    ' <a class="btn btn-danger btn-remove" href="/Ambula/FoodProducts/deleteProduct/?pid=' + data.product_id + '"  >remove <span class="glyphicon glyphicon-trash"></span></a></td>' +
                    '</tr>').prependTo("table > tbody");


                    $(this).closest('form').find("input[type=text] , input[type=file], textarea").val("");
                    $('.thumb').attr('src', '/Ambula/public/img/no_preview_available.jpg');
                }
            });

            return false;
        });


    });

</script>


</body>
</html>
