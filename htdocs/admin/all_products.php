<?php
require_once("../../includes/initialize.php");
if(!$session->is_logged_in()) {
    redirect_to("../login.php");
}
include_layout_template("header.html");
?>
<li><a href="home.php" class="waves-effect waves-button"><span class="menu-icon icon-speedometer"></span><p>Dashboard</p></a></li>
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
                        
                   

                        <div class="col-md-12">
                            <div class="panel panel-white">
                                <div class="panel-heading clearfix">
                                    <h4 class="panel-title">All Products</h4>
                                     <div class="panel-body">
                                  
                                </div>
                                </div>
                                <div class="panel-heading clearfix">
                                    <h4 class="panel-title">My Products</h4>
                                </div> 
                                <div class="panel-body">
                                   <div>
                                    <table id="example" class="display table" style="width: 100%; cellspacing: 0;">
                                        <thead>
                                            <tr>
                                                <th>Product Name</th>
                                                <th>Product Price($)</th>
                                                <th>Quantity Available</th>
                                                <th>Description</th>
                                                
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Product Name</th>
                                                <th>Product Price($)</th>
                                                <th>Quantity Available</th>
                                                <th>Description</th>
                                                
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php 
                                             $all_products = Products::find_all();
                                            if($all_products){
                                                
                                            
                                                    foreach($all_products as $p) {
                                                     


                                                        echo "<tr><td>". $p->product_name. "</td>";
                                                        echo "<td>". $p->product_price. "</td>";
                                                        echo "<td>". $p->qty_in_stock. "</td>";
                                                        echo "<td>". $p->description. "</td>";
                                                        echo "</tr>";
                                                    }
                                            }
                                            ?>
                                            
                                        </tbody>
                                       </table>  
                                    </div>
                                </div>
                            </div>
                        </div>
                    <a href="new_product.php" class="btn btn-success">Add new Product</a>
                        <?php
                          include_layout_template("footer.html");
                              ?>