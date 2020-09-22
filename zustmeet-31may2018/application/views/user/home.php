        <div class="container-fluid">
            <div class="filter">
                <span class="side-bar" data-spy="affix" data-offset-top="100" id="myAffix" style="cursor: pointer;">
                    <div class="map_filter" id="filterIcon">
                        <a href="#">
                            <img src="<?php echo base_url();?>assets/user/images/Filter.png" class="filter_image">
                        </a>
                    </div>
                </span>
                <div id="mySidenav" class="sidenav">
                    <div class="col-xs-10 col-xs-offset-1">
                        <h4 class="sidebar_filter"><b>Filter</b></h4>
                        <form class="navbar-form search_filter" role="search" style="padding:0px;">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search" name="q">
                                <div class="input-group-btn">
                                    <button class="btn btn-default" type="submit"><i class="fa fa-search" aria-hidden="true"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <form action="<?php echo base_url();?>users/setfilter" method="post">
                        <input type="hidden" name="gender_filter" id="gender_filter" value="<?php echo $this->session->userdata['filters']['user_gender']; ?>" />
                        <input type="hidden" name="user_intrests" class="user_intrests" id="user_intrests" value="<?php echo $this->session->userdata['filters']['user_intrests']; ?>" />
                    <div class="row">
                        <h5 class="fltr_looking"><strong>Looking for</strong></h5>
                        <div class="col-xs-3 col-xs-offset-1 <?php if($this->session->userdata['filters']['user_gender']=='m') echo 'gender_filter'; ?>" id="male_filter">

                            <img src="<?php echo base_url();?>assets/user/images/Male.png">
                            <p class="male"><strong>Male</strong>
                            </p>
                        </div>
                        <div class="col-xs-3 <?php if($this->session->userdata['filters']['user_gender']=='f') echo 'gender_filter'; ?>" id="female_filter">
                            <img src="<?php echo base_url();?>assets/user/images/female.png">
                            <p class=""><strong>Female</strong>
                            </p>
                        </div>
                        <div class="col-xs-3 both1 <?php if($this->session->userdata['filters']['user_gender']=='both') echo 'gender_filter'; ?>" id="both_filter">
                            <img src="<?php echo base_url();?>assets/user/images/both.png">
                            <p class="male"><strong>Both</strong>
                            </p>
                        </div>
                    </div>
                    <div class="row range">
                        <h5 class="like_text"><strong>Age</strong></h5>
                        <div class="col-xs-12">
                            <div class="main_range age">
                                <input id="ex5" type="text" data-slider-min="18" data-slider-max="60" name="user_age_filter" data-slider-step="1" data-slider-value="[<?php echo $this->session->userdata['filters']['user_age']; ?>]" />
                             
                            </div>
                        </div>
                    </div>
                    <div class="row range">
                        <h5 class="like_text"><strong>Location Radius(Miles)</strong></h5>
                        <div class="col-xs-12">
                            <div class="main_range">
                                <input id="ex6" type="text" data-slider-min="0" data-slider-max="50" name="user_radius_filter" data-slider-step="1" data-slider-value="<?php echo $this->session->userdata['filters']['user_distance']; ?>" />
                                <!-- <span id="ex6CurrentSliderValLabel"> <span id="ex6SliderVal">3</span></span> -->
                            </div>
                        </div>
                    </div>
                    <div id="interests">
                        <h5 class="like_text"><strong>Select Interests</strong></h5>
                        <div class="row">
                            <div class="col-xs-5">
                                <a href="#" class="a_intrests">
                                    <button class="btn1 coffee" value="a_cup_of_coffee"><b>A Cup Of Coffee</b>
                                        <span aria-hidden="true" id="a_cup_of_coffee" name="check_intrests" <?php if (strpos($this->session->userdata['filters']['user_intrests'], 'a_cup_of_coffee') !== false) {  ?> class="fa fa-check-square" <?php } ?>></span>
                                    </button>
                                </a>
                            </div>
                            <div class="col-xs-5">
                                <a href="#" class="a_intrests">
                                    <button class="btn1 movie" value="watch_movie"><b>Watch Movie</b>
                                        <span aria-hidden="true" id="watch_movie" name="check_intrests" <?php if (strpos($this->session->userdata['filters']['user_intrests'], 'watch_movie') !== false) {  ?> class="fa fa-check-square" <?php } ?>></span>
                                    </button>
                                </a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-5" >
                                <a href="#" class="a_intrests">
                                    <button class="btn1 dinner" value="dinner_or_lunch"><b>Dinner/Lunch</b>
                                        <span aria-hidden="true" id="dinner_or_lunch" name="check_intrests" <?php if (strpos($this->session->userdata['filters']['user_intrests'], 'dinner_or_lunch') !== false) {  ?> class="fa fa-check-square" <?php } ?>></span>
                                    </button>
                                </a>
                            </div>
                            <div class="col-xs-5">
                                <a href="#" class="a_intrests">
                                    <button class="btn1 long" value="long_drive"><b>Long Drive</b>
                                        <span aria-hidden="true" id="long_drive" name="check_intrests" <?php if (strpos($this->session->userdata['filters']['user_intrests'], 'long_drive') !== false) {  ?> class="fa fa-check-square" <?php } ?>></span>
                                    </button>
                                </a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-5">
                                <a href="#" class="a_intrests">
                                    <button class="btn1 pub" value="pub"><b>Pub</b>
                                        <span aria-hidden="true" id="pub" name="check_intrests" <?php if (strpos($this->session->userdata['filters']['user_intrests'], 'pub') !== false) {  ?> class="fa fa-check-square" <?php } ?>></span>
                                    </button>
                                </a>
                            </div>
                            <div class="col-xs-5">
                                <a href="#" class="a_intrests">
                                    <button class="btn1 event" value="events"><b>Events</b>
                                        <span aria-hidden="true" id="events" name="check_intrests" <?php if (strpos($this->session->userdata['filters']['user_intrests'], 'events') !== false) {  ?> class="fa fa-check-square" <?php } ?>></span>
                                    </button>
                                </a>
                            </div>
                        </div>
                        <div class="filt_sub">
                            <button class="btn btn-primary"><b>SUBMIT</b></button>
                        </div>
                    </div>
                </div>
            </div>
            </form>
            <div class="map_img">
                <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3806.279475284045!2d78.38074661475915!3d17.44633268804336!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bcb91617c393671%3A0x879b2ce43d522084!2sCaramel+IT+Services!5e0!3m2!1sen!2sin!4v1508162516395" width="100%" height="730px" frameborder="0" top="0px">
                </iframe> -->
                <div id="userCard">
                    <div class="col-md-8 col-md-offset-3" id="userProfiles">
                        <div class="filter_row" id="to_append">
                            <div class="col-md-6" style="position: static; float:left;">
                                <div class="viewonline">
                                    <span class="filter_group"> <i class="fa fa-align-center" aria-hidden="true"></i>
                                        <span><b>By Age</b></span>
                                    </span>
                                    <span class="filter_group">
                                        <i class="fa fa-align-center" aria-hidden="true"></i>
                                        <span><b>By K.M</b></span>
                                    </span>
                                    <span class="filter_group"> <input type="radio">
                                        <span><b>View only Online</b></span>
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-5 col-md-offset-1">
                                <div class="search_liked">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search">
                                        <div class="input-group-btn">
                                            <button class="btn btn-default"><i class="fa fa-search" aria-hidden="true"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                     
                        </div>
                    </div>
                </div>
                <div id="mapBackground">
                    <div class="col-md-6 col-md-offset-4">
                        <form class="navbar-form" role="search">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search" name="q">
                                <div class="input-group-btn">
                                    <button class="btn btn-default" type="submit"><i class="fa fa-search" aria-hidden="true"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="map_map1">
                    <button id="mapView" class="btn btn-default mp_btn_1"><i class="fa fa-eye" aria-hidden="true"></i>Map View</button>
                    <button id="gridView" class="btn btn-default mp_btn_2_notselect">Grid View</button>
                </div>
            </div>
        </div>
          <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC1MFvqBXBbQyfAV2pPtftKVLJFzh3xG1A"></script>
