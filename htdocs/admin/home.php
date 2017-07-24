<?php
require_once("../../includes/initialize.php");
if(!$session->is_logged_in()) {
    redirect_to("../login.php");
}
include_layout_template("header.html");
?>
<li class="active"><a href="home.php" class="waves-effect waves-button"><span class="menu-icon icon-speedometer"></span><p>Dashboard</p></a></li>
                        <li><a href="all_products.php" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-home"></span><p>All Products</p></a></li>
                        <li><a href="all_users.php" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-edit"></span><p>All Users</p></a></li>
                        

                    </ul>
                </div><!-- Page Sidebar Inner -->
            </div><!-- Page Sidebar -->
            <div class="page-inner">
                <div class="page-breadcrumb">
                    <ol class="breadcrumb container">
                        <li><a href="index.html">Home</a></li>
                        <li class="active">Dashboard</li>
                    </ol>
                </div>
                <div class="page-title">
                    <div class="container">
                        <h3>Dashboard</h3>
                    </div>
                </div>
                <div id="main-wrapper" class="container">
                    
                    <div class="row">
                        
                   

                         <div class="col-md-6">
                            <div class="panel panel-purple">
                                <a href="all_products.php">
                                <div class="panel-heading">
                                    <h3 class="panel-title">List all products</h3>
                                </div>
                                <div class="panel-body">
                                    <p>All Products</p>
                                </div>
                                </a>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="panel panel-white">
                                <a href="all_users.php">
                                <div class="panel-heading">
                                    <h3 class="panel-title">List all Customers</h3>
                                </div>
                                <div class="panel-body">
                                    <p>All your customers</p>
                                </div>
                                </a>
                            </div>
                        </div>
                           </div>
                           <div class="row">
                               
                               <?php
                          include_layout_template("footer.html");
                              ?>