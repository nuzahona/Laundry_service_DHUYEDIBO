<!-- connection file -->

<?php
include('../includes/connect.php');
include('../functions/functions.php');
?>

<!-- body -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manager Dashboard</title>
    <!--bootstrap css link--> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    

    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" 
    integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" 
    referrerpolicy="no-referrer" />
    
    <!--css file--> 
    <link rel="stylesheet" href="../style.css">

    <style>
        .admin_image{
        width:100px;
        object-fit: contain;
        }
        .footer{
            position:absolute;
            bottom:0;
        }
        body{
            overflow-x:hidden;

        }
        .product_img{
            width:100px;
            object-fit:contain;

        }
    </style>
</head>
<body>
<!--navbar-->
<div class="container-fluid" p=0>
    <!-- first child--> 
    <nav class="navbar navbar-expand-lg navbar-light bg-info">
        <div class="container-fluid">
          <img src="../images/logo.png" alt="" class="logo">
           <nav class="navbar navbar-expand-lg">
                <ul class="navbar-nav">
                    <li class="nav-item">
                      <a href="" class="nav-link">Welcome Manager</a>
                    </li>
                </ul>
            </nav>
        </div>
      </nav>
    </div>
    <!--second child--> 
    <div class="bg-light">
        <h3 class="text-center p-2">Details</h3>
    </div>
    <!-- third child-->
    <div class="row">
        <div class="col-md-12 bg-secondary p-1 d-flex align-items-center"> 
            <div class="p-3">
                <a href="#"><img src="../images/admin.png"
                alt="" class="admin_image"></a>
                <p class="text-light text-center">Admin Name</p>
            </div>
            <div class="button text-center">
                <!--button*10>a.nav-link.text-light.big-info.my-1-->
                <!--wrote this above line to get bellow lines--> 
                <button class="my-3"><a href="insert_product.php" class="nav-link 
                text-light bg-info my-1">Insert Products </a></button>
                <button><a href="index.php?view_products" class="nav-link text-light bg-info my-1">View Products </a></button>
                <button><a href="index.php?list_orders" class="nav-link text-light bg-info my-1">All Orders </a></button>
                <button><a href="index.php?list_payments" class="nav-link text-light bg-info my-1">All Payments </a></button> 
                <button><a href="index.php?list_users" class="nav-link text-light bg-info my-1">List Users </a></button>
                <button><a href="admin_login.php" class="nav-link text-light bg-info my-1">Log Out</a></button>
                
            </div>
        </div>
    </div>
    
    <!-- fourth child -->
    <div class="container my-3">
        <?php
        if(isset($_GET['view_products'])){
            include('view_products.php');
        }
        if(isset($_GET['edit_products'])){
            include('edit_products.php');
        }
        if(isset($_GET['delete_product'])){
            include('delete_product.php');
        }
        if(isset($_GET['list_orders'])){
            include('list_orders.php');
        }
        if(isset($_GET['list_payments'])){
            include('list_payments.php');
        }
        
        if(isset($_GET['list_users'])){
            include('list_users.php');
        }
        ?>
    </div>

    <!--last child-->
    <?php include("../includes/footer.php") ?>

</div>


<!--bootstrap css link--> 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
