<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Users_model extends CI_Model {
    
     protected $table_name = 'users';
     protected $primary_key = 'user_id';

    
    function __construct() {
        parent::__construct();
    }
    
    function set_appointment() {
        $data['from_user_id']         = $this->session->userdata['user_info']['user_id'];
        $data['to_user_id']           = $this->input->post('to_id');
        $data['appointment_purpose']  = $this->input->post('appointment_purpose');
        $data['venue_address']        = $this->input->post('venue_address');
        $data['date_appointment']     = $this->input->post('date_appointment');
        $data['time_appointment']     = $this->input->post('time_appointment');
        $data['address_lat']          = $this->input->post('address_lat'); 
        $data['address_lang']         = $this->input->post('address_lang'); 
        $data['date_added']         = $data['date_updated'] = date('Y-m-d H:i:s');
        $this->db->insert("user_appoinments", $data);
        return "done";
    }
    
    function insert()
    {
        if($this->mail_exists($this->input->post('user_email'))>0) return -1;
        $hash = md5( rand(0,1000) );
        $data['is_active']         = 0; 
        $data['user_name']         = $this->input->post('user_name');
        $data['user_password']     = base64_encode($this->input->post('user_password'));
        $data['user_email']        = $this->input->post('user_email');
        $data['user_phone']        = $this->input->post('user_phone');
        $data['user_age']          = $this->input->post('user_age');
        $data['user_gender']       = $this->input->post('user_gender');
        $data['date_created']      = $data['date_updated'] = date('Y-m-d H:i:s');
        $data['created_from_ip']   = $data['updated_from_ip'] = $this->input->ip_address();
        $data['zm_profile_id']     = 'ZM'.date('hsdmY');
        $data['verification_hash']     = $hash;

        $success = $this->db->insert($this->table_name, $data);
        if ($success) {
            $url = base_url().'users/confirm/'.$hash;
            $to =  $data['user_email']; 
            $subject = "Your account successfully created with ZustMeet.";
            $message = "Thanks for registering with us.<br />Your ZustMeet ID: ". $data['zm_profile_id'] ."<br />Name: ".$data['user_name']."<br />Password: ".base64_decode ($data['user_password']);
            $message.="<br /> To Activate Your account, Please confirm ";
            $message.= " <a href='".$url."'> Here </a>";
 
            $from = "info@zustmeet.com";
            
            $headers  = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
            $headers .= "From:" . $from;
            mail($to,$subject,$message,$headers);
            return $this->db->insert_id();
        } else {
            return -1;
        }

        $this->db->insert('users', $this);
    }
    
    function confirm($hash) {
        $this->db->where('verification_hash', $hash);
        $this->db->update('users', array('is_active' => 1));
        return true;
    }
    
    function sendpassword()
    {
        if($this->user_exists($this->input->post('requestval'))==0) return -1;
        $data = $this->db->where('user_email',$this->input->post('requestval'))->or_where('user_name',$this->input->post('requestval'))->get('users')->result_array();
        $data = array_shift($data);
        $to =  $data['user_email']; 
        $subject = "Password from ZustMeet.";
        $message = " Your username: ".$data['user_name']." Password: ".base64_decode($data['user_password']);
        $from = "info@zustmeet.com";
        $headers = "From:" . $from;
        mail($to,$subject,$message,$headers);
        return 1;
        
    }
    
    function checkuser(){
        $this->db->where('user_password',base64_encode($this->input->post('user_password')));
        $this->db->where('user_email',$this->input->post('user_email'));
        $this->db->where('is_active',1);
        $data = $this->db->get('users')->result_array();
        $data = array_shift($data);
        if(count($data) > 0){
            $insert['user_id'] = $data['user_id'];
            $this->db->insert('user_logged_ins', $insert);
            $this->session->set_userdata("user_info", $data);
            return true;
        } else {
            return false;
        }
    }
    
    
    function user_intrests($user_id=0){
        $this->db->where('user_id',$user_id);
        $this->db->where('is_active',1);
        $this->db->select('user_intrest');
        $data = $this->db->get('user_intrests')->result_array();
        return $data;
    }
    function checkcurrentpassword(){
        $this->db->where('user_password',base64_encode($this->input->post('user_current_password')));
        $this->db->where('user_email',$this->session->userdata['user_info']['user_email']);
        if($this->db->get('users')->num_rows() > 0){
            return true;
        } else {
            return false;
        }
    }
    
    function user_info($id=''){
        $this->db->where('user_id',($id=='')? $this->session->userdata['user_info']['user_id']: $id);
        $data = $this->db->get('users')->result_array();
        return array_shift($data);
    }
    
    function update_new_password(){
        $this->db->where('user_id', $this->session->userdata['user_info']['user_id']);
        $this->db->update('users', array('user_password' => base64_encode($this->input->post('user_new_password'))));
    }
    
    function profildetailsupdate(){
        $this->db->where('user_id', $this->session->userdata['user_info']['user_id']);
        $this->db->update('user_intrests', array('is_active' => 0));
        
        $intrests = explode(',', $this->input->post('intrests'));
        foreach($intrests as $intrest) {
            $data = array(
                'user_intrest'  => $intrest,
                'user_id'       => $this->session->userdata['user_info']['user_id']
            );
            $this->db->insert('user_intrests', $data);
        }
         $config['upload_path']   = './assets/user/profilepics/'.$this->session->userdata['user_info']['zm_profile_id'].'/'; 
         $config['allowed_types'] = 'gif|jpg|png'; 

         if (!is_dir($config['upload_path'])) {
            mkdir($config['upload_path'], 0777, TRUE);
         }

         $this->load->library('upload', $config);
         $this->upload->initialize($config);
         $this->upload->do_upload('profilepic');
         
         $data = $this->upload->data();
         $this->db->where('user_id', $this->session->userdata['user_info']['user_id']);
         $user_address1=$this->input->post('user_address1');
         $user_address2=$this->input->post('user_address2');
         $user_address=urlencode($user_address1.','.$user_address2);
             // google map geocode api url
         $url = "http://maps.google.com/maps/api/geocode/json?address={$user_address}";
 
         // get the json response
         $resp_json = file_get_contents($url);
     
         // decode the json
         $resp = json_decode($resp_json, true);
         $lati = '';
         $longi = '';
         $formatted_address = '';
         if($resp['status']=='OK'){
            // get the important data
            $lati = $resp['results'][0]['geometry']['location']['lat'];
            $longi = $resp['results'][0]['geometry']['location']['lng'];
            $formatted_address = $resp['results'][0]['formatted_address'];
         }
         
         
        
         $this->db->update('users', array('user_formated_address'=>$formatted_address,'user_lang'=>$longi,'user_lat'=>$lati,'profile_pic_path' => $data['orig_name'], 'is_pic_uploaded' => 1, 'user_address1' =>$user_address1, 'user_address2' => $user_address2));
         return true;
    }
    
    function user_exists($key)
    {
        $this->db->where('user_email',$key);
        $this->db->or_where('user_name',$key);
        return $this->db->get('users')->num_rows();
    }
    
    function profile_update_check() {
        $this->db->where('user_id', $this->session->userdata['user_info']['user_id']);
        return (bool) $this->db->get('users')->row()->is_pic_uploaded;
    }
    
    function mail_exists($key)
    {
        $this->db->where('user_email',$key);
        return $this->db->get('users')->num_rows();
    }
    
    function set_like_status(){
        if($this->input->post('status')=='disliked') {
            $this->db->where('user_id_liked_from', $this->session->userdata['user_info']['user_id']);
            $this->db->where('user_id_liked_to', $this->input->post('to_id'));
            $this->db->update('user_likes', array('is_active' => 0));
        } else {
            $data['is_active']             = 1; 
            $data['user_id_liked_from']    = $this->session->userdata['user_info']['user_id'];
            $data['user_id_liked_to']      = $this->input->post('to_id');
            $this->db->insert('user_likes', $data);
        }
        return "done";
    }
    
    function user_liked(){
        $this->db->select('*');
        $this->db->from('user_likes');
        $this->db->join('users', 'user_likes.user_id_liked_to = users.user_id');
        $this->db->where('user_id_liked_from', $this->session->userdata['user_info']['user_id']);
        $query= $this->db->get();
        return json_encode($query->result());
    }
    
    function get_all_users(){
     $this->db->select('*');
     $this->db->from('users');
     $this->db->join('user_intrests', 'user_intrests.user_id = users.user_id', 'left');
     $this->db->where('trim(user_lat) IS NOT NULL AND trim(user_lang) IS NOT NULL');
     if($this->session->userdata['filters']['user_gender']!='both') {
         $this->db->where("user_gender", $this->session->userdata['filters']['user_gender']);
     }
     $user_age = explode(",", $this->session->userdata['filters']['user_age']);
     $this->db->where('user_age BETWEEN "'. $user_age[0]. '" and "'. $user_age[1].'"');
     if($this->session->userdata['filters']['user_intrests']!='all') {
         $user_intrests = explode(",",$this->session->userdata['filters']['user_intrests']);
         $this->db->where_in('user_intrest', $user_intrests);
         $this->db->where('user_intrests.is_active',1);
     }
      $user_ids = array();
      if(isset($this->session->userdata['filters']['user_distance'])) { 
         $qIds = $this->db->query('SELECT user_id, user_lat, user_lang FROM users');
         foreach ($qIds->result() as $row){
            if(round($this->getDistance( $row->user_lat, $row->user_lang),0,PHP_ROUND_HALF_UP)<=$this->session->userdata['filters']['user_distance']){
                array_push($user_ids, $row->user_id);
            }
         }
     }
     if(count($user_ids)) {
         $this->db->where_in('users.user_id', $user_ids);
     }
     $this->db->group_by('users.user_id'); 
     $query = $this->db->get();
     //return $this->db->last_query(); 
     $data = $query->result();
     foreach($data as &$d) $d->distance = round($this->getDistance($d->user_lat, $d->user_lang),0,PHP_ROUND_HALF_UP);
     return json_encode($data);
    }
    
    public function getDistance($lat,$lng){
    $source      = urlencode($this->session->userdata['user_info']['user_lat'].','.$this->session->userdata['user_info']['user_lang']);
    $destination = urlencode($lat.','.$lng);
    $sResponse=$this->curl_request('http://maps.googleapis.com/maps/api/distancematrix/json?origins='.$source.'&destinations='.$destination.'&mode=driving&units=imperial&sensor=false');
    $oJSON=json_decode($sResponse);
    if ($oJSON->status=='OK')
        return isset($oJSON->rows[0]->elements[0]->distance)? (float)preg_replace('/[^\d\.]/','',$oJSON->rows[0]->elements[0]->distance->text): 0;
    else
        return 0;
	}
	
	function curl_request($sURL)
    {
        $cURL=curl_init();
        curl_setopt($cURL,CURLOPT_URL,$sURL);
        curl_setopt($cURL,CURLOPT_RETURNTRANSFER, TRUE);
        $cResponse=trim(curl_exec($cURL));
        curl_close($cURL);
        return $cResponse;
    }
    
}
?>