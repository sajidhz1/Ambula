<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>The Ambula</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="http://localhost/Ambula/public/css/bootstrap.css" rel="stylesheet" media="screen"/>
    <link href="http://localhost/Ambula/public/css/custom.css" rel="stylesheet" media="screen"/>
    <link href="http://localhost/Ambula/public/css/color1.css" rel="stylesheet" media="screen"/>

    <!-- fav icon -->
    <link rel="icon" href="http://localhost/Ambula/public/img/fav_ico.png" type="image/gif" sizes="16x16">

    <script type="text/javascript" src="http://localhost/Ambula/public/js/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="http://localhost/Ambula/public/js/typeahead.js"></script>

    <script src="http://localhost/Ambula/public/js/bootstrap.min.js"></script>

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

        #image{
            float: right;
            width: 200px;
            height: 150px;
            border: groove;
        }

        .uploader {position:relative; overflow:hidden;  background:#f3f3f3; border:2px dashed #e8e8e8;}

        #filePhoto1 , #filePhoto2{
            position:absolute;
            width:150px;
            height:150px;
            top:-50px;
            left:0;
            z-index:3;
            opacity:0;
            cursor:pointer;
        }

        .uploader img{
            position: relative;
            left  : -14px;
        }
    </style>
</head>

<body>

<!--Header START -->
<?php $this->view('_template/navigation_menu', "newRecipe") ?>
<div class="container-fluid pages">
    <form action="/Ambula/FoodProducts/addProduct" method="POST" enctype="multipart/form-data" id="form1" >
    <div class="col-lg-12 ingredients-control">
        <div class="col-lg-12 col-sm-12" id="fields">
            <label class="control-label" for="field1"><h3>Add New Product</h3></label>
            <br>
            <span id="ing_error" style="color: red;"></span>
            <br>

            <div class="col-xs-5 col-sm-3" style="color: brown"> Name</div>
            <div class="col-xs-5 col-sm-2" style="color: brown"> Category</div>
            <div class="col-xs-2 col-sm-3" style="color: brown"> Short Description</div>
            <div class="col-xs-2 col-sm-4" style="color: brown">Thumbnail Image</div>
            <br>
            <br>

            <div class="entry" >
                <div  class="row" style="margin-bottom: 15px;" >
                    <div class="col-xs-5 col-sm-5 col-lg-3">
                        <input class="form-control" name="product_name" type="text"
                               placeholder="Example : sugar , salt"/>
                    </div>
                    <div class="dropdown col-xs-3 col-sm-3 col-lg-2">
                        <select class="form-control" name="category">
                            <option value="">select</option>
                            <option value="1">kg</option>
                            <option value="2">g</option>
                            <option value="3">oz</option>
                            <option value="4">tbspn</option>
                            <option value="tspn">tspn</option>
                            <option value="cup">Cup</option>
                            <option value="ml">ml</option>
                            <option value="l">l</option>
                            <option value="packet">packet</option>
                            <option value="drops">drops</option>
                            <option value="pieces">pieces</option>
                            <option value="pinch">pinch</option>
                            <option value="tin">tin</option>

                        </select>
                    </div>
                    <div class="col-xs-2 col-sm-2 col-lg-3">
                        <textarea class="form-control" name="description" placeholder="short description" type="text" ></textarea>
                    </div>
                    <div class="col-xs-1 col-sm-2 col-lg-4"  >
                        <div class="col-lg-8">
                            <div class="uploader col-lg-6" >

                                <img width="110" height="110" class="thumb" src="http://localhost/Ambula/public/img/no_preview_available.jpg"/>
                                <input type="file"  name="product_thumb" onchange="$(this).siblings('img').attr('src' ,window.URL.createObjectURL(this.files[0]));" id="filePhoto1" />
                            </div>

                            <div class=" col-lg-6" >


                            </div>

                        </div>
                        <div class="col-lg-4" style="display: inline-block;vertical-align: middle;" >
                            <button class="btn btn-success btn-add" style="margin-top: 30%;">
                               Add  <span class="glyphicon glyphicon-plus"></span>
                            </button>

                        </div>

                    </div>
                    <br>

                </div>
            </div>

        </div>
    </div>
        </form>

    <div class="col-lg-12"  style="border: 1px solid black;">
        <?php
        ?>
        <table border="1" style="margin-top: 15px;">
            <tbody>
        <?php
        $arr = json_decode($this->viewUserProducts(Session::get('coporate_user_id')), true);
        foreach ($arr as $product) { ?>
            <tr>
                <td class="col-lg-3"><?=$product['product_name'] ?></td>
                <td class="col-lg-3"><?=$product['description'] ?></td>
                <td class="col-lg-2"><img style="padding: 2px;" src="/Ambula/<?=$product['img_url'] ?>" height="100" width="100" alt=""/></td>
                <td class="col-lg-2">category</td>

                <td class="col-lg-2"><a href="" class="btn btn-default">edit <span class="glyphicon glyphicon-pencil"></span></a>
                                     <a href="" class="btn btn-danger">remove <span class="glyphicon glyphicon-trash"></span></a>
                </td>
            </tr>
        <?php } ?>
            </tbody>
         </table>
    </div>
</div>
<script>

   $(function() {

       //form submit
       $('#form1').on('submit', function() {


                       $.ajax({
                           url: $(this).attr('action'),
                           type: $(this).attr('method'),
                           data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                           contentType: false,       // The content type used when sending data to the server.
                           cache: false,             // To unable request pages to be cached
                           processData: false,        // To send DOMDocument or non processed data file it is set to false
                           success: function (json) {

                           var  data = $.parseJSON(json);
                              //  alert(data.product_name);

                               $('<tr>' +
                               '<td class="col-lg-3" >'+data.product_name+'</td>' +
                               '<td class="col-lg-3">'+data.description+'</td>' +
                               '<td class="col-lg-2"><img src="/Ambula/'+data.thumb_url+'" style="padding: 2px;" height="100" width="100"  alt=""/></td>' +
                               '<td class="col-lg-2">'+data.category+'</td>' +
                               '<td class="col-lg-2"><a href="" class="btn btn-default">edit <span class="glyphicon glyphicon-pencil"></span></a>'+
                               ' <a href="" class="btn btn-danger">remove <span class="glyphicon glyphicon-trash"></span></a></td>' +
                               '</tr>').prependTo("table > tbody");


                           }
                       });

            return false;
       });


   });

</script>
</body>
</html>
