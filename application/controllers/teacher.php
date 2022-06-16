<?php
 class teacher extends CI_controller{
    public function addteacher(){
       $this->load->view('dashbord');
        $this->load->model('user_model');
      
        if($this->user_model->authorized()==false){
          $this->session->set_flashdata('msg','you are cant use it please try login  ' );
          redirect(base_url().'index.php/user/login');
    
        }
         if($this->input->post('submit') !=""){
          
           
          if($this->input->post('fname') == "" || $this->input->post('lname') == "" ||$this->input->post('email') == "" ||$this->input->post('class_id') == ""|| $this->input->post('section_id') == "" || $this->input->post('job_type') == "" ){
               $this->session->set_flashdata('msg','please enter all the required fields ');
               $this->load->view('teacher');
           }else{
               
             $this->load->model('user_model');
             $formArray=array();
             $arr=$this->user_model->fetchteacher();
             $formArray['emp_id']=++$arr[sizeof($arr)-1]['emp_id'];
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
             $formArray['reg_date']=date('y-m-d');
             $formArray['job_type']=$this->input->post('job_type');
             $formArray['user_id']=$this->session->userdata['user']['user_id'];
             $formArray['last_update']=date('y-m-d');
            
          
              //start of image upload 
              $config['upload_path'] = './upload/';
              $config['allowed_types'] = 'gif|jpg|png|jpeg';
              $config['max_size'] = 2000;
             
              $this->load->library('upload', $config);
      
              if (!$this->upload->do_upload('profile_image')) {
                $this->user_model->addteacher($formArray);      
                 $this->session->set_flashdata('msg','teacher has created successfully');
                redirect(base_url().'index.php/teacher/totalteachers'); 
               
              } else {
                       $data = array('image_metadata' => $this->upload->data());                 
                      $formArray['photo']=$data['image_metadata'] ['file_name'];
              }
             //end of image upload
             $this->user_model->addteacher($formArray); 
             $this->session->set_flashdata('msg','teacher has created successfully');
             redirect(base_url().'index.php/user/dashbord'); 
            
           }
         }else{
          $data['class'] =$this->user_model->fetchclass();
          $data['country'] =$this->user_model->fetchcountry();
         
           $this->load->view('teacher',$data);
         }
    }
    public function totalteachers(){
        $this->load->view('dashbord');
        $this->load->database();  
        $this->load->model('user_model');
        if($this->user_model->authorized()==false){
          $this->session->set_flashdata('msg','you are cant use it please try login  ' );
          redirect(base_url().'index.php/user/login');
    
        }
        $data['h']=$this->user_model->totalteachers();
        $this->load->view('totalteachers',$data);
        
    }
    
  public function editteacher($teacher_id){
    $this->load->view('dashbord');
    $this->load->database();  
    $this->load->model('user_model');
    if($this->user_model->authorized()==false){
      $this->session->set_flashdata('msg','you are cant use it please try login  ' );
      redirect(base_url().'index.php/user/login');

    }
    $data['h']=$this->user_model->getteacher($teacher_id);
    $this->load->view('editteacher',$data);
   
   }
   public function updateteacher($oldphoto){
    $this->load->model('user_model');
    if($this->user_model->authorized()==false){
      $this->session->set_flashdata('msg','you are cant use it please try login  ' );
      redirect(base_url().'index.php/user/login');

    }
    if($this->input->post('submit') !=""){      
      if($this->input->post('fname') == "" || $this->input->post('lname') == ""  ){
        $this->session->set_flashdata('msg','please enter all the required fields ');
        $this->load->view('editteacher');
    }else{
      $this->load->model('user_model');
      $sArray=array();
       
      $sArray['teacher_id']=$this->input->post('teacher_id');
      
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
            $updateddata= $this->user_model->edit_teacher($sArray);
    
            $this->session->set_flashdata('msg','your account has updated successfully');
            redirect(base_url().'index.php/teacher/totalteachers'); 
          } else {
              unlink("upload/".$oldphoto);
              $data = array('image_metadata' => $this->upload->data());
             
             $sArray['photo']=$data['image_metadata'] ['file_name'];
          }
         //end of image upload
     $updateddata= $this->user_model->edit_teacher($sArray);
    
      $this->session->set_flashdata('msg','your account has updated successfully');
      redirect(base_url().'index.php/teacher/totalteachers'); 
    }       
  }else{
   // $this->load->view('userdetails');
  }
   }
   public function teacherdelete()//for deleting the user
   {
    $teacher_id= $this->input->get('teacher_id');
     $this->load->model('User_model');
 
     $delete=$this->User_model->teacherdelete($teacher_id);
       if($delete)
         {
           echo json_encode( "Success");
         }
      else
         {
           echo "Error";
         }
 
   }
  public function fecthteacher(){
    $this->load->model('User_model');
    $data= $_POST['a'];
    $teacher=$this->User_model->fetchteacher();
    for($i=0;$i<sizeof($teacher);$i++){
     for($j=0;$j<sizeof($data);$j++){
      $data[$j]['studentcount']=$this->User_model->studentcount($data[$j]['section_id']);
    if($data[$j]['teacher_id']==$teacher[$i]['teacher_id']){
      $data[$j]['teacherfname']=$teacher[$i]['fname'];
      $data[$j]['teacherlname']=$teacher[$i]['lname'];
    }
    }
  }
  
    echo json_encode($data);
   
    
  }  
}
