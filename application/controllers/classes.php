<?php
 class classes extends CI_controller{
    public function create_class(){
        $this->load->view('dashbord');
        $this->load->model('user_model');
  
      if($this->user_model->authorized()==false){
        $this->session->set_flashdata('msg','you are cant use it please try login  ' );
        redirect(base_url().'index.php/user/login');
  
      }
        
       
        if($this->input->post('submit') !=""){
         
         
            if($this->input->post('class_name') == "" ||$this->input->post('class_name') == ""   ){
                 $this->session->set_flashdata('msg','please enter all the required fields ');
                 $this->load->view('create_class');
             }else{
                 
               $this->load->model('user_model');
               $formArray=array();
               $formArray['class_name']=$this->input->post('class_name');
              
               $formArray['last_update']=date('y-m-d');
               $this->user_model->createclass($formArray);
               $this->session->set_flashdata('msg','user has created successfully');
               redirect(base_url().'index.php/classes/create_class'); 
             
             }
           }else{
             $this->load->view('create_class');
           }
    }
    public function allclass(){
        $this->load->view('dashbord');
        $this->load->database();  
        $this->load->model('user_model');

        if($this->user_model->authorized()==false){
          $this->session->set_flashdata('msg','you are cant use it please try login  ' );
          redirect(base_url().'index.php/user/login');
    
        }
          
        $data['h']=$this->user_model->allclass();
        $this->load->view('allclass',$data);
    }
    public function classd($class_id){
        $this->load->view('dashbord');
        $this->load->database();  
        $this->load->model('user_model');
           if($this->user_model->authorized()==false){
          $this->session->set_flashdata('msg','you are cant use it please try login  ' );
          redirect(base_url().'index.php/user/login');
    
        }
          
        
        $data['section']=$this->user_model->getsection($class_id);
      
     
        $this->load->view('classdetails',$data);        
        
         
    }
    public function sectiondetails($section_id){
      $this->load->view('dashbord');
      $this->load->database();  
      $this->load->model('user_model');
    
      if($this->user_model->authorized()==false){
        $this->session->set_flashdata('msg','you are cant use it please try login  ' );
        redirect(base_url().'index.php/user/login');
  
      }
        
     
    //  $this->load->view('classdetails',$data);    
      $section['student']=$this->user_model->getstudentcount($section_id);
      $section['section']=$this->user_model->section($section_id);
      $this->load->view('sectiondetails',$section);
    }
    public function fecthclass(){
     
      $this->load->database();  
      $this->load->model('user_model');
      $data=$this->user_model->putsection();
           
    echo json_encode($data); 
    }
}