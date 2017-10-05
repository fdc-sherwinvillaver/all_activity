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
                            <h3 class="deep-grey-text mt-3 mb-4 pb-1 mx-5">Register</h3>
                        </div>
                    </div>
                    <!--Header-->
                    <br>
                    <br>
                    <div class="row text-center">
                        <div class="col text-center">
                            <span id="success" class="text-center" style="display:none"></span>
                        </div>
                    </div>
                    <div class="card-body mx-4 mt-4">
                        <form method="POST" id="frmRegister">
                            <div class="row">
                                <div class="md-form col text-center">
                                <?php echo $this->Html->image('no_image.jpg',array('width' => '100px','height' => '100px','id' => 'profile','src' => '#')); ?>
                                </div>
                                <div class="w-100"></div>
                                <div class="md-form col text-center">
                                    <input type="file" id="file" name="data[User][profile_pic]">
                                </div>
                                <div class="w-100"></div>
                                <div class="md-form col">
                                    <input type="text" name="data[User][first_name]" class="form-control">
                                    <label id="label_first" for="first_name">Firstname</label>
                                    <span id="first_name" style="display:none; color:red;"></span>
                                </div>
                                <div class="md-form col">
                                    <input type="text" name="data[User][last_name]" class="form-control">
                                    <label for="last_name">Lastname</label>
                                    <span id="last_name" style="display:none; color:red;"></span>
                                </div>
                                <div class="md-form col">
                                    <input type="text" name="data[User][middle_name]" class="form-control">
                                    <label for="middle_name">Middlename</label>
                                    <span id="middle_name" style="display:none; color:red;"></span>
                                </div>
                                <div class="w-100"></div>
                                <div class="md-form col">
                                    <input type="email" name="data[User][email]" class="form-control">
                                    <label for="email">Email</label>
                                    <span id="email" style="display:none; color:red;"></span>
                                </div>
                                <div class="w-100"></div>
                                <div class="md-form col">
                                    <input type="password" name="data[User][password]"  class="form-control">
                                    <label for="password">Password</label>
                                    <span id="password" style="display:none; color:red;"></span>
                                </div>
                                <div class="md-form col">
                                    <input type="password" name="data[User][confpassword]" class="form-control">
                                    <label for="Form-pass4">Confirm password</label>
                                    <span id="confpassword" style="display:none; color:red;"></span>
                                    <span id="passnotmatch" style="display:none; color:red;"></span>
                                </div>
                                <div class="w-100"></div>
                                <div class="text-center col">
                                    <button type="submit" class="btn btn-danger btn-block z-depth-2 waves-effect waves-light">Register</button>
                                </div>
                                <div class="w-100"></div>
                                <br>
                                <div class="text-center col">
                                    <p class="font-small grey-text d-flex justify-content-center">Already have an account? <a href="/" class="dark-grey-text font-bold ml-1"> Login</a></p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!--/Form with header-->
            </section>
            </div>
        <div class="col h-100"><div class="container text-center">ads here</div></div>
    </div>
</main>
<?php echo $this->Html->script('user', array('inline' => false)); ?>
