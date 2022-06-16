<?php
class user_model extends CI_Model{
    public function checkuser($username,$password){
       $this->db->where('username',$username);
       
        $this->db->where('password',$password);
        
        return   $row=$this->db->get('users')->row_array();
           
       }
       function authorized(){
        $user=$this->session->userdata('user');
        if(!empty($user)){
            return true;
        }else{
            return false;
        }
    }
    public function studentdelete($student_id){
        $this->db->where('student_id',$student_id);
       return $this->db->delete('student');

    }
    public function teacherdelete($teacher_id){
        $this->db->where('teacher_id',$teacher_id);
       return $this->db->delete('teacher');

    }
    public function addstudent($formarray){
        $this->db->insert('student',$formarray);

    }
    public function totalstudents(){
        $query = $this->db->get('student');  
        return $query;  
    }
    public function addteacher($formarray){
        $this->db->insert('teacher',$formarray);

    }
    public function totalteachers(){
        $query = $this->db->get('teacher');  
        return $query;  
    }
    public function createuser($formarray){
        $this->db->insert('users',$formarray);

    }
    public function totalusers(){
        $query = $this->db->get('users');  
        return $query;  
    }
    public function getuser($user_id){
        $this->db->where('user_id',$user_id);
        
             
         return  $row=$this->db->get('users')->row_array();
            
        }
    public function edit_row($sArray){
            $this->db->where('user_id',$sArray['user_id']);
            $result = $this->db->update('users', $sArray);	
            return $result;
        
        } 
        public function getteacher($teacher_id){

            $this->db->where('teacher_id',$teacher_id);
            
                 
             return  $row=$this->db->get('teacher')->row_array();
                
            }
            public function edit_teacher($sArray){
                $this->db->where('teacher_id',$sArray['teacher_id']);
                $result = $this->db->update('teacher', $sArray);	
                return $result;
            
            }   
            public function getstudent($student_id){
                $this->db->where('student_id',$student_id);
                
                     
                 return  $row=$this->db->get('student')->row_array();
                    
                }
            public function edit_student($sArray){
                    $this->db->where('student_id',$sArray['student_id']);
                    $result = $this->db->update('student', $sArray);	
                    return $result;
                
                }     
            public function checkpassword($id,$password,$new){
                    $newp = array("password"=>$new);
                    $this->db->where('user_id',$id);
                    
                     $this->db->where('password',$password);
                     $this->db->update('users', $newp);	
                                                            
                    }
                    public function createclass($formarray){
                        $this->db->insert('class',$formarray);
                
                    }
                    public function allclass(){
                        $query = $this->db->get('class');  
                        return $query;  
                    }
                    public function createsection($formarray){
                        $this->db->insert('section',$formarray);
                
                    }
                    public function getsection($class_id){
                        $this->db->where('class_id',$class_id);
                        
                             
                         $row=$this->db->get('section')->result();
                         return $row;
                            
                    }
                    public function section($section_id){
                        $this->db->where('section_id',$section_id);
                        
                             
                         $row=$this->db->get('section')->result_array();
                         return $row[0]['section_name'];
                            
                    }
                    public function reg_id($reg_id){
                        $this->db->where('substring(reg_id,1,4)' ,$reg_id);                    
                         $row=$this->db->get('student')->result_array();
                         return  $row;
                            
                    }
                    public function getteachername($teacher_id){
                        $this->db->where('teacher_id',$teacher_id);
                        
                             
                           $row=$this->db->get('teacher')->row_array();
                           return $row['fname'];
                            
                    }
                    public function getstudentcount($section_id){
                     
                      $this->db->select('student_id, fname,section_id, class_id,reg_id' );
                     
                     $this->db->where('section_id',$section_id);
                       $this->db->from('student')   ;
                      // $this->db->where('class_id',$class_id);
                         
                          return   $row=$this->db->get()->result_array();                                         
                    }
                    public function createsubject($formarray){
                        $this->db->insert('subject',$formarray);
                
                    }
                    public function createmarks($formarray){
                        $this->db->insert('marksheet',$formarray);
                
                    }
                    public function totalmarks($student_id){
                        $this->db->where('student_id',$student_id);
                        $query = $this->db->get('marksheet')->result_array();  
                        return $query;  
                    }
                    public function fetchclass(){
                       // $this->db->where('student_id',$student_id);
                        $query = $this->db->get('class')->result_array();  
                        return $query;  
                    }
                    public function fetchteacher(){
                     //   $this->db->where('teacher_id',$teacher_id);
                        
                             
                         return  $row=$this->db->get('teacher')->result_array();
                            
                        }
                        public function fetchsubject(){
                            //   $this->db->where('teacher_id',$teacher_id);
                               
                                    
                                return  $row=$this->db->get('subject')->result_array();
                                   
                               }

                               function fetchsection($class_id)
                              {
                               $this->db->where('class_id', $class_id);
                               //$this->db->order_by('section_name', 'ASC');
                               $query = $this->db->get('section')->result_array();
                               return $query;
                               
                                   $output = '<option value="">Select State</option>';
                               foreach($query as $row)
                                   {
                                        $output .= '<option value="'.$row['section_id'] .'">'.$row['section_name'] .'</option>';
                                 }
                                   return $output;
                                      }
                                      public function fetchcountry(){
                                        // $this->db->where('student_id',$student_id);
                                         $query = $this->db->get('country')->result_array();  
                                         return $query;  
                                     }  
                       function fetchstate($country_id)
                              {
                               $this->db->where('country_id', $country_id);
                               //$this->db->order_by('section_name', 'ASC');
                               $query = $this->db->get('state')->result_array();
                               return $query;
                               
                                  
                                      }
                                      function fetchcity($state_id)
                                      {
                                       $this->db->where('state_id', $state_id);
                                       //$this->db->order_by('section_name', 'ASC');
                                       $query = $this->db->get('city')->result_array();
                                       return $query;
                                  }
                             function fetchstudent($section_id)
                                              {
                                               $this->db->where('section_id', $section_id);
                                               //$this->db->order_by('section_name', 'ASC');
                                               $query = $this->db->get('student')->result_array();
                                               return $query;
                                               
                                                  
                                                      }  
        function studentphoto($student_id){
            $this->db->where('student_id',$student_id);
            $query=$this->db->get('student')->row_array();
           
             if(!empty($query)){ return $query['photo'];}
             
        }
        public function countstudent(){
          
            $this->db->select('student_id' );
                 
             $row=$this->db->get('student')->num_rows();;
             return $row;
                
        } 
        function putsection()
        {
        
         //$this->db->order_by('section_name', 'ASC');
         $query = $this->db->get('section')->result_array();
         return $query;  
        }   
        public function studentcount($section_id){
          
            $this->db->select('student_id') ;
            $this->db->where('section_id',$section_id);
             $row=$this->db->get('student')->num_rows();;
             return $row;
                
        }                                  
}