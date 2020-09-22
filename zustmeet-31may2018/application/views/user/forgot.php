<form action="<?php echo base_url();?>users/passwordrequest" method="post">
<?php echo $message; ?>
    <div class=" form-group t1">

        <input type="email" placeholder="Enter mail" name="requestval" class="form-control">
    </div>


<div class=" form-group t1">
    <button type="submit" class="btn btn-lg btn-info sub">Submit</button>
</div>
</form>
<div>
    <!-- class strike to be add-->
                <span>&nbsp;</span>
</div>
<div class="social-agilea">
    <span>&nbsp;</span>
</div>
<hr class="line">

<div class="form-group t1 foot_skip">
<a href="<?php echo base_url();?>users/login" class="lgn" style="float: left;"><strong> Login </strong></a>
    <a href="#" style="float: right;"><strong>Skip Sign in</strong> <i class="fa fa-arrow-right " aria-hidden="true"></i></a>
</div>