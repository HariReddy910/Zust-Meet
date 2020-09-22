<div class="container">
        <div class="row">
            <div class="col-md-6">
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
            <div class="col-md-6">
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
    <div class="container">
        <?php $k=1; 
              $gridData = ""; 
              foreach(json_decode($user_liked) as $liked) { 
                if($k%2!=0) {
                        $gridData .= '<div class="like_row"><div class="row-fluid">';
                        $gridData .= ' <div class="well col-md-5 col-xs-12"><div class="Us_ico"><i class="fa fa-heart" aria-hidden="true"></i></div><div class="col-xs-4">';
                        $gridData .= '<img src="http://zustmeet.com/assets/user/images/Profile Popup Image.png" class="img-responsive"></div>';
                        $gridData .= ' <div class="col-xs-4"><ul class="like_details"><li><b>'.$liked->user_name.'</b></li><li class="like_age">Age-'.$liked->user_age.'</li><li class="like_place">'.$liked->user_formated_address.'<i class="fa fa-map-marker" aria-hidden="true"></i> </li>';
                        $gridData .= ' <li class="like_way">2 miles away</li></ul></div>';
                        $gridData .= ' <div class="col-xs-3"><ul class="like_view" id="'.$liked->user_id .'"><i style="cursor: pointer;" class="fa fa-heart-o" aria-hidden="true"></i><li>Available</li>';
                        $gridData .= ' <a href="date_confirmation.html"><button type="button" class="btn btn-primary btn-xs">View profile</button></a>';
                        $gridData .= ' </ul></div></div>';
                } else {
                      $gridData .= ' <div class="well col-md-5 col-md-offset-1 col-xs-12"> <div class="Us_ico"><i class="fa fa-heart" aria-hidden="true"></i></div>';
                      $gridData .= ' <div class="col-xs-4"><img src="http://zustmeet.com/assets/user/images/Profile Popup Image.png" class="img-responsive"></div>';
                      $gridData .= ' <div class="col-xs-4"><ul class="like_details"><li><b>'.$liked->user_name.'</b></li><li class="like_age">Age-'.$liked->user_age.'</li><li class="like_place">'.$liked->user_formated_address.'<i class="fa fa-map-marker" aria-hidden="true"></i> </li>';
                      $gridData .= ' <li class="like_way">2 miles away</li></ul></div>';
                      $gridData .= ' <div class="col-xs-3"><ul class="like_view"><i class="fa fa-heart-o" aria-hidden="true"></i><li>Available</li>';
                      $gridData .= ' <a href="date_confirmation.html"><button type="button" class="btn btn-primary btn-xs">View profile</button></a>';
                      $gridData .= ' </ul></div></div>';
                      $gridData .= '</div></div></div>';
                }
                $k=$k+1;  
              } 
              
              echo $gridData;
        ?>

        <div class="footer">

            <ul class="pagination" style="display: none;">
                <li><a href="#"><b>Previous</b></a>
                </li>
                <li><a href="#">1</a>
                </li>
                <li><a href="#">2</a>
                </li>
                <li><a href="#">3</a>
                </li>
                <li><a href="#"><b>Next</b></a>
                </li>
            </ul>

        </div>
    </div>