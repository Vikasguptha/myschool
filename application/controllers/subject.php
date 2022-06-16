<?php
 class Subject extends CI_controller{
    public function addsubject(){
        $this->load->view('dashbord');
        $this->load->model('user_model');
        if($this->user_model->authorized()==false){
          $this->session->set_flashdata('msg','you are cant use it please try login  ' );
          redirect(base_url().'index.php/user/login');
    
        }
       
        if($this->input->post('submit') !=""){
            if($this->input->post('subject') == "" ||$this->input->post('teacher_id') == ""    ||$this->input->post('totalmarks') == ""  ){
                $this->session->set_flashdata('msg','please enter all the required fields ');
                $this->load->view('addsubject');
            }else{
                
              $this->load->model('user_model');
              $formArray=array();
              $formArray['teacher_id']=$this->input->post('teacher_id');
              $formArray['subject_name']=$this->input->post('subject');
              $formArray['totalmarks']=$this->input->post('totalmarks');
              $formArray['last_update']=date('y-m-d');
              $this->user_model->createsubject($formArray);
              $this->session->set_flashdata('msg','subj=ct has been created  successfully');
              redirect(base_url().'index.php/subject/addsubject'); 
            
            }
          }else{
            $data['teacher'] =$this->user_model->fetchteacher();
           
            $this->load->view('addsubject',$data);
          }
   }
}
