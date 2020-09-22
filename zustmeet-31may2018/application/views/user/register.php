<form action="<?php echo base_url();?>users/store" method="post" id="regformsubmit">
    <?php echo $message; ?>
<div class="col-sm-12">
<div class=" form-group t1 foot_btns">

<input type="text" placeholder="Name" name="user_name" class="form-control" required>
</div>
<div class="form-group t1 foot_btns">

<input type="email" placeholder="Mail" name="user_email" class="form-control" required>
</div>
<div class=" form-group t1 foot_btns">

<input type="password" placeholder="Password" name="user_password" pattern = '^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])[A-Za-z\d$@$!%*?&]{8,10}' title='Min 8 Chars, Max 10 Chars, Must have at least 1 uppercase, Must have at least 1 lowercase, Must have at least 1 number, Must have at least 1 special character' class="form-control" required>
</div>


<div class="form-group t1 foot_btns">

<input type="text" placeholder="Mobile Number" name="user_phone" class="form-control" required>
</div>
<div class="form-group t1 foot_btns">

<input type="text" placeholder="Age" name="user_age" class="form-control" required>
</div>

<div class="form-group t1 foot_btns">
<div class="form-group  col-xs-5 dk">
<div class="pretty p-icon p-toggle p-plain">
<input type="radio" checked value="m" name="user_gender" />
<div class="state p-off">
    <i class="icon fa fa-heart-o "></i>
    <label>Male</label>
</div>
<div class="state p-on p-info-o">
    <i class="icon fa fa-heart"></i>
    <label>Male</label>
</div>
</div>

</div>
<div class="form-group  col-xs-5 mk">
<div class="pretty p-icon p-toggle p-plain">
<input type="radio" value="f" name="user_gender" />
<div class="state p-off">
    <i class="icon fa fa-heart-o "></i>
    <label>Female</label>
</div>
<div class="state p-on p-info-o">
    <i class="icon fa fa-heart"></i>
    <label>Female</label>
</div>
</div>
</div>
</div>
<div class="form-group t1 foot_btns">
<div class="col-xs-6">
<a href="<?php echo base_url();?>users/login" class="lgn"><strong> Login </strong></a>
</div>
<div class="col-xs-6">
<button type="submit" class="btn btn-lg btn-info sig">Sign Up <i class="fa fa-arrow-right d" aria-hidden="true"></i>
</button>
</div>

</div>

</div>
</form>
<div class="clear-fix"></div>
<br/>