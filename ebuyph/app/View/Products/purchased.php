<style type="text/css">
input[type=file]{
    width:110px;
    color:transparent;
}
</style>
<main>
    <div class="row">
            <div class="row">
                <div class="container col-10">
                    <section class="form-simple">
                        <!--Form with header-->
                        <div class="card" style="">
                            <!--Header-->
                            <div class="header pt-3 red lighten-2">
                                <div class="row d-flex justify-content-start">
                                    <h3 class="deep-grey-text mt-3 mb-4 pb-1 mx-5">My Products</h3>
                                </div>
                            </div>
                            <!--Header-->
                            <div class="card-body mx-4 mt-4">
                                <div class="table-responsive">
                                    <table class="table product-table">
                                        <!-- Table head -->
                                    <?php if(sizeof($myPurchasedProducts) > 0) { ?>
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Order ID</th>
                                                <th>Product</th>
                                                <th>Description</th>
                                                <th>Color</th>
                                                <th>Size</th>
                                                <th>Price</th>
                                                <th>QTY</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <!-- /.Table head -->
                                        <!-- Table body -->
                                        <tbody>
                                                <?php foreach($myPurchasedProducts as $myproduct): ?>
                                                    <!-- First row -->
                                                    <tr>
                                                        <th scope="row">
                                                            <?php echo $this->Html->image('upload_folder/'.AuthComponent::password($myproduct['ProductInformation']['user_id']).'/'.$myproduct['ProductPicture']['picture']); ?>
                                                        </th>
                                                        <td>
                                                            <p class="text-center"><?php echo ucfirst($myproduct['ProductCart']['order_id']); ?></p>
                                                        </td>
                                                        <td>
                                                            <h5><strong><?php echo ucfirst($myproduct['ProductInformation']['product_name']); ?></strong></h5>
                                                            <p><?php echo ucfirst($myproduct['ProductInformation']['product_type']); ?></p>
                                                            <p class="text-muted">by <?php echo $this->Session->read('Auth')['User']['first_name']; ?></p>
                                                        </td>
                                                        <td>
                                                            <p><?php echo ucfirst($myproduct['ProductInformation']['product_description']); ?></p>
                                                        </td>
                                                        <td><?php echo $myproduct['ProductInformation']['product_colors']; ?></td>
                                                        <td><?php echo $myproduct['ProductInformation']['product_variation_type']; ?></td>
                                                        <td>$<?php echo $myproduct['ProductInformation']['product_price']; ?></td>
                                                        <td><?php echo $myproduct['ProductCart']['quantity']; ?></td>
                                                        <td><?php echo $myproduct['Payments']['date']; ?></td>
                                                        <td>
                                                            <button type="button" class="btn btn-sm btn-primary waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="" data-original-title="Remove item">Cancel Order
                                                            </button>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            <!-- /.Fourth row -->
                                        </tbody>
                                    <?php } else { ?>
                                        <tr>
                                            <p class="text-center">You don't have products on sale.</p>
                                            <div class="text-center">
                                                <a href="sell" class="text-center btn btn-primary waves-effect waves-light">Start selling Products</a>
                                            </div>
                                        </tr>
                                    <?php } ?>
                                        <!-- /.Table body -->
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!--/Form with header-->
                    </section>
                </div>
                <div class="w-100"></div>
                <div class="col-9 container">
                    <section class="section">
                        <!-- Section heading -->
                        <div class="divider-new pb-1">
                            <h2 class="h2-responsive">Featured Products on Store</h2>
                        </div>
                        <!-- First row -->
                        <div class="row">
                            <!-- First column -->
                            <div class="col-lg-4 col-md-12 mb-1">
                                <!-- Card -->
                                <div class="card card-cascade narrower">
                                    <!-- Card image -->
                                    <div class="view overlay hm-white-slight z-depth-1">
                                        <img src="http://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Products/img%20%283%29.jpg" class="img-fluid" alt="">
                                        <a>
                                            <div class="mask waves-light waves-effect waves-light"></div>
                                        </a>
                                    </div>
                                    <!-- /.Card image -->
                                    <!-- Card content -->
                                    <div class="card-body text-center">
                                        <!-- Category & Title -->
                                        <a href="" class="text-muted"><h5>Handbags</h5></a>
                                        <h4 class="card-title"><strong><a href="">Brown Handbag</a></strong></h4>
                                        <!-- Description -->
                                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing minima veniam elit. Nam incidunt eius est voluptatibus.
                                        </p>
                                        <!-- Card footer -->
                                        <div class="card-footer">
                                            <span class="left">39$</span>
                                            <span class="right">
                                            <a class="" data-toggle="tooltip" data-placement="top" title="" data-original-title="Quick Look"><i class="fa fa-eye"></i></a>
                                            <a class="" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add to Wishlist"><i class="fa fa-heart"></i></a>
                                            </span>
                                        </div>
                                    </div>
                                    <!-- /.Card content -->
                                </div>
                                <!-- /.Card -->
                            </div>
                            <!-- /.First column -->
                            <!-- Second column -->
                            <div class="col-lg-4 col-md-6 mb-1">
                                <!-- Card -->
                                <div class="card card-cascade narrower">
                                    <!-- Card image -->
                                    <div class="view overlay hm-white-slight z-depth-1">
                                        <img src="http://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Products/img%20%284%29.jpg" class="img-fluid" alt="">
                                        <a>
                                            <div class="mask waves-light waves-effect waves-light"></div>
                                        </a>
                                    </div>
                                    <!-- /.Card image -->
                                    <!-- Card content -->
                                    <div class="card-body text-center">
                                        <!-- Category & Title -->
                                        <a href="" class="text-muted"><h5>Packages</h5></a>
                                        <h4 class="card-title"><strong><a href="">Summer Pack</a></strong></h4>
                                        <!-- Description -->
                                        <p class="card-text">Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates.
                                        </p>
                                        <!-- Card footer -->
                                        <div class="card-footer">
                                            <span class="left">49$</span>
                                            <span class="right">
                                            <a class="" data-toggle="tooltip" data-placement="top" title="" data-original-title="Quick Look"><i class="fa fa-eye"></i></a>
                                            <a class="active" data-toggle="tooltip" data-placement="top" title="" data-original-title="Added to Wishlist"><i class="fa fa-heart"></i></a>
                                            </span>
                                        </div>
                                    </div>
                                    <!-- /.Card content -->
                                </div>
                                <!-- /.Card -->
                            </div>
                            <!-- /.Second column -->
                            <!-- Third column -->
                            <div class="col-lg-4 col-md-6">
                                <!-- Card -->
                                <div class="card card-cascade narrower">
                                    <!-- Card image -->
                                    <div class="view overlay hm-white-slight z-depth-1">
                                        <img src="http://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Products/img%20(40).jpg" class="img-fluid" alt="">
                                        <a>
                                            <div class="mask waves-light waves-effect waves-light"></div>
                                        </a>
                                    </div>
                                    <!-- /.Card image -->
                                    <!-- Card content -->
                                    <div class="card-body text-center">
                                        <!-- Category & Title -->
                                        <a href="" class="text-muted"><h5>Backpacks</h5></a>
                                        <h4 class="card-title"><strong><a href="">Pink Backpack</a></strong></h4>
                                        <!-- Description -->
                                        <p class="card-text">Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam.
                                        </p>
                                        <!-- Card footer -->
                                        <div class="card-footer">
                                            <span class="left">69$</span>
                                            <span class="right">
                                            <a class="" data-toggle="tooltip" data-placement="top" title="" data-original-title="Quick Look"><i class="fa fa-eye"></i></a>
                                            <a class="" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add to Wishlist"><i class="fa fa-heart"></i></a>
                                            </span>
                                        </div>
                                    </div>
                                    <!-- /.Card content -->
                                </div>
                                <!-- /.Card -->
                            </div>
                            <!-- /.Third column -->
                        </div>
                        <!-- /.First row -->
                    </section>
                </div>
            </div>
    </div>
</main>
<input type="hidden" id="user_id" value="<?php echo $this->Session->read('Auth')['User']['id']; ?>">
<?php echo $this->Html->script('product', array('inline' => false)); ?>
