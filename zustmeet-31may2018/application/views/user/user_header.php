<!DOCTYPE html>
<html lang="en-US">

<head>
    <title>zustmeet</title>

    <meta name="viewport" content="width=device-width">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link rel="stylesheet" href="http://seiyria.com/bootstrap-slider/css/bootstrap-slider.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/user/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/user/css/style.css">
    <script src="<?php echo base_url();?>assets/user/js/jquery.min.js"></script>
    <script src="<?php echo base_url();?>assets/user/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>assets/user/js/custom.js"></script>
    <script src="<?php echo base_url();?>assets/user/js/markerclusterer.js"></script>
    
<style type="text/css">
    .card_onmap {
        position: absolute;
        top: 180px;
        left: 500px;
    }
    .slider-handle {
        background-color: ;
        background-image: linear-gradient(to bottom, #9d325e 0%, #7b294b 100%);
        border: 3px solid #f3f3f3;
        box-shadow: 0 0 1px #000;
    }
    .tooltip, .tooltip-main {
        opacity: 1 !important;
        display: block !important;
    }
    .age .tooltip-main { 
        display: none !important;
    }
    .tooltip-arrow {
        display: none !important;
    }
    .tooltip-inner {
        color: #000 !important;
        background: none !important;
        font-size: 16px;
        font-weight: bold;
    }
</style>
</head>

<body>
    <div class="header">
        <div class="navbar-header">
            <nav class="navbar navbar-default">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button> <a href="<?php echo base_url();?>users/userhome"> <img src="<?php echo base_url();?>assets/user/images/Zust Meet logo.png" class="header_logo"> </a>
            </nav>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="<?php echo base_url();?>users/userhome" class="head_name"> <i class="fa fa-home" aria-hidden="true"></i> Home</a>
                </li>
                <li>
                    <a href="<?php echo base_url();?>users/userliked" class="head_name"><i class="fa fa-heart" aria-hidden="true" ></i>  Liked<div class="vl"></div></a>
                </li>
                <li><a href="#" class="head_name"><i class="fa fa-bell" aria-hidden="true"></i> Notifications<div class="vl"></div> </a>
                </li>
                <li><a href="#" class="head_name"><i class="fa fa-user" aria-hidden="true"></i> My profile</a>
                </li>
                 <?php 
                       $user_info = $this->session->userdata['user_info'];
                       if($user_info['profile_pic_path']==null || $user_info['profile_pic_path']=='' || $user_info['profile_pic_path']==' '){
                            
                            if($user_info['user_gender']=='m') 
                                $user_info['profile_pic_path']=base_url()."assets/user/profilepics/male.png";
                            else
                                $user_info['profile_pic_path']=base_url()."assets/user/profilepics/female.png";
                        } else {
                            $user_info['profile_pic_path']=base_url()."assets/user/profilepics/".$user_info['zm_profile_id']."/".$user_info['profile_pic_path'];
                        }
                 ?>
                <li><a href="#" class="head_name" data-toggle="dropdown"><div class="ico_bg"><img src="<?php  echo $user_info['profile_pic_path'];?>" /><span> <?php echo $this->session->userdata['user_info']['user_name']; ?></span></div><b class="caret" ></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo base_url();?>users/updateprofile">Update Profile</a>
                        </li>
                        <li><a href="<?php echo base_url();?>users/changepassword">Change Password</a>
                        </li>
                        <li><a href="<?php echo base_url();?>users/logout">Logout</a>
                        </li>

                    </ul>
                </li>


            </ul>

        </div>
    </div>