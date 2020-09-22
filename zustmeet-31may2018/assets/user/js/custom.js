$(document).ready(function(){
   $('#regformsubmit').click(function(e) {
	$user_password = $("#user_password")val();
	if(!validateEmail($email.val())){
	    alert("Password in required format");
	    e.preventDefault();
	}
	
  });
   
   $( '.a_intrests' ).click( function(e) {
        $selected = "";
        $( "span[name='check_intrests']" ).each(function(){
            if($(this).hasClass('fa-check-square')) {
                $selected += $(this).attr('id')+",";
            }
        });
        $(".user_intrests").val($selected.slice(0, -1));
      e.preventDefault();
    });
    $("#male_filter").click(function(){
        $("#gender_filter").val("m");
        $(this).addClass('gender_filter');
        if($("#female_filter").hasClass('gender_filter')) $("#female_filter").removeClass('gender_filter');
        if($("#both_filter").hasClass('gender_filter')) $("#both_filter").removeClass('gender_filter');
    });
    
    $("#female_filter").click(function(){
        $("#gender_filter").val("f");
        $(this).addClass('gender_filter');
        if($("#male_filter").hasClass('gender_filter')) $("#male_filter").removeClass('gender_filter');
        if($("#both_filter").hasClass('gender_filter')) $("#both_filter").removeClass('gender_filter');
    });
    
    $("#both_filter").click(function(){
        $("#gender_filter").val("both");
        $(this).addClass('gender_filter');
        if($("#male_filter").hasClass('gender_filter')) $("#male_filter").removeClass('gender_filter');
        if($("#female_filter").hasClass('gender_filter')) $("#female_filter").removeClass('gender_filter');
    });
    
    $('.zm_intrests').click(function(){
        $div = $(this);
        if($div.hasClass('update_border')){
            $div.removeClass('update_border');
        } else {
            $div.addClass('update_border');
        }
        $ids='';
        $('.zm_intrests').each(function( index ) {
            $div = $(this);
            if($div.hasClass('update_border')){ 
                 $ids+=$div.attr('id')+',';
            }
          
        });
        $("#intrests").val($ids.slice(0, -1));
    });
    
    $('.profile_upload').on('click', function() {
        $('#profilepic').trigger('click');
    });
    $('#profilepic').click(function(e){
        e.stopImmediatePropagation();
    });
    
    $("#changepassword_form").on('submit', function(e) {
        if($("#user_confirm_password").val()!=$("#user_new_password").val()) e.preventDefault();
    });
    $("#update_profile_form").on('submit', function(e) {
        $file = $("#profilepic").val();
        $intrests = $("#intrests").val();
        if($file==''){
            e.preventDefault();
            $("#profile_intrests_status").html('');
            $("#profile_pic_status").html('<div class="isa_red" style="margin-left: 44%; color: red;font-style: italic;"><i class="fa fa-times-circle"></i>Profile pic required.</div>');
            return false;
        }
        if($intrests==''){
            e.preventDefault();
            $("#profile_pic_status").html('');
            $("#profile_intrests_status").html('<div class="isa_red" style="color: red;font-style: italic;"><i class="fa fa-times-circle"></i>Intrests are required.</div>');
            return false;
        }
        $("#profile_pic_status, #profile_intrests_status").html('');
        
    });
    
});

function showPreview(objFileInput) {
    if (objFileInput.files[0]) {
        var fileReader = new FileReader();
        fileReader.onload = function (e) {
            $(".profile_upload").html('<img src="'+e.target.result+'" style="margin-top: -24%;" width="125px" height="125px" class="upload-preview" />').css('opacity','0.7');
		}
		fileReader.readAsDataURL(objFileInput.files[0]);
    }
}

   function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
    }

    function openNav() {
        document.getElementById("mySidenav").style.width = "330px";
    }
    
function validateEmail(emailField){
var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
if (reg.test(emailField.value) === false) 
    return false;
else 
    return true;
}