<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>EBuyPH</title>
    <!-- Font Awesome -->
    <?php echo $this->Html->css('font-awesome.min'); ?>
    <?php echo $this->Html->css('bootstrap.min'); ?>
    <?php echo $this->Html->css('mdb.min'); ?>
    <?php echo $this->Html->css('style.css'); ?>
    <?php $action = $this->request->params['action']; 
        if($action == 'login' || $action == 'register' || !isset($this->Session->read('Auth')['User'])) {
            $home = false;
        }
        else {
            $home = true; 
            $data = $this->Session->read('Auth')['User'];
        }
    ?>
</head>
<body class="hidden-sn pink-skin animated">
    <!--Double navigation-->
    <header>
        <!-- Navbar -->
        <nav class="navbar fixed-top navbar-toggleable-md navbar-expand-lg  navbar-dark scrolling-navbar double-nav">
            <!-- Breadcrumb-->
            <div class="breadcrumb-dn mr-auto">
                <ol class="breadcrumb header-breadcrumb">
                    <li class="breadcrumb-item active">E-Buy PH</li>
                </ol>
            </div>
            <ul class="nav navbar-nav nav-flex-icons ml-auto">
                <li class="nav-item ">
                    <a class="nav-link" href="#" data-toggle="modal" data-target="#cart-modal-ex"><span class="badge red" id="cart_number"><?php echo (isset($this->Session->read('Auth')['User'])) ? "" : 0;  ?></span><i class="fa fa-shopping-cart" aria-hidden="true"></i></i> <span class="clearfix d-none d-sm-inline-block">My Cart</span></a>
                </li>
                <?php if($home == 1): ?>
                <li class="nav-item ">
                    <a class="nav-link" href="/products/myproducts"><span class="badge red"><?php echo (isset($product_count)) ? $product_count : 0; ?></span><i class="fa fa-shopping-cart" aria-hidden="true"></i></i> <span class="clearfix d-none d-sm-inline-block">My Products</span></a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="/products/purchased"><span class="badge red"><?php echo (isset($products_purchased)) ? $products_purchased : 0; ?></span><i class="fa fa-shopping-cart" aria-hidden="true"></i></i> <span class="clearfix d-none d-sm-inline-block">Purchased Products</span></a>
                </li>
                <?php endif; ?>
                <li class="nav-item ">
                    <a class="nav-link" href="/products/sell"><i class="fa fa-dollar" aria-hidden="true"></i></i> <span class="clearfix d-none d-sm-inline-block">Sell</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/products/shop"><i class="fa fa-tag"></i> <span class="clearfix d-none d-sm-inline-block">Shop</span></a>
                </li>
                <?php if($this->request->params['action'] == 'shop' && !isset($this->Session->read('Auth')['User']['id']) || $this->request->params['action'] == 'viewproduct' && !isset($this->Session->read('Auth')['User']['id'])): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="/home/login"><i class="fa fa-user"></i> <span class="clearfix d-none d-sm-inline-block">Login</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/users/register"><i class="fa fa-list"></i> <span class="clearfix d-none d-sm-inline-block">Register</span></a>
                    </li>
                <?php endif; ?>
                <?php if($home == 1){ ?>
                <li class="nav-item">
                    <a class="nav-link">
                        <?php
                            if($profile_picture['UserPicture']['picture'] != ""){
                                echo $this->Html->image('upload_folder/'.$profile_picture['UserPicture']['picture'],array('width' => '32px', 'height' => '20px','class' => 'img-thumbnail'));
                            }
                        ?>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php echo $data['first_name'].' '.$data['last_name']; ?>
                        </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                        <a class="dropdown-item" href="/users/changepassword">Change Password</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="/home/logout">
                            Logout
                        </a>
                    </div>
                </li>
                <?php } ?>
            </ul>
        </nav>
        <!-- /.Navbar -->
    </header>
    <?php echo $this->fetch('content'); ?>
    <!-- Footer -->
    <footer class="page-footer center-on-small-only">
        <!-- Footer Links -->
        <div class="container-fluid">
            <div class="row">
                <!-- First column -->
                <div class="col-lg-2 ml-auto">
                    <h5 class="title social-section-title">Social Media</h5>
                    <!-- Social Links -->
                    <div class="social-section text-md-left">
                        <ul class="text-center">
                            <!-- Facebook -->
                            <li><a class="btn-floating  btn-fb"><i class="fa fa-facebook"></i></a></li>
                            <!-- Instagram -->
                            <li><a class="btn-floating  btn-ins"><i class="fa fa-instagram"></i></a></li>
                            <!-- Twitter -->
                            <li><a class="btn-floating  btn-tw"><i class="fa fa-twitter"></i></a></li>
                        </ul>
                        
                    </div>
                    <!-- /.Social Links -->
                </div>
                <!-- /.First column -->
                <!-- Second column -->
                <div class="col-lg-2">
                    <h5 class="title">Delivery</h5>
                    <ul>
                        <li><a href="#">Store Delivery</a></li>
                        <li><a href="#">Online Delivery</a></li>
                        <li><a href="#">Delivery Terms & Conditions</a></li>
                        <li><a href="#">Tracking</a></li>
                    </ul>
                </div>
                <!-- /.Second column -->
                <!-- Third column -->
                <div class="col-lg-2">
                    <h5 class="title">Need help?</h5>
                    <ul>
                        <li><a href="#">FAQ</a></li>
                        <li><a href="#">Contact Us</a></li>
                        <li><a href="#">Return Policy</a></li>
                        <li><a href="#">Product Registration</a></li>
                    </ul>
                </div>
                <!-- /.Third column -->
                <!-- Fourth column -->
                <div class="col-lg-4">
                    <h5 class="title">Instagram Photos</h5>

                    <ul class="instagram-photos">
                        <li>
                            <div class="view overlay hm-white-slight z-depth-1">
                                <?php echo $this->Html->image('img%20(9).jpg',array('class' => 'img-fluid')); ?>
                                <a href="#">
                                    <div class="mask waves-light"></div>
                                </a>
                            </div>
                        </li>
                        <li>
                            <div class="view overlay hm-white-slight z-depth-1">
                                <?php echo $this->Html->image('img%20(20).jpg',array('class' => 'img-fluid')); ?>
                                <a href="#">
                                    <div class="mask waves-light"></div>
                                </a>
                            </div>
                        </li>
                        <li>
                            <div class="view overlay hm-white-slight z-depth-1">
                                <?php echo $this->Html->image('img%20(19).jpg',array('class' => 'img-fluid')); ?>
                                <a href="#">
                                    <div class="mask waves-light"></div>
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
                <!-- /.Fourth column -->
            </div>
        </div>
        <!--/.Footer Links-->
        <!-- Copyright -->
        <div class="footer-copyright">
            <div class="container-fluid">
                &copy; 2017 Copyright: <a href="http://www.MDBootstrap.com"> EBuyPH.com</a>
            </div>
        </div>
        <!-- /.Copyright -->
    </footer>
    <!-- /.Footer -->
    <!-- Cart Modal -->
    <div class="modal fade cart-modal" id="cart-modal-ex" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <!-- Content -->
            <div class="modal-content">
                <!-- Header -->
                <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Your cart</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    
                </div>
                <!-- Body -->
                <div class="modal-body">

                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Product name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Remove</th>
                            </tr>
                        </thead>
                        <tbody id="cart_data">
                        </tbody>
                    </table>
                    <?php echo $this->Html->link('Checkout',array('controller' => 'payments','action' => 'checkout'),array('class' => 'btn btn-primary')); ?>
                </div>
                <!-- Footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
            <!-- /.Content -->
        </div>
    </div>
    <!-- /.Cart Modal -->      
    <!-- Modal Subscription -->
    <div class="modal fade modal-ext" id="modal-subscription" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <!-- Content -->
            <div class="modal-content">
                <!-- Header -->
                <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Subscribe</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!-- Body -->
                <div class="modal-body">
                    <p>We'll write rarely, but only the best content.</p>
                    <br>
                    <div class="md-form">
                        <i class="fa fa-user prefix"></i>
                        <input type="text" id="form22" class="form-control">
                        <label for="form22">Your name</label>
                    </div>
                    <div class="md-form">
                        <i class="fa fa-envelope prefix"></i>
                        <input type="text" id="form32" class="form-control">
                        <label for="form32">Your email</label>
                    </div>
                    <div class="text-center">
                        <button class="btn btn-primary">Submit</button>
                    </div>
                </div>
                <!-- Footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
            <!-- /.Content -->
        </div>
    </div>
    <!-- SCRIPTS -->
    <!-- JQuery -->
    <?php echo $this->Html->script('jquery-3.1.1.min'); ?>
    <?php echo $this->Html->script('popper.min'); ?>
    <?php echo $this->Html->script('bootstrap.min'); ?>
    <?php echo $this->Html->script('mdb.min'); ?>
    <?php echo $this->fetch('script'); ?>
</body>
</html>