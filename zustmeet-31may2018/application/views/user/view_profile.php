<div class="container_fluid">
    <div class="direct_left">
            <i class="fa fa-chevron-left" aria-hidden="true" onclick="location.href='<?php echo base_url();?>users/userhome'" style="cursor: pointer;"></i>
        </div>
<div class="container">
<div class="col-md-3 col-sm-6 col-md-offset-0 profile_img">
    <div class="pro_hrt">
        <i class="fa fa-heart-o heart" aria-hidden="true"></i>
    </div>
    <?php 
       if($user_info['profile_pic_path']==null || $user_info['profile_pic_path']=='' || $user_info['profile_pic_path']==' '){
            
            if($user_info['user_gender']=='m') 
                $user_info['profile_pic_path']=base_url()."assets/user/profilepics/male.png";
            else
                $user_info['profile_pic_path']=base_url()."assets/user/profilepics/female.png";
        } else {
            $user_info['profile_pic_path']=base_url()."assets/user/profilepics/".$user_info['zm_profile_id']."/".$user_info['profile_pic_path'];
        }
    ?>
    <img src="<?php echo $user_info['profile_pic_path']; ?>" class="img-responsive urvasiprofile_pic">
    <div class="col-xs-10 col-xs-offset-1 profile_text">
        <h3><b><?php echo $user_info['user_name']; ?></b>
</h3>
        <h4><b><?php echo $user_info['user_age']; ?>, <?php echo $user_info['user_formated_address']; ?></b>
</h4>
        <h4><b>Profile ID : <?php echo $user_info['zm_profile_id']; ?></b>
</h4>
    </div>
</div>
<div class="col-md-5 col-sm-6 col-sm-offset-0">
    <img src="<?php echo $user_info['profile_pic_path']; ?>" class="img-responsive profile_pic">
</div>

</div>
<hr>
<div class="container profile_events">
<div class="row">
    <div class="col-sm-3">
        <img src="<?php echo base_url();?>assets/user/images/user_chat.png" class="pro_chat">
        <span><b><a href="#" id="chat"  class="dateconfirmation">Chat</a></b></span>
    </div>
    <div class="col-sm-3">
        <img src="<?php echo base_url();?>assets/user/images/videocall.png" class="pro_chat">
        <span><b><a href="#" id="video_call" class="dateconfirmation">Video Call</a></b></span>
    </div>
    <div class="col-sm-3">
        <img src="<?php echo base_url();?>assets/user/images/a_cup_of_coffee.png" class="">
        <span><b><a href="#" id="a_cup_of_coffee"  class="dateconfirmation">A Cup Of Coffee</a></b></span>
    </div>
    <div class="col-sm-3">
        <img src="<?php echo base_url();?>assets/user/images/dinner.png" class="">
        <span><b><a href="#" id="dinner_or_lunch" class="dateconfirmation">Dinner/Lunch</a></b></span>
    </div>
</div>
<div class="row events">

    <div class="col-sm-3">
        <img src="<?php echo base_url();?>assets/user/images/watch_movie.png" class="">
        <span><b><a href="#" id="watch_movie"  class="dateconfirmation">Watch Movie</a></b></span>
    </div>
    <div class="col-sm-3">
        <img src="<?php echo base_url();?>assets/user/images/pub.png" class="">
        <span><b><a href="#" id="pub"  class="dateconfirmation">Pub</a></b>
 </span>
    </div>
    <div class="col-sm-3">
        <img src="<?php echo base_url();?>assets/user/images/events.png" class="">
        <span><b><a href="#" id="events"  class="dateconfirmation">Events</a></b>
 </span>
    </div>
    <div class="col-sm-3">
        <img src="<?php echo base_url();?>assets/user/images/long_drive.png" class="">
        <span><b><a href="#" id="long_drive" class="dateconfirmation">Long Drive</a></b></span>
    </div>
</div>
</div>
</div>
<div class="container date_confirm">
<div class="row">
<div class="col-md-4">
    <span><b> Date:</b> <input type="date" id="myDate" name="date_appointment" class="date_appointment" required></span>

</div>
<div class="col-md-3">
    <span><b> Time:</b> <input type="time" id="time" name="time_appointment" class="time_appointment" required></span>
</div>
<div class="col-md-4">

    <span class="date_search"><b> Venue:</b>   
    
        <input type="hidden" id="to_id" name="to_id" value="<?php echo $user_info['user_id']; ?>" />
        <input type="hidden" id="venue_address" name="venue_address" value="" />
        <input type="hidden" id="address_lat" name="address_lat" value="" />
        <input type="hidden" id="address_lang" name="address_lang" value="" />
        <input type="hidden" id="appointment_purpose" name="appointment_purpose" value="" />
        <div class="input-group venue_input">
            <input type="text" class="form-control" id="venues" placeholder="Search" name="q" required>
            <div class="input-group-btn">
                <button class="btn btn-default date_search" type="submit" ><i class="fa fa-search search_btn" aria-hidden="true"></i>
                </button>
            </div>
        </div>
   
    </span>
    
</div>
</div>
<div class="row">
<div class="col-xs-5 col-xs-offset-4">
    <p id="status"> </p>
    <button type="button" class="btn btn-primary date_submit" id="appointmentBookSubmit"><i class="fa fa-check-circle" aria-hidden="true"></i> SUBMIT</button>
</div>
</div>
</div>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC1MFvqBXBbQyfAV2pPtftKVLJFzh3xG1A&sensor=false&libraries=places"></script>
<script type="text/javascript">
google.maps.event.addDomListener(window, 'load', function () {
var places = new google.maps.places.Autocomplete(document.getElementById('venues'));
google.maps.event.addListener(places, 'place_changed', function () {
    var place = places.getPlace();
    var address = place.formatted_address;
    var latitude = place.geometry.location.A;
    var longitude = place.geometry.location.F;
    document.getElementById('venue_address').value=address;
    document.getElementById('address_lat').value=latitude;
    document.getElementById('address_lang').value=longitude;
});
});
</script>
<script>
$(document).ready(function() {
$(".dateconfirmation").click(function() {
 if($(this).hasClass('open')) {
     $(this).removeClass('open');
     $(".date_confirm").hide();
 } else {
     $(".dateconfirmation").each(function(){
         if($(this).hasClass('open')) { 
             $(this).removeClass('open');
         }
     });
     $("#appointment_purpose").val($(this).attr('id'));
     $(this).addClass('open');
     $(".date_confirm").show();
 }
});

$("#appointmentBookSubmit").click(function(){
    $to_id               = $("#to_id").val();
    $appointment_purpose = $("#appointment_purpose").val();
    $venue_address       = $("#venue_address").val();
    $address_lat         = $("#address_lat").val();
    $address_lang        = $("#address_lang").val();
    $date_appointment    = $(".date_appointment").val();
    $time_appointment    = $(".time_appointment").val();
    $("#status").html('<span style="color: orange; font-weight: bold; font-size: 15px"> Request Processing, Please Wait.............!</span>');
    $.ajax({
    'url': '<?php echo base_url();?>users/bookappointment',
    'type': 'post',
    'data': {'to_id': $to_id, 'appointment_purpose': $appointment_purpose, 'venue_address': $venue_address, 'address_lat': $address_lat, 'address_lang': $address_lang, 'date_appointment': $date_appointment, 'time_appointment': $time_appointment },
    'dataType': 'html',
    success: function(resp){
        console.log(resp);
        if(resp=="done") $("#status").html('<span style="color: green; font-weight: bold; font-size: 15px"> Request Sent, Please Wait for Approval</span>');
    }
    
    })
});
});
</script>