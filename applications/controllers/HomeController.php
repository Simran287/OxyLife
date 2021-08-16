<?php

class HomeController extends CI_Controller{
  public function __construct($config = 'rest')
  {
    parent::__construct();
    $this->load->model('HomeModel');
    $this->load->database();
		$this->load->library('session');
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->library('parser');
		$this->load->library('form_validation');
    $this->load->library('upload');
    $this->load->helper('url', 'form');
    $this->load->helper('url');
  }
  public function login_signin()
  {

    $this->form_validation->set_rules('username', 'Username', 'required');
    $this->form_validation->set_rules('password', 'Password', 'required');
    if ($this->form_validation->run() == FALSE)
    {
      $this->session->set_flashdata("username",'Wrong UserID');
        // redirect('signin',"refresh");
        // echo 'If statement working';
    }
    else{
      //$this->load->view('formsuccess');
      $data_array = array(
      'username' =>$_POST['username'],
      'password' =>$_POST['password']
      );
      $response = $this->HomeModel->login_check($data_array);

      //print_r($response);

        // if ($response['status']){
        //   // $this->session->set_userdata($response);
        //   redirect('userdetails',$response);
        //   // $data["login_check"] = $this->HomeModel->login_check();
        //   // $this->load->view('userdetails',$data);
        //   //print_r($this->session->$response['userdata']);
        // }
        // if(isset($response))
        // {
        //   $this->session->set_userdata($response);
        //   redirect('userdetails');
        // }
      if($response['status'] == true)
      {
        $response = $this->HomeModel->isAdmin($response);
        //print_r($response);
        if(isset($response))
        {
          $isAdmin = $response['Admin'];
          $this->session->set_userdata('isAdmin', $isAdmin);
          $this->session->set_userdata('response', $response);
          redirect('usershow');
        }
        // if($isAdmin == true)
        // {
        //   $UserData = $this->HomeModel->getUserData($response);
        //   //$AllUserData = $this->HomeModel->getAllUserData();
        //   $ApprovedUsers = $this->HomeModel->getApprovedUsers();
        //   $PendingUsers = $this->HomeModel->getPendingUsers();
        //   $RejectedUsers = $this->HomeModel->getRejectedUsers();
        //   //$this->load->view('userdetails', $UserData, $AllUserData);
        //   //$this->load->view('maindetails', $isAdmin);
        //   $this->session->set_userdata('UserData', $UserData);
        //   $this->session->set_userdata('ApprovedUsers', $ApprovedUsers);
        //   $this->session->set_userdata('PendingUsers',$PendingUsers);
        //   $this->session->set_userdata('RejectedUsers',$RejectedUsers);
        //   $this->session->set_userdata('Admin', $isAdmin);
        //   redirect('mainpage');
        // }
        // else
        // {
        //   $UserData = $this->HomeModel->getUserData($response);
        //   //$this->load->view('userdetails', $UserData);
        //   //$this->load->view('maindetails', $isAdmin);
        //   $this->session->set_userdata('UserData', $UserData);
        //   $this->session->set_userdata('Admin', $isAdmin);
        //   redirect('mainpage');
        // }
      }
    }
    // $data_array = true;
    // $response =   $this->HomeModel->login($data_array);
    // if($response)
    // {
    //   $this->load->view('login');
    // }
    // $register = $_POST['register'];
    // if(isset($register))
    // {
    //   redirect('registration');
    // }
    // $register = $this->session->userdata('register');
    // if(isset($register))
    // {
    //   redirect('registration');
    // }
    $register = $this->input->post('register');
    if(isset($register))
    {
      redirect('registration');
    }
    $this->load->view('login');
  }

  public function user_show()
  {
    $isAdmin = $this->session->userdata('isAdmin');
    $response = $this->session->userdata('response');
    if($isAdmin == true)
        {
          $UserData = $this->HomeModel->getUserData($response);
          //$AllUserData = $this->HomeModel->getAllUserData();
          $ApprovedUsers = $this->HomeModel->getApprovedUsers();
          $PendingUsers = $this->HomeModel->getPendingUsers();
          $RejectedUsers = $this->HomeModel->getRejectedUsers();
          //$this->load->view('userdetails', $UserData, $AllUserData);
          //$this->load->view('maindetails', $isAdmin);
          $this->session->set_userdata('UserData', $UserData);
          $this->session->set_userdata('ApprovedUsers', $ApprovedUsers);
          $this->session->set_userdata('PendingUsers',$PendingUsers);
          $this->session->set_userdata('RejectedUsers',$RejectedUsers);
          $this->session->set_userdata('Admin', $isAdmin);
          redirect('mainpage');
        }
        else
        {
          $UserData = $this->HomeModel->getUserData($response);
          //$this->load->view('userdetails', $UserData);
          //$this->load->view('maindetails', $isAdmin);
          $this->session->set_userdata('UserData', $UserData);
          $this->session->set_userdata('Admin', $isAdmin);
          redirect('mainpage');
        }
  }

