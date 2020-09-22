<div class="map_img">

<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3806.279475284045!2d78.38074661475915!3d17.44633268804336!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bcb91617c393671%3A0x879b2ce43d522084!2sCaramel+IT+Services!5e0!3m2!1sen!2sin!4v1508162516395" width="100%" height="730px" frameborder="0" top="0px">
</iframe>
<form id="update_profile_form" action="<?php echo base_url();?>users/profildetails" method="post" enctype="multipart/form-data">
    <input type="hidden" id="intrests" name="intrests" class="intrests" value="" />
<div class="container updated_box"> 
<div class="img-responsive update-bg" style="background-image:url('<?php echo base_url();?>assets/user/images/cup_1.jpg')">
<div class="form-box">
<div class="profile_upload">
<p><b>Upload</b>
</p>
<p><b>Profile Picture</b>
</p>
</div>
<div id="profile_pic_status"></div>
<input type="file" id="profilepic" name="profilepic" style="display:none;" onChange="showPreview(this);" />
<div class="row">
<div class="col-sm-12 update_text">
    <h3><b><?php echo $this->session->userdata['user_info']['user_name']; ?></b> </h3>
    <h4><b><?php echo ($this->session->userdata['user_info']['user_gender']=='m')? 'Male': 'Female' ; ?>, <?php echo $this->session->userdata['user_info']['user_age']; ?> years</b></h4>
    <h4><b>Profile ID : <?php echo $this->session->userdata['user_info']['zm_profile_id']; ?></b></h4>
</div>
</div>
<div class="row profile_address">
   
<div class=" form-group  foot_btns">

    <input type="text" name="user_address1" value="<?php echo trim($user_info['user_address1']); ?>" placeholder="Address 1" class="form-control" required>
</div>
<div class=" form-group  foot_btns">

    <input type="text" name="user_address2" value="<?php echo trim($user_info['user_address2']); ?>" placeholder="Address 2" class="form-control" required>
</div>
</div>
<div class="row profile_interests">

<h4><b>Select your Interests</b></h4>
<div id="profile_intrests_status"></div>
<div class="row">
    <div class="col-sm-4">
        
        <div class="zm_intrests <?php if(in_array("a_cup_of_coffee", $intrests)) echo 'update_border'; ?>" id="a_cup_of_coffee">
            <img src="<?php echo base_url();?>assets/user/images/a_cup_of_coffee.png" class="">
            <span><b><a href="javascript:void(0);"  class="">A Cup Of Coffee</a></b> </span>
        </div>
        <div class="vl"></div>

    </div>
    <div class="col-sm-4">
      <div class="zm_intrests <?php if(in_array("watch_movie", $intrests)) echo 'update_border'; ?>" id="watch_movie">
        <img src="<?php echo base_url();?>assets/user/images/watch_movie.png" class="">
        <span><b><a href="javascript:void(0);"  class="">Watch Movie</a></b>
        </span>
     </div>
<div class="vl"></div>

    </div>
<div class="col-sm-4">
      <div class="zm_intrests <?php if(in_array("pub", $intrests)) echo 'update_border'; ?>" id="pub">
        <img src="<?php echo base_url();?>assets/user/images/pub.png" class="">
        <span><b><a href="javascript:void(0);"  class="">Pub</a></b>
        </span>
     </div> 

    </div>
</div>
<div class="row events">
    <div class="col-sm-4">
      <div class="zm_intrests <?php if(in_array("long_drive", $intrests)) echo 'update_border'; ?>" id="long_drive">
        <img src="<?php echo base_url();?>assets/user/images/long_drive.png" class="">
        <span><b><a href="javascript:void(0);" class="">Long Drive</a></b></span>
    </div>
<div class="vl"></div>

    </div>
    <div class="col-sm-4">
        <div class="zm_intrests <?php if(in_array("dinner_or_lunch", $intrests)) echo 'update_border'; ?>" id="dinner_or_lunch">
            <img src="<?php echo base_url();?>assets/user/images/dinner.png" class="">
            <span><b><a href="javascript:void(0);"  class="">Dinner/Lunch</a></b> </span>
        </div>
        <div class="vl"></div>


    </div>
    <div class="col-sm-4">
       <div class="zm_intrests <?php if(in_array("events", $intrests)) echo 'update_border'; ?>" id="events">
        <img src="<?php echo base_url();?>assets/user/images/events.png" class="">
        <span><b><a href="javascript:void(0);"  class="">Events</a></b>
        </span>
       </div>
    </div>
</div>
<div class="row pro_button">
    <button class="btn pro_update"><strong>Update Profile</strong>
    </button>
</div>
</div>
</div>
</div>
</div>
</form>
</div>