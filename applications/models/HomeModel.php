<?php

  class HomeModel extends CI_Model{
      function __construct()
      {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
        $this->load->helper('url');
		    $this->load->library('parser');
      }

      function login_check($data_array)
      {
        $response = array();
        $userdata = array();
        $sql_login = "SELECT * FROM `logindetails` JOIN `cvdetails` ON logindetails.UserID = cvdetails.UserID WHERE `UserName` = ? AND `Password` = ?";
        $query = $this->db->query($sql_login, array($data_array['username'],$data_array['password']));
        $count_result = $query->num_rows();
        // echo $count_result;
        if ($count_result == 1){
          $response['status'] = true;
          $response['data'] = $query->result();
          // foreach($result as $row)
          // {
          //   if(($row->Role) == "Admin")
          //   {
          //     $sql_user_record = "SELECT * FROM `logindetails` JOIN `cvdetails` ON logindetails.UserID = cvdetails.UserID WHERE `Role` = 'User'";
          //     $query_user = $this->db->query($sql_user_record);
          //     $count_user = $query_user->num_rows();
          //     if($count_user != 0)
          //     {
          //       $all_records = "SELECT * FROM `logindetails` JOIN `cvdetails` ON logindetails.UserID = cvdetails.UserID WHERE 1";
          //       $query_all_records = $this->db->query($all_records);
          //       $result = $query_all_records->result();
          //       return $result;
          //     }
          //   }
          //   else
          //   {
          //     return $result;
          //   }
          // }
        }
        else
        {
          $response['status'] = false;
        }
        return $response;
      }

      public function isAdmin($response)
      {
        $result = $response['data'];
        foreach($result as $row)
        {
            if(($row->Role) == "Admin")
            {
              $response['Admin'] = true;
              $response['message'] = "User is Admin";
            }
        
            else
            {
              $response['Admin'] = false;
              $response['message'] = "User is Normal User";
            }
          }
        return $response;
      }

      public function getUserData($response)
      {
        $data = $response['data'];
        return $data;
      }

      public function getAllUserData()
      {
        $sql_user_record = "SELECT * FROM `logindetails` JOIN `cvdetails` ON logindetails.UserID = cvdetails.UserID WHERE `Role` = 'User'";
        $user_record = $this->db->query($sql_user_record);
        $count_user = $user_record->num_rows();
        if($count_user != 0)
        {
          // $all_records = "SELECT * FROM `logindetails` JOIN `cvdetails` ON logindetails.UserID = cvdetails.UserID WHERE 1";
          // $query_all_records = $this->db->query($all_records);
          $result = $user_record->result();
          return $result;
        }
      }

      public function getApprovedUsers()
      {
        $sql_user_record = "SELECT * FROM `logindetails` JOIN `cvdetails` ON logindetails.UserID = cvdetails.UserID WHERE `Role` = 'User' AND `Status` = 'Approved'";
        $user_record = $this->db->query($sql_user_record);
        $count_user = $user_record->num_rows();
        if($count_user != 0)
        {
          // $all_records = "SELECT * FROM `logindetails` JOIN `cvdetails` ON logindetails.UserID = cvdetails.UserID WHERE 1";
          // $query_all_records = $this->db->query($all_records);
          $result = $user_record->result();
          return $result;
        }
      }

      public function getPendingUsers()
      {
        $sql_user_record = "SELECT * FROM `logindetails` JOIN `cvdetails` ON logindetails.UserID = cvdetails.UserID WHERE `Role` = 'User' AND `Status` = 'Pending'";
        $user_record = $this->db->query($sql_user_record);
        $count_user = $user_record->num_rows();
        if($count_user != 0)
        {
          // $all_records = "SELECT * FROM `logindetails` JOIN `cvdetails` ON logindetails.UserID = cvdetails.UserID WHERE 1";
          // $query_all_records = $this->db->query($all_records);
          $result = $user_record->result();
          return $result;
        }
      }

      public function getRejectedUsers()
      {
        $sql_user_record = "SELECT * FROM `logindetails` JOIN `cvdetails` ON logindetails.UserID = cvdetails.UserID WHERE `Role` = 'User' AND `Status` = 'Rejected'";
        $user_record = $this->db->query($sql_user_record);
        $count_user = $user_record->num_rows();
        if($count_user != 0)
        {
          // $all_records = "SELECT * FROM `logindetails` JOIN `cvdetails` ON logindetails.UserID = cvdetails.UserID WHERE 1";
          // $query_all_records = $this->db->query($all_records);
          $result = $user_record->result();
          return $result;
        }
      }

      public function update_status()
      {
        $update_data = array(
          'userid' => $this->session->userdata('updateUserID'),
          'status' => $this->session->userdata('userstatus')
        );
        //print_r($update_data);
        // echo $userid;
        // echo $status;
        $sql_update_record = "UPDATE `logindetails` SET `Status` = ? WHERE `UserID` = ?";
        $update_query = $this->db->query($sql_update_record, array($update_data['status'],$update_data['userid']));
        if(isset($update_query))
        {
          $update_status = true;
        }
        else
        {
          $update_status = false;
        }
        return $update_status;
      }

      public function insert_user($insert_logindata, $insert_cvdata)
      {
        if(isset($insert_logindata) && isset($insert_cvdata))
        {
          $user_logindata = $this->db->insert('logindetails', $insert_logindata);
          $user_cvdata = $this->db->insert('cvdetails',$insert_cvdata);
          if(isset($user_logindata) && isset($user_cvdata))
          {
            // echo '<script type="text/JavaScript"> 
            // alert("You have been registered.");
            // </script>';
            $login_success = true;
          }
          else
          {
            $login_success = false;
          }
        }
        return $login_success;
        // echo $date;
        //echo var_dump($insert_data);

      }
      public function getselectedData(){
        // echo "Model is connected.";
         // $query = $this->db->get('logindetails');
        $response = array();
        $data = array();
        
        $query = $this->db->query('SELECT `FirstName` FROM `logindetails` WHERE 1');
       //  $sql =  'SELECT `FirstName` FROM `logindetails` WHERE 1';
        if($query->num_rows()>0 )
        {
          foreach($query->result() as $data)
          {
              array_push($data,$data);
          }
          $response['status'] = true;
          $response['data'] = $data;
          return $response;
    
        }else{
          $response['status'] = false;
          return $response;
        }
      }
  }
?>