  public function mainpage()
  {
    $this->load->view('maindetails');
    $new_status = $_POST['status'];
     print_r($_POST);
    // $update_data = array(
    //   'userid' => $this->session->userdata('updateUserID'),
    //   'status' => $_POST['status']
    // );
    //print_r($update_data);
    if(isset($new_status))
    {
      $this->session->set_userdata('userstatus', $new_status);
      //redirect('showstatus');
      $update_status = $this->HomeModel->update_status();
      if($update_status == true)
      {
        redirect('usershow');
      }
    }
    $this->session->unset_userdata('userstatus');
    $this->session->unset_userdata('updateUserID');
  }

  public function showstatus()
  {
    $status = $this->session->userdata('userstatus');
    echo $status;
  }

  public function userdetails(){
    
    // $details = $this->session->userdata('details');
    $userdata1 = $this->session->all_userdata();
    // echo var_dump($userdata1);
    //echo $userdata1["data"]["FirstName"];
    // $userdata = $userdata1["data"]->result();
    $this->load->view('userdetails');
  }


  // public function login(){

  //   $response = $this->HomeModel->getselectedData();
  //    //print_r($response);
  //   if($response['status'])
  //       {
  //         $this->load->view('HomeView',$response);
  //       }
  // }

  public function register(){
    $this->load->view('registration');
    $date = date('d-m-y h:i:s');

    $id = uniqid();
    if($this->input->post('save'))
    {
      $insert_logindata = array(
        'UserID' =>$id,
        'FirstName' =>$_POST['fname'],
        'MiddleName' =>$_POST['mname'],
        'LastName' =>$_POST['lname'],
        'UserName' =>$_POST['username'],
        'Password' =>$_POST['password'],
        'emailAddress' =>$_POST['mail'],
        'PhoneNumber' =>$_POST['num1'],
        'AltPhoneNumber' =>$_POST['num2'],
        'Address' =>$_POST['peradd'],
        'Pincode' =>$_POST['pincode'],
        'State' =>$_POST['state'],
        'Gender' =>$_POST['gender'],
        'DateOfBirth' =>$_POST['dob'],
        'Occupation' =>$_POST['occupation'],
        'MaritalStatus' =>$_POST['maritalstatus'],
        // 'result' =>$_POST['result'],
        'AadhaarNumber' =>$_POST['aadhaarno'],
        // 'panno' =>$_POST['panno'],
        // 'desiredjob' =>$_POST['desiredjob'],
        'CreationTime' =>$date,
        'Status' =>'Pending',
        'VerificationStatus' =>'0',
        'Role' =>'User'
      );
      $insert_cvdata = array(
        'cvid' => null,
        'UserID' =>$id,
        'FirstName' =>$_POST['fname'],
        'MiddleName' =>$_POST['mname'],
        'LastName' =>$_POST['lname'],
        'CVFile' => null,
        'PhotoFile' => null,
        'Result' =>$_POST['result'],
        'AadhaarNumber' =>$_POST['aadhaarno'],
        'PanNumber' =>$_POST['panno'],
        'DesiredJob' =>$_POST['desiredjob'],
        'ExperienceYears' =>$_POST['experiencey']
      );
      $result = $this->HomeModel->insert_user($insert_logindata, $insert_cvdata);
      if($result == true)
      {
        $this->session->set_userdata('message','You have been registered.');
        redirect('signin');
      }
      else{
        $this->session->set_userdata('message','Registration unsuccessful!');
        redirect('signin');
      }
    }
    // $this->load->view('registration');
  }
  public function display_picture_upload(){
    $this->load->view('pictureupload');
    
  }

  public function store() {
    // $image_path = realpath(APPPATH . '../images');
    if (isset($_FILES['profile_image'])) {
        $config['upload_path'] = './images/';
				$config['allowed_types'] = 'png|jpeg|jpg|gif';
				$config['max_size'] = 10000;
				$config['maintain_ratio'] = FALSE;
				$config['quality'] = '60%';
				$config['overwrite'] = true;
				$config['file_name'] = "profile".date("YmdHis");
				
				$this->upload->initialize($config);
				$this->load->library('upload', $config);
			
				if (!$this->upload->do_upload('profile_image')) {
        $error = array('error' => $this->upload->display_errors());

        $this->load->view('pictureupload', $error);
    } else {
        $data = array('image_metadata' => $this->upload->data()); 

        $this->load->view('upload_result', $data);
    }
  }else{
    $error = array('error' => 'no file found');

    $this->load->view('pictureupload', $error);
  }


    // $config['upload_path'] = './images/';
		// 		$config['allowed_types'] = 'png|jpg|jpeg';
		// 		$config['max_size'] = 10000;
		// 		$config['maintain_ratio'] = FALSE;
		// 		$config['quality'] = '60%';
		// 		$config['overwrite'] = true;
		// 		$config['file_name'] = "profile".$imagename;
				
		// 		$this->upload->initialize($config);
		// 		$this->load->library('upload', $config);
			
		// 		if (!$this->upload->do_upload('userprofile')) {
    //     }
  }
}

?>