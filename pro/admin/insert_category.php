<?php
$con = mysqli_connect("localhost", "root", "", "tech_box_db");
if (!$con)
    die("Connection failed");
?>
<?php
if (isset($_POST['insert_cat'])) {
    $cat_title = test_input($_POST['cat_title']);
}
if (!preg_match("/[a-zA-Z0-9]+/", $cat_title) || strlen($cat_title) < 2) {
    $response = array(
        "type" => "warning",
        "message" => "Enter Valid Category title."
    );
}
$insert_category = "insert into categories (cat_title) VALUES ('$cat_title');";
                $insert_cat = mysqli_query($con, $insert_category);
                if ($insert_cat) {
                    //header("location: ".$_SERVER['PHP_SELF']);
                    $response = array(
                        "type" => "success",
                        "message" => "Product uploaded successfully."
                    );
                }
                else {
                    $response = array(
                        "type" => "warning",
                        "message" => "Problem in uploading image files."
                    );
                }
?>
<form action="" method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="d-none d-sm-block col-sm-3 col-md-4 col-lg-2 col-xl-2 mt-auto">
            <label for="pro_title" class="float-md-right"> <span class="d-sm-none d-md-inline"> Category </span>
                Title:</label>
        </div>
        <div class="col-sm-9 col-md-8 col-lg-4 col-xl-4">
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fas fa-file-signature"></i></div>
                </div>
                <input type="text" class="form-control" id="cat_title" name="cat_title"
                       placeholder="Enter Category Title"
                    <?php
                    if (@$response["type"] == "warning") {
                        echo "value='$cat_title'";
                    }
                    ?>
                >
            </div>
        </div>
    </div>
    <div class="row my-3">
        <div class="d-none d-sm-block col-sm-3 col-md-4 col-lg-2 col-xl-2 mt-auto"></div>
        <div class="col-sm-9 col-md-8 col-lg-4 col-xl-4">
            <button type="submit" name="insert_pro" class="btn btn-primary btn-block"><i class="fas fa-plus"></i>
                Insert Now
            </button>
        </div>
    </div>
</form>
