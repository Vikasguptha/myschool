<?php
 class student extends CI_controller{
    public function addstudent(){
        $this->load->view('dashbord');
        $this->load->model('user_model');
      
        if($this->user_model->authorized()==false){
          $this->session->set_flashdata('msg','you are cant use it please try login  ' );
          redirect(base_url().'index.php/user/login');
    
        }
         if($this->input->post('submit') !=""){
          
           
          if($this->input->post('fname') == "" || $this->input->post('lname') == "" ||$this->input->post('email') == "" ||$this->input->post('class_id') == ""|| $this->input->post('section_id') == ""  ){
               $this->session->set_flashdata('msg','please enter all the required fields ');
               $this->load->view('student');
           }else{
               
             $this->load->model('user_model');
             $formArray=array();
             $formArray['fname']=$this->input->post('fname');
             $formArray['lname']=$this->input->post('lname');
             $formArray['contact']=$this->input->post('contact');
             $formArray['email']=$this->input->post('email');
             $formArray['dob']=$this->input->post('dob');
             $formArray['gender']=$this->input->post('gender');
             $formArray['class_id']=$this->input->post('class_id');
             $formArray['section_id']=$this->input->post('section_id');
             $formArray['address']=$this->input->post('address');
             $formArray['country_id']=$this->input->post('country_id');
             $formArray['state_id']=$this->input->post('state_id');
             $formArray['city_id']=$this->input->post('city_id');
             $formArray['user_id']=$this->session->userdata['user']['user_id'];
            $arr=$this->user_model->reg_id(date('y').strtoupper($this->user_model->section($this->input->post('section_id'))).$this->input->post('class_id'));
            if(!empty($arr)){
            $formArray['reg_id']=++$arr[sizeof($arr)-1]['reg_id'] ;}
            else{
              $formArray['reg_id']=date('y').strtoupper($this->user_model->section($this->input->post('section_id'))).$this->input->post('class_id')."0001";
            }
            
            $formArray['reg_date']=date('y-m-d');
             $formArray['last_update']=date('y-m-d');
             
            //start of image upload 
             $config['upload_path'] = './upload/';
             $config['allowed_types'] = 'gif|jpg|png|jpeg';
             $config['max_size'] = 2000;
          
     
             $this->load->library('upload', $config);
     
             if (!$this->upload->do_upload('profile_image')) {
                 $error = array('error' => $this->upload->display_errors());
                 $this->user_model->addstudent($formArray);
            
 
                 $this->session->set_flashdata('msg','student has created successfully');
                 redirect(base_url().'index.php/student/totalstudents'); 
                
             } else {
                 $data = array('image_metadata' => $this->upload->data());
                
                $formArray['photo']=$data['image_metadata'] ['file_name'];
             }
            //end of image upload
         
            $this->user_model->addstudent($formArray);
            
 
             $this->session->set_flashdata('msg','student has created successfully');
             redirect(base_url().'index.php/student/totalstudents'); 
            
           }
         }else{
           $data['class'] =$this->user_model->fetchclass();
           $data['country'] =$this->user_model->fetchcountry();
           $this->load->view('student',$data);
         }
    }
    public function totalstudents(){
      $this->load->view('dashbord');
        $this->load->database();  
        $this->load->model('user_model');
        $this->load->model('user_model');
        if($this->user_model->authorized()==false){
          $this->session->set_flashdata('msg','you are cant use it please try login  ' );
          redirect(base_url().'index.php/user/login');
    
        }
          
        $data['h']=$this->user_model->totalstudents();
        
        $this->load->view('totalstudents',$data);
        
    }
    public function editstudent($student_id){
        $this->load->view('dashbord');
        $this->load->database();  
        $this->load->model('user_model');
        $this->load->model('user_model');
        if($this->user_model->authorized()==false){
          $this->session->set_flashdata('msg','you are cant use it please try login  ' );
          redirect(base_url().'index.php/user/login');
    
        }
          
        $data['h']=$this->user_model->getstudent($student_id);
        $this->load->view('editstudent',$data);
       
       }
    public function updatestudent(){
      $this->load->model('user_model');
      if($this->user_model->authorized()==false){
        $this->session->set_flashdata('msg','you are cant use it please try login  ' );
        redirect(base_url().'index.php/user/login');
  
      }
        
        if($this->input->post('submit') !=""){      
          if($this->input->post('fname') == "" || $this->input->post('lname') == ""  ){
            $this->session->set_flashdata('msg','please enter all the required fields ');
            $this->load->view('editstudent');
        }else{
          $this->load->model('user_model');
          $sArray=array();
           
          $sArray['student_id']=$this->input->post('student_id');
          
          $sArray['fname']=$this->input->post('fname');
          $sArray['lname']=$this->input->post('lname');
          $sArray['age']=$this->input->post('age');
          $sArray['email']=$this->input->post('email');
          $sArray['last_update']=date('y-m-d');
           
          //start of image upload 
           $config['upload_path'] = './upload/';
           $config['allowed_types'] = 'gif|jpg|png|jpeg';
           $config['max_size'] = 2000;
        
   
           $this->load->library('upload', $config);
           $this->input->post('profile_image');
           if (!$this->upload->do_upload('profile_image')) {
               
         $updateddata= $this->user_model->edit_student($sArray);
        
         $this->session->set_flashdata('msg','your account has updated successfully');
         redirect(base_url().'index.php/student/totalstudents'); 
           } else {
             
             $old=$this->user_model->studentphoto($sArray['student_id']);
             
             if(!empty($old)){
            
               unlink("upload/".$old);
               $data = array('image_metadata' => $this->upload->data());
              
              $sArray['photo']=$data['image_metadata'] ['file_name'];
            }else{ 
              
              $data = array('image_metadata' => $this->upload->data());
              
              $sArray['photo']=$data['image_metadata'] ['file_name'];
              
            }
            
           }
          //end of image upload
         
         $updateddata= $this->user_model->edit_student($sArray);
        
          $this->session->set_flashdata('msg','your account has updated successfully');
          redirect(base_url().'index.php/student/totalstudents'); 
        }       
      }else{
       // $this->load->view('userdetails');
      }
       }
       public function studentdelete()//for deleting the user
       {
        $student_id= $this->input->get('student_id');
         $this->load->model('User_model');
     
         $delete=$this->User_model->studentdelete($student_id);
           if($delete)
             {
               echo json_encode( "Success");
             }
          else
             {
               echo "Error";
             }
     
       }
       public function store()
       {  
        $this->load->library('form_validation');
        $this->load->library('upload');
        $this->load->helper('url', 'form');
        $config['upload_path'] = './upload/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 2000;
        $config['max_width'] = 1500;
        $config['max_height'] = 1500;

        $this->load->library('upload', $config);
        
        if ($this->upload->do_upload('profile_image')) 
		{    $data = array('image_metadata' => $this->upload->data());
          print_r($data);die;
            $this->load->view('student', $data);
            $error = array('error' => $this->upload->display_errors());
   print_r($error);die;
            $this->load->view('', $error);
        } 
		else 
		{     
      $data = array('image_metadata' => $this->upload->data());
      print_r($this->input->post('profile_image'));
      echo "<pre>";
      print_r($data);die;
        $this->load->view('student', $data);
        }
        }
}
