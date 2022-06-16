<?php
 class marks extends CI_controller{
    public function addmarks(){
        $this->load->view('dashbord');
        $this->load->model('user_model');
        $this->load->helper('url');
        $this->load->model('user_model');
        if($this->user_model->authorized()==false){
          $this->session->set_flashdata('msg','you are cant use it please try login  ' );
          redirect(base_url().'index.php/user/login');
    
        }
          
        if($this->input->post('submit') !=""){
            if($this->input->post('class_id') == "" ||$this->input->post('section_id') == ""  ||$this->input->post('student_id') == ""  ||$this->input->post('subject_id') == ""){
                $this->session->set_flashdata('msg','please enter all the required fields ');
                $this->load->view('addmarks');
            }else{
                
              $this->load->model('user_model');
              $formArray=array();
              $formArray['class_id']=$this->input->post('class_id');
              $formArray['section_id']=$this->input->post('section_id');
              $formArray['student_id']=$this->input->post('student_id');
              $formArray['studentmarks']=$this->input->post('subjectmarks');
              $formArray['subject_id']=$this->input->post('subject_id');
              $formArray['last_update']=date('y-m-d');
              $this->user_model->createmarks($formArray);
              $this->session->set_flashdata('msg','user has created successfully');
              redirect(base_url().'index.php/marks/addmarks'); 
            
            }
          }else{
            $data['class'] =$this->user_model->fetchclass();
            $data['subject'] =$this->user_model->fetchsubject();
            $this->load->view('addmarks',$data);
          }
   }
   public function totalmarks($student_id){
    $this->load->view('dashbord');
    
    $this->load->model('user_model');
    $this->load->model('user_model');
    if($this->user_model->authorized()==false){
      $this->session->set_flashdata('msg','you are cant use it please try login  ' );
      redirect(base_url().'index.php/user/login');

    }
     $data['subject'] = $this->user_model->fetchsubject();
    $data['student']= $this->user_model->totalmarks($student_id);
    $data['data'] =$this->user_model->getstudent($student_id);
   $data['section']=$this->user_model->section($data['data']['section_id']);
    $this->load->view('total_marks',$data);


   }
   public function fetchsection(){
    $class_id= $this->input->get('class_id');
 

    // load model 
    $this->load->model('user_model');
    
    // get data 
    $this->load->model('user_model');
    if($this->user_model->authorized()==false){
      $this->session->set_flashdata('msg','you are cant use it please try login  ' );
      redirect(base_url().'index.php/user/login');

    }
      
    $data = $this->user_model->fetchsection( $class_id);
    
    echo json_encode($data); 
   }
   public function fetchstate(){
    $country_id= $this->input->get('country_id'); 
    $this->load->model('user_model');  
    $this->load->model('user_model');
    if($this->user_model->authorized()==false){
      $this->session->set_flashdata('msg','you are cant use it please try login  ' );
      redirect(base_url().'index.php/user/login');

    }
       
    $data = $this->user_model->fetchstate( $country_id);
    
    echo json_encode($data); 
   }
   public function fetchcity(){
    $state_id= $this->input->get('state_id'); 
    $this->load->model('user_model');  
    $this->load->model('user_model');
    if($this->user_model->authorized()==false){
      $this->session->set_flashdata('msg','you are cant use it please try login  ' );
      redirect(base_url().'index.php/user/login');

    }
       
    $data = $this->user_model->fetchcity( $state_id);
    
    echo json_encode($data); 
   }
   public function fetchstudent(){
    $section_id= $this->input->get('section_id'); 
    $this->load->model('user_model');  
    $this->load->model('user_model');
    if($this->user_model->authorized()==false){
      $this->session->set_flashdata('msg','you are cant use it please try login  ' );
      redirect(base_url().'index.php/user/login');

    }
       
    $data = $this->user_model->fetchstudent( $section_id);
    
    echo json_encode($data); 
   }
}
