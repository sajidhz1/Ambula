<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>The Ambula</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="/Ambula/public/css/bootstrap.css" rel="stylesheet" media="screen"/>
    <link href="/Ambula/public/css/bootstrap-theme.css" rel="stylesheet" media="screen"/>
    <link href="/Ambula/public/css/custom.css" rel="stylesheet" media="screen"/>
    <link href="/Ambula/public/css/color1.css" rel="stylesheet" media="screen"/>
    <link href="/Ambula/public/css/typeahead.css" rel="stylesheet" media="screen"/>


    <script type="text/javascript" src="/Ambula/public/js/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="/Ambula/public/js/bootstrap.min.js"></script>
    <script src="/Ambula/public/js/typeahead.js"></script>

<!-- fav icon -->
    <link rel="icon" href="/public/img/fav_ico.png" type="image/gif" sizes="16x16">
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
        .search-result-heading{
            padding:0px 0px 0px 10px; line-height:40px; border-bottom:2px solid #000; border-color:rgba(0,0,0,0.3);
            text-align: left;
            color:#dc4238;
        }
        h5{
            text-decoration: underline;
            color: #333;
        }
        .recipe-item:nth-child(3n+2){
            border-right: 1px dotted #a1a1a1;
            border-left: 1px dotted #a1a1a1;
        }
        .recipe-item{
            border-bottom: 1px dotted #a1a1a1;
        }

        </style>
</head>

<body style="">

<!--Header START -->
<?php $this->view('_template/navigation_menu', "newRecipe") ?>

<script type="text/javascript">

    $(document).on("click", ".pagination li a", function() {
        //e.preventDefault();
        var filter = '';
        if($('#q156,#q157').is(':checked'))  {
            filter = $(this).html();
        }

        $.ajax({
            url: '/Ambula/home/searchRecipes/<?php echo $this->search; ?>',
            type: 'POST',
            dataType: '',
            data: {page: $(this).html() },
            beforeSend: function() { $('#search-content').html('<img src="/public/img/loading.gif" />'); },
            success: function (data) {
                $('#search-content').empty();
                $('#search-content').append(data);
            }
        });
    });

    //change subcategory
    $(document).on('change', '#category', function(e) {

        alert($(this).val());
        $.ajax({ // Send the username val to another checker.php using Ajax in POST menthod
            type : 'POST',
            dataType: "json",
            url  : '/Ambula/home/getSubCategoriesByID/'+$(this).val(),
            data : {},
            success: function(responseText){
                // Get the result and asign to each cases
                var subcateories = $('#subcategory');
                subcateories.empty();

                var json = responseText;
                for(var i = 0; i < json.length; i++) {
                    var obj = json[i];

                    subcateories.append($("<option></option>")
                        .attr("value", obj.idRecipe_sub_category).text(obj.title));
                }
            }
        });

    });

    $(function () {



        $("#filters").on( "change", "#q156,#q157", function (e) {
            $('#search-content').empty();
            e.preventDefault();
            $.ajax({
                url: '/Ambula/home/searchRecipes/<?php echo $this->search; ?>',
                type: 'POST',
                dataType: '',
                data: {filter: $(this).val()},
                beforeSend: function() { $('#search-content').html('<img style="margin:25% 25%;" src="/Ambula/public/img/loading.gif" />'); },
                success: function (data) {
                    $('#search-content').empty();
                    $('#search-content').append(data);
                }
            });

        });

    });
</script>

<div class="container-fluid" style="margin-top: 75px;">
    <div class="search row">
        <div class="col-lg-6 col-md-offset-3">
            <div class="input-group">
                <input type="text" class="form-control" id="search" data-provide="typeahead" autocomplete="off" placeholder="Search for...">
                  <span class="input-group-btn">
                    <button class="btn btn-default" type="button">Search</button>
                  </span>
            </div><!-- /input-group -->
        </div><!-- /.col-lg-6 -->
    </div>
    <div class="row" style="margin-top: 20px;">
        <div class="col-lg-2" style="background:#f4f4f4;" >
            <h3>Filter Results</h3>
            <div class="col-lg-12">
                <span><h5>Choose Category</h5></span>
                <select class="form-control" id="category">
                    <?php
                    $arr=json_decode($this->viewCategories(),true);
                    foreach($arr as $category)
                    {
                        ?>
                        <option value="<?=$category['idCategory']; ?>"><?=$category['title']; ?></option>
                    <?php } ?>
                </select>
                <br>
                <span><h5>Choose SubCategory</h5></span>
                <select class="form-control" name="subcategory" id="subcategory">
                    <option value="0" >select sub category</option>
                </select>
                <br>
                <span><h5>filter by</h5></span>
                <div id="filters">
                    <label>
                        <input type="radio" id="q156" name="quality[25]" value="1" /> Vegetarian
                    </label>
                    <label>
                        <input type="radio" id="q157" name="quality[25]" value="2" /> Non-Vegetarian
                    </label>
                    <label>
                        <input type="radio" id="q157" name="quality[25]" value="" /> All
                    </label>
                 </div>
                </div>
        </div>
        <div class="col-lg-8" >
            <?php if(isset($_GET['query'])) { ?>
            <h3 class="search-result-heading">Showing results for "<?=$_GET['query'] ?>"</h3>


            <div id="search-content" >
                <?php $this->searchRecipes($this->search,$filter ='',1); ?>

            </div>
            <?php } ?>
    </div>
        <div class="col-lg-2" style="height: 400px;border: 1px solid #222;">
            <h4>Ad space</h4>
        </div>
</div>
 <footer class="footer" style="position:relative;bottom:0;background:#0C0C0C;width:100%;margin: 0;" >
        <div class="container" style="text-align:center;">
            <p class="text-muted"  ><p>&copy; 2015 The Ambula<p></p>
        </div>
    </footer>
</body>
</html>