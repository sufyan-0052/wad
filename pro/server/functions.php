<?php
require_once "db_connection.php";

function getCats(){
    global $con;
    $getCatsQuery = "select * from categories";
    $getCatsResult = mysqli_query($con,$getCatsQuery);
    while($row = mysqli_fetch_assoc($getCatsResult)){
        $cat_id = $row['cat_id'];
        $cat_title = $row['cat_title'];
        echo "<li><a class='nav-link'  href='index.php?pro_cat=$cat_id'>$cat_title</a></li>";
    }
}
function getBrands(){
    global $con;
    $getBrandsQuery = "select * from brands";
    $getBrandsResult = mysqli_query($con,$getBrandsQuery);
    while($row = mysqli_fetch_assoc($getBrandsResult)){
        $brand_id = $row['brand_id'];
        $brand_title = $row['brand_title'];
        echo "<li><a class='nav-link'  href='index.php?pro_brand=$brand_id'>$brand_title</a></li>";
    }
}

function getPro(){
    global $con;
    $getProQuery='';
    if(isset($_GET['pro_cat'])){
        $cat_id=$_GET['pro_cat'];
        $getProQuery=" select * from products where pro_cat ='$cat_id' ";
    }
    elseif(isset($_GET['pro_brand'])){
        $brand_id=$_GET['pro_brand'];
        $getProQuery=" select * from products where pro_brand ='$brand_id'";
    }
    elseif(isset($_GET['search'])){
        $q=$_GET['search'];
        $getProQuery=" select * from products where pro_Keywords like '%$q%' ";
    }
    else{
        $getProQuery="select * from products";
    }
    $getProResult=mysqli_query($con,$getProQuery);
    while($row=mysqli_fetch_assoc($getProResult)) {
        $pro_title = $row['pro_title'];
        $pro_price = $row['pro_price'];
        $pro_image = $row['pro_image'];

        echo "
      
      <div class='col-sm-6 col-md-4 col-lg-3 text-center product-summary'>
                <h5 class='text-capitalize'> $pro_title </h5>
                <img src='admin/product_images/$pro_image' >
                <p> <b> $pro_price  </b> </p>
                <a href='#' class='btn btn-info btn-sm'>Details</a>
                <a href='#'>
                    <button class='btn btn-primary btn-sm'>
                        <i class='fas fa-cart-plus'></i> Add to Cart
                    </button>
                </a>
            </div>
    ";
    }
}