<script>
var myCenter = new google.maps.LatLng(<?php echo $this->session->userdata['user_info']['user_lat']; ?>, <?php echo $this->session->userdata['user_info']['user_lang']; ?>);
var map;
var geocoder = new google.maps.Geocoder();
var infowindow = new google.maps.InfoWindow();
function initialize(){
    var mapProp = {
        center:myCenter,
        zoom:12,
        mapTypeId:google.maps.MapTypeId.ROADMAP
    };

    map = new google.maps.Map(document.getElementById("mapBackground"),mapProp);
    
    makeRequest('<?php echo base_url();?>users/get_all_users', function(data) {
          var data = JSON.parse(data.responseText);
          var gridData = '';
          var k=1;
        for (var i = 0; i < data.length; i++) {
            var content='';
            if(data[i].profile_pic_path==null || data[i].profile_pic_path=='' || data[i].profile_pic_path==' '){
                if(data[i].user_gender=='m') 
                    data[i].profile_pic_path="../assets/user/profilepics/male.png";
                else
                    data[i].profile_pic_path="../assets/user/profilepics/female.png";
            } else {
                data[i].profile_pic_path="../assets/user/profilepics/"+data[i].zm_profile_id+"/"+data[i].profile_pic_path;
            }
            if(k% 2 != 0) {
                gridData += '<div class="row"><div class="like_row"><div class="row-fluid">';
                gridData += ' <div class="well col-md-5 col-xs-12"><div class="col-xs-4">';
                gridData += '<img src="'+ data[i].profile_pic_path  +'" class="img-responsive"></div>';
                gridData += ' <div class="col-xs-4"><ul class="like_details"><li><b>'+data[i].user_name+'</b></li><li class="like_age">Age-'+data[i].user_age+'</li><li class="like_place">'+data[i].user_formated_address+'<i class="fa fa-map-marker" aria-hidden="true"></i> </li>';
                gridData += ' <li class="like_way">'+ data[i].distance +' miles away</li></ul></div>';
                gridData += ' <div class="col-xs-3"><ul class="like_view" id="'+ data[i].user_id +'"><i style="cursor: pointer;" class="fa fa-heart-o" aria-hidden="true"></i><li>Available</li>';
                gridData += ' <a href="<?php echo base_url();?>users/viewprofile/'+ data[i].user_id +'"><button type="button" class="btn btn-primary btn-xs">View profile</button></a>';
                gridData += ' </ul></div></div>';
            } else {
                gridData += ' <div class="well col-md-5 col-md-offset-1 col-xs-12">';
                gridData += ' <div class="col-xs-4"><img src="'+ data[i].profile_pic_path  +'" class="img-responsive"></div>';
                gridData += ' <div class="col-xs-4"><ul class="like_details"><li><b>'+data[i].user_name+'</b></li><li class="like_age">Age-'+data[i].user_age+'</li><li class="like_place">'+data[i].user_formated_address+'<i class="fa fa-map-marker" aria-hidden="true"></i> </li>';
                gridData += ' <li class="like_way">'+ data[i].distance +' miles away</li></ul></div>';
                gridData += ' <div class="col-xs-3"><ul class="like_view"><i class="fa fa-heart-o" aria-hidden="true"></i><li>Available</li>';
                gridData += ' <a href="<?php echo base_url();?>users/viewprofile/'+ data[i].user_id +'"><button type="button" class="btn btn-primary btn-xs">View profile</button></a>';
                gridData += ' </ul></div></div>';
                gridData += '</div></div></div>';
            }
            k=k+1;
            
            content += ' <div class="well col-md-24 col-xs-12" style="margin: 0%;"><div class="col-xs-4">';
            content += '<img src="'+ data[i].profile_pic_path  +'" class="img-responsive" style="width: 100px;"></div>';
            content += ' <div class="col-xs-8"><ul class="like_details"><li style="margin: 6px 0px;"><b>'+data[i].user_name+'</b></li><li class="like_age" style="margin: 6px 0px;">Age-'+data[i].user_age+'</li><li class="like_place" style="margin: 6px 0px;">'+data[i].user_formated_address+'<i class="fa fa-map-marker" aria-hidden="true"></i> </li>';
            content += ' <li class="like_way">'+ data[i].distance +' miles away</li></ul></div>';
            content += ' </ul></div></div>';
            displayLocation(data[i], content);
           
        }
         $("#to_append").after(gridData);
    });

    // marker = new google.maps.Marker({
    //     position:myCenter,
    // });

    // marker.setMap(map);
}
function makeRequest(url, callback) {
    var request;
    if (window.XMLHttpRequest) {
        request = new XMLHttpRequest(); // IE7+, Firefox, Chrome, Opera, Safari
    } else {
        request = new ActiveXObject("Microsoft.XMLHTTP"); // IE6, IE5
    }
    request.onreadystatechange = function() {
        if (request.readyState == 4 && request.status == 200) {
            callback(request);
        }
    }
    request.open("GET", url, true);
    request.send();
}

