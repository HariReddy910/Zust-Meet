<form action="<?php echo base_url();?>users/validateuser" method="post">
                <?php echo $message; ?>
                <div class="col-sm-12">
                    <div class=" form-group t1">
                        <label></label>
                        <input type="email" placeholder="Email" name="user_email" id="user_email" class="form-control">
                    </div>
                    <div class="form-group t1">
                        <label></label>
                        <input type="password" placeholder="Password" name="user_password" id="user_password" class="form-control">
                    </div>


                    <div class="form-group t1">
                        <div class="col-xs-6">
                            <a href="<?php echo base_url();?>users/register" class="lgn_cre"><strong> Signup for an account!</strong></a>
                        </div>
                        <div class="col-xs-6">
                            <a href="<?php echo base_url();?>users/forgot" class="lgn_in"><strong> Forgot password</strong></a>
                            <button type="submit" class="btn btn-lg btn-info">Sign in <i class="fa fa-arrow-right " aria-hidden="true"></i>
                            </button>
                        </div>

                    </div>



                </div>
            </form>
            
            <div> 
            <!-- class strike to be add-->
                <span>&nbsp;</span>
            </div>
            <div class="social-agilea" style="display: none;">
                <ul>
                    <li>
                        <i class="fa fa-facebook fb"></i>
                    </li>
                    <li>
                        <i class="fa fa-twitter fb"></i>
                    </li>
                    <li>
                        <i class="fa fa-google-plus fb"></i>
                    </li>

                </ul>
            </div>
            <hr class="line">
            <div class="form-group t1 foot_skip">

                <a href="#"><strong>Skip Sign in</strong> <i class="fa fa-arrow-right " aria-hidden="true"></i></a>
            </div>