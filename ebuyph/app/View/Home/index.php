<!--Carousel Wrapper-->
<div id="carousel-example-3" class="carousel slide carousel-fade white-text fp-carousel-view" data-ride="carousel" data-interval="false">
    <!--Indicators-->
    <ol class="carousel-indicators">
        <li data-target="#carousel-example-3" data-slide-to="0" class="active"></li>
        <li data-target="#carousel-example-3" data-slide-to="1"></li>
        <li data-target="#carousel-example-3" data-slide-to="2"></li>
    </ol>
    <!--/.Indicators-->
    <!--Slides-->
    <div class="carousel-inner" role="listbox">
        <!-- First slide -->
        <div class="carousel-item active view hm-black-light fp-carousel-view" style="background-image: url('http://mdbootstrap.com/img/Photos/Horizontal/Things/full%20page/img%20(8).jpg'); background-repeat: no-repeat; background-size: cover;">
            <!-- Caption -->
            <div class="full-bg-img flex-center white-text">
                <ul>
                    <li>
                        <h1 class="h1-responsive">Recent Collections</h1></li>
                    <li>
                        <p>We follow the fashion!</p>
                    </li>
                    <li>
                        <a target="_blank" href="#" class="btn btn-outline-white btn-lg">Recent Products</a>
                        <a target="_blank" href="#" class="btn btn-outline-white btn-lg">Top Rated Products</a>
                    </li>
                </ul>
            </div>
            <!-- /.Caption -->
        </div>
        <!-- /.First slide -->
        <!-- Second slide -->
        <div class="carousel-item view hm-black-light fp-carousel-view" style="background-image: url('http://mdbootstrap.com/img/Photos/Horizontal/People/full%20page/img%20(23).jpg'); background-repeat: no-repeat; background-size: cover;">

            <!-- Caption -->
            <div class="full-bg-img flex-center white-text">
                <ul>
                    <li>
                        <h1 class="h1-responsive">Tops</h1>
                    </li>
                    <li>
                        <p>We have a wide selection of tops</p>
                    </li>
                    <li>
                        <a target="_blank" href="#" class="btn btn-outline-white btn-lg">View</a>
                    </li>
                </ul>
            </div>
            <!-- /.Caption -->
        </div>
        <!-- /.Second slide -->
        <!-- Third slide -->
        <div class="carousel-item view hm-black-light fp-carousel-view" style="background-image: url('http://mdbootstrap.com/img/Photos/Horizontal/People/full%20page/img%20(24).jpg'); background-repeat: no-repeat; background-size: cover;">
            <!-- Caption -->
            <div class="full-bg-img flex-center white-text">
                <ul>
                    <li>
                        <h1 class="h1-responsive">Check our promotions</h1></li>
                    <li>
                        <p>We have attractive price reductions</p>
                    </li>
                    <li>
                        <a target="_blank" href="#" class="btn btn-outline-white btn-lg">Promotions</a>
                    </li>
                </ul>
            </div>
            <!-- /.Caption -->
        </div>
        <!-- /.Third slide -->
    </div>
    <!--/.Slides-->
    <!--Controls-->
    <a class="carousel-control-prev" href="#carousel-example-3" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carousel-example-3" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
    <!--/.Controls-->
</div>
<!--/.Carousel Wrapper-->

