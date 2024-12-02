<?php

// include connect file
//include('./includes/connect.php');

//getting products
function getproducts(){
    global $con;
    if(!isset($_GET['category'])){
      if(!isset($_GET['brand'])){
    
    $select_query="Select * from `products` order by rand()";
$result_query=mysqli_query($con,$select_query);
//$row=mysqli_fetch_assoc($result_query);
//echo $row['product_name'];
while($row=mysqli_fetch_assoc($result_query)){
  $product_id=$row['product_id'];
  $product_name=$row['product_name'];
  $product_description=$row['product_description'];
  $product_image1=$row['product_image1'];
  $product_price=$row['product_price'];
  echo "<div class='col-md-4 mb-2'>
  <div class='card'>
              <img class='card-img-top' src='./img/$product_image1' alt='$product_name'>
              <div class='card-body'>
                <h5 class='card-title'>$product_name</h5>
                <p class='card-text'>$product_description</p>
                <p class='card-text'>Price: $product_price/-</p>
                <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to Cart</a>
                <a href='product_details.php?product_id=$product_id' class='btn btn-Secondary'>View More</a>
              </div>
    </div>
  </div>";
}
}
}
}


// get ip address function
function getIPAddress() {  
  //whether ip is from the share internet  
   if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
              $ip = $_SERVER['HTTP_CLIENT_IP'];  
      }  
  //whether ip is from the proxy  
  elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
              $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
   }  
//whether ip is from the remote address  
  else{  
           $ip = $_SERVER['REMOTE_ADDR'];  
   }  
   return $ip;  
}  
// $ip = getIPAddress();  
// echo 'User Real IP Address - '.$ip;

//cart function
function cart(){
  if(isset($_GET['add_to_cart'])){
    global $con;
    $get_ip_add = getIPAddress();
    $get_product_id=$_GET['add_to_cart'];
    $select_query="Select * from `cart` where ip_address='$get_ip_add' and product_id=$get_product_id";
    $result_query=mysqli_query($con,$select_query);
    $num_of_rows=mysqli_num_rows($result_query);
if($num_of_rows>0){
  echo "<script>alert('This item is already present inside the cart')</script>";
  echo "<script>window.open('index.php','_self')</script>";
}else{
  $insert_query="insert into `cart` (product_id,ip_address,quantity) values ($get_product_id,'$get_ip_add',0)";
  $result_query=mysqli_query($con,$insert_query);
  echo "<script>alert('Item is added to cart')</script>";
  echo "<script>window.open('index.php','_self')</script>";
}


  }

}

// function to get cart item number
function cart_item(){
  if(isset($_GET['add_to_cart'])){
    global $con;
    $get_ip_add = getIPAddress();
    $select_query="Select * from `cart` where ip_address='$get_ip_add'";
    $result_query=mysqli_query($con,$select_query);
    $count_cart_items=mysqli_num_rows($result_query);
}else{
  global $con;
    $get_ip_add = getIPAddress();
    $select_query="Select * from `cart` where ip_address='$get_ip_add'";
    $result_query=mysqli_query($con,$select_query);
    $count_cart_items=mysqli_num_rows($result_query);
}

echo  $count_cart_items;
  }

//call all products function
  function get_all_products(){
    global $con;
    if(!isset($_GET['category'])){
      if(!isset($_GET['brand'])){
    
    $select_query="Select * from `products` order by rand()";
    $result_query=mysqli_query($con,$select_query);
    //$row=mysqli_fetch_assoc($result_query);
    //echo $row['product_name'];
    while($row=mysqli_fetch_assoc($result_query)){
    $product_id=$row['product_id'];
    $product_name=$row['product_name'];
    $product_description=$row['product_description'];
    $product_image1=$row['product_image1'];
    $product_price=$row['product_price'];
    echo "<div class='col-md-4 mb-2'>
    <div class='card'>
              <img class='card-img-top' src='./img/$product_image1' alt='$product_name'>
              <div class='card-body'>
                <h5 class='card-title'>$product_name</h5>
                <p class='card-text'>$product_description</p>
                <p class='card-text'>Price: $product_price/-</p>
                <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to Cart</a>
                <a href='product_details.php?product_id=$product_id' class='btn btn-Secondary'>View More</a>
                </div>
    </div>
    </div>";
    }
    }
    }
    }
// total price function
function total_cart_price(){
  global $con;
  $get_ip_add = getIPAddress();
  $total_price=0;
  $cart_query="Select * from `cart` where ip_address='$get_ip_add'";
  $result=mysqli_query($con,$cart_query);
  while($row=mysqli_fetch_array($result)){
    $product_id=$row['product_id'];
    $select_products="Select * from `products` where product_id='$product_id'";
    $result_products=mysqli_query($con,$select_products);
    while($row_product_price=mysqli_fetch_array($result_products)){
      $product_price=array($row_product_price['product_price']); //[200,300]
      $product_values=array_sum($product_price); //[500]
      $total_price+=$product_values; //500
    }
  }
  echo $total_price;
}


//get user order details
function get_user_order_details(){
  global $con;
  $username=$_SESSION['username'];
  $get_details="Select * from `user_table` where username='$username'";
  $result_query=mysqli_query($con,$get_details);
  while($row_query=mysqli_fetch_array($result_query)){
    $user_id=$row_query['user_id'];
    if(!isset($_GET['edit_account'])){
      if(!isset($_GET['my_orders'])){
        if(!isset($_GET['delete_account'])){
          $get_orders="Select * from `user_orders` where user_id='$user_id' and order_status='pending'";
          $result_orders_query=mysqli_query($con,$get_orders);
          $row_count=mysqli_num_rows($result_orders_query);
          if($row_count>0){
            echo "<h3 class='text-center text-success mt-5 mb-2'>You have <span class='text-danger'>$row_count</span> pending orders</h3>
            <p class='text-center'><a href='profile.php?my_orders' class='text-dark'>Order Details</a></p>";
          }else{
            echo "<h3 class='text-center text-success mt-5 mb-2'>You have <span class='text-danger'>$row_count</span> pending orders</h3>
            <p class='text-center'><a href='../index.php' class='text-dark'>Explore products</a></p>";
          }
        }
      }
    }
  }
}
?>