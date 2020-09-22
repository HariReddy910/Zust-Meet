    <div class="container-fluid">
    <div class="container updated_box"> 
        <div class="img-responsive update-bg" style="background-image:url('<?php echo base_url();?>assets/user/images/cup_1.jpg')">
           <div class="form-box_change">
            <div class="change_box">
                <h3><b>Change Password</b></h3>
                <form id="changepassword_form" action="<?php echo base_url();?>users/updatepassword" method="post">
                    <?php echo $message; ?>
                    <div class="col-sm-12">
                        <div class=" form-group t1">
                        <label></label>
                        <div class="input-group">
                        <input type="password" name="user_current_password" id="user_current_password" placeholder="Current Password" class="form-control" id="form-control" required><span class="input-group-addon"><i class="fa fa-eye" aria-hidden="true"></i></span>
                        </div>
                    </div>
                    <div class="form-group t1">
                        <label></label>
                        <div class="input-group">
                        <input type="password" name="user_new_password" id="user_new_password" placeholder="Enter New Password" class="form-control" required>
                        <span class="input-group-addon"><i class="fa fa-eye" aria-hidden="true"></i></span>
                        </div>
                    </div>
                   <div class="form-group t1">
                        <label></label>
                        <div class="input-group">
                        <input type="password" name="user_confirm_password" id="user_confirm_password" placeholder="Confirm New Password" class="form-control" required>
                        <span class="input-group-addon"><i class="fa fa-eye" aria-hidden="true"></i></span>
                        </div>
                    </div>

                <div class="row pro_button">
                    <button class="btn change_button"><strong>Change Password</strong>
                    </button>
                </div>
                    
                </form>
            </div>
            </div>
        </div>
    </div>
    </div>