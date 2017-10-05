<main>
    <div class="container">
        <section class="section section-blog-fw">
            <div class="row">
                <?php foreach($first_picture as $first): ?>
                <div class="col-md-12">
                    <div class="card card-cascade wider reverse my-4">
                        <div class="view overlay hm-white-slight">
                            <?php echo $this->Html->image('upload_folder/'.AuthComponent::password($first['User']['id']).'/'.$first['ProductPicture']['product_picture'],array('class' => 'img-fluid')); ?>
                        </div>
                        <div class="card-body text-center">
                            <h1 class="h1-responsive"><?php echo $first['ProductInformation']['product_name']; ?></h1>
                            <hr class="mb-1">
                            <p>Short description</p>
                            <p><?php echo $first['ProductInformation']['product_description']; ?></p>
                            <?php if(isset($this->Session->read('Auth')['User']['id'])): ?>
                            <?php echo ($first['ProductInformation']['product_quantity'] != 0) ? $this->Html->link('Add to cart '.$this->Html->tag('i', '', array('class' => 'fa fa-shopping-cart')), array('action' => 'cart',$first['ProductInformation']['product_id']),array('escape' => false,'class' => 'btn btn-secondary waves-effect waves-light')) : "Not Available"; ?>
                            <?php else: ?>
                            <?php echo ($first['ProductInformation']['product_quantity'] != 0) ? $this->Html->link('Add to cart '.$this->Html->tag('i', '', array('class' => 'fa fa-shopping-cart')), array('controller' => 'home','action' => 'login'),array('escape' => false,'class' => 'btn btn-secondary waves-effect waves-light')) : "Not Available"; ?>
                            <?php endif; ?>
                            <button type="button" class="btn btn-default waves-effect waves-light" data-toggle="modal" data-target="#modal-contact">Ask for details <i class="fa fa-envelope-o right"></i></button>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </section>
        <section class="section">
            <h1 class="section-heading">Product description</h1>
            <ul class="nav nav-tabs tabs-3 indigo nav-justified" role="tablist">
                <li class="nav-item waves-effect waves-light">
                    <a class="nav-link active" data-toggle="tab" href="#panel5" role="tab"><i class="fa fa-diamond"></i> Product description</a>
                </li>
                <li class="nav-item waves-effect waves-light">
                    <a class="nav-link" data-toggle="tab" href="#panel6" role="tab"><i class="fa fa-heart-o"></i> About designer</a>
                </li>
                <li class="nav-item waves-effect waves-light">
                    <a class="nav-link" data-toggle="tab" href="#panel7" role="tab"><i class="fa fa-coffee"></i> More product details</a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade in show active" id="panel5" role="tabpanel">
                    <br>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus nec tellus ac nisl accumsan vulputate. Cras dignissim ante nisi, eget tempus erat dictum nec. Ut maximus, arcu at congue eleifend, nisl est dignissim nunc, eget imperdiet dolor massa vulputate turpis. Suspendisse mollis lectus purus, sit amet rhoncus nunc finibus quis. In in nunc neque. Vivamus metus erat, ornare vel feugiat in, commodo eu augue. Duis porta est quis lorem molestie efficitur. Integer condimentum tellus sed leo finibus, non efficitur metus scelerisque. Ut laoreet turpis nec sem pellentesque pharetra. Aenean et aliquam nunc. Suspendisse sagittis ligula non nunc tristique luctus. Quisque velit ante, cursus scelerisque ligula in, scelerisque vulputate massa. Sed feugiat faucibus nisl in blandit. Nam vehicula dignissim massa, nec porttitor orci vestibulum sit amet. Vestibulum elementum vitae lacus ut gravida.</p>
                </div>
                <div class="tab-pane fade" id="panel6" role="tabpanel">
                    <br>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil odit magnam minima, soluta doloribus reiciendis molestiae placeat unde eos molestias. Quisquam aperiam, pariatur. Tempora, placeat ratione porro voluptate odit minima.</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil odit magnam minima, soluta doloribus reiciendis molestiae placeat unde eos molestias. Quisquam aperiam, pariatur. Tempora, placeat ratione porro voluptate odit minima.</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil odit magnam minima, soluta doloribus reiciendis molestiae placeat unde eos molestias. Quisquam aperiam, pariatur. Tempora, placeat ratione porro voluptate odit minima.</p>
                </div>
                <div class="tab-pane fade" id="panel7" role="tabpanel">
                    <br>
                    <p><i class="fa fa-minus"></i> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil odit magnam minima, soluta doloribus reiciendis molestiae placeat unde eos molestias. Quisquam aperiam, pariatur. Tempora, placeat ratione porro voluptate odit minima.</p>
                    <p><i class="fa fa-minus"></i> Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.</p>
                    <p><i class="fa fa-minus"></i> Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                </div>
            </div>
        </section>
        <section class="section mb-4">
            <h1 class="section-heading">Product gallery</h1>
            <p class="section-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit, error amet numquam iure provident voluptate esse quasi, veritatis totam voluptas nostrum quisquam eum porro a pariatur accusamus veniam. Quia, minima?</p>
            <div class="row">
                <div class="col-md-12">
                    <div id="mdb-lightbox-ui">
                        <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="pswp__bg"></div>
                            <div class="pswp__scroll-wrap">
                                <div class="pswp__container">
                                    <div class="pswp__item"></div>
                                    <div class="pswp__item"></div>
                                    <div class="pswp__item"></div>
                                </div>
                                <div class="pswp__ui pswp__ui--hidden">
                                    <div class="pswp__top-bar">
                                        <div class="pswp__counter"></div>
                                        <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>
                                        <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>
                                        <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>
                                        <div class="pswp__preloader">
                                            <div class="pswp__preloader__icn">
                                                <div class="pswp__preloader__cut">
                                                    <div class="pswp__preloader__donut"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)"></button>
                                    <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)"></button>
                                    <div class="pswp__caption">
                                        <div class="pswp__caption__center"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mdb-lightbox no-margin" data-pswp-uid="1">
                        <?php foreach($product_datas as $product_data): ?>
                        <figure class="col-md-4">
                            <?php $folder = AuthComponent::password($product_data['User']['id']); ?>
                            <?php $image = $this->Html->image(DS.'upload_folder/'.$folder.'/'.$product_data["ProductPicture"]["product_picture"]); ?>
                            <?php echo $this->Html->tag('a', $this->Html->image('upload_folder/'.$folder.'/'.$product_data["ProductPicture"]["product_picture"],array('class' => 'img-fluid')), array('src' => Router::url('/', true).'img/upload_folder/'.$folder.'/'.$product_data["ProductPicture"]["product_picture"],'data-size' => '1600x1067')); ?>
                        </figure>
                        <?php endforeach; ?>
                        <!-- <figure class="col-md-4">
                            <a href="http://mdbootstrap.com/img/Photos/Horizontal/E-commerce/8-col/img%20(2).jpg" data-size="1600x1067">
                                <img src="http://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Products/img%20%2821%29.jpg" class="img-fluid">
                            </a>
                        </figure>
                        <figure class="col-md-4">
                            <a href="http://mdbootstrap.com/img/Photos/Horizontal/E-commerce/8-col/img%20(5).jpg" data-size="1600x1067">
                                <img src="http://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Products/img%20%2822%29.jpg" class="img-fluid">
                            </a>
                        </figure>
                        <figure class="col-md-4">
                            <a href="http://mdbootstrap.com/img/Photos/Horizontal/E-commerce/8-col/img%20(3).jpg" data-size="1600x1067">
                                <img src="http://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Products/img%20%2838%29.jpg" class="img-fluid">
                            </a>
                        </figure>
                        <figure class="col-md-4">
                            <a href="http://mdbootstrap.com/img/Photos/Horizontal/E-commerce/8-col/img%20(6).jpg" data-size="1600x1067">
                                <img src="http://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Products/img%20%2839%29.jpg" class="img-fluid">
                            </a>
                        </figure>

                        <figure class="col-md-4">
                            <a href="http://mdbootstrap.com/img/Photos/Horizontal/E-commerce/8-col/img%20(1).jpg" data-size="1600x1067">
                                <img src="http://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Products/img%20%2837%29.jpg" class="img-fluid">
                            </a>
                        </figure> -->
                    </div>
                </div>
            </div>
        </section>
        <section class="section team-section">
            <h1 class="section-heading">Testimonials</h1>
            <p class="section-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit, error amet numquam iure provident voluptate esse quasi, veritatis totam voluptas nostrum quisquam eum porro a pariatur accusamus veniam. Quia, minima?</p>
            <div class="row text-center">
                <div class="col-md-4 mb-r">
                    <div class="testimonial">
                        <div class="avatar">
                            <img src="http://mdbootstrap.com/img/Photos/Avatars/img%20(17).jpg" class="rounded-circle img-fluid">
                        </div>
                        <h4>Anna Deynah</h4>
                        <h5>Web Designer</h5>
                        <p><i class="fa fa-quote-left"></i> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod eos id officiis hic tenetur quae quaerat ad velit ab.</p>
                        <div class="orange-text">
                            <i class="fa fa-star"> </i>
                            <i class="fa fa-star"> </i>
                            <i class="fa fa-star"> </i>
                            <i class="fa fa-star"> </i>
                            <i class="fa fa-star-half-full"> </i>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-r">
                    <div class="testimonial">
                        <div class="avatar">
                            <img src="http://mdbootstrap.com/img/Photos/Avatars/img%20(9).jpg" class="rounded-circle img-fluid">
                        </div>
                        <h4>John Doe</h4>
                        <h5>Web Developer</h5>
                        <p><i class="fa fa-quote-left"></i> Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi.</p>
                        <div class="orange-text">
                            <i class="fa fa-star"> </i>
                            <i class="fa fa-star"> </i>
                            <i class="fa fa-star"> </i>
                            <i class="fa fa-star"> </i>
                            <i class="fa fa-star"> </i>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-r">
                    <div class="testimonial">
                        <div class="avatar">
                            <img src="http://mdbootstrap.com/img/Photos/Avatars/img%20(20).jpg" class="rounded-circle img-fluid">
                        </div>
                        <h4>Maria Kate</h4>
                        <h5>Photographer</h5>
                        <p><i class="fa fa-quote-left"></i> At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti.</p>
                        <div class="orange-text">
                            <i class="fa fa-star"> </i>
                            <i class="fa fa-star"> </i>
                            <i class="fa fa-star"> </i>
                            <i class="fa fa-star"> </i>
                            <i class="fa fa-star-o"> </i>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</main>
<input type="hidden" id="user_id" value="<?php echo $this->Session->read('Auth')['User']['id']; ?>">
<?php echo $this->Html->script('product', array('inline' => false)); ?>