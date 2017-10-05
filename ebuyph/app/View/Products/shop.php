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
                                    <h3 class="deep-grey-text mt-3 mb-4 pb-1 mx-5">Shop</h3>
                                </div>
                            </div>
                            <!--Header-->
                            <div class="card-body mx-4 mt-4">
                                <div class="table-responsive">
                                    <table class="table product-table">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Product</th>
                                                <th>Description</th>
                                                <th>Color</th>
                                                <th>Size</th>
                                                <th>Price</th>
                                                <th>QTY</th>
                                                <th><?php echo $this->Html->link('Export',array('controller'=>'users','action'=>'export'), array('target'=>'_blank'));?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <input type="hidden" id="user_id" value="<?php echo (isset($this->Session->read('Auth')['User']['id'])) ? $this->Session->read('Auth')['User']['id'] : ""; ?>">
                                            <?php $index = 0; ?>
                                            <?php if(sizeof($products) > 0) { ?>
                                                <?php $data_set = ""; ?>
                                                <?php (isset($this->Session->read('Auth')['User']['id'])) ? $data_set = $this->Session->read('Auth')['User']['id'] : $data_set = 'all'; ?>
                                                <?php foreach($products as $myproduct): ?>
                                                    <tr>
                                                        <th scope="row">
                                                            <?php echo $this->Html->image('upload_folder/'.AuthComponent::password($myproduct['User']['id']).'/'.$myproduct['ProductPicture']['product_picture']); ?>
                                                        </th>
                                                        <td>
                                                            <h5><strong><?php echo ucfirst($myproduct['ProductInformation']['product_name']); ?></strong></h5>
                                                            <p><?php echo ucfirst($myproduct['ProductInformation']['product_type']); ?></p>
                                                            <p class="text-muted">by <?php echo $myproduct['User']['first_name']; ?></p>
                                                        </td>
                                                        <td>
                                                            <p><?php echo ucfirst($myproduct['ProductInformation']['product_description']); ?></p>
                                                        </td>
                                                        <td><?php echo $myproduct['ProductInformation']['product_colors']; ?></td>
                                                        <td><?php echo $myproduct['ProductInformation']['product_variation_type']; ?></td>
                                                        <td>$<?php echo $myproduct['ProductInformation']['product_price']; ?></td>
                                                        <td><?php echo ($myproduct['ProductInformation']['product_quantity'] != 0) ? $myproduct['ProductInformation']['product_quantity'] : "Out of Stock"; ?></td>
                                                        <?php if($myproduct['User']['id'] != $data_set){ ?>
                                                        <td class="center-on-small-only">
                                                            <form method="post">
                                                                <div class="row">
                                                                    <div class="col text-center">
                                                                        <?php if($data_set != 'all'){ ?>
                                                                           <?php if($myproduct['ProductInformation']['product_quantity'] != 0){ ?>
                                                                            <div class="text-center">
                                                                                <input type="text" id="<?php echo "input".$index; ?>" name="data[ProductCart][quantity]" class="col-4 form-control text-center" disabled value="0" >
                                                                            </div>
                                                                            <div class="btn-group radio-group" data-toggle="buttons">
                                                                                <label id="<?php echo $index; ?>" class="btn btn-sm btn-primary btn-rounded waves-effect waves-light negative">
                                                                                    <input type="radio" id="option1">—
                                                                                </label>
                                                                                <label id="<?php echo $index; ?>" class="btn btn-sm btn-primary btn-rounded waves-effect waves-light positive">
                                                                                    <input type="radio" id="option2">+
                                                                                </label>
                                                                            </div>
                                                                            <?php } else {?>

                                                                            <?php } ?>
                                                                        <?php } else { ?>
                                                                            <p>Login to purchase</p>
                                                                        <?php } ?>
                                                                    </div>
                                                                    <div class="col text-center">
                                                                    <?php echo $this->Html->link('View',array('action' => 'viewproduct/',$myproduct['ProductInformation']['product_id']),array('class' => 'btn btn-sm btn-primary waves-effect waves-light')); ?>
                                                                    <?php if($data_set != 'all'){ ?>
                                                                        <?php if($myproduct['ProductInformation']['product_quantity'] != 0){ ?>
                                                                            <button data-id="<?php echo $myproduct['ProductInformation']['product_id']; ?>" id="<?php echo $index; ?>" class="btn btn-sm btn-primary waves-effect waves-light addToCart">Add to Cart</button>
                                                                        <?php } else{ ?>
                                                                            <p>No Stocks Available</p>
                                                                        <?php } ?>
                                                                    <?php } else { ?>
                                                                        <?php echo $this->Html->link('Add to Cart',array('controller' => 'home','action' => 'login'),array('class' => 'btn btn-sm btn-primary waves-effect waves-light')); ?>
                                                                    <?php } ?>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                            <?php $index++; ?>
                                                        </td>
                                                        <?php } else { ?>
                                                        <td>
                                                            <p>Your Product</p>
                                                        </td>
                                                        <?php } ?>
                                                    </tr>
                                                <?php endforeach;?>
                                            <?php } else { ?>
                                                <tr>
                                                    <p>You don't have products on sale.</p>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
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
<?php echo $this->Html->script('product', array('inline' => false)); ?>
