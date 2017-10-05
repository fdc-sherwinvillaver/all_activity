<style type="text/css">
input[type=file]{
    width:110px;
    color:transparent;
}
</style>
<main>
    <div class="row">
            <div class="row">
                <div class="col-3"><div class="container text-center">ads here</div></div>
                <div class="container col-5">
                    <section class="form-simple">
                        <!--Form with header-->
                        <div class="card" style="">
                            <!--Header-->
                            <div class="header pt-3 red lighten-2">
                                <div class="row d-flex justify-content-start">
                                    <h3 class="deep-grey-text mt-3 mb-4 pb-1 mx-5">Sell a Product</h3>
                                </div>
                            </div>
                            <!--Header-->
                            <div class="card-body mx-4 mt-4">
                                <form method="POST" id="frmProduct">
                                    <div class="row">
                                        <div class="md-form col-2">
                                            <label>Product Picture</label>
                                        </div>
                                        <div class="md-form col-3">
                                            <input type="file" id="file" name="files[]" accept="image/*" multiple>
                                        </div>
                                        <div class="md-form col-5" id="picture">
                                            <span class="text-center" id="product_picture" style="display:none; color:red;"></span>
                                        </div>
                                        <div class="w-100"></div>
                                        <div class="md-form col">
                                            <input type="text" name="data[ProductInformation][product_name]" class="form-control">
                                            <label for="product_name">Product name</label>
                                            <span class="text-center" id="product_name" style="display:none; color:red;"></span>
                                        </div>
                                        <div class="md-form col">
                                            <input type="text" name="data[ProductInformation][product_price]" class="form-control">
                                            <label for="product_price">Product price</label>
                                            <span class="text-center" id="product_price" style="display:none; color:red;"></span>
                                        </div>
                                        <div class="md-form col">
                                            <input type="text" name="data[ProductInformation][product_quantity]" class="form-control">
                                            <label for="product_quantity">Product quantity</label>
                                            <span class="text-center" id="product_quantity" style="display:none; color:red;"></span>
                                        </div>
                                        <div class="w-100"></div>
                                        <div class="col">
                                            <select id="type" id="type" name="data[ProductInformation][product_type]" class="mdb-select colorful-select dropdown-primary initialized">
                                                <option value="" id="first_type" disabled selected>Choose your option</option>
                                            </select>
                                            <label>Type</label>
                                            <span class="text-center" id="product_type" style="display:none; color:red;"></span>
                                        </div>
                                        <div class="col">
                                            <select id="variations" name="data[ProductInformation][product_variation]" class="mdb-select colorful-select dropdown-success initialized" disabled>
                                                <option id ="wo_value" value="" disabled selected>Choose your option</option>
                                            </select>
                                            <label>Variation Type</label>
                                            <span class="text-center" id="product_variation" style="display:none; color:red;"></span>
                                        </div>
                                        <div class="col">
                                            <select id="variation_type" name="variation_type" class="mdb-select colorful-select dropdown-default" multiple disabled>
                                                <option id="wo_value" value="" disabled selected>Choose your option</option>
                                            </select>
                                            <label>Variations</label>
                                            <span class="text-center" id="variation_type" style="display:none; color:red;"></span>
                                        </div>
                                        <div class="col">
                                            <select id="product_colors" name="product_colors" class="mdb-select colorful-select dropdown-default" multiple>
                                                <option id="wo_value" value="" disabled selected>Choose your option</option>
                                            </select>
                                            <label>Colors</label>
                                            <span class="text-center" id="product_colors" style="display:none; color:red;"></span>
                                        </div>
                                        <div class="w-100"></div>
                                        <div class="md-form col">
                                            <textarea type="text" name="data[ProductInformation][product_description]" class="md-textarea"></textarea>
                                            <label for="form76">Desription</label>
                                            <span class="text-center" id="product_description" style="display:none; color:red;"></span>
                                        </div>
                                        <div class="w-100"></div>
                                        <div class="text-center col">
                                            <button type="submit" class="btn btn-danger btn-block z-depth-2 waves-effect waves-light">Sell Product</button>
                                        </div>
                                        <div class="w-100"></div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!--/Form with header-->
                    </section>
                </div>
                <div class="col-3"><div class="container text-center">ads here</div></div>
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
