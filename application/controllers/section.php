<?php
 class section extends CI_controller{
    public function create_section(){
        $this->load->view('dashbord');
        $this->load->model('user_model');
      
        $this->load->model('user_model');
        if($this->user_model->authorized()==false){
          $this->session->set_flashdata('msg','you are cant use it please try login  ' );
          redirect(base_url().'index.php/user/login');
    
        }
          
        if($this->input->post('submit') !=""){
         
         
            if($this->input->post('section_name') == "" ||$this->input->post('class_id') == ""  ||$this->input->post('teacher_id') == ""  ){
                 $this->session->set_flashdata('msg','please enter all the required fields ');
                 $this->load->view('create_section');
             }else{
                 
               $this->load->model('user_model');
               $formArray=array();
               $formArray['section_name']=$this->input->post('section_name');
               $formArray['class_id']=$this->input->post('class_id');
               $formArray['teacher_id']=$this->input->post('teacher_id');
               $formArray['last_update']=date('y-m-d');
               $this->user_model->createsection($formArray);
               $this->session->set_flashdata('msg','new section  has been  created successfully');
               redirect(base_url().'index.php/section/create_section'); 
             
             }
           }else{
            $data['class'] =$this->user_model->fetchclass();
            $data['teacher'] =$this->user_model->fetchteacher();
             // print_r($data);
             $this->load->view('create_section',$data);
           }
    }
 }