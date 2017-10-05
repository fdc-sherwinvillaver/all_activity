<style type="text/css">
input[type=file]{
    width:96px;
    color:transparent;
}
</style>
<main>
    <div class="row">
        <div class="col h-100"><div class="container text-center">ads here</div></div>
            <div class="container col-6">
            <section class="form-simple">
                <!--Form with header-->
                <div class="card" style="">
                    <!--Header-->
                    <div class="header pt-3 grey lighten-2">
                        <div class="row d-flex justify-content-start">
                            <h3 class="deep-grey-text mt-3 mb-4 pb-1 mx-5">Checkout</h3>
                        </div>
                    </div>
                    <!--Header-->
                    <div class="card-body mx-4 mt-4">
                        <form method="POST" id="frmCheckout">
                            <div class="row">
                                <div class="md-form col">
                                    <div class="container">
                                        <p>On Cart</p>
                                        <table class="table table-responsive">
                                            <thead>
                                                <tr>
                                                    <th>Product Name</th>
                                                    <th>Price</th>
                                                    <th>Quantity</th>
                                                    <th>Remove</th>
                                                </tr>
                                            </thead>
                                            <tbody id="cart_data">
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="w-100"></div>
                                <div class="md-form col">
                                    <input type="text" name="first_name" class="form-control" value="<?php echo $this->Session->read('Auth')['User']['first_name'] ?>" disabled>
                                    <label id="label_first" for="first_name">Firstname</label>
                                    <span id="first_name" style="display:none; color:red;"></span>
                                </div>
                                <div class="md-form col">
                                    <input type="text" name="last_name" class="form-control" value="<?php echo $this->Session->read('Auth')['User']['last_name'] ?>" disabled>
                                    <label for="last_name">Lastname</label>
                                    <span id="last_name" style="display:none; color:red;"></span>
                                </div>
                                <div class="md-form col">
                                    <input type="text" name="middle_name" class="form-control" value="<?php echo $this->Session->read('Auth')['User']['middle_name'] ?>" disabled>
                                    <label for="middle_name">Middlename</label>
                                    <span id="middle_name" style="display:none; color:red;"></span>
                                </div>
                                <div class="w-100"></div>
                                <div class="md-form col">
                                    <input type="text" name="contact_no" class="form-control">
                                    <label for="contact_no">Contact No</label>
                                    <span class="text-center" id="contact_no" style="display:none; color:red;"></span>
                                </div>
                                <div class="md-form col">
                                    <input type="email" name="email" class="form-control" value="<?php echo $this->Session->read('Auth')['User']['email'] ?>" disabled>
                                    <label for="email">Email</label>
                                    <span id="email" style="display:none; color:red;"></span>
                                </div>
                                <div class="w-100"></div>
                                <div class="md-form col">
                                    <input type="text"  name="shipping_address" class="form-control">
                                    <label for="shipping_address">Shipping Address</label>
                                    <span class="text-center" id="shipping_address" style="display:none; color:red;"></span>
                                </div>
                                <div class="w-100"></div>
                                <div class="text-center col">
                                    <button type="submit" class="btn btn-danger btn-block z-depth-2 waves-effect waves-light">Purchase</button>
                                </div>
                                <div class="w-100"></div>
                                <br>
                                <div class="text-center col">
                                    <p class="font-small grey-text d-flex justify-content-center">Want to buy more? <a href="/products/shop" class="dark-grey-text font-bold ml-1"> Shop</a></p>
                                </div>
                            </div>
                            <input type="text" id="user_id" name="user_id" value="<?php echo (isset($this->Session->read('Auth')['User']['id'])) ? $this->Session->read('Auth')['User']['id'] : ""; ?>" hidden>
                        </form>
                    </div>
                </div>
                <!--/Form with header-->
            </section>
            </div>
        <div class="col h-100"><div class="container text-center">ads here</div></div>
    </div>
</main>

<?php echo $this->Html->script('product', array('inline' => false)); ?>
