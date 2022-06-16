<?php
 class user extends CI_controller{
    public function login(){
        $this->load->model('user_model');
       /* if($this->reg_model->authorized()==true){
          $this->session->set_flashdata('msg','you are cant use it please try login  ' );
          redirect(base_url().'index.php/user/dashbord');

        }*/
        if($this->input->post('submit') !=""){

          $this->load->library('form_validation');
       
       // $this->form_validation->set_rules('email','email','required|valied_email');
        //$this->form_validation->set_rules('password','password','required');
        if($this->input->post('username') == "" || $this->input->post('password') == ""   ){
          $this->session->set_flashdata('msg','please enter email and password ');
          $this->load->view('login');
        }else{
          
        $username=$this->input->post('username');
        $password=md5($this->input->post('password'));
          $user=$this->user_model->checkuser($username,$password);

        if(!empty($user)){
          
          $sessArray['user_id']=$user['user_id'];
            $sessArray['fname']=$user['fname'];
            $sessArray['lname']=$user['lname'];
            $sessArray['username']=$user['username'];
            $sessArray['email']=$user['email'];
            $sessArray['last_update']=date('y-m-d');  
                  
           $data['userdata']=print_r( $this->session->set_userdata( 'user',$sessArray));
           
           $this ->load->view('dashbord',$data);  
          redirect(base_url().'index.php/user/dashbord');
         
    
          
          }else{
         
          $this->session->set_flashdata('msg','either username is incorrect please try again ' );
          redirect(base_url().'index.php/user/login');
        }
        }
        }else{
         
          $this ->load->view('login');  
          }

      }
      public function logout(){
        $this->session->unset_userdata('user');
        redirect(base_url().'index.php/user/login');
    }
      public function dashbord(){
        $this->load->model('user_model');
        if($this->user_model->authorized()==false){
          $this->session->set_flashdata('msg','you are cant use it please try login  ' );
          redirect(base_url().'index.php/user/login');

        }
      $this->load->library('session');
        $this ->load->view('dashbord');
      }
      public function create_user(){
        $this->load->view('dashbord');
        $this->load->model('user_model');
      
        if($this->user_model->authorized()==false){
          $this->session->set_flashdata('msg','you are cant use it please try login  ' );
          redirect(base_url().'index.php/user/login');

        }
        if($this->input->post('submit') !=""){
         
         
         if($this->input->post('fname') == "" ||$this->input->post('lname') == "" || $this->input->post('email') == "" ||$this->input->post('username') == ""|| $this->input->post('password') == "" || $this->input->post('password') == "" ){
              $this->session->set_flashdata('msg','please enter all the required fields ');
              $this->load->view('create_user');
          }else{
              if($this->input->post('password')==$this->input->post('conpassword')){ 
            $this->load->model('user_model');
            $formArray=array();
            $formArray['fname']=$this->input->post('fname');
            $formArray['lname']=$this->input->post('lname');
            $formArray['username']=$this->input->post('username');
            $formArray['email']=$this->input->post('email');
            $formArray['password']=md5($this->input->post('password'));
            $this->user_model->createuser($formArray);
            $this->session->set_flashdata('msg','user has created successfully');
            redirect(base_url().'index.php/user/create_user'); 
          
          }
          else{
            $this->session->set_flashdata('msg','please enter the valied password ');
            $this->load->view('create_user');
            
          }
        }
        }else{
          $this->load->view('create_user');
        }
     }
     public function all_users(){
      $this->load->view('dashbord');
      $this->load->database();  
      $this->load->model('user_model');
      if($this->user_model->authorized()==false){
        $this->session->set_flashdata('msg','you are cant use it please try login  ' );
        redirect(base_url().'index.php/user/login');

      }
      $data['h']=$this->user_model->totalusers();
      $this->load->view('all_users',$data);
      
  }
  public function edituser($user_id){
    $this->load->view('dashbord');
    $this->load->database();  
    $this->load->model('user_model');
    if($this->user_model->authorized()==false){
      $this->session->set_flashdata('msg','you are cant use it please try login  ' );
      redirect(base_url().'index.php/user/login');

    }
    $data['h']=$this->user_model->getuser($user_id);
    $this->load->view('edituser',$data);
   
   }
   public function updateuser(){
    $this->load->model('user_model');
    if($this->user_model->authorized()==false){
      $this->session->set_flashdata('msg','you are cant use it please try login  ' );
      redirect(base_url().'index.php/user/login');

    }
        
    if($this->input->post('submit') !=""){      
      if($this->input->post('fname') == "" || $this->input->post('lname') == ""  ){
        $this->session->set_flashdata('msg','please enter all the required fields ');
        $this->load->view('edituser');
    }else{
      $this->load->model('user_model');
      $sArray=array();
       
      $sArray['user_id']=$this->input->post('user_id');
      
      $sArray['fname']=$this->input->post('fname');
      $sArray['lname']=$this->input->post('lname');
      $sArray['username']=$this->input->post('username');
      $sArray['email']=$this->input->post('email');
      echo '<pre>';
      print_r($sArray);
     
     $updateddata= $this->user_model->edit_row($sArray);
    
      $this->session->set_flashdata('msg','your account has updated successfully');
      redirect(base_url().'index.php/user/all_users'); 
    }       
  }else{
   // $this->load->view('userdetails');
  }
   }
   public function change_password(){
    $this->load->model('user_model');
    $this ->load->view('dashbord'); 
    if($this->user_model->authorized()==false){
      $this->session->set_flashdata('msg','you are cant use it please try login  ' );
      redirect(base_url().'index.php/user/login');

    }
    $this ->load->view('change_password');
    /* if($this->reg_model->authorized()==true){
       $this->session->set_flashdata('msg','you are cant use it please try login  ' );
       redirect(base_url().'index.php/user/dashbord');

     }*/
     if($this->input->post('submit') !=""){
       
       $this->load->library('form_validation');
    
    // $this->form_validation->set_rules('email','email','required|valied_email');
     //$this->form_validation->set_rules('password','password','required');
     if($this->input->post('currentpassword') == "" || $this->input->post('newpassword') == ""   ){
       $this->session->set_flashdata('msg','please enter email and password ');
       $this->load->view('login');
     }else{
      if($this->input->post('newpassword')==$this->input->post('conpassword')){ 
     $currentpassword=$this->input->post('currentpassword');
     $newpassword=md5($this->input->post('newpassword'));
    
    $this->user_model->checkpassword($this->session->userdata['user']['user_id'],$currentpassword,$newpassword);
      
       redirect(base_url().'index.php/user/all_users'); 
     }
     else
     { $this->session->set_flashdata('msg','please enter valied password ' );
      redirect(base_url().'index.php/user/change_password');
     }
    }
     }else{
      
       
       }

   }
  public function dashbord1(){
    $this->load->model('user_model');
   $data['student']= $this->user_model->countstudent();

    $this->load->view('dashbord1',$data);
  }
  }  
 