function displayLocation(location, content) {
          
    //var content =   '<div class="infoWindow"><strong>'  + location.user_name  + '</div>';
    
    if (parseInt(location.user_lat) == 0) {
    geocoder.geocode( { 'address': location.user_address1+','+location.user_address2 }, function(results, status) {
        if (status == google.maps.GeocoderStatus.OK) {
              
            var marker = new google.maps.Marker({
                map: map, 
                position: results[0].geometry.location,
                title: location.user_name
            });
              
            google.maps.event.addListener(marker, 'click', function() {
                infowindow.setContent(content);
                infowindow.open(map,marker);
            });
         }
    });
    } else {
    var position = new google.maps.LatLng(parseFloat(location.user_lat), parseFloat(location.user_lang));
    var marker = new google.maps.Marker({
        map: map, 
        position: position,
        title: location.user_name
    });
      
    google.maps.event.addListener(marker, 'click', function() {
        infowindow.setContent(content);
        infowindow.open(map,marker);
    });
    }
}
initialize();
$(document).ready(function(){
  $('.like_view').click(function(){
        $status = "liked";
        $to_id = $(this).attr('id');
        if($(this).hasClass('liked')) $status = "disliked";
        $.ajax({
            'url': '<?php echo base_url();?>users/set_like_status',
            'type': 'post',
            'data': {'to_id': $to_id, 'status': $status},
            'dataType': 'html',
            success: function(resp){
                if(resp=="done") location.reload();
            }
            
        })
    });
});
</script>