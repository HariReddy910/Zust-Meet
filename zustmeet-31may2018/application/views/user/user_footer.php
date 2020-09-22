</body>
<script type="text/javascript">
$(document).ready(function() {
    $("#userCard").hide();
    $("#mapView").click(function() {
        $("#mapBackground").show();
        $("#userCard").hide();
    });
    $("#gridView").click(function() {
        $("#userCard").show();
        $("#mapBackground").hide();
    });


    $("#myAffix").click(function() {
        $("#mySidenav").animate({width: 'toggle'}, 600);
        $("#filterIcon").animate({left: '0px'}, {duration: 600, complete: function() {
                $(this).addClass('closeFilterIcon')          
           }});
        //$("#filterIcon").toggleClass('iconTranslate');
        $("#userProfiles").toggleClass("col-md-offset-3");
        if($("#filterIcon").hasClass('closeFilterIcon')) {
           $("#filterIcon").animate({left: '330px'}, {duration: 100, complete: function() {
                $(this).removeClass('closeFilterIcon')          
           }});
        }; 
        
    });
    $("#interests button").click(function() {
        $(this).find('span').toggleClass("fa fa-check-square");
    });
});


$(document).ready(function() {
    $("#ex2").slider({
        tooltip: 'always'
    });
    $("#ex3").slider({
        tooltip: 'always'
    });

    $("#ex6").slider();
    $("#ex6").on("slide", function(slideEvt) {
        $("#ex6SliderVal").text(slideEvt.value);
    });

    $("#ex5").slider();
    $("#ex5").on("slide", function(slideEvt) {
        $("#ex5SliderVal").text(slideEvt.value);
    });
    
    $("#gridView").click(function(){
         $("#mapView.mp_btn_1").removeClass('mp_btn_1').addClass('mp_btn_1_notselect').text('Map View');
         $("#gridView.mp_btn_2_notselect").removeClass('mp_btn_2_notselect').addClass('mp_btn_2').html('<i class="fa fa-eye" aria-hidden="true"></i>Grid View');
    });
    $("#mapView").click(function(){
         $("#gridView.mp_btn_2").removeClass('mp_btn_2').addClass('mp_btn_2_notselect').text('Grid View');
         $("#mapView.mp_btn_1_notselect").removeClass('mp_btn_1_notselect').addClass('mp_btn_1').html('<i class="fa fa-eye" aria-hidden="true"></i>Map View');
    });

});
</script>
<script src="http://seiyria.com/bootstrap-slider/js/bootstrap-slider.js"></script>
</html>