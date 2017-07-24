<?php
require_once("../../includes/initialize.php");

if (isset($_POST['submit'])) {
    $p = new Products();
    $p->product_name = trim($_POST['product_name']);
    $p->product_price = trim($_POST['product_price']); 
    $p->qty_in_stock = trim($_POST['qty_in_stock']); 
    $p->description = trim($_POST['description']); 
    
    
    
    if($p->save()){
            redirect_to("all_products.php");
            
        }
        else {
            
                $message = "Something went wrong";
            
        }
    
    
}

?>
<!DOCTYPE html>
<html>
    <head>
        
        <!-- Title -->
        <title>E-commerce System | Register New Product</title>
        
        <meta content="width=device-width, initial-scale=1" name="viewport"/>
        <meta charset="UTF-8">
        <meta name="description" content="Admin Dashboard Template" />
        <meta name="keywords" content="admin,dashboard" />
        <meta name="author" content="Fusion Tech" />
        
        <!-- Styles -->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600' rel='stylesheet' type='text/css'>
        <link href="../assets/plugins/pace-master/themes/blue/pace-theme-flash.css" rel="stylesheet"/>
        <link href="../assets/plugins/uniform/css/uniform.default.min.css" rel="stylesheet"/>
        <link href="../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="../assets/plugins/fontawesome/css/font-awesome.css" rel="stylesheet" type="text/css"/>
        <link href="../assets/plugins/line-icons/simple-line-icons.css" rel="stylesheet" type="text/css"/>	
        <link href="../assets/plugins/offcanvasmenueffects/css/menu_cornerbox.css" rel="stylesheet" type="text/css"/>	
        <link href="../assets/plugins/waves/waves.min.css" rel="stylesheet" type="text/css"/>	
        <link href="../assets/plugins/switchery/switchery.min.css" rel="stylesheet" type="text/css"/>
        <link href="../assets/plugins/3d-bold-navigation/css/style.css" rel="stylesheet" type="text/css"/>	
        
        <!-- Theme Styles -->
        <link href="../assets/css/modern.min.css" rel="stylesheet" type="text/css"/>
        <link href="../assets/css/themes/green.css" class="theme-color" rel="stylesheet" type="text/css"/>
        <link href="../assets/css/custom.css" rel="stylesheet" type="text/css"/>
        
        <script src="../assets/plugins/3d-bold-navigation/js/modernizr.js"></script>
        <script src="../assets/plugins/offcanvasmenueffects/js/snap.svg-min.js"></script>
        
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        
    </head>
    
    <body class="page-login">
<form method="post" action="">
        <main class="page-content">
            <div class="page-inner">
                <div id="main-wrapper">
                    <div class="row">
                        <div class="col-md-3 center">
                            <div class="login-box">
                                <a href="index.html" class="logo-name text-lg text-center">E-commerce System</a>
                                    <?php $msg = "";if(isset($message)){$msg = $message;}echo output_message($msg); ?>
                                <p class="text-center m-t-md">Register a New Product</p>
                                <form class="m-t-md" action="index.html">
                                    <div class="form-group">
                                        <input type="text" name="product_name"  class="form-control" placeholder="Product Name" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="product_price" class="form-control" placeholder="Product Price" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="qty_in_stock" class="form-control" placeholder="Quantity Available" required>
                                    </div>
                                    <div class="form-group">
                                    <textarea name="description" required placeholder="Description"></textarea></div>
                                    <button type="submit" name="submit" class="btn btn-success btn-block">Add Product</button>
                                    
                                </form>
                                <p class="text-center m-t-xs text-sm">2017 &copy; by .</p>
                            </div>
                        </div>
                    </div><!-- Row -->
                </div><!-- Main Wrapper -->
            </div><!-- Page Inner -->
        </main><!-- Page Content -->
	
        </form>
        <!-- Javascripts -->
        <script src="../assets/plugins/jquery/jquery-2.1.4.min.js"></script>
        <script src="../assets/plugins/jquery-ui/jquery-ui.min.js"></script>
        <script src="../assets/plugins/pace-master/pace.min.js"></script>
        <script src="../assets/plugins/jquery-blockui/jquery.blockui.js"></script>
        <script src="../assets/plugins/bootstrap/js/bootstrap.min.js"></script>
        <script src="../assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script>
        <script src="../assets/plugins/switchery/switchery.min.js"></script>
        <script src="../assets/plugins/uniform/jquery.uniform.min.js"></script>
        <script src="../assets/plugins/offcanvasmenueffects/js/classie.js"></script>
        <script src="../assets/plugins/waves/waves.min.js"></script>
        <script src="../assets/js/modern.min.js"></script>
        
    </body>
</html>
