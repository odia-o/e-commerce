<?php
require_once('../../includes/initialize.php');
if(!$session->is_logged_in()) {
    redirect_to("login.php");
}
?>


<html>
    <head>
        
        <!-- Title -->
        <title>E-commerce</title>
        
        <meta content="width=device-width, initial-scale=1" name="viewport"/>
        <meta charset="UTF-8">
        <meta name="description" content="Admin Dashboard Template" />
        <meta name="keywords" content="admin,dashboard" />
        <meta name="author" content="Steelcoders" />
        
        <!-- Styles -->
        <link href='http://fonts.googleapis.com/css?family=Ubuntu:300,400,500,700' rel='stylesheet' type='text/css'>
        <link href="../assets/plugins/pace-master/themes/blue/pace-theme-flash.css" rel="stylesheet"/>
        <link href="../assets/plugins/uniform/css/uniform.default.min.css" rel="stylesheet"/>
        <link href="../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="../assets/plugins/fontawesome/css/font-awesome.css" rel="stylesheet" type="text/css"/>
        <link href="../assets/plugins/line-icons/simple-line-icons.css" rel="stylesheet" type="text/css"/>	
        <link href="../assets/plugins/waves/waves.min.css" rel="stylesheet" type="text/css"/>	
        <link href="../assets/plugins/switchery/switchery.min.css" rel="stylesheet" type="text/css"/>
        <link href="../assets/plugins/3d-bold-navigation/css/style.css" rel="stylesheet" type="text/css"/>
        <link href="../assets/plugins/slidepushmenus/css/component.css" rel="stylesheet" type="text/css"/>	
        <link href="../assets/plugins/weather-icons-master/css/weather-icons.min.css" rel="stylesheet" type="text/css"/>	
        <link href="../assets/plugins/metrojs/MetroJs.min.css" rel="stylesheet" type="text/css"/>	
        <link href="../assets/plugins/datatables/css/jquery.datatables.min.css" rel="stylesheet" type="text/css"/>	
        <link href="../assets/plugins/datatables/css/jquery.datatables_themeroller.css" rel="stylesheet" type="text/css"/>	
        <link href="../assets/plugins/x-editable/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet" type="text/css">
        <link href="../assets/plugins/bootstrap-datepicker/css/datepicker3.css" rel="stylesheet" type="text/css"/>
        	
        <!-- Theme Styles -->
        <link href="../assets/css/modern.min.css" rel="stylesheet" type="text/css"/>
        <link href="../assets/css/custom.css" rel="stylesheet" type="text/css"/>
        
        <script src="../assets/plugins/3d-bold-navigation/js/modernizr.js"></script>
        


    </head>
    

    <body>

<div class="overlay"></div>
        <main class="page-content content-wrap">
            <div class="navbar">
                <div class="navbar-inner container">
                    <div class="logo-box">
                        <a href="index.html" class="logo-text"><span>E-commerce</span></a>
                    </div><!-- Logo Box -->
                    <div class="topmenu-outer">
    
                        <div class="top-menu">
 
                            <ul class="nav navbar-nav navbar-left">
                                <li><a href="../logout.php">logout</a></li>
	                               <li><a href="home.php">Home</a></li>
                                <li><a href="checkout.php">CheckOut</a></li>
                                    <li><a href="contact_us.php">Contact Us</a></li>
                                
                               
                            </ul>
                            
                        </div><!-- Top Menu -->
                    </div>
                    
                </div>
            </div><!-- Navbar -->
            
            <div class="page-inner">
                <div class="page-breadcrumb">
                    <ol class="breadcrumb container">
                        <li><a href="index.html">Home</a></li>
                        <li class="active">All products</li>
                    </ol>
                </div>
                <div class="page-title">
                    <div class="container">
                        <h3>Products</h3>
                    </div>
                </div>
                <div id="main-wrapper" class="container">
                         <div class="row">
<?php
                             if(isset($_SESSION['items'])){
               $items = $_SESSION['items'];
                             
                                 
                             
                             $g_total = 0;
                            // for($i = 0; $i< count($items); $i++) {
                             foreach($items as $k => $v){    
                             
            ?>
                        <div class="col-md-12">
                            <div class="panel panel-white">
                                <div class="panel-heading clearfix">
                                    <h4 class="panel-title"><?php echo $v->name; ?></h4>
                                     
                                </div>
                                <div class="panel-body">
                                    <p>Quantity Requested: <?php echo $v->qty; ?></p>
                                    <p>Total: <?php echo $v->total; $g_total += $v->total;?></p>
                                    <a class="btn" href="view_product.php?id=<?php echo $v->id; ?>">View Product</a> 
                                    <a class="btn" href="pay_single.php?index=<?php echo $k; ?>">Pay</a> 
                                    <a class="btn" href="remove.php?index=<?php echo $k; ?>">Remove</a> 
                                </div>
                            </div>
                             </div><?php } ?>
                             <div class="col-md-12">
                            <div class="panel panel-white">
                                <div class="panel-heading clearfix">
                                    <h4 class="panel-title">Grand Total : $<?php echo $g_total; ?> |
                                    <a class="btn" href="pay.php">Pay</a> |
                                    <a class="btn" href="clear.php">Clear</a> |
                                     </h4>
                                </div>
                                 </div></div>
        
                             

       
    <?php
                           //  var_dump($_SESSION['items']);
                             }
                             else {
                                 echo "<h1>Your Cart is empty</h1>";
                             }
                     
                          include_layout_template("footer.html");
                              ?>