<!-- Main layout -->
<main>
    <div class="container pb-3">
        <!-- Promotions Section -->
        <section class="section">
            <!-- First row -->
            <div class="row text-center">
                <!-- First column -->
                <div class="col-lg-4 col-md-12">
                    <!-- Featured image -->
                    <div class="view overlay hm-white-slight z-depth-1 z-depth-2">
                        <?php echo $this->Html->image('img%20(37).jpg',array('class' => 'img-fluid')); ?>
                        <a>
                            <div class="mask waves-light"></div>
                        </a>
                    </div>

                    <!-- Excerpt -->
                    <div class="card-body">
                        <h3>Shoes -50%</h3>
                        <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque.</p>
                        <a class="btn btn-ins"><i class="fa fa-tags left"></i> View promotion</a>
                    </div>

                </div>
                <!-- /.First column -->
                <!-- Second column -->
                <div class="col-lg-4 col-md-6">
                    <!-- Featured image -->
                    <div class="view overlay hm-white-slight z-depth-1 z-depth-2">
                        <?php echo $this->Html->image('img%20(32).jpg',array('class' => 'img-fluid')); ?>
                        <a>
                            <div class="mask waves-light"></div>
                        </a>
                    </div>
                    <!-- Excerpt -->
                    <div class="card-body">
                        <h3>Watch - 2 for 1</h3>
                        <p>Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime facere possimus.</p>
                        <a class="btn btn-ins"><i class="fa fa-tags left"></i> View promotion</a>
                    </div>
                </div>
                <!-- /.Second column -->
                <!-- Third column -->
                <div class="col-lg-4 col-md-6">
                    <!-- Featured image -->
                    <div class="view overlay hm-white-slight z-depth-1 z-depth-2">
                        <?php echo $this->Html->image('img%20(2).jpg',array('class' => 'img-fluid')); ?>
                        <a>
                            <div class="mask waves-light"></div>
                        </a>
                    </div>
                    <!-- Excerpt -->
                    <div class="card-body">
                        <h3>Sweater -20%</h3>
                        <p>Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae.</p>
                        <a class="btn btn-ins"><i class="fa fa-tags left"></i> View promotion</a>
                    </div>
                </div>
                <!-- /.Third column -->
            </div>
            <!-- /.First row -->
        </section>
        <!-- /.Promotions Section -->
        <!-- Featured Products Section-->
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
                          <?php echo $this->Html->image('img%20%283%29.jpg',array('class' => 'img-fluid')); ?>
                            <a>
                                <div class="mask waves-light"></div>
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
                                <a class="" data-toggle="tooltip" data-placement="top" title="Quick Look"><i class="fa fa-eye"></i></a>
                                <a class="" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><i class="fa fa-heart"></i></a>
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
                          <?php echo $this->Html->image('img%20%284%29.jpg',array('class' => 'img-fluid')); ?>
                            <a>
                                <div class="mask waves-light"></div>
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
                                <a class="" data-toggle="tooltip" data-placement="top" title="Quick Look"><i class="fa fa-eye"></i></a>
                                <a class="active" data-toggle="tooltip" data-placement="top" title="Added to Wishlist"><i class="fa fa-heart"></i></a>
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
                          <?php echo $this->Html->image('img%20(40).jpg',array('class' => 'img-fluid')); ?>
                            <a>
                                <div class="mask waves-light"></div>
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
                                <a class="" data-toggle="tooltip" data-placement="top" title="Quick Look"><i class="fa fa-eye"></i></a>
                                <a class="" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><i class="fa fa-heart"></i></a>
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
        <!-- /.Featured Products Section -->
        <section class="d-flex pt-4">
            <!-- New Products-->
            <div class="col-lg-4 pt-5">
                <h4>New Products</h4>
                <!-- First row -->
                <div class="row mt-5 pt-1 pb-1 hoverable">
                    <div class="col-6">
                        <a><?php echo $this->Html->image('sweater.jpg',array('class' => 'img-fluid')); ?></a>
                    </div>
                    <div class="col-6">
                        <!-- Title -->
                        <a><strong>Sweater</strong></a>
                        <!-- Rating -->
                        <ul class="rating inline-ul">
                            <li><i class="fa fa-star amber-text"></i></li>
                            <li><i class="fa fa-star amber-text"></i></li>
                            <li><i class="fa fa-star amber-text"></i></li>
                            <li><i class="fa fa-star amber-text"></i></li>
                            <li><i class="fa fa-star amber-text"></i></li>
                        </ul>
                        <!-- Price -->
                        <h5 class="h5-responsive"><strong>$49</strong> <span class="grey-text"><small><s>$89</s></small></span></h5>
                    </div>
                </div>
                <!-- /.First row -->
                <!-- Second row -->
                <div class="row mt-2 pt-1 pb-1 hoverable">
                    <div class="col-6">
                        <a><?php echo $this->Html->image('shoes.jpg',array('class' => 'img-fluid')); ?></a>
                    </div>
                    <div class="col-6">
                        <!-- Title -->
                        <a><strong>Shoes</strong></a>
                        <!-- Rating -->
                        <ul class="rating inline-ul">
                            <li><i class="fa fa-star amber-text"></i></li>
                            <li><i class="fa fa-star amber-text"></i></li>
                            <li><i class="fa fa-star amber-text"></i></li>
                            <li><i class="fa fa-star amber-text"></i></li>
                            <li><i class="fa fa-star amber-text"></i></li>
                        </ul>
                        <!-- Price -->
                        <h5 class="h5-responsive"><strong>$49</strong> <span class="grey-text"><small><s>$89</s></small></span></h5>
                    </div>
                </div>
                <!-- /.Second row -->
                <!-- Third row -->
                <div class="row mt-2 pt-1 pb-1 hoverable">

                    <div class="col-6">
                        <a><?php echo $this->Html->image('tie.jpg',array('class' => 'img-fluid')); ?></a>
                    </div>
                    <div class="col-6">
                        <!-- Title -->
                        <a><strong>Tie</strong></a>
                        <!-- Rating -->
                        <ul class="rating inline-ul">
                            <li><i class="fa fa-star amber-text"></i></li>
                            <li><i class="fa fa-star amber-text"></i></li>
                            <li><i class="fa fa-star amber-text"></i></li>
                            <li><i class="fa fa-star amber-text"></i></li>
                            <li><i class="fa fa-star amber-text"></i></li>
                        </ul>
                        <!-- Price -->
                        <h5 class="h5-responsive"><strong>$49</strong> <span class="grey-text"><small><s>$89</s></small></span></h5>
                    </div>
                </div>
                <!-- /.Third row -->
            </div>
            <!-- /.New Products-->
            <!-- Top Sellers-->
            <div class="col-lg-4 pt-5">
                <h4>Top Sellers</h4>
                <!-- First row -->
                <div class="row mt-5 pt-1 pb-1 hoverable">
                    <div class="col-6">
                        <a><?php echo $this->Html->image('gloves.jpg',array('class' => 'img-fluid')); ?></a>
                    </div>
                    <div class="col-6">
                        <!-- Title -->
                        <a><strong>Gloves</strong></a>
                        <!-- Rating -->
                        <ul class="rating inline-ul">
                            <li><i class="fa fa-star amber-text"></i></li>
                            <li><i class="fa fa-star amber-text"></i></li>
                            <li><i class="fa fa-star amber-text"></i></li>
                            <li><i class="fa fa-star amber-text"></i></li>
                            <li><i class="fa fa-star amber-text"></i></li>
                        </ul>
                        <!-- Price -->
                        <h5 class="h5-responsive"><strong>$49</strong> <span class="grey-text"><small><s>$89</s></small></span></h5>
                    </div>
                </div>
                <!-- /.First row -->
                <!-- Second row -->
                <div class="row mt-2 pt-1 pb-1 hoverable">
                    <div class="col-6">
                        <a><?php echo $this->Html->image('shoes%20(4).jpg',array('class' => 'img-fluid')); ?></a>
                    </div>
                    <div class="col-6">
                        <!-- Title -->
                        <a><strong>Heels</strong></a>
                        <!-- Rating -->
                        <ul class="rating inline-ul">
                            <li><i class="fa fa-star amber-text"></i></li>
                            <li><i class="fa fa-star amber-text"></i></li>
                            <li><i class="fa fa-star amber-text"></i></li>
                            <li><i class="fa fa-star amber-text"></i></li>
                            <li><i class="fa fa-star amber-text"></i></li>
                        </ul>
                        <!-- Price -->
                        <h5 class="h5-responsive"><strong>$49</strong> <span class="grey-text"><small><s>$89</s></small></span></h5>
                    </div>
                </div>
                <!-- /.Second row -->
                <!-- Third row -->
                <div class="row mt-2 pt-1 pb-1 hoverable">
                    <div class="col-6">
                        <a><?php echo $this->Html->image('shoes%20(6).jpg',array('class' => 'img-fluid')); ?></a>
                    </div>
                    <div class="col-6">
                        <!-- Title -->
                        <a><strong>Running Shoes</strong></a>
                        <!-- Rating -->
                        <ul class="rating inline-ul">
                            <li><i class="fa fa-star amber-text"></i></li>
                            <li><i class="fa fa-star amber-text"></i></li>
                            <li><i class="fa fa-star amber-text"></i></li>
                            <li><i class="fa fa-star amber-text"></i></li>
                            <li><i class="fa fa-star amber-text"></i></li>
                        </ul>
                        <!-- Price -->
                        <h5 class="h5-responsive"><strong>$49</strong> <span class="grey-text"><small><s>$89</s></small></span></h5>
                    </div>
                </div>
                <!-- /.Third row -->
            </div>
            <!-- /.Top Sellers -->
            <!-- Random Products-->
            <div class="col-lg-4 pt-5">
                <h4>Random Products</h4>
                <!-- First row -->
                <div class="row mt-5 pt-1 pb-1 hoverable">
                    <div class="col-6">
                        <a><?php echo $this->Html->image('shoes%20(9).jpg',array('class' => 'img-fluid')); ?></a>
                    </div>
                    <div class="col-6">
                        <!-- Title -->
                        <a><strong>Sneakers</strong></a>
                        <!-- Rating -->
                        <ul class="rating inline-ul">
                            <li><i class="fa fa-star amber-text"></i></li>
                            <li><i class="fa fa-star amber-text"></i></li>
                            <li><i class="fa fa-star amber-text"></i></li>
                            <li><i class="fa fa-star amber-text"></i></li>
                            <li><i class="fa fa-star amber-text"></i></li>
                        </ul>
                        <!-- Price -->
                        <h5 class="h5-responsive"><strong>$49</strong> <span class="grey-text"><small><s>$89</s></small></span></h5>
                    </div>
                </div>
                <!-- /.First row -->
                <!-- Second row -->
                <div class="row mt-2 pt-1 pb-1 hoverable">
                    <div class="col-6">
                        <a><?php echo $this->Html->image('shoes%20(8).jpg',array('class' => 'img-fluid')); ?></a>
                    </div>
                    <div class="col-6">
                        <!-- Title -->
                        <a><strong>Trainers</strong></a>
                        <!-- Rating -->
                        <ul class="rating inline-ul">
                            <li><i class="fa fa-star amber-text"></i></li>
                            <li><i class="fa fa-star amber-text"></i></li>
                            <li><i class="fa fa-star amber-text"></i></li>
                            <li><i class="fa fa-star amber-text"></i></li>
                            <li><i class="fa fa-star amber-text"></i></li>
                        </ul>
                        <!-- Price -->
                        <h5 class="h5-responsive"><strong>$49</strong> <span class="grey-text"><small><s>$89</s></small></span></h5>
                    </div>
                </div>
                <!-- /.Second row -->
                <!-- Third row -->
                <div class="row mt-2 pt-1 pb-1 hoverable">
                    <div class="col-6">
                        <a><?php echo $this->Html->image('shoes%20(5).jpg',array('class' => 'img-fluid')); ?></a>
                    </div>
                    <div class="col-6">
                        <!-- Title -->
                        <a><strong>Heels</strong></a>
                        <!-- Rating -->
                        <ul class="rating inline-ul">
                            <li><i class="fa fa-star amber-text"></i></li>
                            <li><i class="fa fa-star amber-text"></i></li>
                            <li><i class="fa fa-star amber-text"></i></li>
                            <li><i class="fa fa-star amber-text"></i></li>
                            <li><i class="fa fa-star amber-text"></i></li>
                        </ul>
                        <!-- Price -->
                        <h5 class="h5-responsive"><strong>$49</strong> <span class="grey-text"><small><s>$89</s></small></span></h5>
                    </div>
                </div>
                <!-- /.Third row -->
            </div>
            <!-- /.Random Products -->
        </section>
    </div>
    <!-- Newsletter Section -->
    <div class="streak newsletter">
        <div class="flex-center">
            <ul>
                <!-- Title -->
                <li>
                    <h2 class="h2-responsive wow fadeIn">Subscribe to our Newsletter</h2>
                </li>
                <!-- Newsletter Input-->
                <li class="flex-center pt-1">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-subscription">Subscription form</button>
                </li>
                
            </ul>
        </div> 
    </div>
    <!-- /.Newsletter Section -->
</main>
<input type="hidden" id="user_id" value="<?php echo $this->Session->read('Auth')['User']['id']; ?>">
<?php echo $this->Html->script('product', array('inline' => false)); ?>
<!-- /.Main layout -->